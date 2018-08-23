<?php
/**
 * 发起http post请求(REST API), 并获取REST请求的结果
 * @param string $url
 * @param string $param
 * @return - http response body if succeeds, else false.
 */
function request_post($url = '', $param = '')
{
    if (empty($url) || empty($param)) {
        return false;
    }

    $postUrl = $url;
    $curlPost = $param;
    // 初始化curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $postUrl);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    // 要求结果为字符串且输出到屏幕上
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // post提交方式
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    // 运行curl
    $data = curl_exec($curl);
    curl_close($curl);

    return $data;
}

$token = '24.e34b886ab505cf6c42ed88d0571f48dd.2592000.1532824737.282335-11436039';
$url = 'https://aip.baidubce.com/rest/2.0/image-classify/v2/advanced_general?access_token=' . $token;
// $img = file_get_contents('[本地文件路径]');
// $img = base64_encode($img);
$img=$_GET["img"];
$bodys = array(
    'image' => $img
);
$res = request_post($url, $bodys);

echo $img;

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = $img;
fwrite($myfile, $txt);
fclose($myfile);


var_dump($res);
?>