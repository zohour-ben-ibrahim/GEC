<? session_start();

$compte=$_SESSION['compte'];

$nd=$_SESSION['noeud'];
?>
//-----------------------------------------------------------------------------

function veriflogin(){
if(isNaN(document.getElementById("login").value)){
            document.getElementById("erreur").innerHTML ="<font color='#272192' size='12'><center><b> الرجاء التثبت من البيانات</b></center></font>";
return false;
}
else{
$('#loginform').on('submit',function(e) {	
$.ajax({
url:'php/verification.php',
data:$(this).serialize(),
type:'POST',

success:function(data){

	   if( (String(data))=='0'){
		
            document.getElementById("erreur").innerHTML ="<font color='#272192' size='12'><center><b> الرجاء التثبت من البيانات</b></center></font>";
			document.getElementById("loginform").reset();
			return false;
         }
		else{ 
		 document.location.replace("l.php?theme=classic");
		  }
          
		  },
error:function(data){
document.getElementById("erreur").innerHTML="";
}
});
e.preventDefault(); 
});
}
}
//----------------------------------

//-----------------------------------------------------------------------------
function valider_pwd()
{
var act=document.getElementById('act_mtp').value;
var nouv=document.getElementById('nouv_mtp').value;
var conf=document.getElementById('conf_mtp').value;


//____________________________

	if ((act == '') || (nouv == '') || (conf == '') )
	{
	                     document.getElementById("r_mtp").innerHTML = "<center>الرجاء ملئ كل الفراغات</center>";	
						 return false;
	} 
	else if(nouv!=conf)
	        {
	           document.getElementById("r_mtp").innerHTML = "</center>كلمة المرور غير متطابقة</center>";
	 return false;
	        }
	else if(nouv.length< 5)
		   {
	           document.getElementById("r_mtp").innerText = "<center>كلمة العيور لا يمكن أن تكون أقصر من 5 حروف</center>";
	 return false;
	       }
	else{ 
	

	//hachage de mot de passe pour pouvoir le comparer-----------


$('#f66').on('submit',function(e) {
$.ajax({
url:'php/hach512.php',
data:$(this).serialize(),
type:'POST',

success:function(data){


	if( (String(data))=='0')
		  {
	          document.getElementById("r_mtp").innerText = "الرجاء التثبت من كلمة العبور الحالية";
	          document.getElementById("f6").reset();
	      }
	else if((String(data))=='2'){ // mtp act = mtp nouv
	document.getElementById("r_mtp2").innerHTML ='<div class="divz" id="555"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'555\');"></td></tr><tr><td><center>لقد تم تغيير كلمة العبور</center></td></tr></table></div>';

	}
else{ //si mot de passe act != de nouv et mtp act correcte nous modifions le mot de passe


	
$.ajax({
url:'php/modif_mtp2.php',
data:$(f66).serialize(),
type:'POST',

success:function(data){

	      document.getElementById("r_mtp").innerHTML = "&nbsp;";
             document.getElementById("r_mtp2").innerHTML =data;
			document.getElementById("f66").reset();
          
		  },
error:function(data){
document.getElementById("r_mtp").innerHTML = "&nbsp;";
			 document.getElementById("r_mtp2").innerHTML ='<div class="divz" id="555"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'555\');"></td></tr><tr><td><center>لم يتم تغيير كلمة العبور! الرجاء اٍعادة المحاولة</center></td></tr></table></div>';
			 document.getElementById("f6").reset();}
});


            
        }

},
error:function(data){
			 document.getElementById("r_mtp2").innerHTML ='<div class="divz" id="555"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'555\');"></td></tr><tr><td><center>لم يتم تغيير كلمة العبور! الرجاء اٍعادة المحاولة</center></td></tr></table></div>';
}
});
e.preventDefault(); 
});
}	
}



//----------------------------------------------------------


function valider_aj_noeud(){

var dir=document.getElementById("dir_ajn").value;
var lib=document.getElementById("lib_ajn").value;
var etat=1
if(document.getElementById("a_ajn0").checked)
var etat=0;
	if (dir =='vide' || lib == ""){
	document.getElementById("r_ajn").innerHTML = "<center>الرجاء ملئ كل الفراغات</center>";
	} 
	else{
	document.getElementById("r_ajn").innerText = "";
if(res = file('php/ajout_noeud2.php?dir='+escape(dir)+'&lib='+escape(lib)+'&etat='+escape(etat)))
{
document.getElementById("r_ajn2").innerHTML=res;
document.getElementById('lib_ajn').value="";
 // la boucle suivante a pour role de supprimer la direction utilisé(pour ne pas tomber dans le piège de 1 direction avec ++ noeud)
var liste=document.getElementById("dir_ajn");
var nb=document.getElementById("dir_ajn").options.length; // la boucle suivante a pour role de supprimer la direction utilisé(pour ne pas tomber dans le piège de 1 direction avec ++ noeud)
var i = 0;
		while (i < nb) {						
			if (liste.options[i].selected) {	
				liste.options[i] = null;
				nb--;
			} else {
				i++;
			}
		}

}
	}
	
}


//---------------------------------------------------------------------------


function affich_noeud(){
var d_cn=document.getElementById("d").value;
	if (d_cn !='vide'){
 if(res = file('php/affich_detail_noeud.php?id='+escape(d_cn)))
                         {

	document.getElementById("a_cn").innerHTML = res;
	}}
	else{
	document.getElementById("a_cn").innerHTML ="";
	}
}




//------------------------------------------------------------

function verif_consult_user(){
var mat=document.getElementById("mat_cu").value;
var nom=document.getElementById("nom_cu").value;
var dir=document.getElementById("dir_cu").value;
	
	if ((mat !='') || (nom !='') || (dir != 'vide')){
 if(res = file('php/consult_utilisateur2.php?mat='+escape(mat)+'&nom='+escape(nom)+'&dir='+escape(dir)))
                         { 

	document.getElementById("result_cu").innerHTML = res;
	}}
	else{
	document.getElementById("result_cu").innerHTML ="";
	}
}
//------------------------------------------------------------

