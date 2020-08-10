<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igdb_data";

$user_id = $_GET['q'];

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}




$sql = "SELECT recommended FROM users WHERE id = '$user_id'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    foreach($result as $x){
        $recommended = $x;
    }
}
$recommended = $recommended['recommended'];


$returnArrayComp = [];

$gameIds = "";
$recommended = explode(",",$recommended);
foreach ($recommended as $key => $id) {
    if($id==""){
        unset($recommended[$key]);
    }
}


for ($i=0; $i < count($recommended); $i++) { 
        if($i==count($recommended)-1){
            $gameIds .= "^".$recommended[$i]."$";
        }else{
            $gameIds .= "^".$recommended[$i]."$"."|";
        }
}

$returnArray1 = [];
        $sql = "SELECT * FROM games WHERE id_igdb REGEXP '$gameIds'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($returnArray1, $x);
            }
        }
$returnArray2 = [];
        $sql = "SELECT id_igdb,id_game,link FROM covers WHERE id_game REGEXP '$gameIds'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($returnArray2, $x);
            }
        }
$returnArray3 = [];
    $sql = "SELECT id_igdb,id_game,link FROM screenshots WHERE id_game REGEXP '$gameIds'";
    $result = $con->query($sql);
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($returnArray3, $x);
            }
        } else {

        }

array_push($returnArrayComp,$returnArray1);
array_push($returnArrayComp,$returnArray2);
array_push($returnArrayComp,$returnArray3);

$con->close();
echo json_encode($returnArrayComp);
?>