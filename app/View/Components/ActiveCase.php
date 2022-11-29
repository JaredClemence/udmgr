<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\UD\LegalCase;

class ActiveCase extends Component
{
    public $case;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LegalCase $case)
    {
        $this->case = $case;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.active-case');
    }
}