function modifuser(idcompte,mat,nom,type,noeud,etat,mail,droits)
{var btn=' تشغيل الحساب';
e=1;
if(etat=='نشطة'){ btn='تعطيل الحساب';
e=0;}
var x="";
if(((type=='مدير النظام') && ( idcompte != '<? echo $compte;  ?>')) || (type=='كاتب')){
x="&nbsp;<input type='button' class='mybutton1' value='تعديل الانشطة المتاحة' id='4' onclick='modifuser2(4,"+idcompte+",\""+droits+"\",\""+type+"\",0)'></td>";
}

document.getElementById("result_cu").innerHTML ="<table class='tab' style=' border:dotted 2px' dir='rtl'><tr><td><b><font color='blue'>اسم المستعمل :</font></b></td><td><b>"+nom+"</b></td></tr><tr><td><b><font color='blue'>الرقم الالي :</font></b></td><td><b>"+mat+"</b></td></tr><tr><td><b><font color='blue'>البريد الالكتروني :</font></b></td><td id='mail_cu1'><b>"+mail+"</b></td></tr><tr><td><b><font color='blue'>نوع الحساب :</font></b></td><td><b>"+type+"</b></td></tr><tr><td><b><font color='blue'>الادارة :</font></b></td><td><b>"+noeud+"</b></td></tr><tr><td><b><font color='blue'>الحالة :</font></b><br/></td><td id='etat_cu'><b>"+etat+"</b><br/></td></tr><tr><td colspan='2'><br/>&nbsp;<input type='button' class='mybutton1' value='تعديل كلمة العبور' onclick='modifuser2(1,"+idcompte+",0,0,"+mat+")'>&nbsp;<input type='button' class='mybutton1' value='تعديل البريد الالكتروني' onclick='modifuser2(2,"+idcompte+",0,0,0)'>&nbsp;<input type='button' class='mybutton1' id='3' value='"+btn+"' onclick='modifuser2(3,"+idcompte+","+e+",0,0)'>"+x+"</tr></table><div id='m_cu'></div>";
}
//------------------------------------------------------------

function modifuser2(btn,id,x,type,mat){ //x contient ou bien etat ou b1 droits enciens .. id contien ou b1 mat ou b1 id compte

switch (btn) 
{ 
case 1:document.getElementById('m_cu').innerHTML="<br><hr/><br><br><center><form action='' method='POST' id='f3' name='f3' ><table dir='rtl'  width='70%' border='0' class='t_chad' cellspacing='0'><tr class='entete'>   <td colspan='2'>تعديل كلمة العبور </td></tr><tr></tr><tr><td width='50%' > كلمة العبور الجديدة:</td><td width='50%' align='center'><input name='nouv_mup' id='nouv_mup' type='password' dir='rtl'><input name='c' value='"+id+"' id='c' type='hidden' > <input name='mat_modif' value='"+mat+"' id='c' type='hidden' > </td></tr><tr><td width='50%' > تأكيد كلمة العبور الجديدة:</td><td width='50%' align='center'><input id='conf_mup' name='conf_mup' dir='rtl' type='password'> </td></tr><tr><td colspan='2' align='center'><input type='submit'  value='تسجيل' onclick='return valider_pwd2()' class='mybtn' width='20' height='22'></td></tr><tr><td colspan='2'><div align='center'  id='r_mup'>&nbsp;</div></td></tr></table></form></center>"; 
break;
case 2: document.getElementById('m_cu').innerHTML="<br><hr/><br><br><center><form action='' method='POST' id='f4'  name='f4' ><table dir='rtl' width='70%' border='0' class='t_chad' cellspacing='0'><tr class='entete'>   <td colspan='2'>تعديل البريد الالكتروني</td></tr><tr></tr><tr><td width='50%' > البريد الالكتروني :</td><td width='50%' align='center'><input id='nouv_mum' type='text' dir='rtl'> </td></tr><tr><td width='50%'> تأكيد البريد الالكتروني:</td><td width='50%' align='center'><input id='conf_mum' dir='rtl' type='text'>  </td></tr><tr ><td colspan='2' align='center'><input type='button'  value='تسجيل' onclick='valider_mail("+id+")' class='mybtn' width='20' height='22'></td></tr><tr><td colspan='2'><div align='center'  id='r_mum'>&nbsp;</div></td></tr></table></form></center>";
break;
case 3:
var b='تشغيل الحساب';
var conf='تعطيل الحساب';
var e='<b>معطلة</b>';
var etat=1;
if (x=='1'){ b='تعطيل الحساب';var conf='تشغيل الحساب';  e='<b>نشطة</b>'; etat=0}
if(confirm(' هل تريد '+conf+'؟ '))
   { 
if(res = file('php/modif_etat_compte.php?etat='+escape(x)+'&idc='+escape(id)))
{document.getElementById('m_cu').innerHTML='<div class="divz" id="532"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'532\');"></td></tr><tr><td><center>'+res+'</center></td></tr></table></div>';

document.getElementById('3').value=b;
document.getElementById('3').onclick=function(){modifuser2(3,id,etat,0,0);};
document.getElementById('etat_cu').innerHTML=e;
}   
else { document.getElementById('m_cu').innerHTML='<div class="divz" id="532"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'532\');"></td></tr><tr><td><center>! الرجاء اٍعادة المحاولة</center></td></tr></table></div>';}
 }
break;
case 4:
if(res = file('php/modif_droits.php?idc='+escape(id)+'&type='+escape(type)))
{ document.getElementById('m_cu').innerHTML=res;
for (var i=0;i<x.length;i++){
v='check'+i;
if(x.charAt(i)=='1')
document.getElementById(v).checked=true;
else
document.getElementById(v).checked=false;
}
}	
  
else { document.getElementById('m_cu').innerHTML="<center><br/><font color='#1C52BE'><b>! الرجاء اٍعادة المحاولة</b></font></center>";} 

break; 
}

}

