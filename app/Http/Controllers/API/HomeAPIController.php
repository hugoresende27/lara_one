<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAPIController extends Controller
{


    public function aboutMe()
    {
        return "PHP developer with Laravel, Slim experience. Build efficient APIs, optimize SQL, automate tasks with cron jobs, and create responsive UIs. Strong in Git, PHPUnit, and data management. Fluent in English and Portuguese.";
    }


}
