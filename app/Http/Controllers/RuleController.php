<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fine_amount' => 'required|numeric|min:0',
        ]);

        // Create a new rule using the validated data
        Rule::create([
            'name' => $request->name,
            'description' => $request->description,
            'fine_amount' => $request->fine_amount,
        ]);

        // Redirect to a specific route with a success message
        return redirect()->route('admin.rules')->with('success', 'Rule created successfully.');
    }
}
