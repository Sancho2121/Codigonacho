<?php

namespace App\Http\Livewire\Project;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DocumentProject;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProjectEdit extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public Project $project;

    public $project_name;
    public $client_id;
    public $project_type;
    public $contact_name;
    public $contact_phone;
    public $request_date;
    public $execution_date;
    public $end_execution_date;
    public $logistics;
    public $status;

    public $client_view;
    public $file_img;


    protected function rules()
    {
        return [
            'project_name' => 'required|min:2|max:100',
            'client_id' => 'required',
        ];
    }

    public function mount()
    {
        $this->project_name = $this->project->project_name;
        $this->client_id = $this->project->client_id;
        $this->project_type = $this->project->project_type;
        $this->contact_name = $this->project->contact_name;
        $this->contact_phone = $this->project->contact_phone;
        $this->request_date = $this->project->request_date;
        $this->execution_date = $this->project->execution_date;
        $this->end_execution_date = $this->project->end_execution_date;
        $this->logistics = $this->project->logistics;
        $this->status = $this->project->status;

        $this->client_view = Client::where('id',$this->client_id)->first();
    }

    public function render()
    {
        return view('livewire.project.project-edit')->extends('layouts.app');
    }

    public function updateProject()
    {
        //dd($this->logistics);
        $this->validate();

        $this->project->update([
            'project_name' => $this->project_name,
            'client_id' => $this->client_id,
            'project_type' => $this->project_type,
            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,
            'request_date' => $this->request_date,
            'execution_date' => $this->execution_date,
            'end_execution_date' => $this->end_execution_date,
            'logistics' => $this->logistics,
            'status' => $this->status,
        ]);

        $this->alert('success', '¡Actualizado exitosamente!', [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function fileImage()
    {
        dd('fileImage',$this->project_name, $this->file_img);
    }

    public function modalAddDocument($doc_name, $doc_ext)
    {
        $this->emit('newDocumentProject',$doc_name, $doc_ext, $this->project->id);
    }

    public function modalAddPhoto($photo_name)
    {
        $this->emit('newPhotoProject',$photo_name, $this->project->id);
    }

    public function deleteDocument(DocumentProject $levantamiento)
    {
        Storage::disk('public')->delete($levantamiento->file_path_name_ext);
        $levantamiento->delete();
    }

    public function pdfLevantamiento()
    {

        /*$data =[$this->project_name];
        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');*/

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

}
