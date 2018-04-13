<?php
/**
 * Created by PhpStorm.
 * User: wangwujun
 * Date: 2018/4/9
 * Time: 下午4:27
 */
namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use App\Service\Exceptions\ApiExceptions;
use App\Service\Exceptions\Message;
use App\Service\Record\RecordCallBackService;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {

    }

    /**
     * 接收通话详单回调地址
     * @param Request $request
     * @param  $recordCallBackService
     * @return array|mixed
     */
    public function getCallDetailsBack(Request $request, RecordCallBackService $recordCallBackService)
    {
        try {
            return Message::success($recordCallBackService->getCallDetailsCallBack(requestData($request)));
        } catch (\Exception $exception) {
            return ApiExceptions::handle($exception);
        }
    }

}