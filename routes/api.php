<?php

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/test-api-endpoint', function (Request $request) {
    return response()->json(['message' => 'Api endpoint is working']);
});

Route::controller(AuthController::class)->prefix('auth')->middleware('api')->group(function(){
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/register', 'register')->name('auth.register');
    Route::post('/refresh', 'refresh')->name('auth.refresh');

    Route::middleware('jwt.auth.token')->group(function(){
        Route::post('/logout', 'logout')->name('auth.logout');
        Route::get('/user-profile', 'userProfile')->name('auth.userProfile');
        Route::post('/send-registration-invite', 'sendRegistrationInvite')->name('auth.sendRegistrationInvite');
    });
});


Route::post('/test-email-sent', function (Request $request) {
    try {
        $mailData = [
            'title' => 'Email Title',
            'message' => 'This is a test email directed to the creator of the website',
            'session_title' => $request->session_title
        ];
        Mail::to('nas2dev@gmail.com')->send(new TestMail($mailData));
        return response()->json(['message' => 'Email sent successfully']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Email not sent', 'error' => $e->getMessage()]);
    }
});
