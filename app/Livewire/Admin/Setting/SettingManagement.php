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
    }

    public function save()
    {
        Setting::set('site_name', $this->site_name);
        Setting::set('address', $this->address);
        Setting::set('whatsapp_number', $this->whatsapp_number);
        Setting::set('phone_number', $this->phone_number);
        Setting::set('ceo_name', $this->ceo_name);

        if ($this->new_logo) {
            $path = $this->new_logo->store('settings', 'public');
            Setting::set('logo', $path);
            $this->logo = $path;
        }

        if ($this->new_favicon) {
            $path = $this->new_favicon->store('settings', 'public');
            Setting::set('favicon', $path);
            $this->favicon = $path;
        }

      $this->dispatch('success', 'Settings updated successfully!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.setting.setting-management');
    }
}
