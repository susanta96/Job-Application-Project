<?php
include_once('../config.php');
session_start();
$jobid=$_GET['jid'];
$jsid=$_SESSION['jsid'];
$date=date("d-m-y");
//echo  $jobid;
$q1=mysqli_query($db1,"select * from trans_apply where adv_id =$jobid AND user_id = $jsid");
if(mysqli_num_rows($q1)>=1){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have already applied for this job!</p>
        </div>";
}
else{
    $q3=mysqli_query($db1,"SELECT * from trans_ads where id = '$jobid'");
    $q3result=mysqli_fetch_array($q3);
    $emp_id=$q3result['e_id'];
    //(SELECT e_id from trans_ads where id = $jobid)
    //echo $emp_id;
    $q2=mysqli_query($db1,"insert into trans_apply (user_id,emp_id,adv_id,apply_date) VALUES ($jsid,$emp_id,$jobid,'$date')");
   // echo mysqli_error($db1);
    if($q2){
        echo " <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have successfully applied for this job!</p>
        </div>";
              $q4=mysqli_query($db1,"SELECT * from mst_user join mast_company on mst_user.id=mast_company.user_id where mast_company.id=$emp_id");
              $row=mysqli_fetch_array($q4);
              $q5=mysqli_query($db1,"SELECT * from mst_user join mast_customer on mst_user.id=mast_customer.user_id where mast_customer.id=$jsid");
              $row2=mysqli_fetch_array($q5);
              
                $to ="$row[email]";
                $subject = "Applied Job Request";
                $headers[] = 'MI: 1.0';
                $headers[] = 'Content-type: text/html; charset=utf8_encode';
                $message = "<html>
                <head>
                <title>$row2[cust_name] Applied For $q3result[title] Job </title>
                </head>
                <body>
                <p>$row2[cust_name] Applied For $q3result[title] Job </p>
                You Can logged in to your account and see the application . Then You can Hired The User As per your requirement.
                <br><br><table>
                <tr>
                <th>Best Regards</th>
                </tr>
                <tr>
                <th>FROM: Job Application Team</th>
                </tr>
                </table>
                </body>
                </html>";
                mail($to,$subject,$message,implode("\r\n", $headers));

    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!:</strong>Sorry ! Failed to apply for this job!</p>
        </div>";
    }


}
?>
