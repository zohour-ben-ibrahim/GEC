<?session_start();
error_reporting(E_ERROR);
require_once('php/classe_noeud.php');
if (! isset($_SESSION['mat'])){
 echo '<script language="Javascript">
document.location.replace("index.php");
</script>'; 
exit();
}
?>

<html>
<head>

<title>متابعة المراسلات</title>
<link rel="icon" type="image/png" href="IMAGES/logo-poste.png" />
<link rel="stylesheet" type="text/css" href="css/img.css" />
<link rel="stylesheet" type="text/css" href="css/my_css.css" />
<link rel="stylesheet" type="text/css" href="texte.css" />
<script type="text/javascript" src="include-ext.js"></script>
<script type="text/javascript" src="options-toolbar.js"></script> 
<script type="text/javascript" src="cnf.php"></script>
<script type="text/javascript" src="cnf_f1.js"></script> 
<script type="text/javascript" src="forms.php"></script> 
<script class="jsbin" src="jquery.min.js"></script>
<script class="jsbin" src="jquery-ui.min.js"></script>
<script src="jquery.js"></script>
<script src="jquery.form.js"></script> <!-- contient une bibliothèque jquery utilisé pour submit form d'ajout de courrier -->


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body onload="Rebour()" OnUnload="quitter()">
    <!-- use class="x-hide-display" to prevent a brief flicker of the content -->
	
<?
$dr=$_SESSION['droits'];

?>
	
 <div id="east2" class="x-hide-display">
<?$dis1=''; if($dr[0] =='0'){ $dis1=' style="display:none" '; } ?> <!--gestion des noeuds -->
    <a id="noeud1" href="#" <? echo $dis1; ?> class="myButton"><center>الإطّلاع</center></a></br>
	<?$dis2=''; if($dr[2] =='0'){ $dis2=' style="display:none" '; } ?>
     <a id="noeud2" href="#" <? echo $dis2; ?>  class="myButton"><center>الإضافة</center></a></br>
      
 </div> 
  <div id="east10" class="x-hide-display"> <!-- gestion des types des courriers  -->
 <a id="type1" href="#"class="myButton"><center>الإطّلاع</center></a></br>
 <a id="type2" href="#"class="myButton"><center>الإضافة</center></a></br>
</div> 
 <div id="east3" class="x-hide-display"> <!-- gestion des types des utilisateurs  -->
 <?$dis3=''; if($dr[3] =='0'){ $dis3=' style="display:none" '; } ?>
     <a id="user1" href="#" <? echo $dis3; ?>  class="myButton"><center>الإطّلاع</center></a></br>
	 <?$dis4=''; if($dr[5] =='0'){ $dis4=' style="display:none" '; } ?>
     <a id="user2" href="#" <? echo $dis4; ?>  class="myButton"><center>الإضافة</center></a></br>
      
 </div>
	
 <div id="east4" class="x-hide-display"> <!-- gestion des types des priorités  -->
 <?$dis5=''; if($dr[6] =='0'){ $dis5=' style="display:none" '; } ?>
     <a id="prio1" href="#" <? echo $dis5; ?> class="myButton"><center>الإطّلاع</center></a></br>
	 <?$dis6=''; if($dr[8] =='0'){ $dis6=' style="display:none" '; } ?>
     <a id="prio2" href="#" <? echo $dis6; ?> class="myButton"><center>الإضافة</center></a></br>
    
 </div>
 
 <div id="east5" class="x-hide-display"> <!-- cloture  -->
     <a id="clot1" href="#"class="myButton"><center>غلق</center></a>  
    
 </div>
	
	 <div id="east10" class="x-hide-display"> <!-- gestion des types des types des courriers  -->
	 <a id="type1" href="#" class="myButton"><center>الإطّلاع</center></a></br>
     <a id="type2" href="#"class="myButton"><center>البحث</center></a></br> 
	 </div>
 <div id="east6" class="x-hide-display"> <!-- stat  -->
     <a id="stat1" href="#" class="myButton"><center>الإطّلاع</center></a></br>
      
 </div>

 <div id="east7" class="x-hide-display"> <!-- gestion des types des courriers  depart -->
     <a id="cour_dep1" href="#" class="myButton"><center>الإطّلاع</center></a></br>
     <a id="cour_dep3" href="#"class="myButton"><center>البحث</center></a></br> 
 <a id="cour_dep2" href="#"class="myButton"><center>إضافة مراسلة صادرة</center></a></br>
      
 </div>	
	 
	 
 <div id="east8" class="x-hide-display"> <!-- gestion des types des courriers arrivés -->
     <a id="cour_arr1" href="#" class="myButton"><center>الإطّلاع</center></a></br>
	 <?$dis8=''; if($_SESSION['type'] =='b'){ $dis8=' style="display:none" '; } ?>
	 <a id="cour_arr2" href="#" <? echo $dis8; ?> class="myButton"><center>البحث</center></a>
     <? if($_SESSION['type']=='b'){echo'  <a id="cour_arr3" onclick="ajout_courrier_arr()" href="#"class="myButton"><center> إضافة مراسلة واردة</center></a></br> ';} ?>

      
 </div> 

 <div id="east9" class="x-hide-display"> <!-- modif mot de passe  -->
     <a id="pwd1" href="#" class="myButton"><center>تعديل كلمة العبور</center></a></br>
    
 </div> 
   <style type="text/css">



