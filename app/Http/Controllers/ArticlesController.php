<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

    public function index()
    {
        echo 'Articles API Index Method';
    }

    public function article($id)
    {
        echo 'id: ' . $id . '<br>'; 
        // Getting request variable
        // Same approcgh in post method
        if( request('type') !== NULL ) {
            echo 'type: ' .  request('type');
        }
    }

}