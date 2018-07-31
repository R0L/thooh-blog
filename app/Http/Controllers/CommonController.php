<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/30
 */

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class CommonController extends Controller
{

    public function createImage(Request $request)
    {
        echo $request->input('content');
    }

}