<?php

namespace App\http\View\Composers;

use App\Models\Branch;

use Illuminate\View\View;

class BranchComposer
{
   
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('branches', Branch::all());
    }
}