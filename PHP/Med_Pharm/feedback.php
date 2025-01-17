<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if(isset($_POST['fdes']) && isset($_POST['fname']) && isset($_POST['r_id']) && isset($_POST['frate']))
 {
    
    $fname = $_POST['fname'];
	$fdes = $_POST['fdes'];
	$rid = $_POST['r_id'];
	$frate = $_POST['frate'];
	
    // include db connect class
    require_once __DIR__ .'/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO feedback (fname,fdes,frate,r_id) VALUES('$fname','$fdes','$frate','$rid')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "User successfully created.";

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