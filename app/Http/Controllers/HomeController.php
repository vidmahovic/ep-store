<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = collect([
            [
                'id' => 0,
                'name' => 'iMac',
                'serial_num' => '489574300dshfjkdfhksd',
                'manufacturer' => 'Apple Inc.',
                'image_path' => 'http://placehold.it/320x150',
                'stock' => 5
            ],
            ['id' => 1,
                'name' => 'macBook',
                'serial_num' => '48957dsfksd0dshfjkdfhksd',
                'manufacturer' => 'Apple Inc.',
                'image_path' => 'http://placehold.it/320x150',
                'stock' => 4],
            ['id' => 1,
                'name' => 'iPhone 6s',
                'serial_num' => '4dfds57dsfksd0dshfjkdfhksd',
                'manufacturer' => 'Apple Inc.',
                'image_path' => 'http://placehold.it/320x150',
                'stock' => 2]
        ]);

        return view('home')->with(['products' => $products]);
    }
}
