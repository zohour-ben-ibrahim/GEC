<?session_start();
error_reporting(E_ERROR);
?>
var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src ='cnf_f1.js';
 
 
    Ext.onReady(function() {

        Ext.QuickTips.init();

        Ext.state.Manager.setProvider(Ext.create('Ext.state.CookieProvider'));

        var viewport = Ext.create('Ext.Viewport', {
            id: 'border-example',
            layout: 'border',
            items: [
            // create instance immediately
            Ext.create('Ext.Component', {
                region: 'north',
                height: 100, 
                autoEl: {
                    tag: 'div',
                    html:'<div><img id="picture" src="resources/banniere.png"  WIDTH=100% HEIGHT=100></div>'
				 
                }
            }), {   xtype: 'panel',
                region: 'east',
                stateId: 'navigation-panel',
                id: 'east-panel', 
                title: 'الاختيارات',
				autoScroll: true,
				titleAlign: 'center',
                split: true,
                width: 220,
                minWidth: 220,
                maxWidth: 220,
                collapsible: true,
                animCollapse: true,
                margins: '0 0 0 5',
				 layout: 'accordion',
             
                items: [ <? $x= $_SESSION['type'];
				$dr=$_SESSION['droits'];
				$virgul=0;
                 if(($x=='a') && (((int)(substr($dr,0, 3))!=0 )) && (substr($dr,0, 3) !='010')){ // la 3 ème condition pour vérifier si on a donner le droit de modifier seulement==>car on consult puis modif
				 $virgul++;
				 echo"{
                    contentEl: 'east2',
                    title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة الإدارات</center></b></font>',
                    iconCls: 'dir'
					
                }";}
				if (($x=='a') && (((int)(substr($dr,3, 3))!=0 )) && (substr($dr,3, 3) !='010')){
				if ($virgul!=0)echo ',';
                 $virgul++;
				 echo "{
       				contentEl: 'east3', 
                    title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة المستعملين</center></b></font>', 
					iconCls: 'user' 
                }";}
				if (($x=='a') && (((int)(substr($dr,6, 3))!=0 )) && (substr($dr,6, 3) !='010')){
				if ($virgul!=0)echo ',';
                 $virgul++;
				 
				 echo "{ 
				    contentEl: 'east4', 
                    title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة أولويّات المراسلات</center></b></font>',
					iconCls: 'prio' 
                }";}
				if ($x=='a'){
				if ($virgul!=0)echo ',';
                 $virgul++;
				echo "{ 
				    contentEl: 'east10', 
                    title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة انواع المراسلات</center></b></font>',
					iconCls: 'type' 
                }";}
				if (($x=='a') && (((int)(substr($dr,9, 1))!=0 ))){
				if ($virgul!=0)echo ',';
                 $virgul++;
				 
				 echo "{ 
				    contentEl: 'east5', 
                    title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة الوضعيّات السّنويّة</center></b></font>',
					iconCls: 'clot' 
                }";}
				if ($virgul!=0)echo ',';
                 
                 if ($x!='a'){  echo "{
                    contentEl: 'east8', 
					title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة المراسلات الواردة</center></b></font>',
					iconCls: 'c_arr'
                },";
				if($x != 'b'){ echo"
				{
                    contentEl: 'east7', 
					title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>متابعة المراسلات الصّادرة</center></b></font>',
					iconCls: 'c_dep'
                },";}}
				if($x=='d'){
				echo "{
				    contentEl: 'east6', 
                    title: '<font color=\"#0D06A0\" style=\"Times News Roman\"  size= \"2px\" ><b><center>متابعة الإحصائيّات</center></b></font>',
                    iconCls: 'stat'
                },";}
				?> {
                    contentEl: 'east9', 
					title: '<font color=\"#0D06A0\" style=\"Times News Roman\" size= \"2px\" ><b><center>تعديل الحساب</center></b></font>',
					iconCls: 'settings'
                } 
				]
            }, {
                
                region: 'west',
                title: 'المستعمل',
               titleAlign: 'center',
			   items:[{
                    contentEl: 'west1'
					
                },
            {
                                    xtype: 'datemenu',
                                    floating: false,
									align:'bottom',
									 margins: '10 0 0 0'
                                },{
                    contentEl: 'west2'
					
                }],
           
				
                animCollapse: true,
                collapsible: true,
				autoScroll: true,
                split: true,
                width: 225, 
                minSize: 175,
                maxSize: 400,
                margins: '0 5 0 0',
                activeTab: 1,
                tabPosition: 'bottom',
				 
            }
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		,
            Ext.create('Ext.tab.Panel', {
                region: 'center',
                id: 'center',
				deferredRender: false,
				autoScroll: true,
                activeTab: 0,    
				 id: 'center-panel',
                items: [{
                    contentEl: 'center1',
                    title: 'صفحة الاستقبال',
                    iconCls: 'tabs',
					 closable:true,
                    autoScroll: true
                } ]
            })]
        });
		 
		
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  Ext.get("noeud1").on('click', function(){ addTab_noeud1(true);showUser_noeud1('1');  });// الاطلاع على الادارات
		  Ext.get("noeud2").on('click', function(){ addTab_noeud2(true);showUser_noeud2('1');  });// اضافة ادارة
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 		  Ext.get("user1").on('click', function(){ addTab_user1(true);showUser_user1('1');  });// الاطلاع على المستعملين
		  Ext.get("user2").on('click', function(){ addTab_user2(true);showUser_user2('1');  });// اضافة مستعمل
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  Ext.get("prio1").on('click', function(){ addTab_prio1(true);showUser_prio1('1');  });// الاطلاع على اولويات المراسلات
		  Ext.get("prio2").on('click', function(){ addTab_prio2(true);showUser_prio2('1');  });// اضافة اولوية مراسلات
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		  Ext.get("clot1").on('click', function(){ addTab_clot1(true);showUser_clot1('1');  });// غلق الوضعية السنوية 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  Ext.get("stat1").on('click', function(){ addTab_stat1(true);showUser_stat1('1');  });// الاطلاع على الاحصائيات
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  Ext.get("cour_dep1").on('click', function(){ addTab_cour_dep1(true);showUser_cour_dep1('1');  });// الاطلاع على المراسلات الصادرة
		  Ext.get("cour_dep2").on('click', function(){ addTab_cour_dep2(true);showUser_cour_dep2('1');  });// اضافة مراسلة
		  Ext.get("cour_dep3").on('click', function(){ addTab_cour_dep3(true);showUser_cour_dep3('1');  });// البحث عن مراسلة صادرة
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  Ext.get("cour_arr1").on('click', function(){ addTab_cour_arr1(true);showUser_cour_arr1('1');  });// الاطلاع على المراسلات الواردة
		 
		  Ext.get("cour_arr2").on('click', function(){ addTab_cour_arr2(true);showUser_cour_arr2('1');  });// البحث عن مراسلة واردة
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		  Ext.get("pwd1").on('click', function(){ addTab_pwd1(true);showUser_pwd1('1');  });// تعديل كلمة العبور
		  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  Ext.get("type1").on('click', function(){ addTab_type1(true);showUser_type1('1');  });// الاطلاع على المراسلات الواردة
		 
		  Ext.get("type2").on('click', function(){ addTab_type2(true);showUser_type2('1');  });// البحث عن مراسلة واردة
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    });
 	
	
	
function addTab_noeud1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('consult');
if (childPanel) {w.setActiveTab('conslut');}else{ w.add({closable: !!closable,id: 'consult',autoScroll: true,iconCls: 'dir',html:'<div id="txtHint_noeud1"></div>',title: 'الاطلاع على الادارات'}).show(); }}

