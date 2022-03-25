<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    public function get_all_channels($order_by = [])
    {
        $channels = $this;
        if( count($order_by) !== 0 ) {
            $channels = $channels->orderBy($order_by[0], $order_by[1]);
        }
        return $channels->paginate(15); // Show paginate number links
        // return $channels->simplePaginate(15); // Show next and prev links only
        // return $channels->get(); // No pagination
    }

    public function update_record($data)
    {
        $update = $this->where('id', $data['id'])->update([
            'name' => $data['name'],
            'is_active' => $data['is_active'],
            'updated_at' => $data['updated_at']
        ]);

        return $update ? 1 : 0;
    }

    public function add_record($data)
    {
        $insert = $this->insert([
            'name' => $data['name'],
            'is_active' => $data['is_active'],
            'created_at' => $data['timestamp'],
            'updated_at' => $data['timestamp']
        ]);

        return $insert ? 1 : 0;
    }

    public function delete_record($id)
    {
        $delete = $this->where('id', $id)->delete();
        return $delete ? 1 : 0;
    }
}
