<?php  
/**  
 * Curl版本   
 */  
function vpost($url,$data){ // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}

?>  
<?php  
  /************************************************************************************
   * 关闭直接支付
   * @author KYLE
   ************************************************************************************/
  header("content-type:text/html; charset=utf-8");  
  require_once("http://127.0.0.1:8080/JavaBridge/java/Java.inc");
  java_require($_SERVER['DOCUMENT_ROOT']."/Javatest/Java"); //一定要把刚才生成的jar文件放到这个require的目录下面

  //测试环境地址
  $url = 'https://uat.easternpay.com.cn/bsteelpay/payment.do';
  
  $payID = 'JG'.date('Ymdhis',time()).'-'.rand(999,9999);  // 支付号码，东方付通对此指令的唯一标识
  
  $originalPayID = 'JG20151105040109-2174';  // 需要关闭的支付号码（上一次支付的支付号码）
  $tradeOrder = 'JG20151105040109-2174'; // 需要关闭的合同号码（上一次支付的合同号码）
  
  //参数封装
  $param['payID'] =  $payID; // 支付号码，东方付通对此订单的唯一标识，商城必须保存此订单号，下次支付时使用
  $param['mallID'] = '000054';  // 商城号
  $param['payType'] = '01021'; // 接口类型，关闭直接支付
  $param['payMemCode'] = 'F1000819'; // 付款人代码
  $param['payMemName'] = 'cs123'; // 付款人名称
  $param['recMemCode'] = 'F1000733'; // 收款人代码
  $param['recMemName'] = '北京化工宝电子商务有限公司'; // 收款人名称
  $param['currency'] = 'CNY'; // 人民币
  $param['payAmt'] = '999'; // 付款金额
  
  $param['tradeOrder'] =  $tradeOrder; // 需要关闭的合同号码（上一次支付的合同号码）
  $param['originalPayID'] = $originalPayID;   // 需要关闭的支付号码（上一次支付的支付号码）
  $param['callBackUrl'] = 'http://www.baidu.com';
  $param['summary'] = ''; //摘要
  

  //生成签名方法
 $signUtil = Java('com.easterpay.base.util.SignUtil'); 
 $path = $_SERVER['DOCUMENT_ROOT'].'/Javatest/Java/hbtest2.pfx';   //证书路径
 $password = "999999";  //证书密码
 
 // 生成签名
 $param['signature'] = $signUtil->signDataDetached($path,$password,json_encode($param))."";    //打印签名密文
 $json = json_encode($param);
 $order = base64_encode($json);
 
 echo "参数：<br />".$order;
 echo "<br /><br />";
 
 //请求
 $result = vpost($url,"order=".$order);
 echo '请求结果:<br />'.$result;
 echo "<br /><br />";
 
 $obj = json_decode($result);
 if(isset($obj)){
	// 关闭状态
     $payStatus = $obj->payStatus;
	 // 关闭消息
     $payMessage = $obj->payMessage;
	 // 签名
	$signature = $obj->signature;
	
	echo '处理消息:<br />';
	
	//判断订单是否关闭成功 payStatus 为000000 为关闭成功
	if($payStatus  == '000000'){
		echo "订单：".$originalPayID.",关闭成功！";
	}else{
		echo "订单：".$originalPayID.",".$payMessage;
	}
 }

?> 