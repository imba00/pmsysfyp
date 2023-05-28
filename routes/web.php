<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControl;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", [homeControl::class, "redFunc"]);

Route::get("/test", function () {
    return view('testdb');
});

Route::get("/redirect", [homeControl::class, "redFunc"]);

Route::get("/studlist", [AdminController::class, "showstudent"]);

Route::get('/get-studid/{phoneno}', [AdminController::class, 'getStudId']); //autofill

Route::get("/registerparcel", function () {
    return view('admin/adminregisterparcel');
});

Route::post("/regpar", [AdminController::class, ('registerparcel')]);

Route::post("/updlist", [AdminController::class, ('updatepar')]);
Route::get("/updateparform/{id}", [AdminController::class, ('updateparform')]);

Route::post('parcelcollected', [AdminController::class, ('collectedparcel')]);
Route::get('parcol/{id}', [AdminController::class, ('collectpar')]);

Route::post("/updstudent", [AdminController::class, ('updatestud')]);
Route::get("/editstudent/{id}", [AdminController::class, ('editstud')]);

Route::get('dltpar/{id}', [AdminController::class, ('deletepar')]);
Route::get('dltuser/{id}', [AdminController::class, ('deleteuser')]);


// Route::post("/verify_password", [StudentController::class, ('verifyPassword')]);

Route::post('/verify-password', 'App\Http\Controllers\StudentController@verifyPassword')->name('verify_password');




Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Admin-only routes
    Route::get('/register', [AdminRegisterController::class, 'create'])->name('register');
    Route::post('/register', [AdminRegisterController::class, 'store']);
    // other admin-only routes...
});


// Route::middleware(['auth'])->get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get(
        '/dashboard',
        function () {
            return view('dashboard');
        }
    )->name('dashboard');
});