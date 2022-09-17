<?php

include ('./connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $image=$_FILES['file'];
    // echo $username;
    // echo "<br>";
    // echo $image;
    // print_r($image);
    // echo "<br>";

    $imagefilename=$image['name'];
    // print_r($imagefilename);
    // echo "<br>";
    $imagefileerror=$image['error'];
    // print_r($imagefileerror);
    // echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    // print_r($imagefiletemp);
    // echo "<br>";

    $filename_separate=explode('.',$imagefilename);
    // print_r($filename_separate);
    // echo "<br>";
    $file_extension=strtolower(end($filename_separate));
    // print_r($file_extension);
    
    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='image/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration`(name,image) values ('$username','$upload_image')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success</strong>Data inserted successfully
            </div>';
        }else{
            die(mysqli_error($con));
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            width: 200px;
        }
    </style>
</head>
<body>
    <h1>User Data</h1>
    <div class="container mt-5">
        <table class="table table-bordered w-50">
            <thread>
                <tr>
                    <th scope="col">Sl no</th>
                    <th scope="col">Username</th>
                    <th scope="col">Image</th>
                </tr>
            </thread>
            <tbody>
                <?php

$sql="Select * from `registration`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $image=$row['image'];
    echo '<tr>
    <td>'.$id.'</td>
    <td>'.$name.'</td>
    <td><img src='.$image.' /></td>
</tr>';
}

?>
            </tbody>
        </table>
    </div>
</body>
</html>