<?php  if(!isset($_SESSION)) {session_start();} ?>
<?php

if($_SESSION['donorstatus']=="")
{
  header("location:log1.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>BLOODBANK.IN</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/side.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<?php include_once('headerdonor.php') ?>
<!-- ################################################################################################ -->
<?php
			
	$cn=mysqli_connect("localhost","root","","bb");
    $s="select * from reg where mail='" . $_SESSION["mail"] . "'";
			
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
	
	$data=mysqli_fetch_array($q);
	$name=$data[0];
	$gender=$data[5];
	$bdate=$data[9];
	$mobile=$data[1];
	//echo $name;
	mysqli_close($cn);
	
		
		
	
	

?> 
<div class="wrapper row3" align="left">
<main class="hoc container clear"> 
<div style="height:600px; width:700px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid white; box-shadow:6px 1px 20px black;">
 <form method="post">

    <table cellpadding="0" cellspacing="0" width="600px"  class="tableborder" style="margin:auto">

    <tr style="background-color:black; color: white;"><td style="padding-bottom:40px" colspan="2" align="center"><h1>Update Profile</h1></td></tr>
   
     <tr><td colspan="2">&nbsp;</td></tr>
     <table cellpadding="0" cellspacing="0" width="600px"  class="tableborder" style="margin:auto">
    <tr>

    <td style="vertical-align:top" width="450px" height="400px">
                <table cellpadding="0" cellspacing="0" width="450px">
   <td style="vertical-align:top; padding-left:70px" width="500px">
   <table cellpadding="0" cellspacing="0" width="450px" align="center" >
    <tr><td class="lefttd"  style="vertical-align:middle"> Name </td><td><input type="text" name="t1" value="<?php echo @$name;  ?>"  required="required" pattern="[a-zA-Z _]{5,15}" title="please enter only character  between 5 to 15 for  name" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td class="lefttd">Gender</td><td><input name="r1" type="radio" value="male"  <?php  if($gender=="male"){ echo "checked" ;}  ?>>Male<input name="r1"  type="radio" value="female" <?php if($gender=="female"){ echo "checked" ;}  ?> />Female</td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td class="lefttd"  style="vertical-align:middle"> Brthdate</td><td><input type="date" name="t2"  required="required" pattern="[0-9]{2,2}" title="please enter only numbers  between 2 to 2 for age" value="<?php echo @$bdate;?>" /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr><td class="lefttd"  style="vertical-align:middle"> Mobile No</td><td><input type="text" name="t3" value="<?php echo @$mobile;?>"  pattern="[0-9]{10,12}" title="please enter only numbers between 10 to 12 for mobile no." /></td></tr>
         <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
         
		<tr><td>&nbsp;</td><td><input type="submit" value="Update" name="sbmt" style="border:0px; background:linear-gradient(#900, #00CCFF); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr>	
        
        <tr><td colspan="2"  align="center"></td></tr>
        
		</table></table></td></tr>	</table></form>
	</div>
 
     
   
<?php
	
	if(isset($_POST["sbmt"])) 
	{
		$cn=mysqli_connect("localhost","root","","bb");
		
		
					$s="update reg set name='" .$_POST["t1"]. "' ,gender='" .$_POST["r1"]."' , bdate='" .$_POST["t2"]. "',phone='" .$_POST["t3"]. "' where mail='" .$_SESSION["mail"]. "'";
		
$i=mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record update');</script>";
	
}
?> 
 
        

    </main>
</div>

<!-- ################################################################################################ -->
<?php include_once('footer.php') ?>
</body>
</html>