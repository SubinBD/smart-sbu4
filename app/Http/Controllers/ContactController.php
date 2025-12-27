<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource (contact grid).
     */
    public function index()
    {
        $users = User::all(); // Fetch all registered users
        return view('contacts.index', compact('users'));
    }
}
