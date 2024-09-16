<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Auth\loginController; 
use App\Http\controllers\Auth\signupController; 
use App\Http\controllers\Auth\logoutController; 
use App\Http\controllers\AdminAuth\adminController; 
use App\Http\controllers\Guest\indexController; 
use App\Http\controllers\Guest\CartController; 
use App\Http\controllers\Guest\CustomerController; 
use App\Http\controllers\Auth\PaymentController; 
use App\Http\controllers\Auth\resetPasswordController; 
use Illuminate\Foundation\Auth\EmailVerificationRequest;




// Global Routes
Route::get('/',[indexController::class,'index'])->name('home');
Route::get('/product/{id}',[indexController::class,'productView'])->name('product.view');
Route::get('/cart', [CartController::class,'showCart'])->name('cart.show');
Route::post('/{id}/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/count',[CartController::class,'populateCart'])->name('cart.count');
Route::delete('/cart/remove/{id}', [CartController::class,'removeFromCart'])->name('product.remove');
Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession'])->name('payment.createCheckoutSession');

// Checkout Routes

Route::get('/customer-info',[customerController::class,'index'])->name('customer.info');
Route::post('/customer-info',[customerController::class,'storeData'])->name('customer.data');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-fail',function(){return "<h1>Payment Fail</h1>";})->name('payment.cancel') ;
Route::get('/payment-cancel',function(){return "<h1>Payment Fail</h1>";});
Route::get('/order/success',[PaymentController::class,'orderSuccess'])->name('order.success') ;


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->ROUTE('admin.dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// Admin Routes
Route::middleware('auth','verified')->group(function(){
Route::get('/admin/dashboard',[adminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/add-product',[adminController::class,'addProduct'])->name('product.add');
Route::post('/admin/add-product',[adminController::class,'storeProduct'])->name('product.store');
Route::get('/admin/{id}/edit-product',[adminController::class,'editProduct'])->name('product.edit');
Route::post('/admin/{id}/edit-product',[adminController::class,'updateProduct'])->name('edit.store');
Route::get('/admin/{id}/delete',[adminController::class,'destroy'])->name('product.delete');
// Route::get('/email/verify', function(){return "Verify your Email";})->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {$request->fulfill();
// return redirect('/home');})->middleware(['signed'])->name('verification.verify');

Route::get('/logout',[logoutController::class,'logout'])->name('logout');
});

// Guest Routes
Route::middleware('guest')->group(function(){
Route::get('/login',[loginController::class,'index'])->name('login.view');
Route::post('/login',[loginController::class,'login'])->name('login');
Route::get('/signup',[signupController::class,'index'])->name('signup.view');
Route::post('/signup',[signupController::class,'signup'])->name('signup');  

Route::get('/forgot-password',[resetPasswordController::class,'index'])->name('password.request');  
Route::post('/forgot-password',[resetPasswordController::class,'sendMail'])->name('password.email');  
Route::get('/reset-password/{token}',[resetPasswordController::class,'verifyMail'])->name('password.reset');
Route::post('/change-password',[resetPasswordController::class,'resetPassword'])->name('password.update');



});
