<?php 

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Channel;

class ChannelsComposer {

    public function compose(View $view)
    {
        $channel_model = new Channel();
        $view->with('channels', $channel_model->get_all_channels(['name', 'desc']));
    }
}