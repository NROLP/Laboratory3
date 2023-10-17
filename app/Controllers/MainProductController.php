<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainProductController extends BaseController
{
    public function Main_Page()
    {
        return view('index');
    }
}
