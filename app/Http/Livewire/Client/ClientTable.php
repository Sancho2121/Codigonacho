<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use App\Trait\TableOrder;
use Livewire\WithPagination;

class ClientTable extends Component
{
    use WithPagination;
    use TableOrder;

    public $search;

    protected $paginationTheme = 'bootstrap';
    public $sortColumn = 'client_name';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $columns = [
        'id' => 'Id',
        'client_name' => 'Nombre',
        'client_razonsocial' => 'Razón Social',
        'client_city' => 'Ciudad',
    ];

    public function render()
    {
        $clients = Client::select('id','client_name','client_razonsocial','client_city')->orderBy('id');
        if ($this->search) {
            $clients->where('id','like','%'.$this->search.'%')
            ->orWhere('client_name','like','%'.$this->search.'%')
            ->orWhere('client_razonsocial','like','%'.$this->search.'%')
            ->orWhere('client_city','like','%'.$this->search.'%');
        }

        $clients->orderBy($this->sortColumn, $this->sortDirection);
        return view('livewire.client.client-table',
        [
            'clients' => $clients->paginate($this->perPage)
        ])
        ->extends('layouts.app');
    }

    public function modalAddClient()
    {
        $this->emit('newClient');
    }
}
