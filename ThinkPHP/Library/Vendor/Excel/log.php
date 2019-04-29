<?php //----------------you should save this file as m.php----------------
    session_start(); 
    if (empty($page)) {$page=1;}
    if (isset($_GET['page'])==TRUE) {$page=$_GET['page']; }
?> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>Read Result</title> 
<style type="text/css"> 
<!-- 
.STYLE1 {font-size: 12px} 
.STYLE2 {font-size: 18px} 
--> 
</style> 
</head> 
<body> 
<table width="100%"  bgcolor="#CCCCCC"> 
<tr> 
<td > 
<?php 
 $shili = fopen ("/pub/www/comsic/admin_log.txt","r") ;  //打开文本
while ( !feof ( $shili )){      //判断是否到了文件最后的函数
$shi = fgets ( $shili,6024 ) ;        //读取其中的数据
echo $shi."<br>"; }
fclose ( $shili ) ;
?> 
</td> 
</tr> 
</table> 

<table width="100%"  bgcolor="#cccccc"> 
<tr> 
<td width="42%" align="center" valign="middle"><span class="STYLE1"> <?php echo $page;?> / <?php echo $page_count;?> 页 </span></td> 
<td width="58%" height="28" align="left" valign="middle">
<span class="STYLE1">
<?php
echo "<a href=log.php?page=1>首页</a> ";  
if($page!=1){ 
    echo "<a href=log.php?page=".($page-1).">上一页</a> "; 
} 
if($page<$page_count){ 
    echo "<a href=log.php?page=".($page+1).">下一页</a> "; 
}
echo "<a href=log.php?page=".$page_count.">尾页</a>";  
?> 
</span> </td> 
</tr> 
</table> 
</body> 
</html>