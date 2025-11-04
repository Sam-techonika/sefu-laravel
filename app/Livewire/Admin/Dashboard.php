<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Service;
use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\Testimonial;
use App\Models\ServiceRequest;
use App\Models\UserContact;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $dateRange = 'week'; // week, month, year
    public $chartData = [];

    public function mount()
    {
        $this->loadChartData();
    }

    public function updatedDateRange()
    {
        $this->loadChartData();
        $this->dispatch('chartDataUpdated');
    }

    public function loadChartData()
    {
        $days = match($this->dateRange) {
            'week' => 7,
            'month' => 30,
            'year' => 365,
            default => 7,
        };

        // Create array of all dates in range
        $dates = [];
        $labels = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;
            $labels[] = now()->subDays($i)->format('M d');
        }

        // Get service requests over time
        $serviceRequestsData = ServiceRequest::where('created_at', '>=', now()->subDays($days))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        // Get user contacts over time
        $userContactsData = UserContact::where('created_at', '>=', now()->subDays($days))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        // Fill in missing dates with 0
        $serviceRequestsCounts = [];
        $userContactsCounts = [];
        
        foreach ($dates as $date) {
            $serviceRequestsCounts[] = $serviceRequestsData->has($date) ? $serviceRequestsData[$date]->count : 0;
            $userContactsCounts[] = $userContactsData->has($date) ? $userContactsData[$date]->count : 0;
        }

        $this->chartData = [
            'labels' => $labels,
            'serviceRequests' => $serviceRequestsCounts,
            'userContacts' => $userContactsCounts,
        ];
    }

    #[Layout('components.layouts.admin')]
    #[Title('Dashboard')]
    public function render()
    {
        // Get statistics
        $stats = [
            'services' => [
                'total' => Service::count(),
                'active' => Service::where('is_active', true)->count(),
                'inactive' => Service::where('is_active', false)->count(),
            ],
            'blogs' => [
                'total' => Blog::count(),
                'active' => Blog::where('is_active', true)->count(),
                'drafts' => Blog::where('is_active', false)->count(),
            ],
            'caseStudies' => [
                'total' => CaseStudy::count(),
                'active' => CaseStudy::where('is_active', true)->count(),
            ],
            'testimonials' => [
                'total' => Testimonial::count(),
                'active' => Testimonial::where('is_active', true)->count(),
                'homepage' => Testimonial::where('is_homepage', true)->count(),
            ],
            'requests' => [
                'total' => ServiceRequest::count(),
                'pending' => ServiceRequest::where('status', 'pending')->count(),
                'today' => ServiceRequest::whereDate('created_at', today())->count(),
            ],
            'contacts' => [
                'total' => UserContact::count(),
                'unread' => UserContact::where('is_read', false)->count(),
                'today' => UserContact::whereDate('created_at', today())->count(),
            ],
            'users' => [
                'total' => User::count(),
                'active' => User::where('is_active', true)->count(),
            ],
        ];

        $recentServiceRequests = ServiceRequest::latest()->take(5)->get();
        $recentContacts = UserContact::latest()->take(5)->get();
        $recentBlogs = Blog::latest()->take(5)->get();
        $recentCaseStudies = CaseStudy::latest()->take(5)->get();

        return view('livewire.admin.dashboard', [
            'stats' => $stats,
            'recentServiceRequests' => $recentServiceRequests,
            'recentContacts' => $recentContacts,
            'recentBlogs' => $recentBlogs,
            'recentCaseStudies' => $recentCaseStudies,
        ]);
    }
}
