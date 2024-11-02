<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ChallanController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Models\Challan;
use App\Models\Department;
use App\Models\Rule;
use App\Models\Semester;
use App\Models\User;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great! 
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Redirect based on role
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        $chalans = Challan::with('user')->get(); // Fetch all chalans for the admin
        return redirect()->route('admin.dashboard', compact('chalans'));
    } else {
        // Fetch only the chalans belonging to the logged-in user
        $chalans = Challan::where('user_id', $user->id)->get();
        return view('dashboard', compact('chalans'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication and profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        $chalans = Challan::with('user')->get(); // assuming 'user' is the relationship defined in Chalan model
        return view('admindashboard', compact('chalans'));
    })->name('admin.dashboard');

    Route::get('/chalan', function () {
        $chalans = Challan::with('user')->get(); // assuming 'user' is the relationship defined in Chalan model
        return view('admin.chalan', compact('chalans'));
    })->name('admin.chalan');

    Route::get('/payments', function () {
        return view('admin.payment');
    })->name('admin.payments');

    Route::get('/students', function () {
        $students = User::with(['department', 'semester'])
            ->where('role', 'student') // Filter by role
            ->get();
        return view('admin.student', compact('students'));
    })->name('admin.students');

    Route::get('/rules', function () {
        $rules = Rule::all();
        return view('admin.rules', compact('rules'));
    })->name('admin.rules');

    Route::get('/createChalan', function () {
        $users = User::with(['department', 'semester'])
            ->where('role', 'student') // Filter by role
            ->get();
        $rules = Rule::all();
        return view('admin.createchalan', compact('users', 'rules'));
    })->name('admin.createchalan');

    Route::get('/createRules', function () {
        return view('admin.createrules');
    })->name('admin.createrules');

    Route::get('/createstudent', function () {
        $departments = Department::all();  // Retrieve all departments
        $semesters = Semester::all();      // Retrieve all semesters
        return view('admin.createstudent', compact('departments', 'semesters'));
    })->name('admin.createstudent');

    Route::post('/createstudent', [UserController::class, 'store'])->name('admin.create.student');
    Route::post('/createrule', [RuleController::class, 'store'])->name('admin.create.rule');
    Route::post('/createchalan', [ChallanController::class, 'store'])->name('admin.create.chalan');
});

// Student routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/rules', [StudentController::class, 'listRules'])->name('student.rules');
    Route::get('/chalan/{id}/view', [StudentController::class, 'chalanview'])->name('chalan.view');
    Route::post('/chalan/{id}/upload-payment-proof', [ChallanController::class, 'uploadPaymentProof'])->name('chalan.uploadPaymentProof');

    Route::get('/student/challans', [StudentController::class, 'listChallans'])->name('student.challans');
    Route::post('/student/challan/pay/{id}', [StudentController::class, 'uploadPaymentProof'])->name('student.challan.pay');
});

// Additional routes that may require middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/challans', [AdminController::class, 'listChallans'])->name('admin.challans');
    Route::post('/admin/challan/approve/{id}', [AdminController::class, 'approveChallan'])->name('admin.challan.approve');
});

// Include authentication routes
require __DIR__ . '/auth.php';
