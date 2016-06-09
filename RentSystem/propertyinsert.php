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


$userid = $_SESSION['userid'];

$PropertyDetails = $_POST['PropertyDetails'];
$PropertyType = $_POST['PropertyType'];
$PropertyPrice = $_POST['PropertyPrice'];
$PropertyStatus = $_POST['PropertyStatus'];
$PropertyPhoto = $_POST['PropertyPhoto'];
$LocationZone = $_POST['LocationZone'];
$LocationDistrict = $_POST['LocationDistrict'];
$LocationCity = $_POST['LocationCity'];
$LocationStreetName = $_POST['LocationStreetName'];
$LocationTole = $_POST['LocationTole'];


$target_dir= "images/";
$fullpath = 'C:/Users/Nikesh/Desktop/BIM/phpclass/softwares/UniServerZ/www/RentSystem/';
$target_file=$target_dir . basename($_FILES["PropertyPhoto"]["name"]);
$tmpname = $_FILES["PropertyPhoto"]["tmp_name"];
if(move_uploaded_file($tmpname, $fullpath . $target_file)){
    echo"The File".basename($_FILES["PropertyPhoto"]["name"])."has been uploaded.";
}
else{
    die("Sorry, there was an error uploading your file.");
}

$PropertyPhoto= $target_file;//$target_dir . basename($FILES["image"]["name"][$i],$imageFileType);
echo $PropertyPhoto;

$user1="insert into property(PropertyDetails,PropertyType,PropertyPrice,PropertyStatus,PropertyPhoto,UserId,
                             LocationZone,LocationDistrict,LocationCity,LocationStreetName,LocationTole)
VALUES ('$PropertyDetails','$PropertyType','$PropertyPrice','$PropertyStatus','$PropertyPhoto','$userid',
                             '$LocationZone','$LocationDistrict','$LocationCity','$LocationStreetName','$LocationTole')";



if(mysql_query($user1,$con)){
    // die("error".mysql_error());
    header('location:profile.php');
    echo "sucess";
}
else {

    die("error".mysql_error());
}
mysql_close($con);
?>