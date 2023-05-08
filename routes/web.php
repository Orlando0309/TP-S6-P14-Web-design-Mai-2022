<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;
use App\Http\Middleware\MymeType;
use App\Http\Middleware\CheckUserRole;

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

// Route::get('/article/', [ArticleController::class,"create"]);

Route::get('/', [ArticleController::class,"list"])->name('in');
Route::get('/log', [ArticleController::class,"start"])->name('start');
Route::get('/logout', [ArticleController::class,"disconnect"])->name('out');
Route::post('/admin',[ArticleController::class,"logadmin"])->name('logadmin');
Route::prefix('article')->group(function () {
    Route::get('/', [ArticleController::class,"create"]);
    Route::post('/save', [ArticleController::class,"save"]);
    Route::get('/liste',[ArticleController::class,"list"])->name('liste');
    // Route::get('/search',[ArticleController::class,"list"])->name('liste');
    Route::get('/{id}-{titre}',[ArticleController::class,"show"]);
    Route::get('/update/{id}/{titre}',[ArticleController::class,"update"])->where(['id'=>'[0-9]+'])->middleware(CheckUserRole::class);
    Route::post('/exeupdate/{id}',[ArticleController::class,"exeupdate"])->middleware(CheckUserRole::class);
});


Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
    Route::get('/assets/{any}', function (Request $request) {
        $path = $request->path();
        // $path=str_replace('/','\\',$path);
        dd($path);
        if (File::exists($path)) {
            $contentType=(new MymeType())->mime_type($path);
            $response = new Illuminate\Http\Response(File::get($path), 200);
            $response->header('Content-Type', $contentType);
            return $response;
        } else {
            abort(404);
        }
    })->where('any', '.*');
});
//optional
Route::get('/user/{name?}', function (string $name = null) {
    return $name;
});
 
Route::get('/user/{name?}', function (string $name = 'John') {
    return $name;
});
//regular exprsssion
Route::get('/user/{name}', function (string $name) {
    // ...
})->where('name', '[A-Za-z]+')
->name('username')
;
 
Route::get('/user/{id}', function (string $id) {
    // ...
})->where('id', '[0-9]+');
 
Route::get('/user/{id}/{name}', function (string $id, string $name) {
    // ...
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

//using the same controller
// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
