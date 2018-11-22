<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/21 0021
 * Time: 10:24
 */

namespace app\admin\model;


use think\Model;
use traits\model\SoftDelete;

class NavigationModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'fx_navigation';
    // 定义时间戳字段名
    protected $createTime = 'bn_create';
    protected $updateTime = 'bn_update';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'bn_del';
}