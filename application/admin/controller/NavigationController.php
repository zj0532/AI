<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/21 0021
 * Time: 10:06
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;
use think\Log;
use app\admin\model\NavigationModel;

class NavigationController extends Controller
{
    private  $navigation;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->navigation = new NavigationModel();
    }
    //底部导航列表
    public function get_navigation_list(){
        try{
            $list = $this->navigation->paginate(8);
            $this->assign('list',$list);
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('get_navigation_list');
    }

    //底部导航添加页面
    public function get_navigation_add(){
        try{
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('get_navigation_add');
    }
    //提交底部导航页面
    public function post_navigation_add(){
        try{
            $data = input();
            $list = $this->navigation->data([
                'bn_title' => $data['bn_title'],
                'bn_content' => $data['bn_content'],
            ]);
            $this->navigation->save();
            $this->assign('list',$list);
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            return show(404,'新增失败！',200);
        }
        return show(200,'新增成功！',200);
    }
    //底部导航编辑
    public function get_navigation_edit(){
        try{
            $data = input();
            $result = $this->navigation->where('bn_id',$data['id'])->find();
            $this->assign('result',$result);
            $this->assign('sidebar','4');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('get_navigation_edit');
    }
    //底部导航编辑提交
    public function post_navigation_edit(){
        try{
            $data = input();
            $this->navigation->save([
                'bn_title' => $data['bn_title'],
                'bn_content' => $data['bn_content'],
            ],['bn_id' => $data['id']]);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            return show(404,'编辑失败！',200);
        }
        return show(200,'编辑成功！',200);
    }
}