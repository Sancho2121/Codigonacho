<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Trait\ImageResize;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\AppSetting as ModelsAppSetting;

class AppSetting extends Component
{
    use ImageResize;
    use LivewireAlert;
    use WithFileUploads;
    public ModelsAppSetting $setting;
    public $app_name;
    public $app_shortname;
    public $app_weburl;
    public $app_color;
    public $app_logo;
    public $app_favicon;
    public $app_wallpaper;
    public $app_logo_temp;
    public $app_favicon_temp;
    public $app_wallpaper_temp;

    protected $rules = [
        'app_name' => 'required|min:3|max:100',
        'app_shortname' => 'required|min:2|max:20',
        'app_weburl' => 'required|min:5|max:100',
		'app_color' => 'required',
    ];

    public function mount()
    {
        $this->setting = $this->setting;
        $this->app_name = $this->setting->app_name;
        $this->app_shortname = $this->setting->app_shortname;
        $this->app_weburl = $this->setting->app_weburl;
        $this->app_color = $this->setting->app_color;
        $this->app_logo_temp = $this->setting->app_logo;
        $this->app_favicon_temp = $this->setting->app_favicon;
        $this->app_wallpaper_temp = $this->setting->app_wallpaper;
    }

    public function render()
    {
        return view('livewire.app-setting')
        ->extends('layouts.app');
    }

    public function editApp()
    {
        $this->validate();
        $this->setting->update([
            'app_name' => $this->app_name,
            'app_shortname' => $this->app_shortname,
            'app_weburl' => $this->app_weburl,
            'app_color' => $this->app_color,
        ]);
        if($this->app_logo!=''){
            $extension = $this->app_logo->extension();
            $path = $this->app_logo->storeAs('images/settings','app_logo.'.$extension,'public');
            $this->resizeImage('storage/'.$path,'storage/'.$path,['h'=>100,'w'=>81]);
            $this->validate(['app_logo'=>'image']);
            $this->setting->update(['app_logo' => $path]);
        }
        if($this->app_favicon!=''){
            $extension = $this->app_favicon->extension();
            $path = $this->app_favicon->storeAs('images/settings','app_favicon.'.$extension,'public');
            $this->validate(['app_favicon'=>'mimes:ico']);
            $this->setting->update(['app_favicon' => $path]);
        }
        $this->render();
        $this->alert('success', '¡Se ha actualizado la configuración correctamente!');


    }
}
