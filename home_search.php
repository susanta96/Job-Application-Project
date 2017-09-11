<?php
include_once("../Job_Application/config.php");
$keyword= $_GET['key'];
if($keyword==""){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Oops!</strong> Please enter a search term</p>
        </div>";

}
else{
$query = "select * from trans_ads join mast_company on trans_ads.e_id = mast_company.id  where trans_ads.title LIKE '%" . $keyword . "%' or mast_company.Company_name LIKE '%".$keyword."%' or mast_company.Profile LIKE '%" . $keyword . "%'" ;
$result= mysqli_query($db1,$query);
if (mysqli_num_rows($result) === 0)
{
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Sorry!</strong> No Jobs found matching your search, try something else</p>
        </div>";
}
else {


?>

<html>
<div class="table-responsive">
<table class="table table-striped">
    <th>Company</th>
    <th>Job Title</th>
    <th>Experience Req</th>
    <th>Qualification Req</th>
    <th>Website</th>
    <th>About Company</th>
    <th>Post Date</th>
    <?php
    echo "<h3 style='color:green'> Search Results Matching : " . $keyword . "</h3> ";
    while ($row = mysqli_fetch_assoc($result)) {
        // $query2 = mysqli_query($db1, "select * from mast_company where id = '$row[e_id]'");
        // $r2 = mysqli_fetch_array($query2)
        echo "<tr>";
        echo "<td>" . $row['Company_name'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['Exp_required'] . "</td>";
        echo "<td>" . $row['ugqual'] . "</td>";
        echo "<td><a href=".$row['Website']."><font color=#0091ea>".$row['Website']."</font></a></td>";
        echo "<td>" . substr($row['Profile'],0,160) . "......</td>";
        echo "<td>" . $row['postdate'] . "</td>";
        echo "</tr>";
        }
    }
      echo "<h4> <a href='login.php' style='color:#0091ea'>Login to view more</a> </h4>";
    }

     ?>
</table>
 </div>
</html>
