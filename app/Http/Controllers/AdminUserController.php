<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Maatwebsite\Excel\Facades\Excel; // Import Excel Facade
use App\Exports\UsersExport;         // Import UsersExport
use App\Imports\UsersImport;         // Import UsersImport

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // Inject Request
    {
        $query = User::query();

        // Search
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('employee_id', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhere('division', 'like', "%{$search}%")
                  ->orWhere('district', 'like', "%{$search}%")
                  ->orWhere('upozila', 'like', "%{$search}%")
                  ->orWhere('region', 'like', "%{$search}%")
                  ->orWhere('nsm', 'like', "%{$search}%")
                  ->orWhere('csm', 'like', "%{$search}%")
                  ->orWhere('rsm', 'like', "%{$search}%")
                  ->orWhere('asm', 'like', "%{$search}%")
                  ->orWhere('tsm', 'like', "%{$search}%")
                  ->orWhere('sr', 'like', "%{$search}%")
                  ->orWhere('retailer', 'like', "%{$search}%")
                  ->orWhere('distributor', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sort_by = $request->query('sort_by', 'id');
        $sort_order = $request->query('sort_order', 'asc');

        // Validate sort_by to prevent SQL injection or unexpected columns
        $fillableColumns = (new User())->getFillable(); // Get fillable columns
        if (!in_array($sort_by, array_merge(['id'], $fillableColumns))) {
            $sort_by = 'id'; // Default to id if invalid column
        }

        $query->orderBy($sort_by, $sort_order);

        // Pagination
        $users = $query->paginate(10); // Paginate with 10 items per page

        return view('admin.users.index', compact('users', 'sort_by', 'sort_order', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('users', 'public');
        }

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $request->file('image')->store('users', 'public');
        }

        // Only update password if a new one is provided
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Don't update password if it's empty
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete user's image if it exists
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Export users to Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * Import users from Excel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv', // Added CSV as a supported format
        ]);

        $usersImport = new UsersImport();
        Excel::import($usersImport, $request->file('file'));

        $usersData = $usersImport->getUsersToImport();

        if (!empty($usersData)) {
            // Define unique columns for upsert and columns to update
            $uniqueBy = ['email'];
            $update = [
                'name', 'phone', 'employee_id', 'position', 'role', 'division',
                'district', 'upozila', 'region', 'nsm', 'csm', 'rsm', 'asm', 'tsm', 'sr',
                'retailer', 'distributor', 'image', 'password', 'updated_at'
            ];

            User::upsert($usersData, $uniqueBy, $update);
        }


        return redirect()->route('admin.users.index')->with('success', 'Users imported successfully.');
    }
}
