<?php 
/**
 * This file is AJAX call for returning cities depending on province (state) input
 */

$result_cities = array();
// $data = $_POST['province'];
// echo "result: ".$data;
if(isset($_POST["province"])){
    $json_string = file_get_contents("countries\\VN\\cities.json"); // read whole file to string
    $cities = json_decode($json_string,true);
    foreach($cities as $val){
        if(current($val) == $_POST["province"]){
            array_push($result_cities,key($val));
        }
    }
}

echo json_encode($result_cities); //Returning result to caller by using "echo" NOT "return"

?>