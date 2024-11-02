<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'student_id' => 'required|exists:users,id', // Ensure student exists
            'rule_id' => 'required', // Ensure student exists

            // Add other validation rules as necessary
        ]);

        // Create a new Chalan instance
        $chalan = new Challan();
        $chalan->user_id = $validatedData['student_id'];
        $chalan->rule_id = $validatedData['rule_id'];

        $chalan->status = $request->status ?? 'pending';
        $chalan->payment_proof = $request->payment_proof ?? 'Not Paid Yet';
        // Assign other fields as necessary
        // $chalan->other_field = $validatedData['other_field'];

        // Save the Chalan to the database
        $chalan->save();

        // Redirect back with a success message
        return redirect()->route('admin.chalan') // Adjust to your route
            ->with('success', 'Chalan created successfully.');
    }
    public function uploadPaymentProof(Request $request, $id)
    {
        // Validate the uploaded file
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:2048' // 2MB max size
        ]);

        // Find the challan record
        $chalan = Challan::findOrFail($id);

        // Store the file and save the path
        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
            $chalan->payment_proof = $path;
            $chalan->status = 'paid'; // Update status if desired
            $chalan->save();
        }

        return redirect()->route('chalan.view', $id)->with('success', 'Payment proof uploaded successfully.');
    }
}
