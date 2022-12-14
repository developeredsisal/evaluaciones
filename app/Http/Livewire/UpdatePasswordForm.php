<?php

namespace App\Http\Livewire;

use Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    use AuthorizesRequests;

    public $state = [];

    protected $validationAttributes = [
        'state.current_password' => 'current password',
        'state.password'         => 'new password',
    ];

    public function mount()
    {
        $this->resetState();
    }

    public function updatePassword()
    {
        $this->authorize('editar_perfiles');

        $this->resetErrorBag();

        $this->validate();

        auth()->user()->update([
            'password' => $this->state['password'],
        ]);

        $this->resetState();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.update-password-form');
    }

    protected function rules()
    {
        return [
            'state.current_password' => ['required', 'password'],
            'state.password'         => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    protected function resetState()
    {
        $this->state = [
            'current_password'      => '',
            'password'              => '',
            'password_confirmation' => '',
        ];
    }
}
