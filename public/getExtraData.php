<?php 

$q = intval($_GET['q']);
$userId = intval($_GET['q2']);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "igdb_data";
$returnArray = [];
$returnArray1 = [];
$preferences = [];

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

//get involved companies//
    $resultArray = [];

    $sql="SELECT * FROM involvedcompanies WHERE game = '".$q."'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($resultArray, $x);
        }
    } else {

    }

    json_encode($resultArray);
    $developers = [];
    $porting = [];
    $publisher = [];
    $supporting = [];
    $returnArray1 = [];

    foreach($resultArray as $x){
        if($x['developer'] == 1){
            array_push($developers, $x['company']);
        }
        elseif($x['porting'] == 1){
            array_push($porting, $x['company']);
        }
        elseif($x['publisher'] == 1){
            array_push($publisher, $x['company']);
        }
        elseif($x['supporting'] == 1){
            array_push($supporting, $x['company']);
        }
    }

    if(!empty( $developers )){
        $returnArray1['developers'] = $developers;
    }
    if(!empty( $porting )){
        $returnArray1['porting'] = $porting;
    }
    if(!empty( $publisher )){
        $returnArray1['publisher'] = $publisher;
    }
    if(!empty( $supporting )){
        $returnArray1['supporting'] = $supporting;
    }

    $idlist = "";
    foreach ($returnArray1 as $x) {
        foreach ($x as $y) {
            $idlist.= " OR id_igdb =".$y;
        }
    }
    $idlist = substr($idlist, 13); 

    $resultArray = [];
    $sql="SELECT * FROM company WHERE id_igdb = $idlist";
    $result2 = $con->query($sql);

    
   try {
        if ($result2->num_rows > 0) {
            foreach($result2 as $x){
                array_push($resultArray, $x);
            }
        }
    } catch (\Throwable $th) {
        array_push($resultArray, "None");
  }


    $developers = [];
    $porting = [];
    $publisher = [];
    $supporting = [];

    foreach($resultArray as $x){

            if(!empty($returnArray1["developers"])){

                if(array_search($x['id_igdb'], $returnArray1["developers"]) !== false){
                    array_push($developers, $x['name']);
                }
            }
            if(!empty($returnArray1["publisher"])){
                if(array_search($x['id_igdb'], $returnArray1["publisher"]) !== false){
                    array_push($publisher, $x['name']);
                }
            }
            if(!empty($returnArray1["porting"])){
                if(array_search($x['id_igdb'], $returnArray1["porting"]) !== false){
                    array_push($porting, $x['name']);
                }
            }
            if(!empty($returnArray1["supporting"])){
                if(array_search($x['id_igdb'], $returnArray1["supporting"]) !== false){
                    array_push($supporting, $x['name']);
                }
            }

    }

    if(!empty( $developers )){
        $returnArray['developers'] = $developers;
    }
    if(!empty( $porting )){
        $returnArray['porting'] = $porting;
    }
    if(!empty( $publisher )){
        $returnArray['publisher'] = $publisher;
    }
    if(!empty( $supporting )){
        $returnArray['supporting'] = $supporting;
    }
//get involved companies//


//get full game data//

////////platforms////////////first_release_date////name///////////////////
    $resultArray = [];
    $resultArray2 = [];
    $query = "";
    $sql = "";
    $sql="SELECT * FROM games WHERE id_igdb = '".$q."'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($resultArray, $x);
        }
    }

    $returnArray['date'] = $resultArray[0]['first_release_date'];
    $returnArray['name'] = $resultArray[0]['name'];


    $ids = "";
    $ids = explode ("-", $resultArray[0]['platforms']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $result = false;

    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM platforms WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM platforms WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }



    if(count($ids)>1){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        } else {

        }
        $platforms = [];
        foreach($resultArray2 as $x){
            array_push($platforms, $x["name"]);
        }
        $returnArray['platforms'] = $platforms;
    }
//////////////////////////////////////////////////////////////

////////////////////////genres//////////////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['genres']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }

    $genreId = $ids;
    $result = false;

    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM genre WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM genre WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }


    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($resultArray2, $x);
        }
    }
    $genres = [];
    foreach($resultArray2 as $x){
        array_push($genres, $x["name"]);
    }
    $returnArray['genres'] = $genres;
//////////////////////////////////////////////////////////////

///////////////////////////dlcs//////////////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['dlcs']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $result = false;

    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM games WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM games WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }



    if($result!=false){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        }
        $dlcs = [];
        $comb = [];
        foreach($resultArray2 as $x){
            array_push($comb, $x["name"],$x["id_igdb"]);
            array_push($dlcs, $comb);
            $comb = [];
        }
        $returnArray['dlcs'] = $dlcs;    
    }
//////////////////////////////////////////////////////////////

//////////////////////////expansions///////////////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['expansions']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $result = false;

    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM games WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM games WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }



    if($result!=false){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        }
        

        
        $expansions = [];
        $comb = [];
        foreach($resultArray2 as $x){
            array_push($comb, $x["name"],$x["id_igdb"]);
            array_push($expansions, $comb);
            $comb = [];
        }
        $returnArray['expansions'] = $expansions;    
    }
//////////////////////////////////////////////////////////////

