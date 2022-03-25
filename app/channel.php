<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    public function get_all_channels($order_by = [], $asc = 'asc')
    {
        $channels = $this;
        if( count($order_by) !== 0 ) {
            $channels = $channels->orderBy($order_by[0], $order_by[1]);
        }
        return $channels->get();
    }
}
