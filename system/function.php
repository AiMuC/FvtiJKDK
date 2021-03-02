<?php
/* File Info 
 * Author:      AiMuC 
 * CreateTime:  2021/3/2 上午11:09:01 
 * LastEditor:  AiMuC 
 * ModifyTime:  2021/3/2 下午12:27:38 
 * Description: 
*/
include_once('userdata.php');
/**
 * 发送post请求
 * @param string $url 请求地址
 * @param array $post_data post键值对数据
 * @return string
 */
//https://health.fjlzit.net/api/mStuApi/updateHealthReportEpidemicHealthReport.do
//https://health.fjlzit.net/api/mStuApi/token.do
function send_post($url, $post_data, $type, $accessToken)
{
	if ($type == 1) {
		$header = "application/x-www-form-urlencoded;charset=UTF-8";
	} else {
		$header = "application/x-www-form-urlencoded;charset=UTF-8\r\n" . "accessToken:" . $accessToken . "\r\n";
	}
	$post_data = http_build_query($post_data);
	$options = array(
		'http' => array(
			'method' => 'POST',
			"header" => $header,
			'content' => $post_data,
			'timeout' => 15 * 60 // 超时时间（单位:s）
		)
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	return $result;
}
/* 
 * @Description: 拼接数据
 * @param: insertdata
 * @param: healthId
 * @param: rosterId
 * @return: array
*/
function datavalue($insertdata, $healthId, $rosterId)
{
	$data = array(
		'healthId' => $healthId,
		'rosterId' => $rosterId,
		'isGfxReturn' => '2',
		'isJwReturn' => '2',
		'isContactPatient' => '2',
		'isContactRiskArea' => '2',
		'isHealthCodeOk' => '2',
		'details' => '',
		'dataDate' => date('Y-m-d'),
		'dataType' => '1',
		'dataStatus' => '2',
		'endTime' => '00:01:00',
		'liveState' => '1',
		'nowAddress' => $insertdata['address'],
		'nowAddessDetail' => $insertdata['address'],
		'nowTiwenState' => '1',
		'nowHealthState' => '1',
		'counsellorApprovalStatus' => '未审核',
		'temperature' => '36.3',
	);
	return $data;
}
