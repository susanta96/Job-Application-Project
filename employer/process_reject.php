<?php
include_once('../config.php');
session_start();
//echo "reject is working";
$user_id=$_GET['user'];
$emp_id=$_GET['emp'];
$job_id=$_GET['job'];
$date=date('d-m-y');
$q=mysqli_query($db1,"select * from trans_apply where adv_id=$job_id and user_id= $user_id");
$result=mysqli_fetch_array($q);
if(mysqli_num_rows($q)>0 && $result['status']!=2){
    $q2=mysqli_query($db1,"update trans_apply set status = 2 where adv_id=$job_id and user_id= $user_id");
    $q3=mysqli_query($db1,"insert into selection(cust_id,emp_id,job_id,status,date) VALUES ($user_id,$emp_id,$job_id,2,'$date')");
    if($q2 && $q3){
        echo " <center><div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Success!</strong> This user application is rejected</p>
        </div>";
      //  header("Refresh:0; url=manage_applicants.php?jobid=$job_id");
        //header('location: ../employer/manage_applicants.php?jobid='.$job_id);
        echo "<center><a style='color: whitesmoke;'  href='../employer/manage_applicants.php?jobid=".$job_id."'><button type='button' class='btn btn-success'>Refresh</button></a>";
    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Sorry!</strong> Something Went Wrong</p>
        </div>";
        echo "<center><a style='color: whitesmoke;'  href='../employer/managejobs.php'><button type='button' class='btn btn-success'>Go Back</button></a>";
    }

}
else{
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 22px'><strong>Sorry!</strong> This user is already rejected</p>
        </div>";
}
?>
