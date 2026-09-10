<?php

namespace Admin\Http\Controllers;


use App\Http\Controllers\Controller;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api', 'api_admin']);
    }
}
