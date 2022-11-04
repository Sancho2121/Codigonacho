<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use App\Trait\TableOrder;

class SupplierList extends Component
{
    use TableOrder;

    public $search;

    protected $listeners = [
        'supplierListUpdate' => 'render'
	];

    public $sortColumn = 'supplier_name';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $columns = [
        'id' => 'Id',
        'supplier_name' => 'Nombre',
        'supplier_razonsocial' => 'Razon Social',
        'supplier_rfc' => 'R.F.C.',
        'supplier_curp' => 'C.U.R.P',
        'supplier_phone' => 'Telefono',

    ];


    public function render()
    {
        $suppliers = Supplier::select('id','supplier_name','supplier_razonsocial','supplier_rfc','supplier_curp','supplier_phone');
        if ($this->search) {
            $suppliers->where('id','like','%'.$this->search.'%')
            ->orWhere('supplier_name','like','%'.$this->search.'%')
            ->orWhere('supplier_razonsocial','like','%'.$this->search.'%')
            ->orWhere('supplier_rfc','like','%'.$this->search.'%')
            ->orWhere('supplier_curp','like','%'.$this->search.'%')
            ->orWhere('supplier_phone','like','%'.$this->search.'%');
        }

        $suppliers->orderBy($this->sortColumn, $this->sortDirection);
        return view('livewire.supplier.supplier-list',
        [
            'suppliers' => $suppliers->paginate($this->perPage)
        ])
        ->extends('layouts.app');
    }

    public function modalAddSupplier()
    {
        $this->emit('newSupplier');
    }
}
