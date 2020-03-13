<?php
require 'vendor/autoload.php';

$pingping = "remember_82e5d2c56bdd0811318f0cf078b78bfc=eyJpdiI6IkcrUzBxVDN4QXhhV1F0OGhvYTNsVnc9PSIsInZhbHVlIjoickNLVTFlQWs5UzlKVlwvNVRqaHBcL1A4anNmTDFjSkJjSWdnbGVWbkozdWxnNUhuR2hHZjBcL3BOVExaaUtDeXpLazlWZGJnWFpsXC81Q0R6cGxOMlhDTGRoZ3NGM0VKTDg5VlwvYWQ1dFF0UFdHRT0iLCJtYWMiOiJlZWQ0NWIyYTJmZGQxNGQzMTlkNzU3N2E0MmY4MTc0OThlNjM5OWE0MmZmZDE3NmE3MDRhNDViOTIwZDVkZGExIn0%3D;";

function curl_post_https($url,$data){ // 模拟提交数据函数

        $curl = curl_init(); // 启动一个CURL会话

        $header = array(

           // "cookie: Hm_lpvt_9d4c783e300679efe7917a7bfc816eae=1528330268;Hm_lvt_9d4c783e300679efe7917a7bfc816eae=1528328023;remember_82e5d2c56bdd0811318f0cf078b78bfc=eyJpdiI6IklHVFwvY1dGVFl4ak90ZTBwMnFScWlRPT0iLCJ2YWx1ZSI6ImdDc1p3UGcxUGdCdFZvakpOZXpkV1VSaHE2Qktwb1FuRThFNkNvSXJZUTAzalhiNXc1VnZmcGowUGpraGNRZlRRSElHRGJuRHcrbER5VUk2VUxlK0ppRTlyenJzZkM5a3FPSE1EcVpVN0NNPSIsIm1hYyI6IjZiOTRiMmU1NmUyZjczNjcxODU4YmY3ZjA2OGExYzQ2Mjg4ZmIwZjkwMWI0YWQ0OGIxMmQ5ZGVmOWJhNDM2ZmMifQ%3D%3D; Hm_lvt_9d4c783e300679efe7917a7bfc816eae=1528328023; Hm_lpvt_9d4c783e300679efe7917a7bfc816eae=1528330268;",
            "user-agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        );
	$fields_string = '';
	foreach($data as $key => $value){ 
		$fields_string .= $key . "=" . $value . "&"; 
	}	 	
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
	curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string); // Post提交的数据包
	curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie.txt");
	//curl_setopt($curl, CURLOPT_COOKIE,$pingping);
	curl_setopt($curl, CURLOPT_COOKIE,"remember_82e5d2c56bdd0811318f0cf078b78bfc=eyJpdiI6IklHVFwvY1dGVFl4ak90ZTBwMnFScWlRPT0iLCJ2YWx1ZSI6ImdDc1p3UGcxUGdCdFZvakpOZXpkV1VSaHE2Qktwb1FuRThFNkNvSXJZUTAzalhiNXc1VnZmcGowUGpraGNRZlRRSElHRGJuRHcrbER5VUk2VUxlK0ppRTlyenJzZkM5a3FPSE1EcVpVN0NNPSIsIm1hYyI6IjZiOTRiMmU1NmUyZjczNjcxODU4YmY3ZjA2OGExYzQ2Mjg4ZmIwZjkwMWI0YWQ0OGIxMmQ5ZGVmOWJhNDM2ZmMifQ%3D%3D;");

        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据，json格式
}
function curl_get_https($url,$data){
	@unlink('cookie.txt');
	$curl = curl_init(); // 启动一个CURL会话

        $header = array(
            //"cookie: Hm_lpvt_9d4c783e300679efe7917a7bfc816eae=1528330268;Hm_lvt_9d4c783e300679efe7917a7bfc816eae=1528328023;remember_82e5d2c56bdd0811318f0cf078b78bfc=eyJpdiI6IklHVFwvY1dGVFl4ak90ZTBwMnFScWlRPT0iLCJ2YWx1ZSI6ImdDc1p3UGcxUGdCdFZvakpOZXpkV1VSaHE2Qktwb1FuRThFNkNvSXJZUTAzalhiNXc1VnZmcGowUGpraGNRZlRRSElHRGJuRHcrbER5VUk2VUxlK0ppRTlyenJzZkM5a3FPSE1EcVpVN0NNPSIsIm1hYyI6IjZiOTRiMmU1NmUyZjczNjcxODU4YmY3ZjA2OGExYzQ2Mjg4ZmIwZjkwMWI0YWQ0OGIxMmQ5ZGVmOWJhNDM2ZmMifQ%3D%3D; Hm_lvt_9d4c783e300679efe7917a7bfc816eae=1528328023; Hm_lpvt_9d4c783e300679efe7917a7bfc816eae=1528330268;",
            "user-agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        );
		
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie.txt');
	//curl_setopt($curl, CURLOPT_COOKIE,$pingping);
	curl_setopt($curl, CURLOPT_COOKIE,"remember_82e5d2c56bdd0811318f0cf078b78bfc=eyJpdiI6IklHVFwvY1dGVFl4ak90ZTBwMnFScWlRPT0iLCJ2YWx1ZSI6ImdDc1p3UGcxUGdCdFZvakpOZXpkV1VSaHE2Qktwb1FuRThFNkNvSXJZUTAzalhiNXc1VnZmcGowUGpraGNRZlRRSElHRGJuRHcrbER5VUk2VUxlK0ppRTlyenJzZkM5a3FPSE1EcVpVN0NNPSIsIm1hYyI6IjZiOTRiMmU1NmUyZjczNjcxODU4YmY3ZjA2OGExYzQ2Mjg4ZmIwZjkwMWI0YWQ0OGIxMmQ5ZGVmOWJhNDM2ZmMifQ%3D%3D;");
	curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie.txt");
	
        $tmpInfo = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
	//var_dump( curl_getinfo($curl, CURLINFO_COOKIELIST) );
        curl_close($curl); // 关闭CURL会话
        return $tmpInfo; // 返回数据，json格式
}

$count = 20;
while($count > 0){
$count--;

$html = curl_get_https('https://wx.jiexingyijia.com/subject2/date/'.date('Y-m-d',time()+172800),[]);//file_get_contents('yue.html');
echo 'https://wx.jiexingyijia.com/subject2/date/'.date('Y-m-d',time()+172800).PHP_EOL;
echo '-----------------------------------START------------------------------------'.PHP_EOL;
//$html = curl_get_https('https://wx.jiexingyijia.com//subject2/index',[]);
//$html = file_get_contents('yue.html');
file_put_contents('order-index'.date('Y-m-d H:i:s',time()).'.html',$html);
$html_dom = new \HtmlParser\ParserDom($html);

//time filter
$passArray = [];

$item_array = $html_dom->find('.item_hd');

if(empty($item_array)){
	sleep(1);
	continue;
}

foreach($item_array as $index=>$item){
	if(strtotime(date('Y-m-d').' '.explode('-',$item->plaintext)[0]) > strtotime('10:00')){
		echo date('Y-m-d').' '.explode('-',$item->plaintext)[0].'------kaiqi'.PHP_EOL;
		array_push($passArray,$index);
	}else{
	//	echo 'no';
	}
}

$p_array = $html_dom->find('input[type=hidden]');

$tokens = [];

foreach ($p_array as $p){
	$tokens[$p->getAttr('name')] = $p->getAttr('value');
}
//start
$p_array = $html_dom->find('input[type=radio]');
foreach ($p_array as $index=>$p){
	//filter time
	if(!in_array($index,$passArray)){
		continue;
	}

	$data = $tokens;
	
	$data[$p->getAttr('name')] = $p->getAttr('value');
	echo '------------------------------------------------------------------------'.PHP_EOL;
	var_dump($data);
	echo '------------------------------------------------------------------------'.PHP_EOL;	
	var_dump(curl_post_https('https://wx.jiexingyijia.com/subject2/order',$data));
	echo '------------------------------------------------------------------------'.PHP_EOL;
}
echo '-----------------------------------END------------------------------------'.PHP_EOL;
break;
}

?>
