<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserList extends Component
{
    use WithPagination, WithFileUploads;

    public $name, $email, $password, $userId, $about, $description, $profile_image, $is_active;
    public $existingImage;

    public $showModal = false;
    public $showDeleteModal = false;
    public $editMode = false;
    public $search = '';
    public $role = 'user';

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6',
        'about' => 'nullable|string|max:500',
        'description' => 'nullable|string|max:1000',
        'profile_image' => 'nullable|image|max:2048',
        'is_active' => 'boolean',
    ];

    public function openCreateModal()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->is_active = true;
        $this->showModal = true;
    }

    public function openEditModal($id)
    {
        $this->resetForm();
        $this->editMode = true;

        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->role = $user->role;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->about = $user->about;
        $this->description = $user->description;
        $this->is_active = $user->is_active ?? true;
        $this->existingImage = $user->profile_photo_path;
        $this->password = '';

        $this->showModal = true;
    }

    public function toggleStatus($userId)
    {
        $user = User::findOrFail($userId);
        $user->update(['is_active' => !$user->is_active]);
        $this->dispatch('success', 'User status updated successfully');
    }

    public function saveUser()
    {
        $rules = $this->rules;

        if ($this->editMode) {
            $rules['email'] = ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->userId)];
            $rules['password'] = 'nullable|string|min:6';
        }

        $this->validate($rules);

        $profileImagePath = null;
        
        if ($this->profile_image) {
            $profileImagePath = $this->profile_image->store('profile-images', 'public');
            
            // Delete old image if editing
            if ($this->editMode && $this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
        }

        if ($this->editMode) {
            $user = User::findOrFail($this->userId);
            $updateData = [
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'about' => $this->about,
                'description' => $this->description,
                'is_active' => $this->is_active ?? true,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ];
            
            if ($profileImagePath) {
                $updateData['profile_photo_path'] = $profileImagePath;
            }
            
            $user->update($updateData);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'about' => $this->about,
                'description' => $this->description,
                'is_active' => $this->is_active ?? true,
                'profile_photo_path' => $profileImagePath,
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
        $this->reset(['name', 'email', 'password', 'userId', 'about', 'description', 'profile_image', 'existingImage', 'is_active']);
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