function addTab_noeud2 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('rech_noeud2');
if (childPanel) {w.setActiveTab('rech_noeud2');}else{ w.add({closable: !!closable,id: 'rech_noeud2',autoScroll: true,iconCls: 'dir',html:'<div id="txtHint_noeud2"></div>',title: 'اضافة ادارة'}).show(); }}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_user1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_user1');
if (childPanel) {w.setActiveTab('res_user1');}else{ w.add({closable: !!closable,id: 'res_user1',autoScroll: true,iconCls: 'user',html:'<div id="txtHint_user1"></div>',title: 'الاطلاع على المستعملين'}).show(); }}

function addTab_user2 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('rech_user2');
if (childPanel) {w.setActiveTab('rech_user2');}else{ w.add({closable: !!closable,id: 'rech_user2',autoScroll: true,iconCls: 'user',html:'<div id="txtHint_user2"></div>',title: 'اضافة مستعمل'}).show(); }}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_prio1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_prio1');
if (childPanel) {w.setActiveTab('res_prio1');}else{ w.add({closable: !!closable,id: 'res_prio1',autoScroll: true,iconCls: 'prio',html:'<div id="txtHint_prio1"></div>',title: 'الاطلاع على اولويات المراسلات'}).show(); }}

function addTab_prio2 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_prio2');
if (childPanel) {w.setActiveTab('res_prio2');}else{ w.add({closable: !!closable,id: 'res_prio2',autoScroll: true,iconCls: 'prio',html:'<div id="txtHint_prio2"></div>',title: 'اضافة اولوية مراسلات'}).show(); }}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
function addTab_clot1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_clot1');
if (childPanel) {w.setActiveTab('res_clot1');}else{ w.add({closable: !!closable,id: 'res_clot1',autoScroll: true,iconCls: 'clot',html:'<div id="txtHint_clot1"></div>',title: 'غلق الوضعية السنوية'}).show(); }}
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_stat1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_stat1');
if (childPanel) {w.setActiveTab('res_stat1');}else{ w.add({closable: !!closable,id: 'res_stat1',autoScroll: true,iconCls: 'stat',html:'<div id="txtHint_stat1"></div>',title: 'الاطلاع على الاحصائيات'}).show(); }}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_cour_dep1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_cour_dep1');
if (childPanel) {w.setActiveTab('res_cour_dep1');}else{ w.add({closable: !!closable,id: 'res_cour_dep1',autoScroll: true,iconCls: 'c_dep',html:'<div id="txtHint_cour_dep1"></div>',title: 'الاطلاع على المراسلات الصادرة'}).show(); }}