</style> 
 <div id='end_sess' style="display:none;" class="divz" width="350" height="300"></div> 

<input name='select' value='<? echo $_SESSION['expire']; ?>' type='hidden' id='select'>
    <div id="center1" class="x-hide-display">
<center>
<?
//les alerts

$t=$_SESSION['type'];
if($t=='a' || $t=='b'){

echo '<center><table dir="rtl" bgcolor="#D3E2E9" class="tab"   width="100%" height="535"  cellspacing="10"  ><tr><td><p class="acceil"> مرحبا بك <br>'.$_SESSION['nom'].' </p></td></tr></table></center>';
}
else{
$lst=null;
$nouv=null;
$stat=null;
if(($t=='s')||($t=='d')){
require_once('php/classe_courrier.php');
$noeud=$_SESSION['noeud'];
$cr=new courrier(null, null, $noeud, null, null, null, null,null, null, null, null, null,null, null);
$lst=$cr->alerts();
$nouv=$cr->nouveaux();
$stat=$cr->stat();
}
elseif($t=='g'){
require_once ('php/classe_transmission.php');
$idcompte=$_SESSION['compte'];
$trs=new transmission(null, $idcompte, null, null, null,null);
$lst=$trs->alerts();
$nouv=$trs->nouveaux();
$stat=$trs->stat();
}
?>    
<table dir="rtl" bgcolor="#D3E2E9" class="tab"   width="100%" height="540"  cellspacing="10"  >
<tr height="320"><td width="50%" >
<?
if(count($lst)>0){
 //s'il existe des courrier urgents
?>
<table border="1" bordercolor="#C5C5C5" dir="rtl" id="liste"  cellspacing="1"  width="100%" height="100%">
<thead><tr class="titre"><th   colspan="4"  width="100%"><p class="txt">عمل مستعجل</p></th></tr>
<tr class="th2"><th width="45">الرقم</th><th width="170">الموضوع</th><th width="125">المرسل</th><th width="70">انتهاء الاجل</th></tr></thead><tbody>
<?
$tem="them1";
$i=0;
while ($i<count($lst)){
if($i % 2!=0){
$tem="them2";
}else{  $tem="them1";}
$j=$lst[$i];
echo'<tr onclick="consult_courrier('.$j['ID_COURRIER'].')" class="'.$tem.'"><td width="45">'.$j['ID_COURRIER'].'</td><td width="170">'.$j['SUJET'].'</td><td width="125">'.$j['LBL_NOEUD'].'</td><td width="70">'.$j[3].'</td></tr>';
$i++;
}
?>
</tbody>
<?
}

else{ //s'il n'existe pas des courriers urgents
echo '<table border="1" bordercolor="#C5C5C5" dir="rtl"  cellspacing="1"  width="100%" height="100%">

<tr class="titre"><th   colspan="4"  width="100%"><p class="txt">عمل مستعجل</p></th></tr>
<tr width="100%" class="them1" height="100%"><td colspan="4"><p class="txt">ليس لديك اي عمل مستعجل</p></td></tr>';

}
?>
</table></td>

<td width="50%" >
<?
if(count($nouv)>0){ //s'il y a des nouveaux courrier
?>
<table border="1" bordercolor="#C5C5C5" dir="rtl" id="liste"  cellspacing="1"  width="100%" height="100%">
<thead><tr class="titre"><th   colspan="4"  width="100%"><p class="txt">مراسلات واردة</p></th></tr>
<tr class="th2"><th width="45">الرقم</th><th width="175">الموضوع</th><th width="125">المرسل</th><th width="70">انتهاء الاجل</th></tr></thead><tbody>
<?
$tem="them1";
$x=0;
while ($x<count($nouv)){
if($x % 2!=0){
$tem="them2";
}
else{  $tem="them1";}
$y=$nouv[$x];
echo'<tr onclick="consult_courrier('.$y['ID_COURRIER'].')"class="'.$tem.'"><td width="45">'.$y['ID_COURRIER'].'</td><td width="174">'.$y['SUJET'].'</td><td width="125">'.$y['LBL_NOEUD'].'</td><td width="70">'.$y[3].'</td></tr>';
$x++;
}
?>
</tbody>
<?
}
else{ //s'il n'existe pas des nouveaux courriers 
echo '<table border="1" bordercolor="#C5C5C5" dir="rtl"  cellspacing="1"  width="100%" height="100%">

<tr class="titre"><th   colspan="4"  width="100%"><p class="txt">مراسلات واردة</p></th></tr>
<tr width="100%" class="them1" height="100%"><td colspan="4"><p class="txt">ليس لديك اي  مراسلات جديدة</p></td></tr>';

}
?>
</table></td></tr>
<tr height="160"><td  colspan="2"><hr><table border="1" bordercolor="#C5C5C5" dir="rtl"   cellspacing="1"  width="100%" height="70%">
<?
if($t=='g'){

?>
<tr class="titre"><th   colspan="3"  width="100%"><p class="txt">احصائيات اسبوعية</p></th></tr>
<tr class="th2"><th width="290">عدد المراسلات الصادرة</th><th width="290">عدد المراسلات في الانتضار</th><th width="290">عدد المراسلات المعالجة</th></tr>
<tr class="them1"><td width="290"><p class="txt"><? echo $stat[0]; ?></p></td><td width="290"><p class="txt"><? echo $stat[1]; ?></p></td><td width="290"><p class="txt"><? echo $stat[2]; ?></p></td></tr>

<?
}
else{ ?>
<tr class="titre"><th   colspan="4"  width="100%"><p class="txt">احصائيات اسبوعية</p></th></tr>
<tr class="th2"><th width="290">عدد المراسلات الصادرة</th><th width="290">عدد المراسلات في الانتضار</th><th width="290">عدد المراسلات قيد المعالجة</th><th width="290">عدد المراسلات المعالجة</th></tr>
<tr class="them1"><td width="217"><p class="txt"><? echo $stat[0]; ?></p></td><td width="217"><p class="txt"><? echo $stat[1]; ?></p></td><td width="217"><p class="txt"><? echo $stat[2]; ?></p></td><td width="217"><p class="txt"><? echo $stat[3]; ?></p></td></tr>

<?
}
?>
</table></td></tr>
</table>
<?
}
?>
</center> 
        
 </div> 
 
   <div id="west1" class="x-hide-display">
   
  
   
   
   
   


