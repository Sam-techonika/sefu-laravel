<?php
namespace App\Livewire\Admin\Setting;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting;
use Livewire\Attributes\Layout;

class SettingManagement extends Component
{
    use WithFileUploads;


    public $site_name;
    public $logo;
    public $favicon;
    public $address;
    public $whatsapp_number;
    public $phone_number;
    public $ceo_name;
    public $email;
    public $about_text;
    public $site_description;

    public $new_logo;
    public $new_favicon;

    public function mount()
    {
        $this->site_name = Setting::get('site_name');
        $this->logo = Setting::get('logo');
        $this->favicon = Setting::get('favicon');
        $this->address = Setting::get('address');
        $this->whatsapp_number = Setting::get('whatsapp_number');
        $this->phone_number = Setting::get('phone_number');
        $this->ceo_name = Setting::get('ceo_name');
        $this->email = Setting::get('email');
        $this->about_text = Setting::get('about_text');
        $this->site_description = Setting::get('site_description');
    }

    public function save()
    {
        // Validate file uploads
        if ($this->new_logo) {
            $this->validate([
                'new_logo' => 'file|mimes:jpeg,png,jpg,gif,svg,webp,avif,bmp|max:2048',
            ], [
                'new_logo.file' => 'Logo must be a file',
                'new_logo.mimes' => 'Logo must be a valid image format (jpeg, png, jpg, gif, svg, webp, avif, bmp)',
                'new_logo.max' => 'Logo size must not exceed 2MB',
            ]);
        }

        if ($this->new_favicon) {
            $this->validate([
                'new_favicon' => 'file|mimes:ico,png,jpg,svg,webp|max:512',
            ], [
                'new_favicon.file' => 'Favicon must be a file',
                'new_favicon.mimes' => 'Favicon must be ico, png, jpg, svg, or webp format',
                'new_favicon.max' => 'Favicon size must not exceed 512KB',
            ]);
        }

        Setting::set('site_name', $this->site_name);
        Setting::set('address', $this->address);
        Setting::set('whatsapp_number', $this->whatsapp_number);
        Setting::set('phone_number', $this->phone_number);
        Setting::set('ceo_name', $this->ceo_name);
        Setting::set('email', $this->email);
        Setting::set('about_text', $this->about_text);
        Setting::set('site_description', $this->site_description);

        if ($this->new_logo) {
            $path = $this->new_logo->store('settings', 'public');
            Setting::set('logo', $path);
            $this->logo = $path;
            $this->new_logo = null;
        }

        if ($this->new_favicon) {
            $path = $this->new_favicon->store('settings', 'public');
            Setting::set('favicon', $path);
            $this->favicon = $path;
            $this->new_favicon = null;
        }

      $this->dispatch('success', 'Settings updated successfully!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.setting.setting-management');
    }
}
