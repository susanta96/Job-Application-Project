<?php
session_start();
include_once("../config.php");
$experience=$_GET['exp'];
$qual=$_GET['qual'];
if($experience=="" || $qual==""){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!</strong> Please Fill the form!</p>
        </div>";

}
else{
$query = "select * from trans_ads where Exp_required = '$experience'  or (ugqual LIKE '%" . $qual . "%') or (pgqual LIKE '%".$qual."%')";
$result = mysqli_query($db1, $query);

if (mysqli_num_rows($result) == 0)
{
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> No jobs found matching your search, try something else</p>
        </div>";
}
else {
?>

<html>
<table class="table table-striped">
    <th>Company:</th>
    <th>Job Title:</th>
    <th>Description:</th>
    <th>Post Date:</th>

    <?php

    while ($row = mysqli_fetch_array($result)) {
        $query2 = mysqli_query($db1, "select * from mast_company where id = '$row[e_id]'");
        $r2 = mysqli_fetch_array($query2);

        echo " <tr> ";
        echo "<td> <a href='view_emp.php?id=".$r2['id']."'>" . $r2['Company_name'] . "</a></td>";
        echo "<td> <a href='view_jobs.php?jid=". $row['id']."'>". $row['title'] . "</a></td>";
        echo "<td>" . substr($row['Description'],0,90)." "."......." ."</td>";
        echo "<td>" . $row['postdate'] . "</td>";

        echo "</tr>";
    }

    }

    }     ?>
</table>
</html>
