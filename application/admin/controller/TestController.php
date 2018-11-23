<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23 0023
 * Time: 11:21
 */

namespace app\admin\controller;


use think\Controller;
use app\api\controller\VoiceDemo;

class TestController extends Controller
{
    public function test_interface111(){
        $apiKey="5bf673b2";
        $curTime=time();
        $param = array(
            'scene'=>'main', //情景模式（目前不支持 wpgs-识别动态修正 场景）
            'sample_rate' => '16000',   //	音频采样率，可选值：16000（16k采样率）、8000（8k采样率），默认为16000
            'aue' => 'raw', //音频编码，可选值：raw（未压缩的pcm或wav格式）、speex（speex格式，即sample_rate=8000的speex音频）、speex-wb（宽频speex格式，即sample_rate=16000的speex音频），默认为 raw
            'pers_param' => "{\"auth_id\":\"2049a1b2fdedae553bd03ce6f4820ac4\"}",
            "data_type" => "audio", //数据类型，可选值：text（文本），audio（音频）
            "auth_id" => "2049a1b2fdedae553bd03ce6f4820ac4", //用户唯一ID（32位字符串，包括英文小写字母与数字，开发者需保证该值与终端用户一一对应）
        );
        $param = base64_encode(json_encode($param));
//        $param="eyAiYXVmIjogImF1ZGlvL0wxNjtyYXR...";
        $checkSum = $apiKey.$curTime.$param;
        $checkSum=md5($checkSum);
//        $jsonstr=json_encode($aa);
        //curl验证成功
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://openapi.xfyun.cn/v2/aiui");
        //curl_setopt($curl, CURLOPT_URL, "http://www.meigu.com/static/test.php");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl,CURLOPT_POST,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$checkSum);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($checkSum)
            )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);

        $bb=json_decode($res,true);
        //echo $res;
        print_r($bb);exit();
    }
    public function test_interface(){
        $voice = new VoiceDemo();
        $result = $voice->testWebaiui();
    }
}