<?php




session_start();

$con=mysql_connect('localhost','root','root');
if(!mysql_select_db("rentmanagement",$con))
{
    die("cannot connect".mysql_error());
}

$valid=1;
$recall=1;
$un=$_POST['uname'];
$pass=$_POST['password'];
$result=  mysql_query("select UserName,UserPassword,UserId,UserFirstName from user");

while($row=mysql_fetch_array($result))
{
    $un1=$row['UserName'];
    $pass1=$row['UserPassword'];
    if((strcmp($un,$un1)==0)&& (strcmp($pass,$pass1)==0))
    {
        $_SESSION['uname']=$row['UserName'];
        //echo $row."<br/>";
        $_SESSION['password']=$row['UserPassword'];
        //echo $un1."<br/>";
        $_SESSION['userid']=$row['UserId'];
        $_SESSION['Userfname']=$row['UserFirstName'];
        $valid=0;
        header('location:profile.php');

    }


}

if($valid==1)
{
    $recall=0;
    echo "<script>
alert('Not valid user');
</script>";
    require('index.php');
}

?>
