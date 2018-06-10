<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['address']) && isset($_POST['state']) && isset($_POST['pin']) && isset($_POST['std']) && isset($_POST['mobile']) && isset($_POST['qualification']) && isset($_POST['skills']) && isset($_POST['experience'])) {
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $std = $_POST['std'];
    $mobile = $_POST['mobile'];
    $qualification = $_POST['qualification'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysqli_query("INSERT INTO register(name, email, pass, address, state, pin, std, mobile, qualification, skills, experience) VALUES('$name', '$email', '$pass', '$address', '$state', '$pin', '$std', '$mobile', '$qualification', '$skills', '$experience')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Registered successfully.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>

