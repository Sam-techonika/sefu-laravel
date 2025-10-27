<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog as BlogModel;
use App\Enums\LocaleType;

class Blog extends Component
{
    use WithPagination;

    public $perPage = 9; // items per page

    protected $queryString = ['page'];
   
    public function render()
    {
        $locale = app()->getLocale() ?? LocaleType::EN->value;

        $blogs = BlogModel::where('is_active', true)
            ->with(['translations' => function($q) use ($locale) {
                $q->where('locale', $locale)->with('category.translations');
            }, 'user'])
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.public.blog', compact('blogs'));
    }
}
