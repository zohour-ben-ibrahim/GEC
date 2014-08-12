<?session_start(); 
echo ' <meta charset="UTF-8">';
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false){
echo '<br><br><br><br><br><br><br><br><br><br><br><center><b><font color="blue" size="24">veuillez réessayer en utilisant google chrome</font></b></center>';
exit();
}
?>
<html>
<head>
<meta charset="utf-8">
<title>تسجيل الدخول</title>
<link rel="icon" type="image/png" href="IMAGES/logo-poste.png" />
<link rel="stylesheet" type="text/css" href="css/style_login.css" />

<script type="text/javascript" src="forms.php"></script> 
<script class="jsbin" src="jquery.min.js"></script>
<script class="jsbin" src="jquery-ui.min.js"></script>
<script src="jquery.js"></script>
<script src="jquery.form.js"></script> 

<script language="javascript">

 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      } 
	  function vide(){
	  var l=document.getElementById("login").value;
	  var m=document.getElementById("mtp").value;
	  if(l=='' || m=='')return false;
	  }
	</script>  
</head>
<body background="IMAGES/bg.jpg">
<center><img src="IMAGES/logo-poste.png"></center>
<form id="loginform"  method="POST" >
<table class="placeholder"><tr><td><img src="IMAGES/login.png" class="placeholder" width="60px"></td><td>
<label for="username">الرقم الالي</label><input dir="rtl" required type="text" id="login" name="login" onkeypress="return isNumberKey(event)" class="placeholder" placeholder="الرقم الالي">
<label for="password">كلمة العبور</label><input dir="rtl" required type="password" id="mtp" name="mtp" class="placeholder" placeholder="كلمة العبور">
<input type="submit" onclick="return veriflogin()" value="تسجيل الدخول"></td></tr></table>
</form><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <div id="erreur"></div>
  
      


 </body>
</html>
