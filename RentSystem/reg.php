<?php
session_start();
$con=mysql_connect("localhost","root","root");
if (!$con)
    echo"Could not connect";

mysql_select_db("rentmanagement",$con);
if (!$con)
{
    echo"Could not connect";
}
$user = $_POST['uname'];

$user1="insert into user(`UserName`, `UserPassword`, `UserEmail`, `UserFirstName`, `UserLastName`, `UserOccupation`, `UserOccupationDetails`,
                         `UserDOB`, `UserGender`, `UserLocation`, `UserZone`, `UserCity`, `UserType`, `UserContacts`, `UserContactLandLine`)
VALUES ('$_POST[uname]','$_POST[pw]','$_POST[email]','$_POST[fname]','$_POST[lname]','$_POST[occupation]','$_POST[occupationd]',
          '$_POST[UserDOB]','$_POST[gender]','$_POST[location]','$_POST[zone]','$_POST[city]','$_POST[usertype]','$_POST[contact]','$_POST[contactland]')";


if(mysql_query($user1,$con)){
   // die("error".mysql_error());
    $_SESSION['Userfname']= $user;
    header('location:profile.php');

    echo "sucess";
}
else {

    die("error".mysql_error());
}
mysql_close($con);
?>