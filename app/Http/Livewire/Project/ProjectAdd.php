<?php

namespace App\Http\Livewire\Project;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProjectAdd extends Component
{
    use LivewireAlert;
    public $showModal = false;
    public $project_name;
    public $client_id;
    public $request_date;

    public $type_project;

    public $clients=[];

    protected $listeners = [
        'newProject'
	];

    protected function rules()
    {
        return [
            'project_name' => 'required|min:5|max:100',
            'client_id' => 'required',
            'request_date' => 'required',
        ];
    }

    public function newProject($type_project)
    {
        $this->type_project = $type_project;
        $this->showModal = true;
        $this->clients = Client::get();
    }

    public function render()
    {
        return view('livewire.project.project-add');
    }

    public function addProject()
    {
        $this->validate();
        $project = Project::create([
            'project_name' => $this->project_name,
            'client_id' => $this->client_id,
            'user_request' => Auth::user()->id,
            'request_date' => $this->request_date,
            'project_type' => $this->type_project
        ]);

        $this->closeModal();
        $this->alert('success', '¡Creado exitosamente, continúa con el llenado del Proyecto!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
        return redirect()->route('projects.edit',$project->id);
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }
}
