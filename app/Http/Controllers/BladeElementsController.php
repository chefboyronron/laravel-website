<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BladeElementsController extends Controller {

    public function index()
    {
        $data = [
            'firstname' => 'Ron', 
            'title' => "<?php echo 'Ron's self study session.' ?>",
            'is_active' => 1,
            'attendees' => [
                ['name'=> 'Kyle', 'gender' => 'Male'], 
                ['name'=> 'Max', 'gender' => 'Female'], 
                ['name'=> 'Ryle','gender' => 'Male']
            ]
        ];
        return view('elements', ['data' => $data]);
    }

    public function custom()
    {
        return 'hello from custom method.';
    }

    public function data_receiver()
    {
        var_dump(request('type'));
        echo '<pre>';
        var_dump($_REQUEST);
    }

}