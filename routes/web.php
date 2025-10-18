<?php

use App\Livewire\Public\About;
use App\Livewire\Public\CompanyRegistration\Foreign;
use App\Livewire\Public\CompanyRegistration\Local;
use App\Livewire\Public\Contact;
use App\Livewire\Public\Home;
use App\Livewire\Public\Service;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/about',About::class)->name('about');
Route::get('/service',Service::class)->name('service');
Route::get('/contact',Contact::class)->name('contact');  

Route::get('registration/local',Local::class)->name('registration.local');
Route::get('registration/international',Foreign::class)->name('registration.foriegn');
