<div>
    <!-- Page header -->
    <div class="page-header d-print-none mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Dashboard
                </h2>
                <div class="text-muted mt-1">Welcome back! Here's what's happening with your platform.</div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <select class="form-select" wire:model.live="dateRange">
                        <option value="week">Last 7 Days</option>
                        <option value="month">Last 30 Days</option>
                        <option value="year">Last Year</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row row-deck row-cards mb-3">
        <!-- Services Card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <i class="ti ti-briefcase"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $stats['services']['total'] }} Services
                            </div>
                            <div class="text-muted">
                                {{ $stats['services']['active'] }} active
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blogs Card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-success text-white avatar">
                                <i class="ti ti-article"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $stats['blogs']['total'] }} Blog Posts
                            </div>
                            <div class="text-muted">
                                {{ $stats['blogs']['active'] }} published
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Case Studies Card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-info text-white avatar">
                                <i class="ti ti-file-text"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $stats['caseStudies']['total'] }} Case Studies
                            </div>
                            <div class="text-muted">
                                {{ $stats['caseStudies']['active'] }} active
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials Card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-warning text-white avatar">
                                <i class="ti ti-star"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                {{ $stats['testimonials']['total'] }} Testimonials
                            </div>
                            <div class="text-muted">
                                {{ $stats['testimonials']['homepage'] }} on homepage
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Requests & Contacts -->
    <div class="row row-deck row-cards mb-3">
        <!-- Service Requests Card -->
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Service Requests</div>
                        <div class="ms-auto lh-1">
                            <span class="badge bg-green-lt">{{ $stats['requests']['pending'] }} pending</span>
                        </div>
                    </div>
                    <div class="h1 mb-3">{{ $stats['requests']['total'] }}</div>
                    <div class="d-flex mb-2">
                        <div>Today</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                {{ $stats['requests']['today'] }}
                                <i class="ti ti-trending-up ms-1"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Contacts Card -->
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">User Contacts</div>
                        <div class="ms-auto lh-1">
                            <span class="badge bg-yellow-lt">{{ $stats['contacts']['unread'] }} unread</span>
                        </div>
                    </div>
                    <div class="h1 mb-3">{{ $stats['contacts']['total'] }}</div>
                    <div class="d-flex mb-2">
                        <div>Today</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                {{ $stats['contacts']['today'] }}
                                <i class="ti ti-trending-up ms-1"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Total Users</div>
                    </div>
                    <div class="h1 mb-3">{{ $stats['users']['total'] }}</div>
                    <div class="d-flex mb-2">
                        <div>Active Users</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                {{ $stats['users']['active'] }}
                                <i class="ti ti-user-check ms-1"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row mb-3" wire:key="chart-{{ $dateRange }}">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Activity Overview</h3>&nbsp;&nbsp;
                    <div class="card-subtitle">Service requests and contact messages over time</div>
                </div>
                <div class="card-body">
                    <div id="chartContainer" style="min-height: 300px;">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Items -->
    <div class="row row-deck row-cards">
        <!-- Recent Service Requests -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Service Requests</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    @forelse($recentServiceRequests as $request)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar">{{ substr($request->service, 0, 2) }}</span>
                            </div>
                            <div class="col text-truncate">
                                <div class="text-reset d-block">{{ $request->service }}</div>
                                <div class="d-block text-muted text-truncate mt-n1">
                                    {{ $request->email }} • {{ $request->phone }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="badge badge-sm bg-{{ $request->status === 'pending' ? 'yellow' : 'green' }}-lt">
                                    {{ $request->status }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <span class="text-muted">{{ $request->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item">
                        <div class="text-muted text-center py-3">No service requests yet</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Contacts -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Contacts</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    @forelse($recentContacts as $contact)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar">{{ substr($contact->name, 0, 2) }}</span>
                            </div>
                            <div class="col text-truncate">
                                <div class="text-reset d-block">{{ $contact->name }}</div>
                                <div class="d-block text-muted text-truncate mt-n1">
                                    {{ $contact->email }}
                                </div>
                            </div>
                            <div class="col-auto">
                                @if(!$contact->is_read)
                                <span class="badge bg-red"></span>
                                @endif
                            </div>
                            <div class="col-auto">
                                <span class="text-muted">{{ $contact->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item">
                        <div class="text-muted text-center py-3">No contacts yet</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Blogs & Case Studies -->
    <div class="row row-deck row-cards mt-3">
        <!-- Recent Blogs -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Blog Posts</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    @forelse($recentBlogs as $blog)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                @if($blog->featured_image)
                                <img src="{{ asset('storage/'.$blog->featured_image) }}" class="avatar" style="object-fit: cover;">
                                @else
                                <span class="avatar bg-blue-lt">
                                    <i class="ti ti-article"></i>
                                </span>
                                @endif
                            </div>
                            <div class="col text-truncate">
                                <div class="text-reset d-block">{{ $blog->name }}</div>
                                <div class="d-block text-muted text-truncate mt-n1">
                                    {{ $blog->created_at->format('M d, Y') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="badge bg-{{ $blog->is_active ? 'green' : 'gray' }}-lt">
                                    {{ $blog->is_active ? 'Published' : 'Draft' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item">
                        <div class="text-muted text-center py-3">No blog posts yet</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Case Studies -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Case Studies</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                    @forelse($recentCaseStudies as $caseStudy)
                    <div class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                @if($caseStudy->image)
                                <img src="{{ asset('storage/'.$caseStudy->image) }}" class="avatar" style="object-fit: cover;">
                                @else
                                <span class="avatar bg-purple-lt">
                                    <i class="ti ti-file-text"></i>
                                </span>
                                @endif
                            </div>
                            <div class="col text-truncate">
                                <div class="text-reset d-block">{{ $caseStudy->project_name ?? $caseStudy->name }}</div>
                                <div class="d-block text-muted text-truncate mt-n1">
                                    Client: {{ $caseStudy->client_name ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="badge bg-{{ $caseStudy->is_active ? 'green' : 'gray' }}-lt">
                                    {{ $caseStudy->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item">
                        <div class="text-muted text-center py-3">No case studies yet</div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let activityChart = null;

        function initializeChart() {
            const ctx = document.getElementById('activityChart');
            if (!ctx) return;

            const chartData = @this.chartData;
            
            // Destroy existing chart if it exists
            if (activityChart) {
                activityChart.destroy();
                activityChart = null;
            }
            
            // Check if we have data
            const hasData = chartData.serviceRequests.some(val => val > 0) || 
                           chartData.userContacts.some(val => val > 0);
            
            activityChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels || [],
                    datasets: [
                        {
                            label: 'Service Requests',
                            data: chartData.serviceRequests || [],
                            borderColor: 'rgb(32, 201, 151)',
                            backgroundColor: 'rgba(32, 201, 151, 0.2)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            borderWidth: 2
                        },
                        {
                            label: 'User Contacts',
                            data: chartData.userContacts || [],
                            borderColor: 'rgb(245, 159, 0)',
                            backgroundColor: 'rgba(245, 159, 0, 0.2)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 15,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleFont: {
                                size: 13
                            },
                            bodyFont: {
                                size: 13
                            },
                            displayColors: true,
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y + ' ' + 
                                           (context.parsed.y === 1 ? 'item' : 'items');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 11
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Show message if no data
            const container = document.getElementById('chartContainer');
            const existingMessage = container.querySelector('.empty-chart-message');
            if (existingMessage) {
                existingMessage.remove();
            }

            if (!hasData) {
                const emptyMessage = document.createElement('div');
                emptyMessage.className = 'text-center text-muted py-5 empty-chart-message';
                emptyMessage.innerHTML = '<i class="ti ti-chart-line ti-3x mb-3 d-block opacity-50"></i><div>No activity data yet. Data will appear once you receive service requests or contact messages.</div>';
                container.appendChild(emptyMessage);
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initializeChart, 100);
        });

        // Listen for Livewire event
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('chartDataUpdated', () => {
                setTimeout(initializeChart, 100);
            });
        });

        // Watch for component updates (Livewire v3)
        document.addEventListener('livewire:init', () => {
            Livewire.hook('morph.updated', ({ component }) => {
                setTimeout(initializeChart, 150);
            });
        });
    </script>
</div>
