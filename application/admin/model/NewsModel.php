<?php
/**
 * Created by PhpStorm.
 * User: administarot
 * Date: 2018/9/18
 * Time: 19:36
 */

namespace app\admin\model;


use think\Model;
use traits\model\SoftDelete;

class NewsModel extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'fx_news';
    // 定义时间戳字段名
    protected $createTime = 'ns_create';
    protected $updateTime = 'ns_update';
    //软删除
    use SoftDelete;
    protected $deleteTime = 'ns_del';
}