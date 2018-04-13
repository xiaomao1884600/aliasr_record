<?php
/**
 * Created by PhpStorm.
 * User: wangwujun
 * Date: 2018/4/13
 * Time: 上午11:31
 */

namespace App\Service\Record;


use App\Repository\Record\RecordRep;
use App\Service\Foundation\BaseService;

class RecordCallBackService extends BaseService
{

    protected $callBackPath = 'tong_call_details_call_back.json';

    protected $recordRep;

    public function __construct(
        RecordRep $recordRep
    )
    {
        parent::__construct();
        $this->recordRep = $recordRep;
    }

    /**
     * 回调接收通话详单
     * @param array $callBackInfo
     */
    public function getCallDetailsCallBack(array $callBackInfo)
    {
        $records = [];
        file_put_contents(public_path($this->callBackPath), json_encode($callBackInfo));

        $records = $this->processCallDetails($callBackInfo);

        $affected = $this->recordRep->saveTongSource($records);

        return $callBackInfo;
    }

    /**
     * 处理录音信息
     * @param array $result
     * @return array
     */
    protected function processCallDetails(array $result)
    {
        // TODO 处理录音详单信息

        return $result;
    }
}