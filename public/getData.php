<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igdb_data";

$page = intval($_GET['q1']);

$resultCount = 48;

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



$returnArrayComp = [];
$returnArray1 = [];


$sql="SELECT * FROM games WHERE id > $resultCount*$page-$resultCount AND  id < ($resultCount*$page)+1";

$result = $con->query($sql);
if ($result->num_rows > 0) {
    foreach($result as $x){
        array_push($returnArray1, $x);
    }
} else {
    //echo "0 results";
}


$gameIds = "";
for ($i=0; $i < count($returnArray1); $i++) { 
        if($i==count($returnArray1)-1){
            $gameIds .= "^".$returnArray1[$i]['id_igdb']."$";
        }else{
            $gameIds .= "^".$returnArray1[$i]['id_igdb']."$"."|";
        }
}

$returnArray2 = [];
        $sql = "SELECT id_igdb,id_game,link FROM covers WHERE id_game REGEXP '$gameIds';";
        $result = $con->query($sql);
        $oldX = "";
        if ($result->num_rows > 0) {
            foreach($result as $x){
                if($oldX != $x["id_game"]){
                    array_push($returnArray2, $x);
                    $oldX = $x["id_game"];
                }
            }
        } else {
            //echo "0 results";
        }
$return3 = "";
$sql = "SELECT COUNT(*) FROM games";
$result = $con->query($sql);
$return3 = mysqli_fetch_assoc($result)['COUNT(*)'];
$return3 .= ",".$page;

$returnArray4 = [];
    $sql = "SELECT id_igdb,name FROM platforms";
    $result = $con->query($sql);
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($returnArray4, $x);
            }
        } else {
            //echo "0 results";
        }
$returnArray5 = [];
    $sql = "SELECT id_igdb,name FROM genre";
    $result = $con->query($sql);
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($returnArray5, $x);
            }
        } else {
           // echo "0 results";
        }
$returnArray6 = [];
    $sql = "SELECT id_igdb,name FROM theme";
    $result = $con->query($sql);
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($returnArray6, $x);
            }
        } else {
           // echo "0 results";
        }
array_push($returnArrayComp,$returnArray1);
array_push($returnArrayComp,$returnArray2);
array_push($returnArrayComp,$return3);
array_push($returnArrayComp,$returnArray4);
array_push($returnArrayComp,$returnArray5);
array_push($returnArrayComp,$returnArray6);


$con->close();
echo json_encode($returnArrayComp);
?>