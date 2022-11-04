<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use App\Trait\TableOrder;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    use WithPagination;
    use TableOrder;

    public $type_project;

    public $search;

    protected $paginationTheme = 'bootstrap';
    public $sortColumn = 'client_id';
    public $sortDirection = 'asc';
    public $perPage = 10;

    public $columns = [
        'id' => 'Id',
        'project_name' => 'Nombre del Proyecto',
        'client_id' => 'Nombre del Cliente',
        'request_date' => 'Fecha de Solicitud',
    ];

    public function mount($type_project)
    {
        $this->type_project = $type_project;
    }

    public function render()
    {
        if ($this->type_project == 3) {
            $projects = Project::select('id','project_name','client_id','request_date')->orderBy('id');
        } else {
            $projects = Project::where('project_type',$this->type_project)->select('id','project_name','client_id','request_date')->orderBy('id');
        }
        if ($this->search) {
            $projects->where('id','like','%'.$this->search.'%')
            ->orWhere('project_name','like','%'.$this->search.'%')
            ->orWhere('client_id','like','%'.$this->search.'%')
            ->orWhere('request_date','like','%'.$this->search.'%');
        }

        $projects->orderBy($this->sortColumn, $this->sortDirection);
        return view('livewire.project.project-table',
        [
            'projects' => $projects->paginate($this->perPage)
        ])
        ->extends('layouts.app');
    }

    public function modalAddProject($type_project)
    {
        $this->emit('newProject',$type_project);
    }
}
