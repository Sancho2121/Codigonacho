<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use App\Models\AppSetting;

class MainNav extends Component
{
    public $app_name;
    public $app_shortname;
    public function mount()
    {
        $this->setting = AppSetting::where('id',1)->first();
        $this->app_name = $this->setting->app_name;
        $this->app_shortname = $this->setting->app_shortname;
    }

    public function render()
    {
        return view('livewire.template.main-nav');
    }
}