//-------------------------------------------------------------
function valider_pwd2(){ //pour la modification de mot de passe

var nouv=document.getElementById('nouv_mup').value;
var conf=document.getElementById('conf_mup').value;
if (nouv == "" || conf == "" )
	{
	                     document.getElementById('r_mup').innerHTML = "<center>الرجاء ملئ كل الفراغات</center>";	
						 return false;
	} 
	else if(nouv!=conf)
	        {
	           document.getElementById('r_mup').innerHTML = "<center>كلمة العبور غير متطابقة</center>";
	return false;
	        }
	else if(nouv.length< 5)
		   {
	           document.getElementById('r_mup').innerHTML = "<center>كلمة العبور لا يمكن أن تكون أقصر من 5 حروف</center>";
	return false;
	       }

else if(confirm('هل تريد تعديل كلمة العبور ؟'))
   {
	$(document).ready(function(){
$('#f3').on('submit',function(e) {

	      $.ajax({
url:'php/modif_mtp2.php',
data:$(this).serialize(),
type:'POST',

success:function(data){
             document.getElementById('m_cu').innerHTML =data;
            },
            error:function(data){
			document.getElementById('m_cu').innerHTML ='<div class="divz" id="887"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'887\');"></td></tr><tr><td><center>لم يتم تغيير كلمة العبور! الرجاء اٍعادة المحاولة</center></td></tr></table></div>';}
 });
 e.preventDefault(); 
});
});
        }
		else{return false;
		}
}
//------------------------------------------------------------
function valider_mail(id) {
var nouv=document.getElementById('nouv_mum').value;
var conf=document.getElementById('conf_mum').value;

if (nouv == "" || conf == "" )
	{
	                     document.getElementById('r_mum').innerHTML = "<center>الرجاء ملئ كل الفراغات</center>";	
	} 
	else if(nouv!=conf)
	        {
	           document.getElementById('r_mum').innerHTML = "<center>البريد الالكتروني غير متطابق</center>";
	
	        }
else{

filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (filter.test(nouv)) {
if(confirm('هل تريد تعديل البريد الالكتروني لهذا المستعمل ؟'))
   {
if(res = file('php/modif_mail.php?nouv='+escape(nouv)+'&id_c='+escape(id)))
          {
             document.getElementById('mail_cu1').innerHTML ='<b>'+nouv+'</b>';
			 document.getElementById('m_cu').innerHTML =res; 
          }
             else { alert('لم يتم تغيير  البريد الالكتروني! الرجاء اٍعادة المحاولة');} 
}}
else
  {	   document.getElementById('r_mu').innerHTML = "<center>البريد الالكتروني غير صالح</center>";
  vouv="";
  conf="";
}
  }}
//------------------------------------------------------------
 
function modif_droits(type,id){
var d=get_droits(type);
  v = parseInt(d);
if((v==0) && (type=='a')){alert("الرجاء مراجعة الانشطة المتاحة لهذا المستعمل ");}
else{

if(res = file('php/modif_droits2.php?idc='+escape(id)+'&droits='+escape(d)))
          {
             document.getElementById('m_cu').innerHTML =res;
			 var b='تشغيل الحساب';

document.getElementById('4').onclick=function(){modifuser2(4,id,d,type,0);};



          }
             else { alert('الرجاء اٍعادة المحاولة');} 
} }
//------------------------------------------------------------
function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }

	 
//--------------------------------------------------------------------



function ajout_user1(){
var n=document.getElementById("d_aju").value;
var ext="";
if(n==1){ext="<option value='b'>مكتب الظبط</option>";} // ca veut dire que l'itilisateur a choisi la direction generale dnc on le donne la possibilité d'ajouter un compte bureau d'ordre
else{var ext="";}
if(n!='vide')
{document.getElementById("res_aju").innerHTML = "";
document.getElementById("compte_aju").innerHTML = "<td><div style='vertical-align:middle'> نوع الحساب :</div></td><td><select  dir='rtl' id=\"c_aju\" name=\"c_aju\" Onchange='ajout_user2()'><option  value='vide'>نوع الحساب</option><option  value='a'>مدير النظام</option><option  value='d'>مدير </option><option  value='s'>كاتب</option><option  value='g'>متصرف</option>"+ext+"</select></td>";		
}
else{
document.getElementById("compte_aju").innerHTML = "";
document.getElementById("mat_aju").innerHTML = "";
document.getElementById("res_aju").innerHTML = "";
document.getElementById("mail_aju").innerHTML = "";
document.getElementById("pwd_aju1").innerHTML = "";
document.getElementById("pwd2_aju1").innerHTML = "";

}
}

//--------------------------------------------------------------------


function ajout_user2(){
var c=null;

if(document.getElementById("c_aju")){
c=document.getElementById("c_aju").value;
}
if (c!='vide' && c!=null){
document.getElementById("mat_aju").innerHTML = "<td><div style='vertical-align:middle'>  الرقم الالي :</div></td><td><input type='text' dir='rtl' id='m_aju' name='m_aju' onBlur='ajout_user3()' onKeypress='return isNumberKey(event)'></td>";		

}
else{
document.getElementById("mat_aju").innerHTML = "";
document.getElementById("btn_aju").innerHTML = "";
document.getElementById("res_aju").innerHTML = "";
document.getElementById("mail_aju").innerHTML = "";
document.getElementById("pwd_aju1").innerHTML = "";
document.getElementById("pwd2_aju1").innerHTML = "";
}
}


