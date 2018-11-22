<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/20 0020
 * Time: 16:52
 */

namespace app\www\controller;


use think\Controller;
use think\Request;
use think\Log;
use app\admin\model\NavigationModel;

class BottomNavigationController extends Controller
{
    private $navigation;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->navigation = new NavigationModel();
    }

    //众售规则
    public function public_sale_rules(){
        try{
            $result = $this->navigation->where('bn_id','4')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('public_sale_rules');
    }
    //风险提示
    public  function risk_hints(){
        try{
            $result = $this->navigation->where('bn_id','5')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('risk_hints');
    }
    //免责声明
    public function disclaimer(){
        try{
            $result = $this->navigation->where('bn_id','6')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('disclaimer');
    }
    //挖矿智能合约
    public function intelligent_contract_for_mining(){
        try{
            $result = $this->navigation->where('bn_id','7')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('intelligent_contract_for_mining');
    }
    //付费机制
    public function payment_mechanism(){
        try{
            $result = $this->navigation->where('bn_id','3')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('payment_mechanism');
    }
    //NEO智能合约
    public function intelligent_contract(){
        try{
            $result = $this->navigation->where('bn_id','8')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('intelligent_contract');
    }
    //FX架构
    public function framework(){
        try{
            $result = $this->navigation->where('bn_id','9')->find();
            $this->assign('result',$result);
        }catch (\Exception $e){
            Log::write($e->getMessage(),'error');
        }
        return $this->fetch('framework');
    }
}