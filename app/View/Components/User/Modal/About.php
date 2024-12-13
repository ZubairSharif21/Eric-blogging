<?php

namespace App\View\Components\User\Modal;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class About extends Component
{
    public $details;
    public $about;
    public $showAbout;


    public function __construct($details, $about, $showAbout)
    {
        $this->details = $details;
        $this->about = $about;
        $this->showAbout = $showAbout;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.modal.about');
    }
}
