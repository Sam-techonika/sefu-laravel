<?php

namespace App\View\Builders;

use Illuminate\Support\Collection;

class AdminSidebar
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public static function menu($user): self
    {
        return new self($user);
    }

    public function get(): Collection
    {
        $menu = collect([
            (object)[
                'title' => 'Dashboard',
                'icon' => 'ti ti-layout-dashboard',
                'url' => route('admin.dashboard'),
                'hasSubmenu' => false,
                'submenu' => [],
            ],
            (object)[
                'title' => 'User Management',
                'icon' => 'ti ti-users',
                'url' => '#',
                'hasSubmenu' => true,
                'submenu' => [
                    (object)['title' => 'Users', 'url' => route('admin.users')],
                ],
            ],
            (object)[
                'title' => 'Faq Management',
                'icon' => 'ti ti-help-circle',
                'url' => route('admin.faq'),
                'hasSubmenu' => false,

            ],
            (object)[
                'title' => 'Contacts',
                'icon' => 'ti ti-mail',
                'url' => route('admin.contacts'),
                'hasSubmenu' => false,

            ],
            (object)[
                'title' => 'Testimonials Management',
                'icon' => 'ti ti-message',
                'url' => route('admin.testimonials'),
                'hasSubmenu' => false,

            ],
            (object)[
                'title' => 'Service Requests',
                'icon' => 'ti ti-message',
                'url' => route('admin.service-requests'),
                'hasSubmenu' => false,

            ],
            (object)[
                'title' => 'Settings Management',
                'icon' => 'ti ti-settings',
                'url' => route('admin.settings'),
                'hasSubmenu' => false,

            ],
            (object)[
                'title' => 'Registrations',
                'icon' => 'ti ti-clipboard',
                'url' => route('admin.registrations'),
                'hasSubmenu' => false,

            ],
            (object)[
                'title' => 'Blogs',
                'icon' => 'ti ti-file-text',
                'url' => '#',
                'hasSubmenu' => true,
                'submenu' => [
                    (object)['title' => 'Categories', 'url' => route('admin.categories')],
                    (object)['title' => 'Tags', 'url' => route('admin.tags')],
                    (object)['title' => 'Blogs', 'url' => route('admin.blogs')],
                ],
            ],
            (object)[
                'title' => 'Case Study',
                'icon' => 'ti ti-file-text',
                'url' => '#',
                'hasSubmenu' => true,
                'submenu' => [
                    (object)['title' => 'Case Categories', 'url' => route('admin.casecategories')],
                    (object)['title' => 'Case Studies', 'url' => route('admin.case-studies')],
                ],
            ],
            (object)[
                'title' => 'Service',
                'icon' => 'ti ti-file-text',
                'url' => '#',
                'hasSubmenu' => true,
                'submenu' => [
                    (object)['title' => 'Service', 'url' => route('admin.services')],
                ],
            ],
        ]);
        return $menu;
    }
}
