<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ClientAdd extends Component
{
    use LivewireAlert;
    public $showModal = false;
    public $client_name='';
    public $client_razonsocial='';

    protected $listeners = [
        'newClient'
	];

    protected function rules()
    {
        return [
            'client_name' => 'required|min:5|max:100',
        ];
    }

    public function newClient()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.client.client-add');
    }

    public function addClient()
    {
        $this->validate();
        $client = Client::create([
            'client_name' => $this->client_name,
            'client_razonsocial' => $this->client_razonsocial,
        ]);

        $this->closeModal();
        $this->alert('success', '¡Creado exitosamente, continúa con el llenado del cliente!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
        //dd($client->id);
        return redirect()->route('clients.edit',$client->id);
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }
}
