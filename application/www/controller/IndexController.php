<?php
namespace app\www\controller;

use think\Controller;
use think\Request;
use app\admin\model\NewsModel;
use app\admin\model\ContactUsModel;
use think\Log;

class IndexController extends Controller
{
    private $new;
    private $contact_us;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->new = new NewsModel();
        $this->contact_us = new ContactUsModel();
    }

    public function index(){
        try{

        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('index');
    }

    public function contact_us(){
        try{
            $data = input();
            $this->contact_us->data([
                'lx_name' => $data['lx_name'],
                'lx_email' => $data['lx_email'],
                'lx_phone' => $data['lx_phone'],
                'lx_title' => $data['lx_title'],
                'lx_content' => $data['lx_content'],
            ]);
            $this->contact_us->save();
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
            return show(404,'提交失败！',200);
        }
        return show(200,'提交成功！',200);
    }
}
