<?php namespace JumpLink\KrauterVonABisZ\Components;

use Lang;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use JumpLink\KrauterVonABisZ\Models\Kraut as Kraut;


class KrautPage extends ComponentBase
{

    public $kraut;

    public function componentDetails()
    {
        return [
            'name'        => 'Kraut Seite',
            'description' => 'Zeigt ein Kraut an'
        ];
    }

    public function onRun()
    {
        $slug = $this->param('slug');
        $this->kraut = $this->page['kraut'] = Kraut::where('slug', $slug )->first();
    }

}
