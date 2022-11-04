<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablePerPage extends Component
{
    public $numbers;
    public function __construct(array $numbers=null)
    {
        if ($numbers===null) {
            $this->numbers = [
                10 => 10,
                20 => 20,
                50 => 50,
                100 => 100,
                200 => 200,
                500 => 500,
            ];
        } else {
            $this->numbers = $numbers;
        }
    }
    public function render()
    {
        return view('components.table-per-page');
    }
}
