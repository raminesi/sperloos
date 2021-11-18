<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

    /**
    *  @OA\Info(
    *      version="1",
    *      title="Sperloos",
    *  )
    *  @OA\SecurityScheme(
    *       type="http",
    *       description="Use login to get the laravel sanctum",
    *       name="Authorization",
    *       in="header",
    *       scheme="bearer",
    *       bearerFormat="laravel sanctum",
    *       securityScheme="bearerAuth",
    *  )
    */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
