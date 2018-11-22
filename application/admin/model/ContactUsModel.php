<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/20 0020
 * Time: 10:48
 */

namespace app\admin\Model;


use think\Model;
use traits\model\SoftDelete;

class ContactUsModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'fx_contact_us';
    // 定义时间戳字段名
    protected $createTime = 'lx_create';
    protected $updateTime = 'lx_update';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'lx_del';
}