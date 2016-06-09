
<head>

  <title>Login Form</title>
 
 <link rel="stylesheet" href="login/css/style_login.css">
    <script language="JavaScript">
    function validateForm()
    {
    var x=document.form.uname.value;

    var y=document.form.password.value;

    if((x==null||x=="")&&(y==null||y==""))
    {

    alert("Username & password must be filled out!");

    return false;
    }


    if(x==null||x=="")
    {

    alert("Username must be filled out!");

    return false;
    }

    if(y==null||y=="")
    {
    alert("Password must be filled out!");

    return false;

    }


    }

    </script>


    </head>

<body>

  <section class="container">

    <div class="login">
    
  <h1>Login to Rent Management system</h1>
 
     <form method="post" action="login.php" name="form" onsubmit="validateForm()">
     
   <p><input type="text" name="uname" value="" placeholder="Username or Email">
</p>
       
 <p><input type="password" name="password"  placeholder="Password"></p>

        <p class="submit">
<input type="submit" name="commit" value="Login" >

</p>
     
 </form>
        <p class="submit">
        <input type="submit" name="Cancel" value="Cancel" onclick="history.go(-1)">
        </p>
  </div>


 

 </section>


  
</body>

</html>



