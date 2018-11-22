<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/14 0014
 * Time: 14:35
 */

namespace app\www\controller;


use think\Controller;

class ApplicationController extends Controller
{
    public function application(){
       return $this->fetch('application');
    }
}