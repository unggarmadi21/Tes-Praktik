<?php

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registrationAuAuthenticatable/{id}', function ($id) {
 return view('registration', [
'member' => Registration::findOrFail($id)
]);
})->name('member.show');

Route::post('/registration', function(Request $request) {
$data = $request->validate([
'name' => 'required|max:255',
'email' => 'required',
'password' => 'required',
'alamat' => 'required',
]);

$member = new Registration;
$member->name = $data['name'];
$member->email = $data['email'];
$member->password = $data['password'];
$member->alamat = $data['alamat'];
$member->save();

return redirect()->route('member.show', ['id' => $member->id]);
})->name('registration.create');

Route::get('/email/verify', function () {
return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
