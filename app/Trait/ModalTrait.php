<?php
namespace App\Trait;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait ModalTrait
{
    use LivewireAlert;
    public $showModal = false;

    public function close()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
