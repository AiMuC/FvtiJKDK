<?php
/* File Info 
 * Author:      AiMuC 
 * CreateTime:  2021/3/2 上午11:09:01 
 * LastEditor:  AiMuC 
 * ModifyTime:  2021/3/2 下午12:27:16 
 * Description: 
*/
/* 
 * @Description: 定义用户数据 address 签到位置 usercode 登入账号 userpwd //经过md5加密后的密码 email 签到结果返回的邮箱通知地址
*/
$insertdata = array(
	'1' => array('address' => '地址信息', 'userCode' => '学号', 'userPwd' => md5('密码'), 'email' => '通知邮箱'),
	'2' => array('address' => '地址信息', 'userCode' => '学号', 'userPwd' => md5('密码'), 'email' => '通知邮箱'),
);
