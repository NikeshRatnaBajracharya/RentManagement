<?php
$con = mysql_connect("localhost","root","root");

if(!mysql_select_db("rentmanagement",$con)){
    die("cannot connect");
}

mysql_select_db("rentmanagement",$con);

$per_page = 10;

$searchParam = '';

if(!isset($_GET['page']))
    $page = 1;
else
    $page = $_GET['page'];

if($page <= 1)
    $start = 0;
else
    $start = ($page * $per_page) - ($per_page - 1);

if(isset($_POST['search'])) {
    $searchParam = $_POST['search'];
}

if(isset($_GET['search'])) {
    $searchParam = $_GET['search'];
}

$query = "SELECT * FROM property";

if($searchParam != "")
    $query = $query . " WHERE LocationZone LIKE '%" . $searchParam . "%' OR LocationDistrict LIKE '%" . $searchParam . "%' OR LocationCity ";

$num_row = mysql_num_rows(mysql_query($query));
$no_of_pages = ceil($num_row/$per_page);

$query = $query . " LIMIT " . $start . " , " . $per_page;

$result = mysql_query($query);

//echo $query . "<br/><br/>";
?>
<html>
    <head>
    <title>Admin Control Panel</title>
    <script language="javascript">
        function showDetails(id) {
            alert('http://localhost/home-shoppe/profile.php?id=' + id);
            //document.location.href = 'http://localhost/home-shoppe/profile.php?id=' + id;
        }

        function hightlight(obj) {
            obj.setAttribute("style", "background-color : green; cursor: pointer;");
        }

        function unhightlight(obj) {
            obj.setAttribute("style", "background-color : white;");
        }
    </script>
    </head>
    <body>
          <form action="profile.php" method="post">
               <input type="text" name="search" placeholder="search here" value="<?php echo $searchParam; ?>" style="margin-left: 150px"/>
               <input type="submit" value="Search" style="margin-left: 25px" />
            </form>

                 <h1> <P style = "margin-top:150px; font-size: 25; margin-left: 550px"><B> Property Table   </B> </P> </h1>
                   <table id="tb" style="margin-top: 30px;margin-left: 100px">
                    <tr style="font-size: 15;" >
                        <th td bgcolor='#1e90ff'>Property Details</th>
                        <th bgcolor='#add8e6'>Property Type </th>
                        <th td bgcolor='#1e90ff'>Property Price</th>
                        <th bgcolor='#add8e6'>Property Status</th>
                        <th td bgcolor='#1e90ff'>Property photo</th>
                        <th bgcolor='#add8e6'>Location Zone</th>
                        <th td bgcolor='#1e90ff'>Location District</th>
                        <th bgcolor='#add8e6'>Location City</th>
                        <th td bgcolor='#1e90ff'>Location Street Name</th>
                        <th bgcolor='#add8e6'>Location Tole</th>
                    </tr>
                    <?php
                        if (mysql_num_rows($result) > 0)
                        {
                            while ($row = mysql_fetch_array($result)) {
                                echo "<tr id='" . $row['PropertyID'] . "' onClick='javascript: showDetails(" . $row['PropertyID'] . ");' onMouseOver='javascript: hightlight(this);' onMouseOut='javascript: unhightlight(this);' style='background-color : white;'>";
                                echo "<td bgcolor='#add8e6'>" . $row['PropertyDetails'] . "</td>";
                                echo "<td bgcolor='#1e90ff'>" . $row['PropertyType'] . "</td>";
                                echo "<td bgcolor='#add8e6'> " . $row['PropertyPrice'] . "</td>";
                                echo "<td bgcolor='#1e90ff'>" . $row['PropertyStatus'] . "</td>";
                                echo "<td bgcolor='#add8e6'>" . $row['PropertyPhoto'] . "</td>";

                                echo "<td bgcolor='#1e90ff'>" . $row['LocationZone'] . "</td>";
                                echo "<td bgcolor='#add8e6'>" . $row['LocationDistrict'] . "</td>";
                                echo "<td bgcolor='#1e90ff'>" . $row['LocationCity'] . "</td>";
                                echo "<td bgcolor='#add8e6'>" . $row['LocationStreetName'] . "</td>";
                                echo "<td bgcolor='#1e90ff'>" . $row['LocationTole'] . "</td>";
                                echo "</tr>";

                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                    ?>
                </table>
            </div>

            <div id="pagingDiv">
                <?php
                    $prev = $page - 1;
                    $next = $page + 1;

                    echo "<hr>";

                    if ($prev > 0)
                        echo "<a href='?page=$prev&search=$searchParam'> Prev</a>";

                    $number = 1;

                    for ($number; $number <= $no_of_pages; $number = $number + 1) {
                        if ($page == $number) {
                            echo "<b>[$number]</b>";
                        } else {
                            echo "<a href='?page=$number&search=$searchParam'>$number </a>";
                        }
                    }

                    if ($next < $no_of_pages + 1)
                        echo "<a href='?page=$next&search=$searchParam'> Next </a>";
                ?>
    </body>
</html>
<?php mysql_close($con); ?>




