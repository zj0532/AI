<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/20 0020
 * Time: 11:52
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;
use think\Log;
use app\admin\model\ContactUsModel;

class ContactUsController extends Controller
{
    private $contactus;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->contactus = new ContactUsModel();
    }

    public function get_contact_us_list(){
        try{
            $list = $this->contactus->order('lx_create desc')->paginate(8);
            $this->assign('list',$list);
            $this->assign('sidebar','3');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('contact_us');
    }

    public function get_contact_us_see(){
        try{
            $data = input();
            $result = $this->contactus->where('lx_id',$data['id'])->find();
            $this->assign('sidebar','3');
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('get_contact_us_see');
    }

    public function get_contact_us_del(){
        try{
            $data = input();
            $this->contactus->destroy($data['id']);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            return show(200,'删除失败！',200);
        }
        return show(200,'删除成功！',200);
    }
}