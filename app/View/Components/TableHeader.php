<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableHeader extends Component
{
    public $columns;
    public $sortDirection;
    public $sortColumn;
    public $actions;

    public function __construct($columns,$sortColumn='id',$sortDirection='asc',$actions=true)
    {
        $this->columns = $columns;
        $this->sortDirection = $sortDirection;
        $this->sortColumn = $sortColumn;
        $this->actions = $actions;
    }
    public function render()
    {
        return view('components.table-header');
    }
}
