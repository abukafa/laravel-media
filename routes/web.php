<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\academy\Rapor;
use App\Http\Controllers\apps\Calendar;
use App\Http\Controllers\apps\InvoiceList;
use App\Http\Controllers\academy\Dashboard;
use App\Http\Controllers\academy\Course;
use App\Http\Controllers\pages\UserProfile;
use App\Http\Controllers\pages\UserProjects;
use App\Http\Controllers\apps\InvoicePreview;
use App\Http\Controllers\front_pages\Landing;
use App\Http\Controllers\data\TableController;
use App\Http\Controllers\front_pages\Jazmedia;
use App\Http\Controllers\jazmedia\Participants;
use App\Http\Controllers\pages\UserConnections;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\pages\AccountSettingsTasks;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsSecurity;

Route::get('/', [Jazmedia::class, 'index'])->name('jazmedia');
Route::get('/instagram', [Jazmedia::class, 'indexInstagram'])->name('jazmedia-instagram');
Route::post('/profile/upload', [Jazmedia::class, 'uploadProfilePicture'])->name('profile.upload');
Route::post('/task/{id}/like', [AccountSettingsTasks::class, 'likeTask'])->name('task.like');
Route::post('/task/{id}/bookmark', [AccountSettingsTasks::class, 'bookmarkTask'])->name('task.bookmark');
Route::post('/task/rating/{id}', [Jazmedia::class, 'taskRating'])->name('task.rating');

// Route::fallback(function () {
//   return view('content.error.maintenance');
// });

Route::get('/dashboard', [Landing::class, 'index'])->name('front-pages-landing');
Route::post('/signup', [Participants::class, 'signup']);
Route::post('/signin', [Participants::class, 'signin']);
Route::get('/signout', [Participants::class, 'signout']);
Route::get('/login', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::post('/login', [LoginBasic::class, 'login'])->name('auth-login');
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::get('/academy/awards/{subject}/{id}', [Rapor::class, 'certificate'])->name('academy-certificate');

Route::middleware('auth')->group(function () {
  Route::post('/logout', [LoginBasic::class, 'logout'])->name('auth-logout');
  Route::get('/pages/profile-user', [UserProfile::class, 'index'])->name('pages-profile-user');
  Route::get('/pages/profile-projects', [UserProjects::class, 'index'])->name('pages-profile-projects');
  Route::get('/pages/profile-connections', [UserConnections::class, 'index'])->name('pages-profile-connections');
  Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
  Route::post('/pages/account-settings-account', [AccountSettingsAccount::class, 'update'])->name('pages-account-settings-account-update');
  Route::get('/pages/account-settings-security', [AccountSettingsSecurity::class, 'index'])->name('pages-account-settings-security');
  Route::post('/pages/account-settings-security/password', [AccountSettingsSecurity::class, 'update_password'])->name('pages-account-settings-security-password');
  Route::post('/pages/account-settings-security/username', [AccountSettingsSecurity::class, 'update_username'])->name('pages-account-settings-security-username');
  Route::get('/pages/account-settings-tasks', [AccountSettingsTasks::class, 'index'])->name('pages-account-settings-tasks');
  Route::post('/pages/account-settings-tasks', [AccountSettingsTasks::class, 'store'])->name('pages-account-settings-tasks-store');
  Route::post('/pages/account-settings-tasks/{id}', [AccountSettingsTasks::class, 'update'])->name('pages-account-settings-tasks-update');

  Route::get('/app/calendar', [Calendar::class, 'index'])->name('app-calendar');
  Route::get('/academy/dashboard', [Dashboard::class, 'index'])->name('academy-dashboard');
  Route::get('/academy/rapor', [Rapor::class, 'index'])->name('academy-rapor');
  Route::get('/academy/rapor/print', [Rapor::class, 'print'])->name('academy-rapor-print');
  Route::get('/academy/awards', [Rapor::class, 'awards'])->name('academy-awards');
  Route::get('/academy/course', [Course::class, 'index'])->name('academy-course');
  Route::get('/academy/course/{id}', [Course::class, 'detail'])->name('academy-course-detail');

  Route::get('/app/finance/saving', [InvoiceList::class, 'saving'])->name('app-finance-saving');
  Route::get('/app/finance/payment', [InvoiceList::class, 'index'])->name('app-finance-payment');
  Route::get('/app/finance/preview', [InvoicePreview::class, 'index'])->name('app-finance-preview');
  Route::get('/app/finance/print', [InvoicePreview::class, 'print'])->name('app-finance-print');

  Route::get('/data/project/{id}', [TableController::class, 'project']);
});