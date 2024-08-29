<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribution;

class ContributionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'payment_mode' => 'required|string',
            'payment_date' => 'required|date',
            'contribution_type' => 'required|string',
        ]);

        // Create a new Contribution record in the database
        Contribution::create([
            'name' => $request->input('user_name'),
            'membership_id' => $request->input('user_id'),
            'amount' => $request->input('amount'),
            'payment_mode' => $request->input('payment_mode'),
            'payment_date' => $request->input('payment_date'),
            'contribution_type' => $request->input('contribution_type'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Contribution has been recorded successfully.');
    }

    public function index()
    {
        // Fetch all contributions from the database
        $contributions = Contribution::all();

        // Return the view with the contributions data
        return view('table', ['contributions' => $contributions]);
    }
}
