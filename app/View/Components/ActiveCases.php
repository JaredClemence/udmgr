<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Providers\CaseDetailProvider;
use App\Models\UD\LegalCase;

class ActiveCases extends Component
{

    public $cases;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CaseDetailProvider $provider)
    {
        $user = auth()->user();
        $cases = $provider->getActiveCaseCards($user);
        $this->cases = $cases;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.active-cases');
    }
}
