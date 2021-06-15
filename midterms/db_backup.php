<?php

$has_error = false;
$path = 'C:\xampp\htdocs\act5\test_db.sql';

if (isset($_POST['backup'])) {
    $result = exec("mysqldump itec100 --password= --user=root --single-transaction > $path");

    if (file_exists($path)) $alert_msg = 'Backup Success!';
    else {
        $has_error = true;
        $alert_msg = "Backup failed.";
    }
}

if (isset($_POST['download'])) {
    if (file_exists($path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($path));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        unlink($path);
    } else {
        $has_error = true;
        $alert_msg = 'Failed to download.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Title -->
    <title>Backup</title>

    <style>
    .container{
       background-image: url("bg.jpg");
	   
        width: 1680px;
        margin-left:-70px;

        height: 700px;
        position: fixed;
    
    }
    .container h3{
        font-family: Cooper Black;
        font-size:80px;
        text-align: center;   
    }
    .container .btn1{
       margin-left: 550px;
       width: 500px;
       height: 50px;
       font-family:Arial;
       font-size: 40px;
       font-weight: bolder;
       background-color: orange;
       border: none;
       border-radius: 50px;
       
    }
    .container .btn2{
      margin-left: 550px;
       width: 500px;
       height: 50px;
       border-radius: 50px;
       font-family:Arial;
       font-size: 40px;
       font-weight: bolder;
       background-color: orange;
       border: none;
    }
    .btn1:hover {
        background-color: RED;
    }
    .btn2:hover {
        background-color: RED;
    }
    p{
        text-align: center;
        font-family: Papyrus;
        font-size:40px;
    }
	


    </style>

</head>

<body>
   

    <!-- Welcome message -->
    <div class="jumbotron" style="height: 100%;">
        <div class="container">
            <form action="" method="post">
                <div class="row justify-content-md-center">
                    <div class="mbr-white col-md-6">
                        <h3>Backup and Downloading Files</h3>
                        <p class="mt-3"> Please click backup before downloading.</p>
                        <button class="btn1" name="backup">Backup</button>
                        <br>
                        <br>
                        <button class="btn2" name="download">Download</button>
                        
                        <?php
                        if (!empty($alert_msg)) {
                            echo
                            '<div style="text-align: center; font-family: Arial Unicode MS;
                            font:weight: bolder; font-size: 20px; margin-top: 20px;" class="alert alert-' . ($has_error ? 'danger' : 'success') . '" role="alert">
                                ' . $alert_msg . '
                            </div>';
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

  

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

</body>

</html>