/////////////////////////game_engines////////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['game_engines']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $result = false;

    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM engine WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM engine WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }



    if($result!=false){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        }
        $engines = [];
        foreach($resultArray2 as $x){
            array_push($engines, $x["name"]);
        }
        $returnArray['engines'] = $engines;    
    }
//////////////////////////////////////////////////////////////

////////////////////////game_modes//////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['game_modes']) ;
    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $result = false;
    if(count($ids)>=1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM gamemode WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM gamemode WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }



    if($result!=false){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        }

        $gamemode = [];
        foreach($resultArray2 as $x){
            array_push($gamemode, $x["name"]);
        }
        $returnArray['gamemode'] = $gamemode;    
    }
//////////////////////////////////////////////////////////////


////////////////////////standalone_expansions//////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['standalone_expansions']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $result = false;

    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM games WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM games WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }


    if($result!=false){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        }    
        $expansions = [];
        $comb = [];
        foreach($resultArray2 as $x){
            array_push($comb, $x["name"],$x["id_igdb"]);
            array_push($expansions, $comb);
            $comb = [];
        }
        $returnArray['standalone_expansions'] = $expansions;    
    }
//////////////////////////////////////////////////////////////

///////////////////////themes///////////////////////////////
    $resultArray2 = [];
    $ids = "";
    $query = "";
    $sql = "";
    $ids = explode ("-", $resultArray[0]['themes']) ;

    foreach ($ids as $key => $id) {
        if($id==""){
            unset($ids[$key]);
        }
    }
    $themeId = $ids;
    $result = false;
    
    if(count($ids)>1){
        foreach($ids as $x){
            $query .= " OR id_igdb = $x";
        }
        $query = substr($query, 14); 
        $sql="SELECT * FROM theme WHERE id_igdb = $query";
        $result = $con->query($sql);
    }elseif(count($ids)==1){
        $sql="SELECT * FROM theme WHERE id_igdb = '$ids[0]'";
        $result = $con->query($sql);
    }



    if($result!=false){
        if ($result->num_rows > 0) {
            foreach($result as $x){
                array_push($resultArray2, $x);
            }
        }
        $themes = [];
        foreach($resultArray2 as $x){
            array_push($themes, $x["name"]);
        }
        $returnArray['themes'] = $themes;    
    }

//////////////////////////////////////////////////////////////

////get old preference////
    $sql = "SELECT likes_t,likes_g FROM users WHERE id=$userId";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        foreach($result as $x){
            array_push($preferences, $x);
        }
    }
//default value if preference null
    if($preferences[0]["likes_t"]==NULL && $preferences[0]["likes_g"]==NULL){
    $genreIdString = "";
    $themeIdString = "";

    foreach ($genreId as  $value) {
       $genreIdString .= $value."-0.1,";
    }
    foreach ($themeId as  $value) {
        $themeIdString .= $value."-0.1,";
    }
    $sql = "UPDATE users SET likes_t='$themeIdString' , likes_g='$genreIdString' WHERE id='$userId'";
    $con->query($sql);
////////////////////////////////
}else{
    //get info with score
        $ids = explode (",", $preferences[0]["likes_t"]) ;

        foreach ($ids as $key => $id) {
            if($id==""){
                unset($ids[$key]);
            }
        }
        $themes = $ids;
        $themesFinal = "";
        $arrayIdsUserThemes = [];
        $ids = explode (",", $preferences[0]["likes_g"]) ;
        foreach ($ids as $key => $id) {
            if($id==""){
                unset($ids[$key]);
            }
        }
        $genres = $ids;
        $genresFinal = "";
        $arrayIdsUserGenres = [];
    ///////////////////////

    foreach ($themes as  $id) {
        $split = explode("-", $id);
        array_push($arrayIdsUserThemes, $split[0]);
        if(in_array($split[0], $themeId)){
            $themesFinal.=$split[0]."-".($split[1]+0.1).",";
        }else{
            $themesFinal.=$split[0]."-".($split[1]).",";
        }
    }
    $result = array_diff($arrayIdsUserThemes, $themeId);
    foreach ($result as $value) {
        if(!in_array($value, $arrayIdsUserThemes)){
            $themesFinal.= $value."-0.1,";
        }
    }
    $result = array_diff($themeId,$arrayIdsUserThemes);
    foreach ($result as $value) {
        if(!in_array($value, $arrayIdsUserThemes)){
            $themesFinal.= $value."-0.1,";
        }
    }
  
    
    foreach ($genres as  $id) {
        $split = explode("-", $id);
        array_push($arrayIdsUserGenres, $split[0]);
        if(in_array($split[0], $genreId)){
            $genresFinal.=$split[0]."-".($split[1]+0.1).",";
        }else{
            $genresFinal.=$split[0]."-".($split[1]).",";
        }
    }
    $result = array_diff($arrayIdsUserGenres, $genreId);
    foreach ($result as $value) {
        if(!in_array($value, $arrayIdsUserGenres)){
            $genresFinal.= $value."-0.1,";
        }
    }
    $result = array_diff($genreId,$arrayIdsUserGenres);
    foreach ($result as $value) {
        if(!in_array($value, $arrayIdsUserGenres)){
            $genresFinal.= $value."-0.1,";
        }
    }

    $sql = "UPDATE users SET likes_t='$themesFinal' , likes_g='$genresFinal' WHERE id='$userId'";
    $con->query($sql);
}

$con->close();
echo json_encode($returnArray);
?>