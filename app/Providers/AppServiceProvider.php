<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ChannelsComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Option 1 - Share viariable - every single view
        // Using built-in Model functionality
        // View::share('channels', Channel::orderBy('name')->get());
        // Using custom method
        // $channel_model = new Channel();
        // View::share('channels', $channel_model->get_all_channels('name'));

        // Option 2 - View composer with callback
        // View::composer(['channels.index', 'channels.create'], function($view){
        //     $channel_model = new Channel();
        //     $view->with('channels', $channel_model->get_all_channels(['name', 'desc']));
        // });

        // Using wildcard to select all view templates
        // Variable is available in all files under channel directory
        // View::composer(['channels.*'], function($view){
        //     $channel_model = new Channel();
        //     $view->with('channels', $channel_model->get_all_channels(['name', 'desc']));
        // });

        // Option 3 - View composer dedicated class
        View::composer(['partials.channels*'], ChannelsComposer::class);
    }
}
