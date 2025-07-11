<?php

namespace App\Http\Controllers\Api\V1\Admin;


use App\Http\Controllers\Controller;
use App\Models\AcademicYear;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['api', 'api_admin']);
    }
}
