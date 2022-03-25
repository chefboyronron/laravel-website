<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ChannelController extends Controller
{
    public function index()
    {
        // $channels = Channel::all();
        // $channels = Channel::orderBy('name')->get();

        return view('channels.index');
    }

    public function create()
    {
        //$channels = Channel::all();
        // $channels = Channel::orderBy('name')->get();

        return view('channels.create');
    }
}