//------------------------------------------------------------------------
function ajout_user3(){
var c=null;

if(document.getElementById('m_aju')){
c=document.getElementById('m_aju').value;
}
if (c!=''){
document.getElementById("pwd_aju1").innerHTML = "<td><div style='vertical-align:middle'> كلمة العبور :</div></td><td><input type='password' id='pw_aju' name='pw_aju'></td>";
document.getElementById("pwd2_aju1").innerHTML = "<td><div style='vertical-align:middle'> تاكيد كلمة العبور :</div></td><td><input type='password' onblur='ajout_user4()' id='pw2_aju' name='pw2_aju'></td>";

}
else{
document.getElementById("btn_aju").innerHTML = "";
document.getElementById("res_aju").innerHTML = "";
document.getElementById("pwd_aju1").innerHTML="";
document.getElementById("pwd2_aju1").innerHTML="";
}
}
//------------------------------------------------------------------------
function ajout_user4(){
var c=null;

if(document.getElementById('pw_aju')){
c=document.getElementById('pw_aju').value;
c2=document.getElementById('pw2_aju').value;
}
if(c!=c2){alert ('كلمة العبور غير متطابقة');
document.getElementById("btn_aju").innerHTML = "";
document.getElementById("res_aju").innerHTML = "";
document.getElementById("mail_aju").innerHTML = "";

}
else if (c.length<5){alert ('كلمة العبور لا يمكن أن تكون أقصر من 5 حروف');
document.getElementById("btn_aju").innerHTML = "";
document.getElementById("res_aju").innerHTML = "";
document.getElementById("mail_aju").innerHTML = "";

}
else{ 
document.getElementById("mail_aju").innerHTML = "<td><div style='vertical-align:middle'> البريد الالكتروني :</div></td><td><input type='text' id='ml_aju' name='ml_aju'></td>";
document.getElementById("btn_aju").innerHTML = "<td colspan='2'><center><input type='button' value='تاكيد' class='mybtn' id='b_aju' name='b_aju' onclick='verif_ajout_user()'></center></td>";		

}

}
//------------------------------------------------------------------------

function verif_ajout_user(){
  var mat=document.getElementById('m_aju').value;
  var n=document.getElementById('d_aju').value;
  var c=document.getElementById('c_aju').value;
  var mail=document.getElementById('ml_aju').value;
  var pwd=document.getElementById('pw_aju').value;
  var etat=0;
  if (mat!='')
 { 

    if(res = file('php/verif_mat_av_ajout.php?mat='+escape(mat)+'&n='+escape(n)+'&c='+escape(c)+'&mail='+escape(mail)+'&pwd='+escape(pwd)+'&etat='+escape(etat)))
	{
       document.getElementById("res_aju").innerHTML = res;   
	}
	
 }
}

//------------------------------------------------------------------------
function changer_etat_noeud(etat_act,id){
     var nouv_etat=1;
    var ch =1;
	
    if(etat_act==1){nouv_etat=0;}
    else{
	if(document.getElementById("ch")){
         if(!document.getElementById("ch").checked){
             ch =0;} }
        }

    if(res = file('php/modif_etat_noeud.php?etat='+escape(nouv_etat)+'&id='+escape(id)+'&ch='+escape(ch)))
         {   var a='تعطيل';
             if(nouv_etat==1){a='تشغيل';} 
             if(res>0){

	             alert(' لقد تم '+a+' الادارة');
	             affich_noeud();
	        }
	         if(res<=0){
	              alert(' لم يتم '+a+' الرجاء اعادة المحاولة الادارة ' );
	            }
		}
	
}
//------------------------------------------------------------------------------
function get_droits(type){
var nb=-1;
var d='';

if(type=='a'){
nb=9;
}
if(type=='s'){
nb=1;
}

for (var i=0; i<=nb;i++){
x='check'+i;
if(document.getElementById(x).checked)
d=d+'1';
else
d=d+'0';
}

return (d);
}
//-----------------------------------------------------------
function conf_ajout_user(){
 var mat=document.getElementById('m_aju').value;
  var n=document.getElementById('d_aju').value;
  var c=document.getElementById('c_aju').value;
  var mail=document.getElementById('ml_aju').value;
  var pwd=document.getElementById('pw_aju').value;
  var etat=0;
  var d=get_droits(c);
 
  var v="";
  
//verifier si occune case n'est coché (user sans droits!)
 
  v = parseInt(d);
if(v==0){alert("الرجاء مراجعة الانشطة المتاحة لهذا المستعمل ");}
else{
//insertion de nouveau user
if(res = file('php/ajout_user2.php?mat='+escape(mat)+'&nd='+escape(n)+'&c='+escape(c)+'&m='+escape(mail)+'&d='+escape(d)+'&pwd='+escape(pwd)+'&etat='+escape(etat)))
         {
		 document.getElementById("res_aju2").innerHTML = res;
		 document.getElementById("f_ajout").reset();
		 document.getElementById("btn_aju").innerHTML = "";
         document.getElementById("mail_aju").innerHTML = "";
         document.getElementById("pwd_aju1").innerHTML="";
         document.getElementById("pwd2_aju1").innerHTML="";
		 document.getElementById("mat_aju").innerHTML = "";
		 document.getElementById("compte_aju").innerHTML="";

		 }
}
}

//----------------------------------------------------------------------------
function valider_aj_priorite(){
var lbl=document.getElementById('lib').value;
var dur=document.getElementById('dur').value;
if(lbl=='' || dur=='')
{
    document.getElementById('r').innerHTML = "<center>الرجاء ملئ كل الفراغات</center>";	
}
else
{
 if(dur<1){document.getElementById('r').innerHTML ="<center>المدة لا يمكن ان تكون اقل من يوم واحد</center>"; }
else{
  document.getElementById('r').innerHTML ="&nbsp;";
   if(res = file('php/ajout_priorite2.php?lbl='+escape(lbl)+'&dur='+escape(dur)))
         {  document.getElementById('resajp').innerHTML=res;
		 }
		 else{
		 alert('الرجاء اٍعادة المحاولة')
		 }
	}
 }
}

//----------------------------------------------------------------------------
function valider_aj_type(){
var lbl=document.getElementById('alib_type').value;
var etat=document.getElementById('aetat_type').value;
  document.getElementById('r_ajt').innerHTML ="&nbsp;";
   if(res = file('php/ajout_type_courrier2.php?lbl='+escape(lbl)+'&etat='+escape(etat)))
         {  document.getElementById('resajt').innerHTML=res;
		 }
		 else{
		 alert('الرجاء اٍعادة المحاولة')
		 }
	

}
//------------------------------------------------------------------------------

