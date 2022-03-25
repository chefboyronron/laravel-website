<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Channel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DatabaseController extends Controller {

    public $insert_message = '';

    public function index()
    {
        //return view('database.menu');
        return redirect('database/show');
    }

    public function show()
    {
        // Using Model - built in methods
        // $channels = Channel::orderBy('name', 'asc')->get();
        // return view('database.show', [
        //     'channels' => $channels
        // ]);

        // Using Model - custom method
        $channel = new Channel;
        $channels = $channel->get_all_channels(['id', 'desc']);
        return view('database.show', [
            'channels' => $channels
        ]);

        // Using query builder helper
        // $channels = DB::table('channels')->get();
        // return view('database.show', [
        //     'channels' => $channels
        // ]);
    }

    public function edit($id = 0)
    {
        try {
            $record = Channel::where('id', $id)->get();
            $count = $record->count();
            $activeOption = '';

            // Determine which record is selected
            $statuses = [
                0 => ['name' => 'Inactive', 'selected' => false],
                1 => ['name' => 'Active', 'selected' => false],
            ];
            $statuses[$record[0]['is_active']]['selected'] = true;

            foreach( $statuses as $key => $option ) {
                if( $option['selected'] === true ) {
                    $activeOption = $key;
                }
            }

            // Rebuild statuses array for collective html usage
            foreach( $statuses as $key => $value ) {
                $statuses[$key] = $value['name'];
            }

            if( $count > 0 ) {
                return view('database.edit', [
                    'record' => $record,
                    'statuses' => $statuses,
                    'activeOption' => $activeOption
                ]);
            } else {
                abort(404);
            }
        } catch (\Throwable $th) {
            abort(404);
        }
        
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data['updated_at'] = now()->format('Y-m-d H:i:s');

        // Using Model - built in methods
        // $update = Channel::where('id', $data['id'])->update([
        //      'name' => $data['name'],
        //      'is_active' => $data['is_active'],
        //      'updated_at' => $data['updated_at']
        //  ]);

        // Using Model - custom method
        $update_channel = new Channel;
        $update = $update_channel->update_record($data);

        // Using query builder helper
        // $update = DB::table('channels')->where('id', $data['id'])->update([
        //     'name' => $data['name'],
        //     'is_active' => $data['is_active'],
        //     'updated_at' => $data['updated_at']
        // ]);

        if( $update ) {
            return redirect()->to('database/show');
        } else {
            return redirect()->to('database/'.$id.'/edit');
        }
    }

    public function create(Request $request)
    {

        $data = $request->all();
        $error_message = $this->getInsertMessage('insert_error_message');

        $isActiveOptions = [0 => 'Inactive', 1 => 'Active'];
        return view('database.create', [
            'isActiveOptions' => $isActiveOptions,
            'error_message' => $error_message
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['timestamp'] = now()->format('Y-m-d H:i:s');
        $input = [
            'name' => $data['name'], 
            'is_active' => $data['is_active']
        ];
        $rules = [
            'name' => 'required|unique:channels|min:5|max:25', 
            'is_active' => 'required'
        ];
        $message = [
            'name.required' => 'Name is required.',
            'name.min' => 'Name: 5 minimum characters.',
            'name.max' => 'Name: 25 maximum character',
            'is_active.required' => 'Status is required.'
        ];

        $validator = Validator::make($input, $rules, $message);

        if ($validator->fails()) {
            return redirect('database/create')->withErrors($validator)->withInput();
        }

        // Add record
        
        // Using query builder helper
        // $insert = DB::table('channels')->insert([
        //     'name' => $data['name'],
        //     'is_active' => $data['is_active'],
        //     'created_at' => $data['timestamp'],
        //     'updated_at' => $data['timestamp']
        // ]);

        // Using Model - buil in method
        // $insert = Channel::insert([
        //     'name' => $data['name'],
        //     'is_active' => $data['is_active'],
        //     'created_at' => $data['timestamp'],
        //     'updated_at' => $data['timestamp']
        // ]);

        // Using Model - custom method
        $channel = new Channel;
        $insert = $channel->add_record($data);

        if( $insert ) {
            return redirect()->to('database/show');
        } else {
            $this->setCookie('insert_error_message');
            return redirect()->to('database/create');
        }

    }

    public function destroy($id = '')
    {
        if( !is_null($id) ) {
            $channel = new Channel;
            $delete = $channel->delete_record($id);
            return redirect()->to('database/show');
        } else {
            return redirect()->to('database/show');
        }
    }

    public function setCookie($name)
    {
        return setcookie($name, 'Something wen\'t wrong.', time() + 60 * 60 * 24);
    }

    public function getInsertMessage($name)
    {
        // Assign value then Remove cookie
        if( isset($_COOKIE[$name]) ) {
            $this->insert_message = $_COOKIE[$name];
            unset($_COOKIE[$name]); 
            setcookie($name, null, -1, '/');
        }

        return $this->insert_message;
    }

}