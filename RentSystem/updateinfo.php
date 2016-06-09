<?php
session_start();




if(isset($_POST['Updatename'])) {

    $_SESSION['UserFname'] = $_POST['upname'];

    $con = mysql_connect('localhost', 'root', 'root');
    if (!mysql_select_db("rentmanagement", $con)) {
        die("cannot connect" . mysql_error());
    }
    $username = $_POST['uname'];
    $userid = $_SESSION['userid'];
    mysql_query("update user set UserName  = '$username' WHERE u_id = '$userid'");


    ?>

<!--    <script>-->
<!--        alert("Name Updated!");</script>-->


<?php
    unset($_POST['Updatename']);
}

if(isset($_POST['passwordupdate'])){

    $con=mysql_connect('localhost','root','root');
    if(!mysql_select_db("rentmanagement",$con))
    {
        die("cannot connect".mysql_error());
    }
    $userpass = $_POST['userpassword'];
    $userid = $_SESSION['userid'];
    mysql_query("update user set UserPassword = '$userpass' WHERE u_id = '$userid'");

    ?>



<!--    <script>-->
<!--    alert("Password Updated!");-->
<!--    </script>-->



<?php
    unset($_POST['passwordupdate']);

}

if(isset($_POST['phoneupdate'])){

    $con=mysql_connect('localhost','root','root');
    if(!mysql_select_db("rentmanagement",$con))
    {
        die("cannot connect".mysql_error());
    }
    $userphone = $_POST['upphone'];
    $userid = $_SESSION['id'];
    mysql_query("update user set UserPhone = '$userphone' WHERE u_id = '$userid'");

    ?>



<!--    <script>-->
<!--        alert("Number Updated!");</script>-->

<?php

    unset($_POST['phoneupdate']);
}

if(isset($_POST['locationupdate'])) {

    $con = mysql_connect('localhost', 'root', 'root');
    if (!mysql_select_db("rentmanagement", $con)) {
        die("cannot connect" . mysql_error());
    }
    $userlocation = $_POST['uplocation'];
    $userid = $_SESSION['id'];
    mysql_query("update user1 set u_password = '$userlocation' WHERE u_id = '$userid'");
}
?>

<HTML>
<head>

    <title>Update page</title>
    <link rel="stylesheet" href="login/css/style_login.css">
    <script language="JavaScript">

        function validateForm1()
        {
            var x=document.upname.upname.value;






            if(x==null||x=="")
            {

                alert("Username must be filled out!");

                return false;
            }



        }


        function validateForm2()
        {
            var x=document.uppas.uppas.value;
            var y=document.uppas.ruppas.value;




            if((x==null||x=="")&&(y==null||y==""))
            {

                alert("Both password must be filled out!");

                return false;
            }


            if(x==null||x=="")
            {

                alert("password must be filled out!");

                return false;
            }

            if(y==null||y=="")
            {
                alert("Retype Password");

                return false;

            }

            if(x!=y){

                alert("password must be Matched!");

                return false;

            }


        }




        function validateForm3()
        {
            var z=document.upph.upphone.value;






            if(z==null||z=="")
            {

                alert("Phone must be filled out!");

                return false;
            }




        }


        function validateForm4()
        {
            var z=document.upl.uplocation.value;

            if(z==null||z=="")
            {

                alert("Location must be filled out!");

                return false;
            }




        }


        function validateForm5()
        {
            var z=document.upe.upemail.value;


            if(z==null||z=="")
            {

                alert("Email must be filled out!");

                return false;
            }




        }


    </script>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />







</head>


<body>




<section class="container">

    <div class="login">

        <h1>Update your Information</h1>

        <form method="post" action="updateinfo.php" name="upname" onsubmit="return validateForm1()">

            <p><input type="text"  name="upname"  placeholder="Update Useer Name">
            </p>
            <p class="submit">
            <div align="center">
                <input type="submit" name="Updatename" value="Update">
                </div>
            </p>
        </form>


        <form method="post" action="updateinfo.php" name="uppas" onsubmit="return validateForm2()">

            <p><input type="password"  name="uppas"  placeholder="Update Password">
            </p>
            <p><input type="password"  name="ruppas"  placeholder="Retype Password">
            </p>
            <p class="submit">
                <div align="center">
                <input type="submit" name="passwordupdate" value="Update">
                </div>
            </p>





        </form>
        <form method="post" action="updateinfo.php" name="upph" onsubmit="return validateForm3()">

            <p><input type="text"  name="upphone"  placeholder="Update Phone">
            </p>

            <p class="submit">
            <div align="center">
                <input type="submit" name="phoneupdate" value="Update">
            </div>
            </p>
        </form>

        <form method="post" action="updateinfo.php" name="upl" onsubmit="return validateForm4()">

            <p><input type="text"  name="uplocation"  placeholder="Update Location">
            </p>

            <p class="submit">
            <div align="center">
                <input type="submit" name="locationupdate" value="Update">
            </div>
            </p>
        </form>

        <form method="post" action="updateinfo.php" name="upe" onsubmit="return validateForm5()">

            <p><input type="text"  name="upemail"  placeholder="Update Email">
            </p>

            <p class="submit">
            <div align="center">
                <input type="submit" name="emailupdate" value="Update">
            </div>
            </p>
        </form>




    </div>






    </p>




<div align="center">
    <a href="profile.php" style="color: white">Done Update</a>
</div>
</section>




</body>

</html>

