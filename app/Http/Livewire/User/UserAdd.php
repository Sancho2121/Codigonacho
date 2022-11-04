<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UserAdd extends Component
{
    use LivewireAlert;
    public $showModal = false;
    public $name='';
    public $surname='';
    public $email ='';
    public $password = '';
    public $password_confirmation = '';

    protected $listeners = [
        'newUser'
	];

    protected function rules()
    {
        return [
            'name' => 'required|min:2|max:100',
            'surname' => 'required|min:2|max:100',
            'email' => ['required', 'email', 'not_in:' . auth()->user()->email],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
        ];
    }

    public function close()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }

    public function newUser()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.user.user-add');
    }

    public function addUser()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ])->assignRole('usuario');

        //$this->emit('userListUpdate');
        $this->close();
        $this->alert('success', '¡Se ha agregado al usuario correctamente!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
