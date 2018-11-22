<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/14 0014
 * Time: 14:44
 */

namespace app\www\controller;


use think\Controller;

class AboutController extends Controller
{
    public function about(){
        return $this->fetch('about');
    }
}