function verif_consult_priorite(x){
var id=document.getElementById("id").value;
var lbl=document.getElementById("lib").value;
var dur=document.getElementById("dur").value;

	if ((x=='2') ||((id !='') || (lbl !='')|| (dur !=''))){
 if(res = file('php/consult_priorite2.php?id='+escape(id)+'&lbl='+escape(lbl)+'&dur='+escape(dur)+'&src='+escape(x)))
                         { 

	document.getElementById("result").innerHTML = res;
	}}
	else{
	document.getElementById("result").innerHTML ="";
	}
}
//------------------------------------------------------------------------------

function verif_consult_types(x){
var id=document.getElementById("id_type").value;
var lbl=document.getElementById("clib_type").value;
var etat=document.getElementById("etat_type").value;
	if ((x=='2') ||((id !='') || (lbl !='')|| (etat !='vide'))){
 if(res = file('php/consult_types2.php?id='+escape(id)+'&lbl='+escape(lbl)+'&src='+escape(x)+'&etat='+escape(etat)))
                         { 

	document.getElementById("result_type").innerHTML = res;
	}}
	else{
	document.getElementById("result_type").innerHTML ="";
	}
}
//------------------------------------------------------------------------------
function modifpriorite(id,lbl,dur){
document.getElementById("result").innerHTML ="</br></br></br><center><form action='' name='f'  ><table class='t_chad' dir='rtl' width='70%' border='0'  cellspacing='0'><tr class='entete'>   <td colspan='2'><div align='center' >تعديل الاولوية عدد "+id+" </td></tr><tr><td width='30%'> المعرّف :</td><td width='70%' align='center'><input  id='lib1' value='"+lbl+"' size='23' type='text' dir='rtl'>  </td></tr><tr><td width='30%' >المدة:</td><td width='70%' align='center'><input  value='"+dur+"' onKeypress=' return isNumberKey(event)' id='dur1' type='text' dir='rtl'>يوم </td></tr><tr><td colspan='2' align='center'><input type='button' id='btn'  value='تعديل' onclick='valider_modif_priorite("+id+")' class='mybtn' width='20' height='22'></td></tr><tr><td colspan='2' id='r_mpr'></td></tr></table></form><div id='r_mpr2'></div></center>";

}
//------------------------------------------------------------------------------

function valider_modif_priorite(id){
var lbl=document.getElementById('lib1').value;
var dur=document.getElementById('dur1').value;

if(lbl=='' || dur=='')
{
    document.getElementById('rmpr').innerText = "<center>الرجاء ملئ كل الفراغات</center>";	
}
else
{
 if(dur<1){document.getElementById('r_mpr').innerText ="<center>المدة لا يمكن ان تكون اقل من يوم واحد</center>"; }
else{
  document.getElementById('r_mpr').innerHTML ="&nbsp;";
  if(confirm('هل تريد تعديل هذه الاولوية ؟'))
   {
   if(res = file('php/modif_priorite.php?id='+escape(id)+'&lbl='+escape(lbl)+'&dur='+escape(dur)))
         {  
		 document.getElementById('r_mpr2').innerHTML='<div class="divz" id="888"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'888\');"></td></tr><tr><td><center>'+res+'</center></td></tr></table></div>';
		 document.getElementById('btn').disabled=true;
		 }
		 else{
		 document.getElementById('r_mpr2').innerHTML= '<div class="divz" id="888"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'888\');"></td></tr><tr><td><center>الرجاء اٍعادة المحاولة</center></td></tr></table></div>';
		 }}
	}
 }


}


//------------------------------------------------------------------------------
function modiftype(id,lbl,etat){
var e0="selected";
var e1="";
if (etat==1){ e1="selected";
 e0="";}
document.getElementById("result_type").innerHTML ="</br></br></br><center><form action='' name='f090'  ><table class='t_chad' dir='rtl' width='70%' border='0'  cellspacing='0'><tr class='entete'>   <td colspan='2'><div align='center' >تعديل نوع المراسلات عدد "+id+" </td></tr><tr><td width='30%'> المعرّف :</td><td width='70%' align='center'><input  id='lib_t' value='"+lbl+"' size='23' type='text' dir='rtl'>  </td></tr><tr><td width='30%' >الحالة:</td><td width='70%' align='center'><select  id='etat_t'  dir='rtl'><option "+e1+" value='1'>نشطة</option><option "+e0+" value='0'>معطلة</option></select></td></tr><tr><td colspan='2' align='center'><input type='button' id='btntp'  value='تعديل' onclick='valider_modif_type("+id+")' class='mybtn' width='20' height='22'></td></tr><tr><td colspan='2' id='r_mtp'></td></tr></table></form><div id='r_mtp2'></div></center>";

}
//------------------------------------------------------------------------------

function valider_modif_type(id){
var lbl=document.getElementById('lib_t').value;
var etat=document.getElementById('etat_t').value;

if(lbl=='' || etat=='')
{
    document.getElementById('r_mtp').innerText = "<center>الرجاء ملئ كل الفراغات</center>";	
}
else
{
 

  document.getElementById('r_mtp').innerHTML ="&nbsp;";
  if(confirm('هل تريد تعديل هذا النوع من المراسلات ؟'))
   {
   if(res = file('php/modif_type.php?id='+escape(id)+'&lbl='+escape(lbl)+'&etat='+escape(etat)))
         {  
		 document.getElementById('r_mtp2').innerHTML='<div class="divz" id="902"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'902\');"></td></tr><tr><td><center>'+res+'</center></td></tr></table></div>';
		 document.getElementById('btntp').disabled=true;
		 }
		 else{
		 document.getElementById('r_mtp2').innerHTML= '<div class="divz" id="902"><table  style="display:block" dir="rtl" class="tab2"><tr><td><input type="button" class="mybtn2" value="X" onclick="fermerform(\'902\');"></td></tr><tr><td><center>الرجاء اٍعادة المحاولة</center></td></tr></table></div>';
		 }}
	}
 


}
//------------------------------------------------------------------------------
function selectall(etat,deb,fin){
var x='';


for (var i=deb; i<=fin;i++){
var x='check'+i;
        if  (etat){
		document.getElementById(x).checked=true;
        }
		else
		{document.getElementById(x).checked=false;
        
		}
		}


}

