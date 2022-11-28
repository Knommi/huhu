<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::post('register', 'AuthController@register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/test', [AuthController::class, 'test']);


Route::post('/book_create', [BookController::class, 'store']);
Route::get('/get_books', [BookController::class, 'index']);
Route::get('/get', [BookController::class, 'get']);
Route::get('/show_book/{id}', [BookController::class, 'show']);
Route::put('/upd_books/{id}', [BookController::class, 'upd']);
Route::delete('/del_books/{id}', [BookController::class, 'destroy']);


Route::post('/books/{cook}/ratings', [RatingController::class, 'store']);
// Route::apiResource('/books', [BookController::class]);
Route::post('/mulupload',[imgcontroller::class,'muluplaoad']);

// http://localhost:80/api/register

// http://127.0.0.1/app/public/api/test
// ErrorException: Array to string conversion in file C:\xampp\htdocs\app\vendor\laravel\framework\src\Illuminate\Routing\ResourceRegistrar.php on line 423
// Symfony\Component\Routing\Exception\RouteNotFoundException: Route [login] not defined. in file C:\xampp\htdocs\app\vendor\laravel\framework\src\Illuminate\Routing\UrlGenerator.php on line 467
// Illuminate\Contracts\Container\BindingResolutionException: Target class [RatingController] does not exist. in file C:\xampp\htdocs\app\vendor\laravel\framework\src\Illuminate\Container\Container.php on line 877
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});