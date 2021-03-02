# 福州职业技术学院 自动健康打卡

# 使用方法
```javascript
1.修改/system/userdata.php内的文件
$insertdata = array(
	'1' => array('address' => '地址信息', 'userCode' => '学号', 'userPwd' => md5('密码'), 'email' => '通知邮箱'),
	'2' => array('address' => '地址信息', 'userCode' => '学号', 'userPwd' => md5('密码'), 'email' => '通知邮箱'),
);
2.设置您自己的发件邮箱
/system/email.php 需要修改的内容已在文件内标注

```

# 部署环境
1.使用云服务器或国内的php虚拟空间 注意服务器或空间需要是国内的机器!否则将无法访问打卡接口<br>
2.使用服务器搭建宝塔环境使用推荐使用php7.4 导入文件后在宝塔内设置定时任务即可.<br>


# 推荐部署环境（免费）请参考该项目自行修改 [fjzzitjkdk](https://github.com/AiMuC/fjzzitjkdk)

```javascript
1.注册腾讯云 搜索腾讯云函数 新建一个PHP云函数 函数入口设置为Cloudfunction.main_handler
2.点击导入代码包选择创建
3.创建完成后选择触发管理 设置一个定时触发任务 cron表达式	0 1 0 * * * * 每日凌晨00:01分执行函数
```
