<?php
    function writeData($gameId, $gameName, $platformsID,$genresID,$dlcID,
    $expansionsID,$releasedate,$gameEngineID,$gamemodesID,
    $involvedcompaniesID,$SAexpansions,
    $themesIDs,$storyLine,$summary){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO games (id_igdb,name,platforms,genres,dlcs,
        expansions,first_release_date,game_engines,game_modes,
        involved_companies,standalone_expansions,
        themes,storyline,summary)
        
        VALUES ($gameId, '$gameName', '$platformsID','$genresID','$dlcID',
        '$expansionsID','$releasedate','$gameEngineID','$gamemodesID',
        '$involvedcompaniesID','$SAexpansions',
        '$themesIDs','$storyLine','$summary')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }



    function writeExtra($id,$name,$table){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO $table (id_igdb,name)

        VALUES ('$id','$name')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function writeCompanies($id,$name){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO company (id_igdb,name)

        VALUES ('$id','$name')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function writeInvolvedCompanies($id,$company,$developer,$game,$porting,$publisher,$supporting){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO involvedcompanies (id_igdb,company,developer,game,porting,publisher,supporting)

        VALUES ('$id','$company','$developer','$game','$porting','$publisher','$supporting')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function writeWebsites($id,$url,$game,$category){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO website (id_igdb,url,game,category)

        VALUES ('$id','$url','$game','$category')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function writeScreens($id,$game,$linkIMG){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO screenshots (id_igdb,id_game,link)

        VALUES ('$id','$game','$linkIMG')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function writeCovers($id,$game,$linkIMG){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO covers (id_igdb,id_game,link)

        VALUES ('$id','$game','$linkIMG')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function writeVideos($id,$game,$linkVid){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "igdb_data";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO videos (id_igdb,id_game,link)

        VALUES ('$id','$game','$linkVid')";

        if ($conn->query($sql) === TRUE) {
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    function companies($IGDB,$maxQuery,$minQuery){
        ini_set('memory_limit', '-1');
        $options = array(
            'fields' => 'name,published,id',
            'limit' => 500,
            'where' => array(
                array(
                    'field' => 'id', 
                    'postfix' => '<=',             
                    'value' => $maxQuery,
                ),
                array(
                    'field' => 'id', 
                    'postfix' => '>=',             
                    'value' => $minQuery,
                ),
                
            )
        );

        $companies = $IGDB->company($options,false);
        
        for($k = 0;$k<count($companies);$k++){
            try {
                $name = $companies[$k] -> name;
            } catch (\Throwable $th) {
                $name = "-";
            }
            try {
                $id = $companies[$k] -> id;
            } catch (\Throwable $th) {
                $id = "-";
            }
            
            
            writeCompanies($id,addslashes($name));
            set_time_limit(60);
        }
    }
    function involvedCompanies($IGDB,$maxQuery,$minQuery){
        ini_set('memory_limit', '-1');
        $options = array(
            'fields' => 'id,company,developer,game,porting,publisher,supporting',
            'limit' => 500,
            'where' => array(
                array(
                    'field' => 'id', 
                    'postfix' => '<=',             
                    'value' => $maxQuery,
                ),
                array(
                    'field' => 'id', 
                    'postfix' => '>=',             
                    'value' => $minQuery,
                ),
                
            )
        );

        $companies = $IGDB->involved_company($options,false);
        
        for($k = 0;$k<count($companies);$k++){
            try {
                $company = $companies[$k] -> company;
            } catch (\Throwable $th) {
                $company = "-";
            }
            try {
                $id = $companies[$k] -> id;
            } catch (\Throwable $th) {
                $id = "-";
            }
            try {
                $developer = $companies[$k] -> developer;
            } catch (\Throwable $th) {
                $developer = "-";
            }
            try {
                $game = $companies[$k] -> game;
            } catch (\Throwable $th) {
                $game = "-";
            }
            try {
                $porting = $companies[$k] -> porting;
            } catch (\Throwable $th) {
                $porting = "-";
            }
            try {
                $publisher = $companies[$k] -> publisher;
            } catch (\Throwable $th) {
                $publisher = "-";
            }
            try {
                $supporting = $companies[$k] -> supporting;
            } catch (\Throwable $th) {
                $supporting = "-";
            }
            writeInvolvedCompanies($id,$company,$developer,$game,$porting,$publisher,$supporting);
            set_time_limit(60);
        }
    }
    function websites($IGDB,$maxQuery,$minQuery){
        ini_set('memory_limit', '-1');
        $options = array(
            'fields' => 'category,game,url,id',
            'limit' => 500,
            'where' => array(
                array(
                    'field' => 'id', 
                    'postfix' => '<=',             
                    'value' => $maxQuery,
                ),
                array(
                    'field' => 'id', 
                    'postfix' => '>=',             
                    'value' => $minQuery,
                ),
                
            )
        );

        $websites = $IGDB->website($options,false);
        
        for($k = 0;$k<count($websites);$k++){
            try {
                $url = $websites[$k] -> url;
            } catch (\Throwable $th) {
                $url = "-";
            }
            try {
                $id = $websites[$k] -> id;
            } catch (\Throwable $th) {
                $id = "-";
            }
            try {
                $game = $websites[$k] -> game;
            } catch (\Throwable $th) {
                $game = "-";
            }
            try {
                $category = $websites[$k] -> category;
            } catch (\Throwable $th) {
                $category = "-";
            }
            
            writeWebsites($id,addslashes($url),$game,$category);
            set_time_limit(60);
        }
    }
    function screens($IGDB,$maxQuery,$minQuery){
        $optionsScreenShot = array(
            'fields' => 'game, image_id, id',
            'limit' => 500,
            'sort' => ('game desc'),
            'where' => array(
                array(
                    'field' => 'id', 
                    'postfix' => '<=',             
                    'value' => $maxQuery,
                ),
                array(
                    'field' => 'id', 
                    'postfix' => '>=',             
                    'value' => $minQuery,
                ),
                
            )
        );

        $screens = $IGDB->screenshot($optionsScreenShot);

        for($k = 0;$k<count($screens);$k++){
            try {
                $id = $screens[$k] -> id;
            } catch (\Throwable $th) {
                $id = "-";
            }
            try {
                $game = $screens[$k] -> game;
            } catch (\Throwable $th) {
                $game = "-";
            }
            try {
                $linkIMG = "";
                $imageid = $screens[$k]->image_id;
                $linkIMG = "https://images.igdb.com/igdb/image/upload/t_screenshot_med/". $imageid .".jpg";
            } catch (\Throwable $th) {
                $linkIMG = "-";
            }
            
            writeScreens($id,$game,addslashes($linkIMG));
            set_time_limit(60);
        }



    }
    function covers($IGDB,$maxQuery,$minQuery){
        $optionsScreenShot = array(
            'fields' => 'game, image_id, id',
            'limit' => 500,
            'sort' => 'game asc',
            'where' => array(
                array(
                    'field' => 'game', 
                    'postfix' => '<=',             
                    'value' => $maxQuery,
                ),
                array(
                    'field' => 'game', 
                    'postfix' => '>=',             
                    'value' => $minQuery,
                ),
                
            )
        );

        $covers = $IGDB->cover($optionsScreenShot);

        for($k = 0;$k<count($covers);$k++){
            try {
                $id = $covers[$k] -> id;
            } catch (\Throwable $th) {
                $id = "-";
            }
            try {
                $game = $covers[$k] -> game;
            } catch (\Throwable $th) {
                $game = "-";
            }
            try {
                $linkIMG = "";
                $imageid = $covers[$k]->image_id;
                $linkIMG = "https://images.igdb.com/igdb/image/upload/t_cover_big/".$imageid.".jpg";
            } catch (\Throwable $th) {
                $linkIMG = "-";
            }
            writeCovers($id,$game,addslashes($linkIMG));
            set_time_limit(60);
        }
    }
    function video($IGDB,$maxQuery,$minQuery){
        $optionsvideo = array(
            'fields' => 'id,game,video_id',
            'limit' => 500,
            'sort' => ('game desc'),
            'where' => array(
                array(
                    'field' => 'game', 
                    'postfix' => '<=',             
                    'value' => $maxQuery,
                ),
                array(
                    'field' => 'game', 
                    'postfix' => '>=',             
                    'value' => $minQuery,
                ),
                
            )
        );

        $covers = $IGDB->game_video($optionsvideo);

        for($k = 0;$k<count($covers);$k++){
            try {
                $id = $covers[$k] -> id;
            } catch (\Throwable $th) {
                $id = "-";
            }
            try {
                $game = $covers[$k] -> game;
            } catch (\Throwable $th) {
                $game = "-";
            }
            try {
                $linkVid = "";
                $vidid = $covers[$k]->video_id;
                $linkVid = "https://www.youtube.com/watch?v=".$vidid;
            } catch (\Throwable $th) {
                $linkIMG = "-";
            }
            writeVideos($id,$game,$linkVid);
            set_time_limit(60);
        }
    }
    function writeFunctionFull($IGDB,$maxQuery,$minQuery){
        ini_set('memory_limit', '-1');
        $colNameAr = ["id", "name", "platforms", "genres", "dlcs", "expansions", "first_release_date", "game_engines", "game_modes", "involved_companies", "multiplayer_modes",
        "standalone_expansions", "storyline", "summary","themes"];
        $varNameAr = 
        ["gameId","gameName","platformsID","genresID","dlcID","expansionsID","releasedate","gameEngineID","gamemodesID","involvedcompaniesID","multiplayermodesID",
        "SAexpansions","storyLine","summary","themesIDs"];


        ///////////Query options///////////
            $options = array(
                'fields' =>  'id, name, platforms, genres,dlcs, expansions, first_release_date, game_engines,
                             game_modes, involved_companies, multiplayer_modes,
                             standalone_expansions,storyline, summary,themes, websites',

                'limit' => 500,
                'sort' => 'id asc',
                'where' => array(
                    array(
                        'field' => 'id', 
                        'postfix' => '<=',             
                        'value' => $maxQuery,
                    ),
                    array(
                        'field' => 'id', 
                        'postfix' => '>=',             
                        'value' => $minQuery,
                    ),
                    
                )
            );
        //////////Variables/Functions//////////////
            $result = $IGDB->game($options);
        /////////////////////////////////////  
        for($j = 0; $j<count($result);$j++){
            for($i = 0; $i<count($colNameAr);$i++){
                if($i == 0){
                    $var = $result[$j]->{$colNameAr[$i]};
                    ${$varNameAr[$i]} = $var;
                }
                elseif($i == 1 ||  $i == 12 ||  $i == 13){
                    try {
                        ${$varNameAr[$i]} = addslashes($result[$j]->{$colNameAr[$i]});
                    }catch (\Throwable $th) {
                        ${$varNameAr[$i]} = "-";
                    }  
                }
                elseif($i == 6){
                    try {
                        ${$varNameAr[$i]} = date("Y-m-d", $result[$j]->{$colNameAr[$i]});
                    }catch (\Throwable $th) {
                        ${$varNameAr[$i]} = "-";
                    }  
                }
                ////////////////////////////////
                else{  
                   try {
                        ${$varNameAr[$i]} = "";
                        $varFull = "";
                        $var = $result[$j]->{$colNameAr[$i]};
                        for($k = 0;$k<count($var);$k++){
                            $varFull .= $var[$k].'-';
                        }
                        ${$varNameAr[$i]} = $varFull;
                   }catch (\Throwable $th) {
                       ${$varNameAr[$i]} = "-";
                   }
                }
            }

            writeData($gameId, $gameName, $platformsID,$genresID,$dlcID,
            $expansionsID,$releasedate,$gameEngineID,$gamemodesID,
            $involvedcompaniesID,$SAexpansions,
            $themesIDs,$storyLine,$summary);
            set_time_limit(30);
        }  
    }
    function writeFunctionExtra($IGDB,$maxQuery,$minQuery){
        /*
        //Write Platforms//
            $table = "platforms";

            $optionsPlatform = array(
                'fields' => 'id,name',
                'limit' => 500,
            );
            $resultPlatforms = $IGDB->platform($optionsPlatform,false);
            foreach($resultPlatforms as $x){
                $id = $x -> id;
                $name = $x -> name;
                writeExtra($id,$name,$table);
            }
        //Write Platforms//

        //Write Genre//
            $table = "genre";
            $optionsGenre = array(
                'sort' => 'id asc',
                'fields' => 'id,name',
                'limit' => 500,
            );
            $Genre = $IGDB->genre($optionsGenre,false);
            foreach($Genre as $x){
                $id = $x -> id;
                $name = $x -> name;
                writeExtra($id,addslashes($name),$table);
            }
        //Write Genre//
        
        
        //Write engines//
            $maxQuery = 500;
            $minQuery = 1;
            $table = "engine";
            for($i=0;$i<2;$i++){
                $optionsEngine = array(
                    'sort' => 'id asc',
                    'fields' => 'id,name',
                    'limit' => 500,
                    'where' => array(
                        array(
                            'field' => 'id', 
                            'postfix' => '<=',             
                            'value' => $maxQuery,
                        ),
                        array(
                            'field' => 'id', 
                            'postfix' => '>=',             
                            'value' => $minQuery,
                        ),
                        
                    )
                );

                $Engines = $IGDB->game_engine($optionsEngine,false);
                foreach($Engines as $x){
                    $id = $x -> id;
                    $name = $x -> name;
                    writeExtra($id,addslashes($name),$table);
                }
                $maxQuery+=500;
                $minQuery+=500;
            }
        //Write engines//
        
        //Write gamemodes//
            $table = "gamemode";
            $optionsGameModes = array(
                'sort' => 'id asc',
                'fields' => 'id,name',
                'limit' => 500,
            );
            $GameModes = $IGDB->game_mode($optionsGameModes,false);
            foreach($GameModes as $x){
                $id = $x -> id;
                $name = $x -> name;
                writeExtra($id,addslashes($name),$table);
            }
        //Write gamemodes//

        //Write companies//
            $options = array(
                'sort' => 'id asc',
                'fields' => '*',
                'limit' => 500,
            );
            $companiesCount = $IGDB->company($options,true);
            $count = round($companiesCount->count);
            $maxQuery = 500;
            $minQuery = 1;
            for($i = 0;$i<($count/500)+1;$i++){
                companies($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
            }
        //Write companies//

        //Write involved companies//
            $options = array(
                'sort' => 'id asc',
                'fields' => '*',
                'limit' => 500,
            );
            $companiesCount = $IGDB->involved_company($options,true);
            $count = round($companiesCount->count);
            $maxQuery = 500;
            $minQuery = 1;
            for($i = 0;$i<($count/500)+1;$i++){
                involvedCompanies($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
            }
        //Write involved companies//

        //Write themes//
            $table = "theme";
            $optionsTheme = array(
                'sort' => 'id asc',
                'fields' => 'id,name',
                'limit' => 500,
            );
            $resultTheme = $IGDB->theme($optionsTheme,false);
            foreach($resultTheme as $x){
                $id = $x -> id;
                $name = $x -> name;
                writeExtra($id,$name,$table);
            }
        //Write themes//

        //Write websites//
            $optionsWeb = array(
                'sort' => 'id asc',
                'fields' => 'category,game,url,id',
                'limit' => 500,
            );
            $webcount = $IGDB->website($optionsWeb,true);
            
            $webcount=($webcount->count)/500;
            $count = round($webcount);
            echo($count);
            $maxQuery = 500;
            $minQuery = 1;
            for($i = 0;$i<($count/500)+1;$i++){
                websites($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
            }
        //Write websites//

        //Write screenshots//
            $optionsWeb = array(
                'sort' => 'id asc',
                'fields' => 'id,game,image_id',
                'limit' => 500,
            );
            $count = $IGDB->screenshot($optionsWeb,true);
            $maxQuery = 500;
            $minQuery = 1;
            
            for($i = 0;$i<($count->count/500)+1;$i++){
                screens($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
            }
        //Write screenshots//

        //Write Video//
            $optionsVid = array(
                'sort' => 'id asc',
                'fields' => 'id,game,video_id',
                'limit' => 500,
            );
            $count = $IGDB->game_video($optionsVid,true);
            $maxQuery = 500;
            $minQuery = 1;
            
            for($i = 0;$i<($count->count/500)+1;$i++){
                video($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
            }
        //Write Video//

        //Write Cover//
            $optionsWeb = array(
                'fields' => 'id,game,image_id',
                'limit' => 500,
            );
            $count = $IGDB->cover($optionsWeb,true);
            $maxQuery = 500;
            $minQuery = 1;
            
            for($i = 0;$i<($count->count/500)+1;$i++){
                covers($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
            }
        //Write Cover//
        */
    }
    function migrate(){
        require 'C:/Users/PC/Desktop/stuff/Final/GameLibrary/resources/views/src/class.igdb.php';
        $IGDB = new IGDB('SSH KEY');

        $maxQuery = 500;
        $minQuery = 1;
        
        ///////////Query options///////////
        $options = array(
            'fields' =>  'id',
            'limit' => 500,
        );
        //////////Variables/Functions//////////////
        
            $count = $IGDB->game($options,true);
        
            for($i = 0;$i<($count->count/500)+1;$i++){
                writeFunctionFull($IGDB,$maxQuery,$minQuery);
                $maxQuery += 500;
                $minQuery += 500;
        }
        //writeFunctionExtra($IGDB,$maxQuery,$minQuery);
    }
    function retrieve($results,$query){
        if($query == false){
            $sql = "SELECT id_igdb,name,platforms,genres,dlcs,
            expansions,first_release_date,game_engines,game_modes,
            involved_companies,standalone_expansions,
            themes,storyline,summary FROM games WHERE first_release_date != '-' LIMIT $results;";
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
        return($returnArray);
    }
?>