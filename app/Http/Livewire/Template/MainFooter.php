<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use App\Models\AppSetting;

class MainFooter extends Component
{
    public $app_name;
    public $app_shortname;
    public $app_weburl;
    public function mount()
    {
        $this->setting = AppSetting::where('id',1)->first();
        $this->app_name = $this->setting->app_name;
        $this->app_shortname = $this->setting->app_shortname;
        $this->app_weburl = $this->setting->app_weburl;
    }
    public function render()
    {
        return view('livewire.template.main-footer');
    }
}
