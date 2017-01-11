<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="header"></div>
	<h1>Admin Panel</h1>
			<form name="form1" action="" method="post">
			<input type="text" id="txtnameins" placeholder="name"> <input
				type="text" id="txtuserNameins" placeholder="enter user name"> <input
				type="button" id="but1" value="insert" onClick="ins();">
		</form><br />
		
		<div id="disp_data"></div>
		
		
		<script type="text/javascript"> 
disp_data();
function disp_data()
{
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","update.php?status=disp",false);
xmlhttp.send(null);
document.getElementById("disp_data").innerHTML=xmlhttp.responseText;

}

function aa(a)
{
nameid="name"+a;
txtnameid="txtname"+a;
var name=document.getElementById(nameid).innerHTML;
document.getElementById(nameid).innerHTML="<input type='text' value='"+name+"' id='"+txtnameid+"'>";

userNameid="userName"+a;
txtuserNameid="txtuserName"+a;
var userName=document.getElementById(userNameid).innerHTML;
document.getElementById(userNameid).innerHTML="<input type='text' value='"+userName+"' id='"+txtuserNameid+"'>";

passwordid="password"+a;
txtpasswordid="txtpassword"+a;
var password=document.getElementById(passwordid).innerHTML;
document.getElementById(passwordid).innerHTML="<input type='text' value='"+password+"' id='"+txtpasswordid+"'>";

updateid="update"+a;
document.getElementById(updateid).style.visibility="visible";
}


function bb(b)
{

var nameid="txtname"+b;
var name=document.getElementById(nameid).value;

var userNameid="txtuserName"+b;
var userName=document.getElementById(userNameid).value;

var passwordid="password"+b;
var password=document.getElementById(passwordid).value;


update_value(b,name,userName,password);

document.getElementById(b).style.visibility="visible";
document.getElementById("update"+b).style.visibility="hidden";

document.getElementById("name"+b).innerHTML=name;
document.getElementById("userName"+b).innerHTML=userName;
document.getElementById("password"+b).innerHTML=password;


}

function update_value(id,name,userName,password)
{
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","update.php?id="+id+"&name="+name+"&password="+password+"&userName="+userName+"&status=update",false);
xmlhttp.send(null);


}
function delete1(id)
{
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","update.php?id="+id+"&status=delete",false);
	xmlhttp.send(null);
	disp_data();
	


}
function ins()
{
	
var name=document.getElementById("txtnameins").value;
var userName=document.getElementById("txtuserNameins").value;

var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","update.php?name="+name+"&userName="+userName+"&status=ins",false);
xmlhttp.send(null);

disp_data();

document.getElementById("txtnameins").value="";
document.getElementById("txtuserNameins").value="";

}


</script>


	





</body>
</html>