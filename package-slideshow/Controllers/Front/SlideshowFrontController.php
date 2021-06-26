<?php namespace Foostart\Slideshow\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Slideshow\Models\Slideshows;

class SlideshowFrontController extends Controller
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