//----------------------------------------------------------------------------

 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      } 
	  
	  //------------------------------------------------------------------------
	  
	  function quitter(){
	  
    res = file('php/quitter.php');
	
	  }
	  
	  
//------------------------------------------------------------------------------
//partie courrier_________________________________________________________________

function source_fichier(t,x){
y="dep";
if(t==2){y="arr";}

document.getElementById("source_"+y).innerHTML = "<center><label for='c_"+y+"' class='mybutton'>تحميل المراسلة</label><input type='file' name='c_"+y+"' onchange= 'readURL( "+t+",this)' id='c_"+y+"' style='position:absolute; top:-20000px;'/></center>";

}

//-------------------------------------------------------------------------------

function affichdoc(t,x) {
y="dep";
if(t==2){y="arr";}
document.getElementById("objet_"+y).innerHTML ="<object data='"+x+"' type='application/pdf' title='المراسلة' width='500' height='480'></object>";
}



//--------------------------------------------------------------------------------

function readURL(w,input){
var t='dep';

if(w==2){t='arr';}

var f=document.getElementById('c_'+t).value;
y=f.split('.').pop().toLowerCase();
if (input.files && input.files[0]){
var reader = new FileReader();
x='#objet_'+t;
var target="objet_"+t;
if(y=="pdf"){
      
              
                    
					
                   reader.onload = function (e)
                                          {document.getElementById(target).style.display = "block";
										  $(x).html('<object data="'+e.target.result+'" type="application/pdf" title="المراسلة" width="100%" height="100%"></object>');
                                             
                                          };
										  
                   reader.readAsDataURL(input.files[0]);
				   
                   }
				   else if ((y=="jpg") || (y=="jpeg") || (y=="png") || (y=="gif") )
                     {
				      
                   reader.onload = function (e)
                                          {document.getElementById(target).style.display = "block"; 
										  $(x).html('<img src="'+e.target.result+'"  width="500" height="520"></object>');
                                              
                                          };
										  
                   reader.readAsDataURL(input.files[0]);
				   
                   }else{
				   alert("الرجاءتحميل المراسلة على شكل صورة او ملف pdf");
				   document.getElementById('c_'+t).value="";
				   }
				   }
				   
				   
}

//----------------------------------------------------------------------------------------


function verif_dest_dep(){
x=document.getElementById('destn').value;
if(x=="0"){
document.getElementById("nom_dest").style.display='block';
}
else{
document.getElementById("nom_dest").style.display='none';
}
}
//-----------------------------------------------------------------------------------------

function verifform_arr(){
num=document.getElementById('num_src').value;
suj=document.getElementById('suj_arr').value;
sig=document.getElementById('sig_arr').value;
nat=document.getElementById('type_arr').value;
dat=document.getElementById('date_dep').value;

doc=""+document.getElementById('c_arr').value;

if((num!='') && (suj!='') && (sig!='') && (nat!='vide') && (dat!='') && (doc !='' )){
document.getElementById("attend").style.display = "block";	

		$(document).ready(function()
{
 
    var options = { 
   
    complete: function(response) 
    { 
	document.getElementById("form_arr").reset();
//créer fiche	
	document.getElementById("attend").style.display="block";
	       document.getElementById("attend").innerHTML="<table class='tab2' cellpadding='0' cellspacing='0'><tr><td dir='rtl'><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('attend').style.display = 'none'; \"></td></tr><tr><td><center><b>"+response.responseText+"<br></center></td></tr></table>";
document.getElementById("note").style.display="block";
        document.getElementById("note").innerHTML="<table width='100%'  height='100%' dir='rtl'><tr><td><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('note').style.display = 'none'; \"></td><tr><td><center><object width='880' height='485'  data='php/affich_note.php' type='application/pdf' ></object></center></td></tr></table>";
	
	
	
	
	
	document.getElementById("objet_arr").style.display="none";
    },
    error: function()
    { 
        document.getElementById("attend").innerHTML="<table class='tab2' cellpadding='0' cellspacing='0'><tr><td dir='rtl'><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('attend').style.display = 'none'; \"></td></tr><tr><td><center><b>لم تتم اضافة المراسلة الرجاء اعادة المحاولة<br></center></td></tr></table>";
		
 
    }
 
}; 
 
     $("#form_arr").ajaxForm(options);
 
});



 } 
	  else{ alert('الرجاء ملئ كل الفراغات');
	  document.getElementById("form_arr").reset();
	  return false;
	  }
}

//-----------------------------------------------------------------------------------------
function verif_form_dep(){ 
dest=document.getElementById('destn').value;
nomdest='true';
if(dest=='0'){
nom_dest=document.getElementById('nomdest').value;
if(nom_dest==''){nomdest='false';}
}

suj=document.getElementById('sujet_dep').value;

sig=document.getElementById('sig_dep').value;
nat=document.getElementById('type_dep').value;
prio=document.getElementById('prio_dep').value;



doc=""+document.getElementById('c_dep').value;


if((dest!='vide') && (nomdest=='true') && (suj!='') && (sig!='') && (nat!='vide') && (prio!='vide') && (doc !='' )){
document.getElementById("attend").style.display = "block";		
		$(document).ready(function()
{
 
    var options = { 
   
    complete: function(response) 
    {document.getElementById("form1").reset();
	document.getElementById("objet_dep").style.display="none";
       document.getElementById("attend").innerHTML="<table class='tab2' cellpadding='0' cellspacing='0'><tr><td dir='rtl'><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('attend').style.display = 'none'; \"></td></tr><tr><td><center><b>"+response.responseText+"<br></center></td></tr></table>";
    },
    error: function()
    {
        document.getElementById("attend").innerHTML="<div class='tab2'><b>لم تتم اضافة المراسلة الرجاء اعادة المحاولة<br><center><input type='button' value='اوافق' onclick= \"document.getElementById('attend').style.display = 'none'; \"></center></b></div>";
		
 
    }
 
}; 
 
     $("#form1").ajaxForm(options);
 
});



 } 
	  else{ alert('الرجاء ملئ كل الفراغات');
	  document.getElementById("form1").reset();
	  return false;
	  }
	 
}

