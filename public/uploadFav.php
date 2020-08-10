<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "igdb_data";

    $id_game = intval($_GET['q1']);
    $user_id = intval($_GET['q2']);

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Favorites FROM users WHERE id='$user_id'";
    $result = $con->query($sql);
    $returnString = "";

    if ($result->num_rows > 0) {
        foreach($result as $x){
            $recommended = $x;
        }
    }
    if($recommended["Favorites"]==NULL){
        $id_game = $id_game.'-';
        $sql = "UPDATE users SET Favorites = '$id_game' WHERE id='$user_id'";
    }else {
        $recommended = explode("-",$recommended["Favorites"]);

        foreach ($recommended as $key => $id) {
            if($id==""){
                unset($recommended[$key]);
            }
        }

        if(!in_array($id_game, $recommended)){
            array_push($recommended,$id_game);
            foreach($recommended as $x){
                $returnString.=$x."-";
            }
            $sql = "UPDATE users SET Favorites = '$returnString' WHERE id='$user_id'";
        }

    }

    $con->query($sql);
    $con->close();
?>