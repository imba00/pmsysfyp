<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControl;
use App\Http\Controllers\AdminController;

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


Route::get("/", [homeControl::class, "index"]);
Route::get("/redirect", [homeControl::class, "redFunc"]);

Route::get("/addproject", function () {
    return view('admin.adminassproj');
});

Route::post("/regproj", [AdminController::class, ('assignproject')]);


Route::get('/addproject', [AdminController::class, ('addprojform')]);
Route::get('updlist/{id}', [AdminController::class, ('showstud')]);
Route::get('dltlist/{id}', [AdminController::class, ('deletestud')]);
Route::post("/updproj", [AdminController::class, ('updateproject')]);
Route::post("/editsv", [AdminController::class, ('updatestatusprogress')]);


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