<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use App\Trait\ModalTrait;

class SupplierAdd extends Component
{
    use ModalTrait;

    public $supplier_name='';

    protected $listeners = [
        'newSupplier'
	];

    protected function rules()
    {
        return [
            'supplier_name' => 'required|min:2|max:100',
        ];
    }

    public function newSupplier()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.supplier.supplier-add');
    }

    public function addSupplier()
    {
        $this->validate();
        Supplier::create([
            'supplier_type' => 1,
            'supplier_name' => $this->supplier_name,
        ]);

        $this->emit('supplierListUpdate');
        $this->close();
        $this->alert('success', '¡Se ha agregado el proveedor correctamente!');
    }


}
