<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23 0023
 * Time: 17:07
 */

namespace app\api\controller;


use think\Controller;

class VoiceDemo extends Controller
{
    function testWebaiui(){
        $URL = "http://openapi.xfyun.cn/v2/aiui";
        $APPID = "";
        $API_KEY = "";
        $AUTH_ID = "2894c985bf8b1111c6728db79d3479ae";
        $AUE = "raw";
        $SAMPLE_RATE = "16000";
        $DATA_TYPE = "audio";
        $SCENE = "main";
        $RESULT_LEVEL = "complete";
        $LAT = "39.938838";
        $LNG = "116.368624";
        // 个性化参数，需转义
        $PERS_PARAM = "{\\\"auth_id\\\":\\\"2894c985bf8b1111c6728db79d3479ae\\\"}";
        $FILE_PATH = "";

        $Param= array(
            "result_level"=>$RESULT_LEVEL,
            "aue"=>$AUE,
            "scene"=>$SCENE,
            "auth_id"=>$AUTH_ID,
            "data_type"=>$DATA_TYPE,
            "sample_rate"=>$SAMPLE_RATE,
            "lat"=>$LAT,
            "lng"=>$LNG,
            //如需使用个性化参数：
            //"pers_param"=>$PERS_PARAM,
        );
        $curTime = time();
        $paramBase64 = base64_encode(json_encode($Param));
        $checkSum = md5($API_KEY.$curTime.$paramBase64);

        $headers = array();
        $headers[] = 'X-CurTime:'.$curTime;
        $headers[] = 'X-Param:'.$paramBase64;
        $headers[] = 'X-CheckSum:'.$checkSum;
        $headers[] = 'X-Appid:'.$APPID;

        $fp = fopen($FILE_PATH, "rb");
        $dataArray = fread($fp,filesize($FILE_PATH));

        echo $this->https_request($URL, $dataArray, $headers);
        echo "\n";
    }
    function https_request($url, $post_data, $headers) {
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => $headers,
                'content' => $post_data,
                'timeout' => 10
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        echo $result;
    }
}