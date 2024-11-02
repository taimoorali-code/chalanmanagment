<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Models\Rule;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function listRules()
    {
        $rules = Rule::all();
        return view('student.rules.index', compact('rules'));
    }
    public function chalanview($id){
        $chalan = Challan::with(['user', 'rule'])->findOrFail($id); // Load related user and rule data
        return view('student.viewchalan', compact('chalan'));
    }

    public function listChallans()
    {
        $challans = auth()->user()->challans()->with('rule')->get();
        return view('student.challans.index', compact('challans'));
    }

    public function uploadPaymentProof(Request $request, $id)
    {
        $request->validate(['payment_proof' => 'required|file|mimes:jpg,png,pdf']);

        $challan = Challan::findOrFail($id);
        $path = $request->file('payment_proof')->store('public/proofs');

        $challan->update(['payment_proof' => $path, 'status' => 'pending']);
        return redirect()->back()->with('success', 'Payment proof uploaded');
    }
}

