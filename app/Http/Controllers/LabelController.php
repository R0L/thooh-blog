<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/28
 */

namespace App\Http\Controllers;


use App\Repositorys\Interfaces\LabelInterface;
use Illuminate\Http\Request;

class LabelController extends Controller
{

    private $labelService = null;
    public function __construct(LabelInterface $labelService)
    {
        $this->labelService = $labelService;
    }

    public function getList(Request $request)
    {
        $labelName = $request->input('name', null);
        $this->labelService->getList($labelName);

        return view();
    }

}