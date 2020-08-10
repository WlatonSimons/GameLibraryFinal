<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igdb_data";

$resultCount = 100;


function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$likes_t = $_GET['q'];
$likes_g = $_GET['q2'];
$user_id = $_GET['q3'];


$sql = "SELECT recommended FROM users WHERE id = '$user_id'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    foreach($result as $x){
        $recommended = $x;
    }
}
$recommended = $recommended['recommended'];


$likes_t = explode(",",$likes_t);
$likes_g = explode(",",$likes_g);

$likes_tArr = [];
$likes_gArr = [];

foreach ($likes_t as $key => $id) {
    if($id==""){
        unset($likes_t[$key]);
    }
}
foreach ($likes_g as $key => $id) {
    if($id==""){
        unset($likes_g[$key]);
    }
}

foreach ($likes_t as $value) {
    $temp = explode("-",$value);
    $temp_Arr["ID"] = $temp[0];
    $temp_Arr["SCORE"] = $temp[1];

    array_push($likes_tArr, $temp_Arr);
}
foreach ($likes_g as $value) {
    $temp = explode("-",$value);
    $temp_Arr["ID"] = $temp[0];
    $temp_Arr["SCORE"] = $temp[1];

    array_push($likes_gArr, $temp_Arr);
}

array_sort($likes_tArr, 'SCORE', SORT_DESC);
$sqlString_t = "";
for ($i=0; $i < 3; $i++) { 
    try {
        if($i==2){
            $sqlString_t .= "^".$likes_tArr[$i]["ID"]."-";
            $sqlString_t .= "|-".$likes_tArr[$i]["ID"]."-";
        }else{
            $sqlString_t .= "^".$likes_tArr[$i]["ID"]."-|";
            $sqlString_t .= "-".$likes_tArr[$i]["ID"]."-|";
        }
    } catch (\Throwable $th) {
        break;
    }
}
array_sort($likes_gArr, 'SCORE', SORT_DESC);
$sqlString_g = "";
for ($i=0; $i < 3; $i++) { 
    try {
        if($i==2){
            $sqlString_g .= "^".$likes_gArr[$i]["ID"]."-";
            $sqlString_g .= "|-".$likes_gArr[$i]["ID"]."-";
        }else{
            $sqlString_g .= "^".$likes_gArr[$i]["ID"]."-|";
            $sqlString_g .= "-".$likes_gArr[$i]["ID"]."-|";
        }
    } catch (\Throwable $th) {
        break;
    }
}


$returnArrayComp = [];
$returnArray1 = [];
$exclude = "";
if($recommended=="null"){
    $sql="SELECT * FROM games WHERE genres REGEXP '$sqlString_g'  AND  themes REGEXP '$sqlString_t' LIMIT 8";
}
else{
    $recommendedArr =  explode(",",$recommended);

    for ($i=0; $i < count($recommendedArr) ; $i++) { 
        if($i == count($recommendedArr)-1){
            $exclude .= "^".$recommendedArr[$i]."$";
        }
        else{
            $exclude .= "^".$recommendedArr[$i]."$|";
        }

    }

    $sql="SELECT * FROM games WHERE genres REGEXP '$sqlString_g'  AND  themes REGEXP '$sqlString_t'  AND NOT id_igdb REGEXP '$exclude' LIMIT 8";   
}

$result = $con->query($sql);

if ($result->num_rows > 0) {
    foreach($result as $x){
        array_push($returnArray1, $x);
    }
}

if($recommended=="null"){
    for ($i=0; $i < count($returnArray1); $i++) { 
        if($recommended=="null"){
            $recommended = $returnArray1[$i]['id_igdb'].",";
        }else if($i == count($returnArray1)-1){
            $recommended .= $returnArray1[$i]['id_igdb'].",";
        }else{
            $recommended .= $returnArray1[$i]['id_igdb'].",";
        }
    }
}
else{
    for ($i=0; $i < count($returnArray1); $i++) { 
            $recommended.= $returnArray1[$i]['id_igdb'].",";
    }
}
$sql = "UPDATE users SET recommended ='$recommended' WHERE id='$user_id'";
$con->query($sql);

$gameIds = "";
for ($i=0; $i < count($returnArray1); $i++) { 
        if($i==count($returnArray1)-1){
            $gameIds .= "^".$returnArray1[$i]['id_igdb']."$";
        }else{
            $gameIds .= "^".$returnArray1[$i]['id_igdb']."$"."|";
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