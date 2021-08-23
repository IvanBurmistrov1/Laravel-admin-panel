<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends BaseController
{
    //

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('status');
    }
}