function addTab_cour_dep2 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_cour_dep2');
if (childPanel) {w.setActiveTab('res_cour_dep2');}else{ w.add({closable: !!closable,id: 'res_cour_dep2',autoScroll: true,iconCls: 'c_dep',html:'<div id="txtHint_cour_dep2"></div>',title: 'اضافة مراسلة'}).show(); }}
 
function addTab_cour_dep3 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_cour_dep3');
if (childPanel) {w.setActiveTab('res_cour_dep3');}else{ w.add({closable: !!closable,id: 'res_cour_dep3',autoScroll: true,iconCls: 'c_dep',html:'<div id="txtHint_cour_dep3"></div>',title: 'البحث عن مراسلة صادرة'}).show(); }}
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_cour_arr1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_cour_arr1');
if (childPanel) {w.setActiveTab('res_cour_arr1');}else{ w.add({closable: !!closable,id: 'res_cour_arr1',autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_cour_arr1"></div>',title: 'الاطلاع على المراسلات الواردة'}).show(); }}

function addTab_cour_arr2 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_cour_arr2');
if (childPanel) {w.setActiveTab('res_cour_arr2');}else{ w.add({closable: !!closable,id: 'res_cour_arr2',autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_cour_arr2"></div>',title: 'البحث عن مراسلة واردة'}).show(); }}
 
function addTab_cour_arr3 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_cour_arr3');
if (childPanel) {w.setActiveTab('res_cour_arr3');}else{ w.add({closable: !!closable,id: 'res_cour_arr3',autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_cour_arr3"></div>',title: ' اضافة مراسلة واردة'}).show(); }}
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_pwd1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('res_pwd1');
if (childPanel) {w.setActiveTab('res_pwd1');}else{ w.add({closable: !!closable,id: 'res_pwd1',autoScroll: true,iconCls: 'settings',html:'<div id="txtHint_pwd1"></div>',title: 'تعديل كلمة العبور'}).show(); }} 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addTab_type1 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('type1');
if (childPanel) {w.setActiveTab('type1');}else{ w.add({closable: !!closable,id: 'type1',autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_type1"></div>',title: 'الاطلاع على انواع المراسلات'}).show(); }}

function addTab_type2 (closable) {  var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('type2');
if (childPanel) {w.setActiveTab('type2');}else{ w.add({closable: !!closable,id: 'type2',autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_type2"></div>',title: 'اضافة انواع المراسلات'}).show(); }}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function consult_courrier(id){
var id_panel='courrier'+id;
var url ="php/consult_courrier.php?id_c="+id;
var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent(id_panel);
if (childPanel) {w.setActiveTab(id_panel);}else{ w.add({closable: 1,id: id_panel,autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_'+id_panel+'"></div>',title: 'الاطلاع على المراسلة عدد'+id}).show(); }

if (window.XMLHttpRequest)  {  xmlhttp=new XMLHttpRequest();   }  else  {  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  }
xmlhttp.onreadystatechange=function()  
{ ;if (xmlhttp.readyState==4 && xmlhttp.status==200) {document.getElementById("txtHint_"+id_panel).innerHTML=xmlhttp.responseText;}} 
xmlhttp.open("GET",url);xmlhttp.send();
} 


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ajout_courrier_arr(){
var url ="php/ajout_courrier_arriv.php";
var w = Ext.getCmp('center-panel');var childPanel = Ext.getCmp('center-panel').getComponent('cour_arr3');
if (childPanel) {w.setActiveTab('cour_arr3');}else{ w.add({closable: 1,id: 'cour_arr3',autoScroll: true,iconCls: 'c_arr',html:'<div id="txtHint_cour_arr3"></div>',title: 'اضافة مراسلة واردة'}).show(); }

if (window.XMLHttpRequest)  {  xmlhttp=new XMLHttpRequest();   }  else  {  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");  }
xmlhttp.onreadystatechange=function()  
{ ;if (xmlhttp.readyState==4 && xmlhttp.status==200) {document.getElementById("txtHint_cour_arr3").innerHTML=xmlhttp.responseText;}} 
xmlhttp.open("GET",url);xmlhttp.send();
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
<? ?>
