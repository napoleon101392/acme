<?php

namespace Modules\Base\Http\Controllers;

class BaseController extends Controller
{
    public function index()
    {
        return view('base');
    }
}
