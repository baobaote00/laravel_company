<?php

namespace Foostart\Filemanager\Controllers;

/**
 * Class DemoController.
 */
class DemoController extends LfmController
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('package-filemanager::demo');
    }
}
