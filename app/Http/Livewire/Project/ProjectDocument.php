<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\DocumentProject;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProjectDocument extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $showModal = false;

    public $doc_name;
    public $doc_ext;
    public $project_id;

    public $file_ext;
    public $file_name_ext;

    public $file_path_name_ext;
    public $file_size;
    public $user_id;
    public $module;
    public $archivo;

    public $file_img;

    public $type_file;

    protected $listeners = [
        'newDocumentProject',
        'newPhotoProject'
	];

    protected function rules()
    {
        return [
            'project_id' => 'required',
            //'file_name_ext' => 'required',
        ];
    }

    public function newDocumentProject($doc_name, $doc_ext, $project_id)
    {
        $this->doc_name = $doc_name;
        $this->doc_ext = $doc_ext;
        $this->project_id = $project_id;
        $this->type_file = 'archivo';
        $this->showModal = true;
    }

    public function newPhotoProject($doc_name, $project_id)
    {
        $this->doc_name = $doc_name;
        $this->project_id = $project_id;
        $this->type_file = 'foto';
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.project.project-document');
    }

    public function addDocument()
    {
        $file_path = 'modulos/proyectos/id_'.$this->project_id;

        if (isset($this->archivo)) {
            $this->file_ext = $this->archivo->extension();
            $this->file_name_ext = $this->doc_name.'.'.$this->archivo->extension();
            $this->file_size = $this->archivo->getSize();
        }
        $this->validate();
        $this->file_path_name_ext = $this->archivo->storeAs($file_path,$this->file_name_ext,'public');
        $document = [
            'project_id' => $this->project_id,
            'file_name' => $this->doc_name,
            'file_ext' => $this->file_ext,
            'file_name_ext' => $this->file_name_ext,
            'file_path' => $file_path,
            'file_path_name_ext' => $this->file_path_name_ext,
            'file_size' => $this->file_size,
            'user_id' => Auth::user()->id,
            'module' => 'project',
        ];
        if (DB::table('document_projects')->where('project_id',$this->project_id)->where('file_name',$this->doc_name)->where('file_ext',$this->file_ext)->exists()) {
            $update = DocumentProject::where('project_id', $this->project_id)->where('file_name', $this->doc_name)->first();
            $update->update($document);
        } else {
            DocumentProject::create($document);
        }
        $this->alert('success', '¡Se ha agregado el documento correctamente!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->closeModal();
        return redirect()->route('projects.edit',$document['project_id']);
    }

    public function addPhotos()
    {
        $file_path = 'modulos/proyectos/id_'.$this->project_id.'/fotos_levantamiento';

        $this->validate();
        if(isset($this->archivo)){
            foreach ($this->archivo as $archivo) {
                $this->file_ext = $archivo->extension();
                $this->file_name_ext = $this->doc_name.'.'.$archivo->extension();
                $this->file_size = $archivo->getSize();

                //$this->resizeImage('storage/'.$this->file_path_name_ext,'storage/'.$this->file_path_name_ext,['h'=>100,'w'=>81]);
                //$this->validate(['file_path_name_ext'=>'image']);
                $document = DocumentProject::create([
                    'project_id' => $this->project_id,
                    'file_name' => $this->doc_name,
                    'file_ext' => $this->file_ext,
                    'file_name_ext' => $this->file_name_ext,
                    'file_path' => $file_path,
                    'file_size' => $this->file_size,
                    'user_id' => Auth::user()->id,
                    'module' => 'project',
                ]);

                $this->file_path_name_ext = $archivo->storeAs($file_path,$this->doc_name.'_'.$document->id.'.'.$archivo->extension(),'public');
                $document->update(['file_path_name_ext' => $this->file_path_name_ext]);
            }
        }

        $this->alert('success', '¡Se ha agregado el documento correctamente!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->closeModal();
        return redirect()->route('projects.edit',$document['project_id']);
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->showModal = false;
    }
}
