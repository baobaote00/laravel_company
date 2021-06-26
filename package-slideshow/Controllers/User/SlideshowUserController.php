<?php namespace Foostart\Slideshow\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Slideshow\Models\Slideshows;

class SlideshowUserController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_slideshow = new slideshows();
        $slideshows = $obj_slideshow->get_slideshows();
        $this->data = array(
            'request' => $request,
            'slideshows' => $slideshows
        );
        return view('slideshow::slideshow.index', $this->data);
    }

}