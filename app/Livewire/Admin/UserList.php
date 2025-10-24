<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserList extends Component
{
    use WithPagination;

    public $name, $email, $password, $userId;

    public $showModal = false;
    public $showDeleteModal = false;
    public $editMode = false;
    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
    ];

    public function openCreateModal()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $this->resetForm();
        $this->editMode = true;

        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';

        $this->showModal = true;
    }

    public function saveUser()
    {
        $rules = $this->rules;

        if ($this->editMode) {
            $rules['email'] = ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->userId)];
            $rules['password'] = 'nullable|string|min:6';
        }

        $this->validate($rules);

        if ($this->editMode) {
            $user = User::findOrFail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ]);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }

        $this->showModal = false;
        $this->resetForm();
        $this->dispatch('success', $this->editMode ? 'User updated successfully' : 'User created successfully');
    }

    public function confirmDelete($id)
    {
        $this->userId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->userId)->delete();
        $this->showDeleteModal = false;
        $this->dispatch('success', 'User deleted successfully');
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'userId']);
    }

    #[Layout('components.layouts.admin')]
    #[Title('User List')]
    public function render()
    {
        $users = User::query()
            ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%"))
            ->paginate(10);

        return view('livewire.admin.user-list', compact('users'));
    }
}