//------------------------------------------------------------------------------------------
function chercher_dep_ext()
{
if(document.getElementById("destn_rcd").value=='0'){ document.getElementById("nomdest_rcdep1").innerHTML = "المرسل اليه:";
document.getElementById('nomdest_rcdep2').innerHTML = "<input type='text' maxlength='20' size='15' dir='rtl' id='nomdest_rcdep'>";}
 else { document.getElementById("nomdest_rcdep1").innerHTML= "&nbsp;";
document.getElementById("nomdest_rcdep2").innerHTML= "&nbsp;"; }
}

//-------------------------------------------------------------------------------------------
function chercher_courrier_dep(){
var id=document.getElementById("id_rcdep").value;
var noeud=document.getElementById("destn_rcd").value;
var dat_deb=document.getElementById("dat_rcdepde").value;
var dat_fin=document.getElementById("dat_rcdepau").value;
var sig=document.getElementById("sig_rcdep").value;
var typ=document.getElementById("typ_rcdep").value;
var typ=document.getElementById("suj_rcdep").value;
var nom_des="";
if(noeud=='0'){
nom_des=nom_des+document.getElementById('nomdest_rcdep').value;}

if ((id != "") || (sig !="") || (noeud !="vide") || (dat_deb !="") || (typ !="vide") || (suj_rcdep != "")){

$(document).ready(function(){
$('#formrech_dep').on('submit',function(e) {

$.ajax({
url:'php/chercher_courrier_dep2.php',
data:$(this).serialize(),
type:'POST',
success:function(data){

document.getElementById("res_rd").innerHTML=data;
},
error:function(data){
alert('الرجاء اعادة المحاولة');
}

});
e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
});
});

}
else{

document.getElementById("res_rd").innerHTML="";
return false;

}
}

//------------------------------------------------------------------------------------------
function chercher_courrier_ar(){
var id=document.getElementById("id_rcar").value;
var noeud=document.getElementById("noeud_rcar").value;
var dat_deb=document.getElementById("dat_rcarde").value;
var dat_fin=document.getElementById("dat_rcarau").value;
var sig=document.getElementById("sig_rcar").value;
var typ=document.getElementById("typ_rcar").value;
var etat=document.getElementById("etat_rcar").value;
var suj=document.getElementById("suj_rcar").value;
if ((id != "") || (sig !="") || (suj !="") || (noeud !="vide") || (dat_deb !="") || (typ !="vide") || (etat !="vide")){

$(document).ready(function(){
$('#formrech_ar').on('submit',function(e) {

$.ajax({
url:'php/chercher_courrier_ar2.php',
data:$(this).serialize(),
type:'POST',
success:function(data){
document.getElementById("res_ra").innerHTML="";
document.getElementById("res_ra").innerHTML=data;
},
error:function(data){
alert('الرجاء اعادة المحاولة');
}

});
e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
});
});

}
else{

document.getElementById("res_ra").innerHTML="";
return false;

}
}

//------------------------------------------------------------------------------------------

function affichcourrier(d,id_c,compte_dep) { //afficher le contenue d'un courrier'champ doc'

if((d=='doc3') || (d=='doc2')){ // des div doc2 de consult-courrier-arriv et doc3  de chercher_courrier_arr ;;; les courrier arrivé on un traitement ou transmission
var d1='couv2';
if(d=='doc3'){   d1='couv3';}
if(res = file('php/transmission_traitement_courrier_arr.php?id='+escape(id_c)+'&d='+escape(d)+'&d1='+escape(d1)+'&compte_dep='+escape(compte_dep)))
         { if(d=='doc3'){document.getElementById("couv3").style.display = "block";}
		 else{document.getElementById("couv2").style.display = "block";}
		 document.getElementById(d).style.display = "block";
		         document.getElementById(d).innerHTML=res;

		 }
}
else if(d=='taches_ar'){
document.getElementById("couv2").style.display = "block";
        document.getElementById(d).innerHTML="<object width='880' height='485'  data='php/affich_courrier.php?idc="+id_c+"' type='application/pdf' ></object></center>";

}
else{
document.getElementById("couv1").style.display = "block";
document.getElementById(d).style.display = "block";

        document.getElementById(d).innerHTML="<object width='880' height='485'  data='php/affich_courrier.php?idc="+id_c+"' type='application/pdf'></object><br><center><input style='position: absolute; opacity:1;right:0; top:0; z-index: 1;' type='button' class='mybtn2' value='X' onclick= \"document.getElementById('"+d+"').style.display = 'none'; document.getElementById('couv1').style.display = 'none';  \"></center>";

}		
}
//------------------------------------------------------------------------------------------
function affichformtrt(d,id_c,e,compte_dep){

 document.getElementById(d).innerHTML='<form action=""  id="formtrt_ar" name="formtrt_ar"   method="POST"><table border="0" width="880" height="470" class="tab" dir="rtl" ><tr  width="100%" height="50" class="th2"><td colspan="2"><center> معالجة المراسلةعدد '+id_c+'</center></td></tr><tr><td id="restrt"><center><table width="300" height="300"><tr><td >  <p class="txt">المعالجة: </p></td><td><textarea maxlength="254" style="resize:none;"  rows="4" dir="rtl" cols="30"  name="txt_trait" id="txt_trait" onfocus="if(this.value==\'الرجاء صياغة تفاصيل المعالجة هنا\')this.value=\'\';">الرجاء صياغة تفاصيل المعالجة هنا</textarea></td></tr><tr><td colspan="2"><input type="hidden" name="cmt_dep_c_ar" id="cmt_dep_c_ar" value="'+compte_dep+'"><center><input type="hidden" name="id_courrier_trt"  value="'+id_c+'" /><input type="submit" class="mybtn" onclick="return traitement_courrier()" value="تسجيل"></center></td></tr></table></td></tr></table></form>';
}
//------------------------------------------------------------------------------------------

