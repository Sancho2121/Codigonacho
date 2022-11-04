<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use App\Trait\WorldData;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ClientEdit extends Component
{

    use LivewireAlert;
    use WorldData;

    public Client $client;

    public $client_name;
    public $client_razonsocial;
    public $client_rfc;
    public $client_address;
    public $client_city;
    public $client_postal;
    public $client_country;
    public $client_email;
    public $client_phone_1;
    public $client_phone_2;
    public $client_logo;
    public $client_active;

    public $projects;

    public $countries;
    public $cities;

    protected function rules()
    {
        return [
            'client_name' => 'required|min:2|max:100',
            'client_razonsocial' => 'required|min:2|max:100',
            //'client_email' => ['required', 'client_email', Rule::unique('clients','client_email')->ignore($this->client)],
        ];
    }

    public function mount()
    {
        $this->client_name = $this->client->client_name;
        $this->client_razonsocial = $this->client->client_razonsocial;
        $this->client_rfc = $this->client->client_rfc;
        $this->client_address = $this->client->client_address;
        $this->client_city = $this->client->client_city;
        $this->client_postal = $this->client->client_postal;
        $this->client_country = $this->client->client_country;
        $this->client_email = $this->client->client_email;
        $this->client_phone_1 = $this->client->client_phone_1;
        $this->client_phone_2 = $this->client->client_phone_2;
        $this->client_logo = $this->client->client_logo;
        $this->client_active = $this->client->client_active;

        $this->countries = $this->countries();
        $this->cities = $this->cities();

        $this->projects = Project::where('client_id', $this->client->id)->get();
    }

    public function render()
    {
        return view('livewire.client.client-edit')->extends('layouts.app');
    }

    public function updateCliente()
    {

        $this->validate();

        $this->client->update([
            'client_name' => $this->client_name,
            'client_razonsocial' => $this->client_razonsocial,
            'client_rfc' => $this->client_rfc,
            'client_address' => $this->client_address,
            'client_city' => $this->client_city,
            'client_postal' => $this->client_postal,
            'client_country' => $this->client_country,
            'client_email' => $this->client_email,
            'client_phone_1' => $this->client_phone_1,
            'client_phone_2' => $this->client_phone_2,
            'client_logo' => $this->client_logo,
            'client_active' => $this->client_active,
        ]);

        $this->alert('success', '¡Actualizado exitosamente!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
