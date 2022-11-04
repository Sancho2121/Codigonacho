<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\DocumentProject;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function show(DocumentProject $document)
    {
        return view('livewire.project.project-document-view', compact('document'));
    }

    public function download(DocumentProject $document)
    {
        return response()->download('storage/'.$document->file_path_name_ext);
    }

    public function imprimir(Project $project)
    {
        $today = Carbon::now()->format('d/m/Y');
        $pdf = Pdf::loadView('livewire.project.document-pdf-levantamiento', compact('project'));
        return $pdf->download($project->project_name.'.pdf');
        //return view('livewire.project.document-pdf-levantamiento', compact('project'));
    }
}
