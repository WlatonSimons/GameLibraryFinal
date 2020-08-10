<?php 
$q = intval($_GET['q']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igdb_data";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

////get screenshots////
$returnArray1 = [];
$sql = "SELECT link FROM screenshots WHERE id_game = '$q';";
$result = $con->query($sql);
    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($returnArray1, $x);
        }
    }
$returnArray['screens'] = $returnArray1;
$returnArray['count'] = count($returnArray1);
///////////////////////

$con->close();
echo json_encode($returnArray);
?>