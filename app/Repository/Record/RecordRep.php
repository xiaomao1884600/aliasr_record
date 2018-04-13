<?php
/**
 * Created by PhpStorm.
 * User: wangwujun
 * Date: 2018/4/13
 * Time: 上午10:37
 */

namespace App\Repository\Record;


use App\Model\Record\RecordTongSource;
use App\Repository\Foundation\BaseRep;

class RecordRep extends BaseRep
{

    protected $recordTongSource;

    public function __construct(
        RecordTongSource $recordTongSource
    )
    {
        parent::__construct();
        $this->recordTongSource = $recordTongSource;
    }

    /**
     * 保存云通讯录音数据
     * @param array $data
     * @return string
     */
    public function saveTongSource(array $data)
    {
        return $this->recordTongSource->insertUpdateBatch($data);
    }
}