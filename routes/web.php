<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'nama' => 'Adi Kurniawan',
        'frameworks' => ['Laravel', 'Vue', 'Inertia'],
    ]);
});

Route::get('/users', function (Request $request) {
    // sleep(2);
    $users = User::limit(10)->get()->map(fn($user) => ['id'=>$user->id,'name'=>$user->name]);
    $obj_users = User::query()
    ->when($request->input('search'), function ($query, $search) {
        $query->where('name', 'like', "%$search%");
    })
    ->paginate(10)
    ->withQueryString()
    ->through(fn($user) => ['id'=>$user->id,'name'=>$user->name]);
    return Inertia::render('Users/Index', [
        'tanggal' => date('d-M-Y'),
        'time' => now()->toTimeString(),
        'users' => $users,
        'obj_users' => $obj_users,
        'filters' => $request->only(['search']),
        'filter' => $request->get('search')
    ]);
});

Route::get('/users/create', function (Request $request) {
    return Inertia::render('Users/Create', [
        
    ]);
});
Route::post('/users/store', function (Request $request) {
    $post = $request->post();
    // dd($post);
    $attributes = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // dd($attributes);
    $new_user = User::create($attributes);
    dump($new_user);
    $new_user->delete();
    dd('');
    return redirect('/users');
    // dd('');
});

Route::get('/settings', function () {
    return Inertia::render('Settings', [
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
