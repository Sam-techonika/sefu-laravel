<?php

use App\Livewire\Admin\Blog\AddBlog;
use App\Livewire\Admin\Blog\BlogLangList;
use App\Livewire\Admin\Blog\BlogList;
use App\Livewire\Admin\Blog\UpdateBlog;
use App\Livewire\Admin\CaseCategory\CaseCategoryList;
use App\Livewire\Admin\Casestudy\AddCaseStudy;
use App\Livewire\Admin\Casestudy\CaseStudyLangList;
use App\Livewire\Admin\Casestudy\CaseStudyList;
use App\Livewire\Admin\Casestudy\UpdateCaseStudy;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Contact\ContactList;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Faq\FaqList;
use App\Livewire\Admin\Registration\RegistrationList;
use App\Livewire\Admin\Setting\SettingManagement;
use App\Livewire\Admin\Tag\TagList;
use App\Livewire\Admin\Testimonial\TestimonialList;
use App\Livewire\Admin\UserList;
use App\Livewire\Auth\Login as AuthLogin;
use App\Livewire\Public\About;
use App\Livewire\Public\Blog;
use App\Livewire\Public\BlogView;
use App\Livewire\Public\CaseStudy;
use App\Livewire\Public\CaseStudyView;
use App\Livewire\Public\CompanyRegistration\Foreign;
use App\Livewire\Public\CompanyRegistration\Local;
use App\Livewire\Public\CompanyRegistration\TradeMark;
use App\Livewire\Public\Contact;
use App\Livewire\Public\Faq;
use App\Livewire\Public\Home;
use App\Livewire\Public\Service;
use App\Livewire\Public\ServiceView;
use App\Livewire\Public\Testimonial;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;






Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|hi'],
], function () {

    Route::get('/', Home::class)->name('home');
    Route::get('/about', About::class)->name('about');
    Route::get('/service', Service::class)->name('service');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/blogs', Blog::class)->name('blogs');
    Route::get('/blog/{slug}', BlogView::class)->name('blog.view');
    Route::get('/case-study', CaseStudy::class)->name('case.study');
    Route::get('/case-study/{slug}', CaseStudyView::class)->name('case.study.view');
    Route::get('/service-view', ServiceView::class)->name('service.view');
    Route::get('/testimonials', Testimonial::class)->name('testimonials');
    Route::get('/faq', Faq::class)->name('faq');

    Route::get('registration/local', Local::class)->name('registration.local');
    Route::get('registration/international', Foreign::class)->name('registration.foreign');
    Route::get('registration/trade-registration', TradeMark::class)->name('registration.trade-registration');
});

// Route::get('/', function () {
//     $locale = session('locale', config('app.locale', 'en'));
//     return redirect("/{$locale}");
// });

// Route::fallback(function () {
//     $locale = session('locale', config('app.locale', 'en'));
//     $path = request()->path();
//     return redirect("/{$locale}/{$path}");
// });

Route::fallback(function () {
    $path = request()->path();

    // Don't redirect admin routes or other specific routes
    if (
        str_starts_with($path, 'admin') ||
        str_starts_with($path, 'clear-cache') ||
        str_starts_with($path, 'logout') ||
        str_starts_with($path, 'livewire')
    ) {
        abort(404);
    }

    $locale = session('locale', config('app.locale', 'en'));
    return redirect("/{$locale}/{$path}");
});

Route::get('login', AuthLogin::class)->name('login');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/users', UserList::class)->name('users');
    Route::get('/categories', CategoryList::class)->name('categories');
    Route::get('/tags', TagList::class)->name('tags');
    Route::get('/blogs', BlogList::class)->name('blogs');
    Route::get('/blog/add/{id}', AddBlog::class)->name('blog.add');
        Route::get('/blog/edit/{id}/{locale}', UpdateBlog::class)->name('blog.edit');
    Route::get('blog/languages/{id}', BlogLangList::class)->name('blog.languages');
    Route::get('/case-studies', CaseStudyList::class)->name('case-studies');
    Route::get('/case-study/add/{id}', AddCaseStudy::class)->name('case-studies.add');
    Route::get('/case-study/edit/{id}/{locale}', UpdateCaseStudy::class)->name('case-studies.edit');
    Route::get('/case-study/languages/{id}', CaseStudyLangList::class)->name('case-studies.translations');
    Route::get('/faq', FaqList::class)->name('faq');
    Route::get('/contacts', ContactList::class)->name('contacts');
    Route::get('registrations',RegistrationList::class)->name('registrations');
    Route::get('/case-categories', CaseCategoryList::class)->name('casecategories');
    Route::get('/testimonials', TestimonialList::class)->name('testimonials');
    Route::get('/settings', SettingManagement::class)->name('settings');

});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home', app()->getLocale());
})->name('logout');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cache Cleared!";
});
