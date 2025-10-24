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
                'title' => 'Blogs',
                'icon' => 'ti ti-file-text',
                'url' => '#',
                'hasSubmenu' => true,
                'submenu' => [
                    (object)['title' => 'Categories', 'url' => route('admin.categories')],
                ],
            ],
            // Add more menus here as needed
        ]);

        // Since we don't care about permissions, return the menu as-is
        return $menu;
    }
}
