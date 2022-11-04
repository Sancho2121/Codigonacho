<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\Supplier;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SupplierEdit extends Component
{
    use LivewireAlert;
    public Supplier $supplier;

    public $supplier_date;
    public $supplier_type;
    public $supplier_number;
    public $supplier_status;
    public $supplier_name;
    public $supplier_razonsocial;
    public $supplier_rfc;
    public $supplier_curp;
    public $supplier_address;
    public $supplier_city;
    public $supplier_town;
    public $supplier_postal;
    public $supplier_state;
    public $supplier_country;
    public $supplier_email;
    public $supplier_phone;
    public $supplier_contact;
    public $supplier_logo;
    public $credit_days;
    public $coin_id;
    public $bank_id;
    public $bank_place;
    public $bank_branch;
    public $bank_account;
    public $bank_clabe;
    public $bank_optional_id;
    public $bank_optional_place;
    public $bank_optional_branch;
    public $bank_optional_account;
    public $bank_optional_clabe;
    public $reference1_razonsocial;
    public $reference1_contact;
    public $reference1_phone;
    public $reference2_razonsocial;
    public $reference2_contact;
    public $reference2_phone;
    public $seller_name;
    public $seller_email;
    public $seller_phone;
    public $supplier_observations;
    public $supplier_sign;

    protected function rules()
    {
        return [
            'supplier_name' => 'required|min:2|max:100',
        ];
    }
    public function mount()
    {
        $this->supplier_date = $this->supplier->supplier_date;
        $this->supplier_type = $this->supplier->supplier_type;
        $this->supplier_number = $this->supplier->supplier_number;
        $this->supplier_status = $this->supplier->supplier_status;
        $this->supplier_name = $this->supplier->supplier_name;
        $this->supplier_razonsocial = $this->supplier->supplier_razonsocial;
        $this->supplier_rfc = $this->supplier->supplier_rfc;
        $this->supplier_curp = $this->supplier->supplier_curp;
        $this->supplier_address = $this->supplier->supplier_address;
        $this->supplier_city = $this->supplier->supplier_city;
        $this->supplier_town = $this->supplier->supplier_town;
        $this->supplier_postal = $this->supplier->supplier_postal;
        $this->supplier_state = $this->supplier->supplier_state;
        $this->supplier_country = $this->supplier->supplier_country;
        $this->supplier_email = $this->supplier->supplier_email;
        $this->supplier_phone = $this->supplier->supplier_phone;
        $this->supplier_contact = $this->supplier->supplier_contact;
        $this->supplier_logo = $this->supplier->supplier_logo;
        $this->credit_days = $this->supplier->credit_days;
        $this->coin_id = $this->supplier->coin_id;
        $this->bank_id = $this->supplier->bank_id;
        $this->bank_place = $this->supplier->bank_place;
        $this->bank_branch = $this->supplier->bank_branch;
        $this->bank_account = $this->supplier->bank_account;
        $this->bank_clabe = $this->supplier->bank_clabe;
        $this->bank_optional_id = $this->supplier->bank_optional_id;
        $this->bank_optional_place = $this->supplier->bank_optional_place;
        $this->bank_optional_branch = $this->supplier->bank_optional_branch;
        $this->bank_optional_account = $this->supplier->bank_optional_account;
        $this->bank_optional_clabe = $this->supplier->bank_optional_clabe;
        $this->reference1_razonsocial = $this->supplier->reference1_razonsocial;
        $this->reference1_contact = $this->supplier->reference1_contact;
        $this->reference1_phone = $this->supplier->reference1_phone;
        $this->reference2_razonsocial = $this->supplier->reference2_razonsocial;
        $this->reference2_contact = $this->supplier->reference2_contact;
        $this->reference2_phone = $this->supplier->reference2_phone;
        $this->seller_name = $this->supplier->seller_name;
        $this->seller_email = $this->supplier->seller_email;
        $this->seller_phone = $this->supplier->seller_phone;
        $this->supplier_observations = $this->supplier->supplier_observations;
        $this->supplier_sign = $this->supplier->supplier_sign;

    }
    public function render()
    {
        return view('livewire.supplier.supplier-edit')
        ->extends('layouts.app');
    }

    public function updateSupplier()
    {
        $this->validate();

        $this->supplier->update([
            'supplier_date' => $this->supplier_date,
            'supplier_type' => $this->supplier_type,
            'supplier_number' => $this->supplier_number,
            'supplier_status' => $this->supplier_status,
            'supplier_name' => $this->supplier_name,
            'supplier_razonsocial' => $this->supplier_razonsocial,
            'supplier_rfc' => $this->supplier_rfc,
            'supplier_curp' => $this->supplier_curp,
            'supplier_address' => $this->supplier_address,
            'supplier_city' => $this->supplier_city,
            'supplier_town' => $this->supplier_town,
            'supplier_postal' => $this->supplier_postal,
            'supplier_state' => $this->supplier_state,
            'supplier_country' => $this->supplier_country,
            'supplier_email' => $this->supplier_email,
            'supplier_phone' => $this->supplier_phone,
            'supplier_contact' => $this->supplier_contact,
            'supplier_logo' => $this->supplier_logo,
            'credit_days' => $this->credit_days,
            'coin_id' => $this->coin_id,
            'bank_id' => $this->bank_id,
            'bank_place' => $this->bank_place,
            'bank_branch' => $this->bank_branch,
            'bank_account' => $this->bank_account,
            'bank_clabe' => $this->bank_clabe,
            'bank_optional_id' => $this->bank_optional_id,
            'bank_optional_place' => $this->bank_optional_place,
            'bank_optional_branch' => $this->bank_optional_branch,
            'bank_optional_account' => $this->bank_optional_account,
            'bank_optional_clabe' => $this->bank_optional_clabe,
            'reference1_razonsocial' => $this->reference1_razonsocial,
            'reference1_contact' => $this->reference1_contact,
            'reference1_phone' => $this->reference1_phone,
            'reference2_razonsocial' => $this->reference2_razonsocial,
            'reference2_contact' => $this->reference2_contact,
            'reference2_phone' => $this->reference2_phone,
            'seller_name' => $this->seller_name,
            'seller_email' => $this->seller_email,
            'seller_phone' => $this->seller_phone,
            'supplier_observations' => $this->supplier_observations,
            'supplier_sign' => $this->supplier_sign,
        ]);

        $this->alert('success', '¡Se ha actualizado al usuario correctamente!');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
