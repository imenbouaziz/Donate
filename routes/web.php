<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Models\Campaign;

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
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/redirects',[UserController::class,"index"]);


Route::get('/create-campaign', function () {
    return view('create-campaign');
})->middleware('redirectCreateCampaign');


Route::get('/create-new-campaign', function () {
    return view('create-campaign');
});

// User links
Route::get('/register', function () {
    return view('register');
})->middleware('activeUser');

Route::get('/login', function () {
    return view('login');
})->middleware('activeUser');

Route::get('/logout', function () {
    return view('login');
})->middleware('activeUser');

Route::get('/edit-user-account', function () {
    return view('edit-user-account');
});

Route::post('/create-user', [UserController::class, 'createUser']);
Route::post('/login-user', [UserController::class, 'login']);
Route::get('/user-profile/{username}', [UserController::class, 'userProfile']);
Route::post('/update-user-profile/{username}', [UserController::class, 'updateUserProfile']);

// Campaign links
Route::post('/create-campaign', [CampaignController::class, 'create']);
Route::get('/all-campaigns', [CampaignController::class, 'index']);
Route::get('/my-campaigns/{username}', [CampaignController::class, 'myCampaigns']);
Route::get('/edit-campaign/{id}', [CampaignController::class, 'editCampaign']);
Route::post('/update-campaign/{id}', [CampaignController::class, 'updateCampaign']);
Route::get('/delete-campaign/{id}', [CampaignController::class, 'deleteCampaign']);

// donation links
Route::get('/donate/{id}', [DonationController::class, 'makeDonation']);
Route::get('/donations-response/{user_id}/{id}', [DonationController::class, 'donationResponse']);
Route::get('/my-donations', [DonationController::class, 'myDonations']);
Route::post('/create-donation/{id}', [DonationController::class, 'donate']);
Route::get('/confirm-donation', [DonationController::class, 'confirm']);
