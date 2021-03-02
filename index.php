<?php
/* File Info 
 * Author:      AiMuC 
 * CreateTime:  2021/3/2 上午11:09:01 
 * LastEditor:  AiMuC 
 * ModifyTime:  2021/3/2 下午12:17:33 
 * Description: 
*/
include_once('system/init.php');
foreach ($insertdata as $k => $v) {
	$userSign = array(
		'userCode' => $v['userCode'],
		'userPwd' => $v['userPwd']
	);
	$UserData = send_post('https://health.fjlzit.net/api/mStuApi/token.do', $userSign, 1, "");//模拟用户登入获取AccessToken
	$UserData = json_decode($UserData, true);//将json转换为数组
	$UserAccessToken = $UserData['data']['accessToken'];//取出AccessToken存入变量
	$healthId = send_post('https://health.fjlzit.net/api/mStuApi/queryByStuEpidemicHealthReport.do', 1, 2, $UserAccessToken);//获取healthId
	$rosterId = send_post('https://health.fjlzit.net/api/mStuApi/getByStuEpidemicStuRoster.do', 1, 2, $UserAccessToken);//获取rosterId
	$rosterId = json_decode($rosterId['data']['model'], true);//将json转换为数组
	$rosterId = $rosterId['rows'][0]['rosterId'];//取出rosterId存入变量
	$healthId = json_decode($healthId, true);//将json转换为数组
	$healthId = $healthId['rows'][0]['healthId'];//取出healthId存入变量
	$PostData = datavalue($insertdata[$k], $healthId, $rosterId);//将获取到的数据与提交数据进行拼接处理
	$return = send_post('https://health.fjlzit.net/api/mStuApi/updateHealthReportEpidemicHealthReport.do', $PostData, 2, $UserAccessToken);//提交打卡请求
	$return = json_decode($return, true);//将json转换为数组
	if ($return['isSuccess'] == 1) {//
		email($v['email'], "学号:" . $insertdata[$k]['userCode'] . "  打卡成功!<br>");
		echo "学号:" . $insertdata[$k]['userCode'] . "  打卡成功!<br>";
	} else {
		email($v['email'], "学号:" . $insertdata[$k]['userCode'] . "  打卡失败!<br>");
		echo "打卡失败<br>";
	}
}
