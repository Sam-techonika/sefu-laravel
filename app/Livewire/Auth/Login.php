<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
      public $email = '';
    public $password = '';
    public $remember = false;
    public $errorMessage = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $this->email)->first();
        
        if (!$user) {
            $this->errorMessage = 'Invalid email or password.';
            return;
        }

        if (!$user->is_active) {
            $this->errorMessage = 'Your account has been deactivated. Please contact the administrator.';
            return;
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        $this->errorMessage = 'Invalid email or password.';
    }
    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
