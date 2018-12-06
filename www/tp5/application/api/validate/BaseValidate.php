<?php
/**
 * Created by shmilyelva
 * Date: 2018-09-07
 * Time: 14:14
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Validate;

class BaseValidate extends Validate
{

    public function goCheck()
    {
        $param = request()->param();
        $result = $this->check($param);
        if (!$result) {
            throw new ParameterException([
                'msg' => $this->error
            ]);
        } else {
            return true;
        }
    }

    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {

        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return false;
    }

    protected function notEmpty($value)
    {
        if (empty($value)) {
            return false;
        }
        return true;
    }

    protected function isMobile($value){
        $rule = '^1(3|4|5|6|7|8|9)[0-9]\d{8}$^';
        if(preg_match($rule,$value)){
            return true;
        }
        return false;

    }
    //过滤参数
    public function getDataByRule($arrays)
    {
        foreach ($this->rule as $key => $value) {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }
}