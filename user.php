<?php
echo "working";

require_once 'auth.php';

//print_r($_POST);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
$postdata = file_get_contents("php://input");
//echo ("$postdata");
if2(isset($postdata) && !empty($postdata)){
    $request = json_decode($postdata);

    $UserID= $request->UserID;
    $Password= $request->Password;
    $CampusID= $request->CampusID;
    $change= $request->Type1;

//    echo "$request";

  // echo("<h1>$Type1</h1>");

    $sql = "INSERT INTO user (user_id,password,campus_id,type) VALUES ($UserID,'$Password',$CampusID,'$change')";

    if(mysqli_query($con,$sql)){
        //echo("$sql");
        echo("The data is inserted");
        http_response_code(201);
    }
    else{
        echo "$sql";
        http_response_code(422);
    }
}
?>