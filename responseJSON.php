<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbName="bday";
$conn = mysqli_connect($servername, $username, $password,$dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$jsonarray = array();
$sql="SELECT * FROM `response`";
$res = mysqli_query($conn,$sql);
if(file_exists("response.json")){
    $oldjson = file_get_contents("response.json");
    $jsonarray = json_decode($oldjson, true);
    //print_r($jsonarray);
}
while($row=mysqli_fetch_assoc($res)){
    $output[] = $row;
}
$new_data = array_diff_assoc($output,$jsonarray);
print(json_encode($output));
foreach($new_data as $data)
array_push($jsonarray,$data);
file_put_contents("response.json", json_encode($jsonarray));
mysqli_close($conn);
?>