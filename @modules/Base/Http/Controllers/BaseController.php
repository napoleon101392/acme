<?php

namespace Modules\Base\Http\Controllers;

class BaseController extends Controller
{
    /**
     * Base view for front side
     *
     * @return void
     */
    public function index()
    {
        return view('base');
    }
}
