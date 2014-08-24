<!DOCTYPE HTML>
<html>
<title>Web API 測試介面</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
<style type="text/css">
	div{
	padding:3px 3px;
	margin:3px 3px;	
	border:1px solid #999;
	}
	div:hover{
	background-color:#BBB;
	color:white;
	}
	.title{
	font-size:20px;
	display:block;
	width:100%;
	margin-bottom:5px;
	font-weight:bold;	
	}
	.hidden{
	display:none;
	}
</style>

<script language="javascript">
</script>

<a name="a1"></a>
<h1>API測試</h1>
<span class="auth">
<span style="float:left"><img src="images/face.png" alt="" /></span>
<span style="float:left;padding-left:10px;font-size:10px;color:#999;">
   Version　-　1<br />
   Brief　- 測試API處理結果<br />
   Author - Eastmoon <br />
   Date - 2014.08.24<br />
</span>
</span>
<div id="menu" style="position:fixed;right:0px;width:80px;background-color:#9F3;border:1px solid #9C0;padding:5px 5px;top:0px;">
<h5>快速選單</h5>
<div><a href="#a1">工具</a></div>
<div><a href="#a2">帳號</a></div>
</div>

<h2 style="clear:both">System</h2>

<a name="a2"></a>
<span style="background-color:#CCC;display:block">
	<h2>Account</h2>
	<div style="clear:both">
		<span class="title">建立帳號<br />fun : Account.Create</span>
		<form action="../api.php" method="post" target="_blank">
			<input type="hidden" name="fun" value="Account.Create" />
			<label for="id">帳號</label><input type="text" name="id" id="id" />(min 4 length)<br/>
			<label for="psd">密碼</label><input type="text" name="psd" id="psd" />(min 4 length)<br/>
			<label for="vpsd">確認密碼</label><input type="text" name="vpsd" id="vpsd" /><br/>
			<input type="submit" value="建立帳號" style="margin-left:30px;"/><br/>
		</form>
	</div>
	<div style="clear:both">
		<span class="title">登入<br />fun : Account.Login</span>
		<form action="../api.php" method="post" target="_blank">
			<input type="hidden" name="fun" value="Account.Login" />
			<label for="id">帳號</label><input type="text" name="id" id="loginid" /><br/>
			<label for="psd">密碼</label><input type="text" name="psd" id="loginpsd" /><br/>
			<input type="submit" value="登入" style="margin-left:30px;"/><br/>
		</form>
	</div>
	<div style="clear:both">
		<span class="title">登出<br />fun : Account.Logout</span>
		<form action="../api.php"  target="_blank" method="post">
			<input type="submit" value="登出" style="margin-left:30px;"/><br/>
		</form>
	</div>
</span>
</body>
</html>