<SCRIPT LANGUAGE='JavaScript'>
function affich_alert(){
document.getElementById('end_sess').style.display="block";
	document.getElementById('end_sess').innerHTML="<table class='tab2'><tr><td dir='rtl'><input type='button' class='mybtn2' value='X' onclick=\"document.getElementById('end_sess').style.display='none';\"></td></tr><tr><td><br><center><b>هذه الصفحة ستغلق بعد 5 دقائق<br>.  الرجاء تسجيل عملكم </b><br></center></td></tr></table>";
	 
setTimeout("affich_alert()",15000);
setTimeout(function() { 
document.getElementById('end_sess').style.display="none"; 
},15000);
}
nav = navigator.appVersion.substring(0,3);
function CalculHeure()
	{
	
	Maintenant = new Date;
	TempMaintenant = (Maintenant.getTime()/1000);
TempFuture =document.getElementById('select').value; 

	zero = "";	DinaHeure = Math.floor((TempFuture-TempMaintenant));
	if(DinaHeure==0)
	{ 
	alert("هده الصفحة ستغلق الان")
	document.location.replace("php/deconnexion1.php")
	}
	if(DinaHeure==320)
	{
	affich_alert();
	}
	DinaHeure = "" + DinaHeure;
	if (DinaHeure <= 0)
		{
		DinaHeure = "0";
		}
	longe = DinaHeure.length;
	difflonge = 10-longe;
	i = 1;
while (i <= difflonge)
		{
		DinaHeure = "0"+DinaHeure;
		i++;
		}
		return;
	}
