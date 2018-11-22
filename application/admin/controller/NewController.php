<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31 0031
 * Time: 10:28
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use app\admin\model\NewsModel;
use think\Request;
use think\Log;

class NewController extends Controller
{
    private $news;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->news = new NewsModel();
    }

    //公司新闻 列表
    public function get_news_list()
    {
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $list = $this->news->paginate(5);
            $imgpath=config("news_upload_path");
            $this->assign('sidebar','2');
            $this->assign('list',$list);
            $this->assign('imgpath',$imgpath);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('news');
    }
    //新增公司新闻 页面
    public function get_news_add()
    {
        //判断过期时间
        $this->session_end();
        //判断登陆状态
        if (!session('?admin_dengluming')) {
            return redirect('/admcncp/login');
        }
        $data = input();//通过助手将POST所有数据交给 data
        $j["sidebar"] = 3;
        //print_r($j);exit();
        return view('news_add',$j);
    }
    //新增公司新闻 提交处理
    public function post_news_add()
    {
        //判断过期时间
        $this->session_end();
        //判断登陆状态
        if (!session('?admin_dengluming')) {
            return redirect('/admcncp/login');
        }
        $data = input('post.');//通过助手将POST所有数据交给 data
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('ns_img');
        $imgname = "";
        // 移动到框架应用根目录/static/uploads/gonggao/ 目录下
        if ($file)
        {
            $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/news/');
            if ($info)
            {
                // 成功上传后 获取上传信息
                // 输出 jpg
                $imgname = $info->getSaveName();
                $imgUp=1;
            }
            else
            {
                // 上传失败获取错误信息
                return show(500,"图片上传失败，请重试",[],200);
            }
        }
        $data['ns_title']=addslashes($data['ns_title']);
        $data['ns_descript']=addslashes($data['ns_descript']);
        if($imgname)
        {
            $this->news->data([
                'ns_language' => $data['ns_language'],
                'ns_title' => $data['ns_title'],
                'ns_img' => $imgname,
                'ns_descript' => $data['ns_descript'],
                'ns_content' => $data['editor1'],
            ]);
            $this->news->save();
        }
        else
        {
            $this->news->data([
                'ns_language' => $data['ns_language'],
                'ns_title' => $data['ns_title'],
                'ns_descript' => $data['ns_descript'],
                'ns_content' => $data['editor1'],
            ]);
            $this->news->save();
        }

        $tiaozhuanlujing="/admcncp/news/";
        return redirect($tiaozhuanlujing);
    }
    //编辑公司新闻 页面
    public function get_news_edit()
    {
        try{
            //判断过期时间
            $this->session_end();
            //判断登陆状态
            if (!session('?admin_dengluming')) {
                return redirect('/admcncp/login');
            }
            $data = input();//通过助手将POST所有数据交给 data
            $list = $this->news->where('ns_id',$data['id'])->find();
            $img_path = config("news_upload_path");
            $this->assign('img_path',$img_path);
            $this->assign('list',$list);
            $this->assign('sidebar','3');
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('news_edit');
    }
    //编辑公司新闻 提交处理
    public function post_news_edit()
    {
        //判断过期时间
        $this->session_end();
        //判断登陆状态
        if (!session('?admin_dengluming')) {
            return redirect('/admcncp/login');
        }
        $data = input('post.');//通过助手将POST所有数据交给 data

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('ns_img');

        $imgname = "";
        // 移动到框架应用根目录/static/uploads/banner/ 目录下
        if ($file)
        {
            $info = $file->rule('uniqid')->move(ROOT_PATH . 'public/static/uploads/news/');
            if ($info)
            {
                // 成功上传后 获取上传信息
                // 输出 jpg
                $imgname = $info->getSaveName();
            }
            else
            {
                // 上传失败获取错误信息
                return show(500,"图片上传失败，请重试",[],200);
            }
        }
        $data['ns_title']=addslashes($data['ns_title']);
        $data['ns_descript']=addslashes($data['ns_descript']);
        if($imgname)
        {
            $this->news->save([
                'ns_language' => $data['ns_language'],
                'ns_title' => $data['ns_title'],
                'ns_img' => $imgname,
                'ns_descript' => $data['ns_descript'],
                'ns_content' => $data['editor1'],
            ],['ns_id'=>$data['id']]);
        }
        else
        {
            $this->news->save([
                'ns_language' => $data['ns_language'],
                'ns_title' => $data['ns_title'],
                'ns_descript' => $data['ns_descript'],
                'ns_content' => $data['editor1'],
            ],['ns_id'=>$data['id']]);
        }

        $tiaozhuanlujing="/admcncp/news/";
        return redirect($tiaozhuanlujing);
    }
    //删除公司新闻 页面
    public function get_news_del()
    {
        //判断过期时间
        $this->session_end();
        //判断登陆状态
        if (!session('?admin_dengluming')) {
            return redirect('/admcncp/login');exit();
        }
        $data = input();//通过助手将POST所有数据交给 data
        $this->news->destroy($data['id']);
        $tiaozhuanlujing="/admcncp/news/";
        return redirect($tiaozhuanlujing);
    }
}