<?php namespace JumpLink\KrauterVonABisZ\Components;

use Lang;
use Cms\Classes\ComponentBase;
use JumpLink\KrauterVonABisZ\Models\Kraut as Kraut;

class KrauterList extends ComponentBase
{
    public $krauter;


    public function componentDetails()
    {
        return [
            'name'        => 'Kräuter Liste',
            'description' => 'Zeigt alle Kräuter an'
        ];
    }

    public function defineProperties(){
        return [];
    }


    public function getSlideshowOptions()
    {
        return Kraut::lists('name', 'id');
    }


    public function onRun()
    {
        $query = input('query');
        $page = input('page');
        //echo $query; die; 
        //$users = User::paginate(15);
        if ($query != '') {
            $query_string = $query."%";
            $this->krauter = $this->page['krauter'] = Kraut::where('name','like', $query_string)->orderBy('name', 'asc')->paginate(10);
        }else{
            $this->krauter = $this->page['krauter'] = Kraut::orderBy('name', 'asc')->paginate(10);
        }

       // var_dump($this->krauter); die;
        // $slideshowId = (int) $this->property('slideshow');

        // $slideshowQueryBuilder = Kraut::where('id', '=', $slideshowId)
        //         ->with(['slides' => function ($query) {
        //             $query->published();
        //     }])
        // ;

        // $this->slideshow = $slideshowQueryBuilder->firstOrFail();
    }
}
