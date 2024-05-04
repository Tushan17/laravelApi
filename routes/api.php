<?php
use App\Http\Controllers\API\categoryController;
use App\Http\Controllers\API\chatController;
use App\Http\Controllers\API\userCategoryController;
use App\Http\Controllers\API\userMatchController;
use App\Http\Controllers\API\userSwipeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\applicationlogController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('login', );


Route::resource('role', roleController::class);
// Route::resource('applicationlog', applicationlogController::class);

Route::resource('user', userController::class);

//done
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

//done
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    // ->middleware('guest')
    ->name('login');

//FIXME:
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

//FIXME: done works
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum')
    ->name('logout');


//api functionality

Route::resource('userswipe', userSwipeController::class);
Route::resource('usermatch', userMatchController::class);
Route::resource('chat', chatController::class);
Route::resource('category', categoryController::class);
Route::resource('usercategory', userCategoryController::class);

