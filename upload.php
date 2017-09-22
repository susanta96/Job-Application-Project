<?php
include_once('../Job_Application/config.php');
session_start();
$type=$_GET['type'];
if (isset($_POST['submit']))
{
    if($type==="image")
    {
        upload_image();
    }
    elseif($type==="file")
    {
        upload_resume();
    }
    elseif ($type==="logo") {
       upload_logo();
    }
}

function upload_image(){

    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); //  get file name
    $file_ext = substr($filename, strripos($filename, '.')); // get file extention
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpeg','.png','.PNG','.jpg','.JPEG','.JPG','.img');

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 250000))
    {
        // Rename file
        $newfilename = $_SESSION['jsname'] . $_SESSION['jsid'] . $file_ext;
        if (file_exists("uploads/images/" . $newfilename))
        {
            // file already exists error
            unlink("uploads/images/".$newfilename);
          }
            $imageInformation = getimagesize($_FILES['file']['tmp_name']);
            //print_r($imageInformation);

            $imageWidth = $imageInformation[0]; //Contains the Width of the Image

            $imageHeight = $imageInformation[1]; //Contains the Height of the Image

            if ($imageWidth <= 1080 && $imageHeight <= 1280) {


                move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/images/" . $newfilename);
                mysqli_select_db($GLOBALS['db1'], "job_application");
                $cmd = mysqli_query($GLOBALS['db1'], "update mast_customer set photo= '$newfilename' WHERE id=$_SESSION[jsid]");
                if (!$cmd) {
                    echo("Error description: " . mysqli_error($db1));
                } else {
                    echo "<center><h3>File uploaded succesfully !!</h3> <br><br><h4><a href='jobseeker/profile.php'> Go back to profile </a></h4>";
                    // header('location:jobseeker/profile.php?msg=suc-img');
                }
            } else{
                echo "<center>image size is too large";
            }

    }
    elseif (empty($file_basename))
    {
        // file selection error
        echo "<center>Please select a file to upload.";
    }
    elseif ($filesize > 250000)
    {
        // file size error
        echo "<center>The file you are trying to upload is too large.";
    }
    else
    {
        // file type error
        echo "<center>Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}

/* function upload image ends here */

function upload_logo()
{
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); //  get file name
    $file_ext = substr($filename, strripos($filename, '.')); // get file extention
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpeg','.png','.jpg','.JPEG','.JPG','.PNG','.img');

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 250000))
    {
        // Rename file
        $newfilename = $_SESSION['name']. $_SESSION['e_id'] . $file_ext;
        $eid=$_SESSION['e_id'];
        if (file_exists("../Job_Application/uploads/logo/" . $newfilename))
        {
            // file already exists error
            unlink("../Job_Application/uploads/logo/".$newfilename);
          }

            $imageInformation = getimagesize($_FILES['file']['tmp_name']);
            //print_r($imageInformation);
            $imageWidth = $imageInformation[0]; //Contains the Width of the Image

            $imageHeight = $imageInformation[1]; //Contains the Height of the Image

            if ($imageWidth <= 1080 && $imageHeight <= 1280) {
                move_uploaded_file($_FILES["file"]["tmp_name"], "../Job_Application/uploads/logo/" . $newfilename);
                mysqli_select_db($GLOBALS['db1'], "job_application");
                // $q="update mast_company set logo='$newfilename' where id=$eid";
                $cmd = mysqli_query($GLOBALS['db1'],"update mast_company set logo='$newfilename' where id=$eid");
                if (!$cmd) {
                  echo("Error description: " . mysqli_error($GLOBALS['db1']));
                  }else{
                    // header('location:employer/profile.php?msg=suc-logo');
                    echo "<center>File uploaded succesfully !! <br><a href='employer/profile.php'>Back to Profile</a>";
                }
            } else{
                echo "image size is too large";
            }

    }
    elseif (empty($file_basename))
    {
        // file selection error
        echo "<center>Please select a file to upload.";
    }
    elseif ($filesize > 250000)
    {
        // file size error
        echo "<center>The file you are trying to upload is too large.";
    }
    else
    {
        // file type error
        echo "<center>Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}

/* function upload_logo ends here */

function upload_resume()
{

$filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file name
    $file_ext = substr($filename, strripos($filename, '.')); // get file extention
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.doc','.docx','.pdf');

    if (in_array($file_ext,$allowed_file_types) && ($filesize < 250000))
    {
        // Rename file
        $newfilename = $_SESSION['jsname'] . $_SESSION['jsid'] . $file_ext;
        if (file_exists("uploads/resume/".$newfilename))
        {
            // file already exists error
            unlink("uploads/resume/".$newfilename);
        }

            move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/resume/" . $newfilename);
            $cmd=mysqli_query($GLOBALS['db1'],"update mast_customer set CV= '$newfilename' WHERE id=$_SESSION[jsid]");
            if (!$cmd)
            {
                echo("Error description: " . mysqli_error($db1));
            }
            else{
               echo "<center>File uploaded succesfully !!<br> <a href='jobseeker/profile.php'> Go back to profile </a>";
              //  header('location:../jobseeker/profile.php?msg=suc-res');
            }

    }
    elseif (empty($file_basename))
    {
        // file selection error
        echo "<center>Please select a file to upload.";
    }
    elseif ($filesize > 500000)
    {
        // file size error
        echo "<center>The file you are trying to upload is too large.";
    }
    else
    {
        // file type error
        echo "<center>Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }
}
?>