CalculHeure();
if (nav >= 4)
{
i0 = new Image;
i1 = new Image;
i2 = new Image;
i3 = new Image;
i4 = new Image;
i5 = new Image;
i6 = new Image;
i7 = new Image;
i8 = new Image;
i9 = new Image;
imgSrc = new Array;
imgSrc[0] = 'images/h0.gif';
imgSrc[1] = 'images/h1.gif';
imgSrc[2] = 'images/h2.gif';
imgSrc[3] = 'images/h3.gif';
imgSrc[4] = 'images/h4.gif';
imgSrc[5] = 'images/h5.gif';
imgSrc[6] = 'images/h6.gif';
imgSrc[7] = 'images/h7.gif';
imgSrc[8] = 'images/h8.gif';
imgSrc[9] = 'images/h9.gif';
i0.src = imgSrc[0];
i1.src = imgSrc[1];
i2.src = imgSrc[2];
i3.src = imgSrc[3];
i4.src = imgSrc[4];
i5.src = imgSrc[5];
i6.src = imgSrc[6];
i7.src = imgSrc[7];
i8.src = imgSrc[8];
i9.src = imgSrc[9];
}
function Rebour()
{
if (nav >= 4)
{
CalculHeure()
char1 = DinaHeure.charAt(0);
document.heure1.src = imgSrc[char1];
char2 = DinaHeure.charAt(1);
document.heure2.src = imgSrc[char2];
char3 = DinaHeure.charAt(2);
document.heure3.src = imgSrc[char3];
char4 = DinaHeure.charAt(3);
document.heure4.src = imgSrc[char4];
char5 = DinaHeure.charAt(4);
document.heure5.src = imgSrc[char5];
char6 = DinaHeure.charAt(5);
document.heure6.src = imgSrc[char6];
char7 = DinaHeure.charAt(6);
document.heure7.src = imgSrc[char7];
char8 = DinaHeure.charAt(7);
document.heure8.src = imgSrc[char8];
char9 = DinaHeure.charAt(8);
document.heure9.src = imgSrc[char9];
char10 = DinaHeure.charAt(9);
document.heure10.src = imgSrc[char10];
char11 = DinaHeure.charAt(10);
}

setTimeout("Rebour()", 1000);

}

