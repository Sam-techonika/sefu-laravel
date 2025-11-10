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
use App\Livewire\Admin\Service\AddService;
use App\Livewire\Admin\Service\ServiceLangList;
use App\Livewire\Admin\Service\ServiceList;
use App\Livewire\Admin\Service\UpdateService;
use App\Livewire\Admin\ServiceRequest\ServiceRequest;
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
    Route::get('/service/{slug}', ServiceView::class)->name('service.view');
    Route::get('/testimonials', Testimonial::class)->name('testimonials');
    Route::get('/faq', Faq::class)->name('faq');

    Route::get('registration/local', Local::class)->name('registration.local');
    Route::get('registration/international', Foreign::class)->name('registration.foreign');
    Route::get('registration/trademark-registration', TradeMark::class)->name('registration.trade-registration');
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
        Route::get('/services', ServiceList::class)->name('services');
    Route::get('/service/add/{id}', AddService::class)->name('service.add');
    Route::get('/service/edit/{id}/{locale}', UpdateService::class)->name('service.edit');
    Route::get('service/languages/{id}', ServiceLangList::class)->name('service.languages');
    Route::get('/faq', FaqList::class)->name('faq');
    Route::get('/service-requests', ServiceRequest::class)->name('service-requests');
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

// Test routes for tag functionality from blog_translations
Route::get('/test-add-tags', function () {
    $locale = app()->getLocale() ?? 'en';
    
    // Sample tags to add to blog translations
    $sampleTags = [
        'Technology, Web Development, Laravel',
        'Legal, Business, Compliance',
        'Marketing, Digital Strategy, SEO',
        'Finance, Accounting, Tax Planning',
        'Design, UI/UX, Branding',
        'Consulting, Strategy, Business Growth'
    ];
    
    // Get blog translations without tags
    $translations = \App\Models\BlogTranslation::where('locale', $locale)
        ->where(function($q) {
            $q->whereNull('tags')->orWhere('tags', '')->orWhere('tags', '[]');
        })
        ->take(6)
        ->get();
    
    $updated = 0;
    foreach ($translations as $index => $translation) {
        if (isset($sampleTags[$index])) {
            $translation->tags = $sampleTags[$index];
            $translation->save();
            $updated++;
        }
    }
    
    return "Added tags to {$updated} blog translations. <a href='/test-check-tags'>Check Tags</a> | <a href='/{$locale}/blogs'>View Blogs</a>";
});

Route::get('/test-check-tags', function () {
    $locale = app()->getLocale() ?? 'en';
    
    // Get blog translations with tags
    $translations = \App\Models\BlogTranslation::where('locale', $locale)
        ->whereNotNull('tags')
        ->where('tags', '!=', '')
        ->with('blog')
        ->get();
    
    $output = "<h2>Blog Translations with Tags</h2>";
    
    foreach ($translations as $translation) {
        $tags = array_map('trim', explode(',', $translation->tags));
        $output .= "<div style='margin-bottom: 20px; padding: 15px; border: 1px solid #ddd;'>";
        $output .= "<h3>Blog: {$translation->title}</h3>";
        $output .= "<p><strong>Tags:</strong> ";
        
        foreach ($tags as $tag) {
            $tagUrl = url("/{$locale}/blogs?tag=" . urlencode($tag));
            $output .= "<a href='{$tagUrl}' style='margin-right: 10px; padding: 5px 10px; background: #007bff; color: white; text-decoration: none; border-radius: 3px;'>{$tag}</a>";
        }
        
        $output .= "</p></div>";
    }
    
    $blogListUrl = url("/{$locale}/blogs");
    $output .= "<p style='margin-top: 30px;'><a href='{$blogListUrl}' style='padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;'>View All Blogs</a></p>";
    
    return $output;
});
