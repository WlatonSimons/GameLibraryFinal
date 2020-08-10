<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igdb_data";


$resultCount = 48;

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$genre = intval($_GET['q']);
$page = intval($_GET['q1']);
$theme = intval($_GET['q2']);
$platforms = intval($_GET['q3']);
$fromDate = date($_GET['q4']);
$toDate = date($_GET['q5']);
$name = $_GET['q6'];
$query = [];
$sql = "";

$query["genres"] = $genre;
$query["themes"] = $theme;
$query["platforms"] = $platforms;
$query["fromDate"] = $fromDate;
$query["toDate"] = $toDate;
$query["name"] = $name;

$LimitFloor = (($resultCount*$page)-$resultCount);
$LimitTop = ($resultCount*$page);


foreach ($query as $key => $value) {

    if($sql == "" && $value != "" || $value != 0) {
        if($key == "name"){
            $sql = "SELECT * FROM games WHERE $key REGEXP '$value'";
        }elseif ($key == "toDate" ) {
            $sql = "SELECT * FROM games WHERE first_release_date <= ('$value')"; 
        }
        elseif ($key == "fromDate" ) {
            $sql = "SELECT * FROM games WHERE first_release_date >= ('$value')"; 
        }else{
            $sql = "SELECT * FROM games WHERE $key REGEXP '-$value$|-$value-|^$value-'"; 
        }
    }
    elseif ($sql != "" && $value != "" || $value != 0) {
        if($key == "name"){
            $sql.= "AND  $key REGEXP '$value'";
        }elseif ($key == "toDate" ) {
            $sql.= "AND  first_release_date <= ('$value')"; 
        }
        elseif ($key == "fromDate" ) {
            $sql.= "AND  first_release_date >= ('$value')"; 
        }else{
            $sql.= "AND  $key REGEXP '-$value$|-$value-|^$value-'"; 
        }
    }
    
}

$sql.= " LIMIT $LimitFloor, $LimitTop"; 


$returnArrayComp = [];
$returnArray1 = [];


$result = $con->query($sql);
if ($result->num_rows > 0) {
    foreach($result as $x){
        array_push($returnArray1, $x);
    }
} else {

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

        }
$return3 = "";
$sql = "SELECT COUNT(*) FROM games";
$result = $con->query($sql);
$return3 = mysqli_fetch_assoc($result)['COUNT(*)'];
$return3 .= ",".$page;


array_push($returnArrayComp,$returnArray1);
array_push($returnArrayComp,$returnArray2);
array_push($returnArrayComp,$return3);

$con->close();
echo json_encode($returnArrayComp);
?>