<?php
    $q = intval($_GET['q']);

    $query = false;
    if($query == false){
        $sql = "SELECT id_igdb,name,platforms,genres,dlcs,
        expansions,first_release_date,game_engines,game_modes,
        involved_companies,standalone_expansions,
        themes,storyline,summary FROM games WHERE first_release_date != '-' LIMIT $q;";
    }

    ini_set('memory_limit', '-1');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "igdb_data";
    $returnArray = [];
    $returnArray1 = [];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($returnArray1, $x);
        }
    } else {
        echo "0 results";
    }

    $returnArray2 = [];
    $sql = "SELECT id_igdb,id_game,link FROM covers WHERE id_game < $results+1;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($returnArray2, $x);
        }
    } else {
        echo "0 results";
    }

    $returnArray3 = [];
    $sql = "SELECT id_igdb,id_game,link FROM screenshots WHERE id_game < $results+1 ;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($returnArray3, $x);
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    array_push($returnArray,$returnArray1);
    array_push($returnArray,$returnArray2);
    array_push($returnArray,$returnArray3);
    echo json_encode($returnArray);
?>