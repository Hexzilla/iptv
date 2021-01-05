<?php

namespace App\Http\Controllers;


use App\Category;
use App\Channel;
use App\Room;
use App\Device;
use App\StreamType;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public $channel;
    public $room;
    public $device;
    public $category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->channel = new Channel;
        $this->room = new Room;
        $this->device = new Device;
        $this->category = new Category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /////////////////  =================  Room Management ================== ////////////////

    public function room()
    {
        $rooms = $this->room->getRooms(10);

        return view('room', compact('rooms'));
    }

    public function add_room()
    {
        $name =         request()->room_name;
        $hidden_mode =  request()->hidden_mode;
        $hidden_id =    request()->hidden_id;

        if ($hidden_mode == 'add')
            DB::table('rooms')->insert(['name' => $name]);
        else
            DB::table('rooms')->where('id', $hidden_id)->update(['name' => $name]);

        return redirect()->back();
    }

    public function get_room(Request $request)
    {
        $id = $request->row_id;
        $result = DB::table('rooms')->where('id', $id)->first();

        return json_encode($result);
    }

    public function remove_room(Request $request)
    {
        $id = $request->row_id;
        DB::table('rooms')->where('id', $id)->delete();
    }

    /////////////////////========  Categories  =========/////////////////////

    public function category()
    {
        $categories = $this->category->getCategories(10);
        return view('category', compact('categories'));
    }

    public function add_category()
    {
        $name =         request()->category_name;
        $hidden_mode =  request()->hidden_mode;
        $hidden_id =    request()->hidden_id;

        if ($hidden_mode == 'add')
            DB::table('categories')->insert(['name' => $name]);
        else
            DB::table('categories')->where('id', $hidden_id)->update(['name' => $name]);

        return redirect()->back();
    }

    public function get_category(Request $request)
    {
        $id = $request->row_id;
        $result = DB::table('categories')->where('id', $id)->first();

        return json_encode($result);
    }

    public function remove_category(Request $request)
    {
        $id = $request->row_id;
        DB::table('categories')->where('id', $id)->delete();
    }

    /////////////// ===========  Channels =========== ///////////////////
    public function channel()
    {
        $channels = $this->channel->getChannels();
        $categories = Category::get();
        $streams = StreamType::get();
        return view('channel', compact('channels', 'categories', 'streams'));
    }

    public function add_channel()
    {
        $name =         request()->channel_name;
        $category_id =  request()->channel_category;
        $url =          request()->channel_url;
        $description =  request()->channel_description;
        $file         = request()->file('channel_logo');
        $stream_id    = request()->stream_type;
        $hidden_mode =  request()->hidden_mode;
        $hidden_id =    request()->hidden_id;

        if ($hidden_mode == 'add') {
            DB::table('channels')->insert(['name' => $name, 'category_id' => $category_id, 'url' => $url, 'description' => $description, 'stream_id' => $stream_id]);
        } else {
            DB::table('channels')->where('id', $hidden_id)->update(['name' => $name, 'category_id' => $category_id, 'url' => $url, 'description' => $description, 'stream_id' => $stream_id]);
        }

        if ($file) {
            if ($hidden_mode == 'add') {
                $max_id = DB::table('channels')->max('id');
                $fileName = 'chanellogo-' . $max_id . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/img/chanellogo/', $fileName);

                DB::table('channels')->where('id', $max_id)->update(
                    [
                        'logo' => $fileName,
                    ]
                );
            } else {
                $fileName = 'chanellogo-' . $hidden_id . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/img/chanellogo/', $fileName);

                DB::table('channels')->where('id', $hidden_id)->update(
                    [
                        'logo' => $fileName,
                    ]
                );
            }
        } else {
            if ($hidden_mode == 'add') {
                $max_id = DB::table('channels')->max('id');
                DB::table('channels')->where('id', $max_id)->update(
                    [
                        'logo' => "default.png",
                    ]
                );
            }
        }

        return redirect()->back();
    }

    public function get_channel(Request $request)
    {
        $id = $request->row_id;
        $result = DB::table('channels')->where('id', $id)->first();

        return json_encode($result);
    }

    public function remove_channel(Request $request)
    {
        $id = $request->row_id;
        DB::table('channels')->where('id', $id)->delete();
    }

    /////////////// ===========  Devices =========== ///////////////////

    public function device(Request $request)
    {
        $devices = $this->device->getDevices(10);

        $rooms = DB::table('rooms')->get();
        return view('device', compact('rooms', 'devices'));
    }

    public function add_device(Request $request)
    {
        $device_name =         request()->device_name;
        $device_id   =         request()->device_id;
        $device_type =         request()->device_type;
        $device_room =         request()->device_room;

        $hidden_mode =  request()->hidden_mode;
        $hidden_id =    request()->hidden_id;


        if ($hidden_mode == 'add') {
            DB::table('devices')->insert(['room_id' => $device_room, 'device_id' => $device_id, 'device_name' => $device_name, 'device_type' => $device_type]);
        } else {
            DB::table('devices')->where('id', $hidden_id)->update(['room_id' => $device_room, 'device_id' => $device_id, 'device_name' => $device_name, 'device_type' => $device_type]);
        }
        return redirect()->back();
    }

    public function get_device(Request $request)
    {
        $id = $request->row_id;
        $result = DB::table('devices')->where('id', $id)->first();

        return json_encode($result);
    }

    public function remove_device(Request $request)
    {
        $id = $request->row_id;
        DB::table('devices')->where('id', $id)->delete();
    }
}
