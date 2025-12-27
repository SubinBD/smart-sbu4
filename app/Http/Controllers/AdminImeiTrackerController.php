<?php

namespace App\Http\Controllers;

use App\Models\ImeiTracker; // Import the ImeiTracker model
use Illuminate\Http\Request;
use App\Http\Requests\StoreImeiTrackerRequest; // Import the StoreImeiTrackerRequest
use App\Http\Requests\UpdateImeiTrackerRequest; // Import the UpdateImeiTrackerRequest
use Maatwebsite\Excel\Facades\Excel; // Import Excel Facade
use App\Exports\ImeiTrackersExport;         // Import UsersExport
use App\Imports\ImeiTrackersImport;         // Import ImeiTrackersImport
use Illuminate\Database\Eloquent\Builder; // Import Builder

class AdminImeiTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ImeiTracker::query();

        // Search (if needed later)
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('source_name', 'like', "%{$search}%")
                  ->orWhere('pi_number', 'like', "%{$search}%")
                  ->orWhere('model_name', 'like', "%{$search}%"); // Example search fields
            });
        }

        // Sorting
        $sort_by = $request->query('sort_by', 'id');
        $sort_order = $request->query('sort_order', 'asc');

        // Validate sort_by to prevent SQL injection or unexpected columns
        $fillableColumns = (new ImeiTracker())->getFillable();
        $allowedSortColumns = array_merge(['id', 'created_at', 'updated_at'], $fillableColumns);

        if (!in_array($sort_by, $allowedSortColumns)) {
            $sort_by = 'id'; // Default to id if invalid column
        }

        $query->orderBy($sort_by, $sort_order);

        $imeiTrackers = $query->paginate(10);

        return view('admin.imei-tracker.index', compact('imeiTrackers', 'sort_by', 'sort_order', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.imei-tracker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImeiTrackerRequest $request)
    {
        ImeiTracker::create($request->validated());

        return redirect()->route('admin.imei-tracker.index')->with('success', 'IMEI Tracker entry created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImeiTracker $imeiTracker)
    {
        return view('admin.imei-tracker.edit', compact('imeiTracker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImeiTrackerRequest $request, ImeiTracker $imeiTracker)
    {
        $imeiTracker->update($request->validated());

        return redirect()->route('admin.imei-tracker.index')->with('success', 'IMEI Tracker entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImeiTracker $imeiTracker)
    {
        $imeiTracker->delete();

        return redirect()->route('admin.imei-tracker.index')->with('success', 'IMEI Tracker entry deleted successfully.');
    }

    /**
     * Export IMEI Trackers to Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new ImeiTrackersExport, 'imei_trackers.xlsx');
    }

    /**
     * Import IMEI Trackers from Excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new ImeiTrackersImport, $request->file('file'));

        return redirect()->route('admin.imei-tracker.index')->with('success', 'IMEI Trackers imported successfully.');
    }

    /**
     * Download an empty template for IMEI Tracker import.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyTemplate()
    {
        // Create a custom export instance that returns an empty query but provides headings
        $emptyExport = new class extends ImeiTrackersExport {
            public function query(): Builder
            {
                return ImeiTracker::query()->whereRaw('1 = 0'); // Always returns an empty set
            }
        };

        return Excel::download($emptyExport, 'imei_trackers_template.xlsx');
    }

    /**
     * Remove all entries from the IMEI Tracker table.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function truncate()
    {
        ImeiTracker::truncate();

        return redirect()->route('admin.imei-tracker.index')->with('success', 'All IMEI Tracker entries have been removed.');
    }
}
