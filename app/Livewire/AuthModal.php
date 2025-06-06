<?php
namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class AuthModal extends Component
{
    public $showModal = false;
    public $isLogin = true;

    public $name = '';
    public $email = '';
    public $password = '';

    protected $listeners = ['openAuthModal'];

    public function openAuthModal($isLogin = true)
    {
        $this->resetErrorBag();
        $this->isLogin = $isLogin;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function loginUser()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            $this->notifier->toast($this,'Logged in successfully');
            $this->dispatch('toast-message', details: [
                'message' => 'Logged in successfully',
                'type' => 'success'
            ]);
            $this->closeModal();

            $this->dispatch('login-successful');
        }else{
            $this->dispatch('toast-message', details: [
                'message' => 'Invalid credentials!',
                'type' => 'error'
            ]);
        }

        $this->reset(['email', 'password']);
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => Str::title(trim($this->name)),
            'email' => trim($this->email),
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user);
        session()->regenerate();

        $this->dispatch('toast-message', details: [
            'message' => 'Registered successfully',
            'type' => 'success'
        ]);
        $this->closeModal();

        $this->dispatch('login-successful');
    }

    public function render()
    {
        return view('livewire.auth-modal');
    }
}
