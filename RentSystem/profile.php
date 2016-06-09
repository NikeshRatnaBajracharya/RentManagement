
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link href="profile/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="profile/fonts.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="login/css/style_login.css">

    <script language="javascript">
        function showDetails(id) {
            alert('http://localhost/home-shoppe/profile.php?id=' + id);
            //document.location.href = 'http://localhost/home-shoppe/profile.php?id=' + id;
        }

        function hightlight(obj) {
            obj.setAttribute("style", "background-color : red; cursor: pointer;");
        }

        function unhightlight(obj) {
            obj.setAttribute("style", "background-color : white;");
        }
    </script>


    <script language="JavaScript">

        function validateForm1()
        {


            var a=document.form.PropertyType.value;
            var b=document.form.PropertyPrice.value;
            var c=document.form.PropertyStatus.value;
            var d=document.form.PropertyDetails.value;
            var e=document.form.LocationZone.value;
            var f=document.form.LocationDistrict.value;
            var g=document.form.LocationCity.value;
            var h=document.form.LocationStreetName.value;
            var i=document.form.LocationTole.value;
            var j=document.form.PropertyPhoto.value;



            if((a==null||a=="")&&(b==null||b=="")&&(c==null||c=="")&&(d==null||d=="")
                &&(e==null||e=="")&&(f==null||f=="")&&(g==null||g=="")&&(h==null||h=="")&&(i==null||i=="")&&(j==null||j==""))
            {

                alert("All fields are empty");

                return false;
            }


            if(a==null||a=="")
            {

                alert("Property type  must be filled out!");

                return false;
            }
            if(b==null||b=="")
            {

                alert("Property price be filled out!");

                return false;
            }

            if(c==null||c=="")
            {
                alert("Property status must be filled out!");

                return false;

            }

            if(d==null||d=="")
            {
                alert("Property details is empty!");

                return false;

            }

            if(e==null||e=="")
            {
                alert("Location zone is empty!");

                return false;

            }

            if(f==null||f=="")
            {
                alert("Please specify the location district");

                return false;

            }

            if(g==null||g=="")
            {
                alert("Specify location city");

                return false;

            }

            if(h==null||h=="")
            {
                alert("Please specify your location street name");

                return false;

            }

            if(i==null||i=="")
            {
                alert("please specify location tole");

                return false;

            }

            if(j==null||j=="")
            {
                alert("Please specify property photo");

                return false;

            }


        }
    </script>

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="profile.php">Welcome <?php session_start(); echo $_SESSION['Userfname'];?></a></h1>
			<div id="menu">
				<ul>
					
					<li><a href="profile.php" accesskey="1" title="">My Profile</a></li>
					<li><a href="updateinfo.php" accesskey="2" title="">Update Info</a></li>
					<li><a href="index.php" accesskey="4" title="">Sign Out</a></li>
					
				</ul>
			</div>
		</div>

</div>
 <div >
       <?php require('display.php');?>
 </div>
<div align="right" >
    <section >

        <div align="right" >

            <h1 style="margin-right: 100px;margin-top:50px; font-size: large" >Add Your Property In Form Below.</h1>

            <form method="post" action="propertyinsert.php"  name="form" style="margin-right: 150px; margin-top: 30px" enctype="multipart/form-data" onsubmit="return validateForm1()">

                <p><input type="text" name="PropertyType"  placeholder="Property Type">
                </p>
                <p><input type="text" name="PropertyPrice"  placeholder="Property Price">
                </p>

                <p><input type="text" name="PropertyStatus"  placeholder="Property Status">
                </p>


                <p><input type="text" name="PropertyDetails"   placeholder="Property Details">
                </p>


                <p><input type="text" name="LocationZone"   placeholder="Location Zone">
                </p>

                <p><input type="text" name="LocationDistrict"   placeholder="Location District">
                </p>

                <p><input type="text" name="LocationCity"   placeholder="Location City">
              </p>

                <p><input type="text" name="LocationStreetName"   placeholder="Location StreetName">
                </p>
                <p><input type="text" name="LocationTole"   placeholder="Location Tole">
                </p>

                <p><input type="file" name="PropertyPhoto" placeholder="Property Photo">
                </p>



                <p class="submit">
                    <input type="submit" name="Addprop" value="ADD" >

                </p>

            </form>

        </div>




    </section>

    <div id="page-wrapper" >
        <div id="welcome" class="container">
            <div class="title">
                <h2>This is your personal profile :) </h2>
            </div>
            <p></p>

        </div>
    </div>

</div>
</div>


<div id="copyright" class="container">
		<ul class="contact">
			<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
			<li><a href="www.facebook.com" class="icon icon-facebook"><span>Facebook</span></a></li>
			
		</ul>
</div>
</body>
</html>

<?php mysql_close($con); ?>