function traitement_courrier(){
var test=true;
if((document.getElementById("txt_trait").value=='') || (document.getElementById("txt_trait").value=='الرجاء صياغة تفاصيل المعالجة هنا')){
alert('الرجاء اظافة تفاصيل معالجة هذه المراسلة');
test=false;
}
if(test==true){

$(document).ready(function(){
$('#formtrt_ar').on('submit',function(e) {

$.ajax({
url:'php/traitement_courrier_ar2.php',
data:$(this).serialize(),
type:'POST',
success:function(data){
fermerform("btn_trt");
document.getElementById("formtrt_ar").reset();
document.getElementById("restrt").innerHTML="<center><p class='txt'>"+data+"</p></center>";

},
error:function(data){
alert('الرجاء اعادة المحاولة');
}

});
e.preventDefault(); 
});
});

}
else{
return false;
}
}
//------------------------------------------------------------------------------------------
function liste_compte_noeud (x){
var n=document.getElementById("noeud_trs").value;
if(n==x){ //si c  transmission interne indiquer qui et ajouter instructions sinn ajouter notes
document.getElementById("lstcmttr").style.display = "table-row";
document.getElementById("trinstruction").style.display = "table-row";
document.getElementById("not").style.display = "none";
}
else if((document.getElementById("lstcmttr")) && (document.getElementById("trinstruction"))){
document.getElementById("not").style.display = "table-row";
document.getElementById("lstcmttr").style.display = "none";
document.getElementById("trinstruction").style.display = "none";
}
}
//-------------------------------------------------------------------------------------------

function fermerform(d){

document.getElementById(d).style.display = "none";
}
//-------------------------------------------------------------------------------------------
function instruction(){
if(document.getElementById("txt_instruction").value==0){
document.getElementById("inst").style.display ="table-row";
}
else{
document.getElementById("inst").style.display ="none";
}
}

//-------------------------------------------------------------------------------------------

function verif_form_transmetre_courrier_arr(d){
var test=true;
if(document.getElementById("noeud_trs").value =='vide'){test=false;
alert('الرجاء تحديد وجهة المراسلة');
}
else if((document.getElementById("noeud_trs").value=='<? echo $nd; ?>') && (document.getElementById("dest_trs").value =='vide')){test=false;
alert('الرجاء تحديد المرسل اليه');
}
else if((document.getElementById("noeud_trs").value=='<? echo $nd; ?>') && (document.getElementById("txt_instruction").value =='vide')){test=false;
alert('الرجاء اظافة التعليمات');
}
else if((document.getElementById("txt_instruction").value=='0') && (document.getElementById("autre_instructions").value =='')){test=false;
alert('الرجاء اظافة التعليمات');
}
if(test==true){

$(document).ready(function(){
$('#formtrs_ar').on('submit',function(e) {

$.ajax({
url:'php/transmission_courrier_ar2.php',
data:$(this).serialize(),
type:'POST',
success:function(data){
document.getElementById("formtrs_ar").reset();
fermerform("lstcmttr");
fermerform("trinstruction");
fermerform("inst");

alert(data);

},
error:function(data){
document.getElementById("formtrs_ar").reset();
alert('الرجاء اعادة المحاولة');
}

});
e.preventDefault(); 
});
});

}
else{
return false;
}

}
//-------------------------------------------------------------------------------------------
function affichsuivi(d,id,etat){
document.getElementById(d).innerHTML="<table width='880' height='485' class='tab' dir='rtl' ><tr><td><center><img src='IMAGES/gif_attente.gif'></center></td></tr></table>";



$.ajax({
url:'php/suivi_courrier_ar.php?id='+id+'&etat='+etat,
data:$(this).serialize(),
type:'GET',
success:function(data){

document.getElementById(d).innerHTML=data;
},
error:function(data){
alert('الرجاء اعادة المحاولة');
}

});

}
//-------------------------------------------------------------------------------------------



//-------------------------------------------------------------------------------------------
function cloture(){
if(document.getElementById("anneecloture").value<2014){
document.getElementById("fclr").innerHTML="<div class='divz' id='66'><table class='tab2'  dir='rtl'><tr><td><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('66').style.display = 'none'; \"></td></tr><tr><td><p align='center'>الرجاء التثبت من السنة</p></td></tr></table></div>";
return false;
}

else{
document.getElementById("fclr").style.display ="block";
document.getElementById("btncloture").style.display ="none";

$(document).ready(function(){
$('#fcloture').on('submit',function(e) {

$.ajax({
url:'php/cloture2.php',
data:$(this).serialize(),
type:'POST',
success:function(data){

document.getElementById("fclr").innerHTML="<div class='divz' id='66'><table class='tab2'  dir='rtl'><tr><td><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('66').style.display = 'none'; \"></td></tr><tr><td><p align='center'>"+data+"</p></td></tr></table></div>";
},
error:function(data){
document.getElementById("fclr").innerHTML="<div class='divz' id='66'><table class='tab2'  dir='rtl'><tr><td><input class='mybtn2' type='button' value='X' onclick= \"document.getElementById('66').style.display = 'none'; \"></td></tr><tr><td><p align='center'>الرجاء اعادة المحاولة</p></td></tr></table></div>";
}

});
e.preventDefault(); 
});
});


}

}
//-----------------------------------------------------------------------------------------------
function statistique(){

//comparer deux dates
var dat1=document.getElementById("ddestat").value;
var dat2=document.getElementById("daustat").value;
var d1 = Date.parse(dat1); 
var d2 = Date.parse(dat2); 
 var diff = d1-d2;
if((diff>0)||(dat1=="") || (dat2=="")){
alert("الرجاءالتثبت من التواريخ");

}
else{


document.getElementById("resstat").innerHTML="<object data='php/stat2.php?d1="+dat1+"&d2="+dat2+"' type='application/pdf' title='الاحصائيات' width='800' height='450'></object>";
}

}



