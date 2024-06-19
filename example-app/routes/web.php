<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PersonalInfoController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('main_page');

Route::get('/groups', [GroupsController::class, 'groups_page'])->name('groups_page');
Route::get('/groups/{group_id}', [GroupsController::class, 'groups_training_sessions_page'])->name('groups_training_sessions_page');
Route::get('/groups/{group_id}/{sessions_id}',  [GroupsController::class, 'groups_materials_select_page'])->name('groups_materials_select_page');

Route::get('/groups/{group_id}/{session_id}/practical_materials',  [GroupsController::class, 'groups_practical_materials_page'])->name('groups_practical_materials_page');
Route::get('/groups/{group_id}/{session_id}/practical_materials/{material_id}/download',   [GroupsController::class, 'groups_practical_materials_download'])->name('groups_practical_materials_download');

Route::get('/groups/{group_id}/{session_id}/theoretical_materials',  [GroupsController::class, 'groups_theoretical_materials_page'])->name('groups_theoretical_materials_page');
Route::get('/groups/{group_id}/{session_id}/theoretical_materials/{material_id}/download',   [GroupsController::class, 'groups_theoretical_materials_download'])->name('groups_theoretical_materials_download');

Route::get('/albums', [AlbumsController::class, 'albums_page'])->name('albums_page');
Route::get('/albums/{album_id}', [AlbumsController::class, 'album_photos_page'])->name('album_photos_page');

Route::get('/portfolio', [PersonalInfoController::class, 'portfolio_page'])->name('portfolio_page');
Route::get('/competitions', [PersonalInfoController::class, 'competitions_page'])->name('competitions_page');
Route::get('/qualifications', [PersonalInfoController::class, 'qualifications_page'])->name('qualifications_page');
Route::get('/qualifications/{id}/download', [PersonalInfoController::class, 'qualifications_download'])->name('qualifications_download');

Route::get('/certificates', [PersonalInfoController::class, 'certificates_page'])->name('certificates_page');
