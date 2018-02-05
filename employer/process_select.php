<?php
include_once('../config.php');
session_start();
//echo "hello its working";
$user_id=$_GET['user'];
$emp_id=$_GET['emp'];
$job_id=$_GET['job'];
//echo $user_id . "  " . $emp_id ." " . $job_id;
$date=date('d-m-y');

$query = mysqli_query($db1,"select * from mst_user join mast_customer on mst_user.id=mast_customer.user_id WHERE mast_customer.id = $user_id");
$row=mysqli_fetch_array($query);
$email=$row['email'];
//echo $email;
$query2= mysqli_query($db1,"select * from trans_ads WHERE id=$job_id ");
$row2=mysqli_fetch_array($query2);
$job_title=$row2['title'];

$query3= mysqli_query($db1,"select * from mast_company WHERE id=$emp_id ");
$row3=mysqli_fetch_array($query3);
$Company=$row3['Company_name'];

$q=mysqli_query($db1,"select * from selection where job_id=$job_id and cust_id= $user_id ");
$r=mysqli_fetch_array($q);
if(mysqli_num_rows($q)>0 && $r['status']==1){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Sorry!</strong> This user is already Selected for the job</p>
        </div>";
      }elseif (mysqli_num_rows($q)>0 && $r['status']===2) {
        echo " <center><div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Sorry!</strong> This user application is rejected</p>
        </div>";
      }
      elseif(mysqli_num_rows($q)==0){
          $q2=mysqli_query($db1,"insert into selection(cust_id,emp_id,job_id,status,date) VALUES ($user_id,$emp_id,$job_id,1,'$date')");
          if($q2){
            echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
                        <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                                aria-hidden='true'>&times;</span></button>
                       <p style='font-size: 25px'><strong>You Successfully hired a User .</strong> <br>We will send the user an email to that you hired Successfully for the perticular Job.</p>
                    </div> </div>";
            echo "<center><a style='color: whitesmoke;'  href='../employer/manage_applicants.php?jobid=$job_id'><button type='button' class='btn btn-success'>Refresh</button></a>";
            $to ="$email";
            $subject = "Successfully Recruited";
            $headers[] = 'MI: 1.0';
            $headers[] = 'Content-type: text/html; charset=utf8_encode';
            $message = "
                    <html>
                    <head>
                    <title>Successfully Hired</title>
                    </head>
                    <body>
                    <p>Now You are Successfully Recruited For $job_title Job.</p>
                    The Company $Company Will be Contact Soon on your email address or phone no.
                    Be Ready For Your New Job.
                    <br><br><table>
                    <tr>
                    <th>Wish You A Great Future Ahead</th>
                    </tr>
                    <tr>
                    <th>FROM: Job Application Team</th>
                    </tr>
                    </table>
                    </body>
                    </html>
            ";
            mail($to,$subject,$message,implode("\r\n", $headers));
          }
        }
?>
