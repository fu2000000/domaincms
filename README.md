# domaincms DomainCmsV1.0域名管理系统

## 程序环境
网站编码：UTF-8  
网站结构：PHP+Mysql  
后台框架：THINKPHP3.2.3  
前台框架：Bootstrap3  

1、多模板，自由切换；  
2、新闻列表，发布域名最新新闻动态；  
3、支持域名批量导入；  

## 安装步骤
1、将程序上传到web服务器指定的文件夹根目录  
2、将文件夹内的sql文件导入数据库  
3、配置数据库，数据库配置文件位于：domaincms/Application/Common/Conf/config.php 文件中，打开文件，将数据库地址、账号、密码更换即可，数据库名不变  
4、配置完毕  

## Linux服务器设置
[ Apache ]  
httpd.conf配置文件中加载了mod_rewrite.so模块   
AllowOverride None 将None改为 All   

后台登陆地址：您的域名/adm-login.html  
初始登陆账号：admin 密码:111111 登陆后修改账号和密码  

统计代码修改domaincms\Application\Home\View\Public文件夹下面的footer.html文件 打开之后最后一行修改为自己网站的统计代码  

### 安装出现问题请通过下面进行联系  
作者:白鹅  
Email:fu2000000@163.com  
微信:skygee  
QQ:1604026450  
演示站：gmic.cc  
