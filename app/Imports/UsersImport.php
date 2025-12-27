<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection; // Import Collection
use Maatwebsite\Excel\Concerns\ToCollection; // Change to ToCollection
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading; // Keep Chunk Reading

class UsersImport implements ToCollection, WithHeadingRow, WithValidation, WithChunkReading // Changed ToModel to ToCollection
{
    private $usersToImport = [];

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $this->usersToImport[] = [
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'] ?? null,
                'employee_id' => $row['employee_id'] ?? null,
                'position' => $row['position'] ?? null,
                'role' => $row['role'] ?? 'user',
                'division' => $row['division'] ?? null,
                'district' => $row['district'] ?? null,
                'upozila' => $row['upozila'] ?? null,
                'region' => $row['region'] ?? null,
                'nsm' => $row['nsm'] ?? null,
                'csm' => $row['csm'] ?? null,
                'rsm' => $row['rsm'] ?? null,
                'asm' => $row['asm'] ?? null,
                'tsm' => $row['tsm'] ?? null,
                'sr' => $row['sr'] ?? null,
                'retailer' => $row['retailer'] ?? null,
                'distributor' => $row['distributor'] ?? null,
                'image' => $row['image'] ?? null,
                'password' => isset($row['password']) && !empty($row['password']) ? Hash::make($row['password']) : null,
                'created_at' => now(), // Add timestamps
                'updated_at' => now(),
            ];
        }
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email', // Removed unique, will handle upsert logic
            'password' => 'nullable|string|min:8',
            'role' => 'nullable|string|in:admin,manager,user',
        ];
    }

    public function chunkSize(): int
    {
        return 1000; // Increased chunk size for better performance with upsert
    }

    // New method to get collected data
    public function getUsersToImport(): array
    {
        return $this->usersToImport;
    }
}