</SCRIPT> 
 <center>
 		

 <table  width='100%' border='0' class='rad' cellspacing='0'>
        <tr class='l2'>   <td colspan='5'><div align='center' ><strong><strong><b><font color='#FFFFFF' size= '2px' style='Times News Roman'>المستعمل متصل</strong></font></div></td>
    </tr>
    <tr class='l3'> 
      <td colspan='5'>...</td>
    </tr>
    <tr class='l2'> 
      <td width='1' bgcolor='FFFFFF'>&nbsp;</td>
      <td width='100%'  align ="center" ><strong><strong><b><font color='#FFFFFF' size= '2px'  style='Times News Roman'><?php echo"".$_SESSION['nom'];?></font></strong></td>
       <td bgcolor='FFFFFF'>&nbsp;</td>
    </tr>
	 <tr class='l2'> 
      <td width='1' bgcolor='FFFFFF'>&nbsp;</td>
      <td  width='100%'  align ="center" ><strong><strong><b><font color='#FFFFFF'  size= '2px' style='Times News Roman'><?php
$typ=$_SESSION['type'];
$t='';
switch ($typ){
case 's':$t='كاتب';
break;
case 'g':$t='متصرف';
break;
case 'd':$t='مدير';
break;
case 'a':$t='مدير النظام';
break;
case 'b':$t='مكتب الظبط';
break;
}

	  echo $t?></font></strong></td>
       <td bgcolor='FFFFFF'>&nbsp;</td>
    </tr>
    <tr class='l2'> 
      <td width='1' bgcolor='FFFFFF'>&nbsp;</td>
      <td  width='100%'  align ="center" ><strong><strong><b><font color='#FFFFFF'  size= '2px' style='Times News Roman'><?php
$id_n=$_SESSION['noeud'];
$n=new noeud($id_n,'','','');
$noeud=$n->getnoeud();
	  echo $noeud['LBL_NOEUD']?></font></strong></td>
       <td bgcolor='FFFFFF'>&nbsp;</td>
    </tr><tr class='l1'> 
      <td width='1' bgcolor='FFFFFF'>&nbsp;</td>
      <td width='100%' align ="center" > 
	  
<SCRIPT LANGUAGE="JavaScript">
	if (nav >= 4){document.write('<IMG SRC="images/h' + DinaHeure.charAt(0) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure1"><IMG SRC="images/h' + DinaHeure.charAt(1) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure2"><IMG SRC="images/h' + DinaHeure.charAt(2) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure3"><IMG SRC="images/h' + DinaHeure.charAt(3) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure4"><IMG SRC="images/h' + DinaHeure.charAt(4) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure5"><IMG SRC="images/h' + DinaHeure.charAt(5) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure6"><IMG SRC="images/h' + DinaHeure.charAt(6) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure7"><IMG SRC="images/h' + DinaHeure.charAt(7) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure8"><IMG SRC="images/h' + DinaHeure.charAt(8) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure9"><IMG SRC="images/h' + DinaHeure.charAt(9) + '.gif" BORDER=0 WIDTH=12 HEIGHT=15 NAME="heure10">')}
	 
	</SCRIPT>  
       </td>
       <td bgcolor='FFFFFF'>&nbsp;</td>
    </tr> 
	
     <tr class='l3'> 
      <td colspan='5'>...</td>
    </tr>
    <tr class='l2'> 
     <!-- <td colspan='5'><div align='right'> <input  name='Submit' type='image' id='Submit' src='images/valider.gif' width='70' height='22'></div></td> !-->
        <td colspan='5'><div align='center' ><strong><b><font color='#FFFFFF'  size= '2px' style='Times News Roman'><strong><a  href="php/deconnexion1.php" class="mybtn"> تسجيل الخروج </a></strong></font></div></td>
    </tr>
  </table>
  
  </center>
 </div> 
 <div id="west2">
	
    </div> 
   

    </div>
	
	
	 
</body>
</html>
