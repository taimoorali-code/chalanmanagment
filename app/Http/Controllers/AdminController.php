<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Challan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listStudents()
    {
        $students = User::where('role', 'student')->with('department', 'semester')->get();
        return view('admin.students.index', compact('students'));
    }

    public function listChallans()
    {
        $challans = Challan::with('user', 'rule')->get();
        return view('admin.challans.index', compact('challans'));
    }

    public function approveChallan($id)
    {
        $challan = Challan::findOrFail($id);
        $challan->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Challan approved successfully');
    }
}
