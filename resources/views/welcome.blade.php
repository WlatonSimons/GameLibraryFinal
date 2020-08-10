<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Exo:100,200,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300" rel="stylesheet">

        <title>Baigiamasis</title>
    </head>
    <body>
    @if (isset(Auth::user()->email))
        <style>
                * {
            font-family: 'Exo', sans-serif;
            }
            body{

             background: black;
            }
            #recBut{
                position: absolute;
                left: 10px;
                width: 300px;
                top: 10px;
            }
            #recLsBut{
                position: absolute;
                left: 10px;
                width: 300px;
                top: 35px;
            }
            #FavBut{
                position: absolute;
                left: 10px;
                width: 300px;
                top: 60px;
            }
            .profileImgDiv{
                position: absolute;
                left: 3%;
                top: 3%;
                padding: 5px;
            }
            .profileButton{
                display: inline;
            }
            .profileInfoDiv{
                position: absolute;
                left: 3%;
                top: 35%;
                padding: 5px;
            }
            .profileNavDiv{
                position: absolute;
                right: 40%;
                top: 2%;
                height: 100%;
                border-left: 3px solid #ccc; 
            }
            #mydivheader {
                padding: 5px;
                z-index: 22;
                border: 3px solid #ccc;
                border-bottom: 3px solid #ccc;
                background-color: #f3f3f3;
                background: #ccc;
            }
            #pages {
                text-align: center;
                    width: 88%;
                    font-size: 20px;
                    padding: 10px;
                    color: white;
            }
            #mainContainer {
                width: 90%;
            }
            .searchTab{
                background-color: black;
                border: 3px solid #ccc;
                width: 10%;
                height: 98%;
                top: 1%;
                right: 0%;
                position: fixed;
                z-index: 21;
                float: right;
                border-top-left-radius: 3%;
                border-bottom-left-radius: 3%;

                color: #eee;
            }
            .searchbox{
                width: 95%;
                padding: 3px;
            }
            .card{
                width: 150px;
                height: 150px;
                display: inline;
                padding: 5px;
                z-index: 10;
            }
            .card:hover{
                opacity: 0.8;
            }
            .popCard{
                overflow: hidden;
                position:fixed;
                top: 25%;
                left: 30%;
                width: 800px;
                height: 629px;
                border: 3px solid #ccc;
                background-color: #f3f3f3;
                background: black;
                color: white;
                border-top-left-radius: 3%;
                border-bottom-left-radius: 3%;
                z-index: 21;
            }
            img.cardImg{
                width: 200px;
                height: 300px;
                border-radius: 5%;
                z-index: 10;
            }
            img.popCardImg{
                padding: 10px;
                width: 100px;
                height: 150px;
                border-top-left-radius: 3%;
                border-bottom-left-radius: 3%;
                z-index: 10;
            }
            #popText{
                border-left: 2px solid #ccc;
                float: right;
                overflow: auto;
                padding: 25px;
                width: 250px;
                height: 300px;
                z-index: 10;
                color: 	#FFFAFA;
                font-family: 'Cardo', serif;
            }
            #divIMG{
                background-size:cover;
                float: right;
                position: absolute;
                top: 6%;
                width: 270px;
                height: 300px;
                border-radius: 5%;
                opacity: 0.3;
                z-index: -1;
            }
            #InfoTextBox{
                border-top: 2px solid #ccc;
                position:absolute;
                width: 60%;
                height: 150px;
                top: 58.2%;
                color: 	#FFFAFA;
                z-index: 19;
            }
            #InfoTextBox2{
                border-top: 2px solid #ccc;
                border-left: 2px solid #ccc;
                position:absolute;
                float: right;
                width: 39%;
                top: 58.2%;
                left: 59.9%;
                height: 100%;
                color: 	#FFFAFA;
                z-index: 19;
                padding: 5px;
                font-family: 'Cardo', serif;
            }
            .InfoDropBox{
                position:absolute;
                width: 50%;
                height: 50%
                color: 	#FFFAFA;
                z-index: 19;
                display: inline;
                float:right;
            }
            .InfoDropBox2{
                left: 49.9%;
                position:absolute;
                width: 50%;
                height: 100%
                color: 	#FFFAFA;
                z-index: 19;
                display: inline;
                float:right;
            }
            #divScreen{
                background-size: 100% 100%;
                background-color: black;
                float: left;
                position: absolute;
                width: 62%;
                height: 350px;
                opacity: 0.4;
            }
            #divScreen:hover{
                border-bottom-left-radius: 3%;
                opacity: 1;
                width: 100%;
                height: 100%;
                z-index: 51;
            }
            .collapsible {
                background-color: #eee;
                color: #444;
                cursor: pointer;
                width: 100%;
                height: 20%;
                border: none;
                text-align: center;
                outline: none;
                font-size: 15px;
            }
            .content {
                background-color: gray;
                max-height: 0;
                width: 100%;
                overflow: hidden;
                text-align: center;
                transition: max-height 0.2s ease-out;
            }
            .content2 {
                background-color: gray;
                max-height: 0;
                width: 100%;
                overflow: hidden;
                text-align: center;
                transition: max-height 0.2s ease-out;
            }
            .active, .collapsible:hover {
                background-color: #ccc;
            }
            .collapsible:after {
                content: '\02795'; /* Unicode character for "plus" sign (+) */
                font-size: 13px;
                color: white;
                float: right;
                margin-left: 5px;
                }

            .active:after {
                content: "\2796"; /* Unicode character for "minus" sign (-) */
            }
            .close {
                position: absolute;
                cursor: pointer;
                right: 3%;
                top: -0.5%;
                width: 3px;
                height: 3px;
                opacity: 0.8;
                z-index: 50;
            }
            .min {
                font-weight: 900;
                position: absolute;
                cursor: pointer;
                right: 6%;
                top: -2%;
                width: 5px;
                height: 5px;
                font-size: 20pt;
                opacity: 0.8;
                z-index: 50;
            }
            .close:hover {
                opacity: 1;
            }
            .close:before, .close:after {
                position: absolute;
                left: 15px;
                content: ' ';
                height: 20px;
                width: 2px;
                background-color: yellow;
            }
            .close:before {
                transform: rotate(45deg);
            }
            .close:after {
                transform: rotate(-45deg);
            }
            
        </style>
        <script>
            function dragElement(elmnt) {
                var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
                if (document.getElementById(elmnt.id + "header")) {
                    // if present, the header is where you move the DIV from:
                    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
                } else {
                    // otherwise, move the DIV from anywhere inside the DIV:
                    elmnt.onmousedown = dragMouseDown;
                }

                function dragMouseDown(e) {
                    e = e || window.event;
                    e.preventDefault();
                    // get the mouse cursor position at startup:
                    pos3 = e.clientX;
                    pos4 = e.clientY;
                    document.onmouseup = closeDragElement;
                    // call a function whenever the cursor moves:
                    document.onmousemove = elementDrag;
                }

                function elementDrag(e) {
                    e = e || window.event;
                    e.preventDefault();
                    // calculate the new cursor position:
                    pos1 = pos3 - e.clientX;
                    pos2 = pos4 - e.clientY;
                    pos3 = e.clientX;
                    pos4 = e.clientY;
                    // set the element's new position:
                    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
                }

                function closeDragElement() {
                    // stop moving when mouse button is released:
                    document.onmouseup = null;
                    document.onmousemove = null;
                }
            }
            function showAlert(id) {   
                                let id_game = id;                                  
                                var user = {!! json_encode($user) !!};                                 
                                xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                    }
                                };
                                xmlhttp.open("GET","/uploadFav.php?q1="+id_game+"&q2="+user.id);
                                xmlhttp.send();
            };
            function getExtraData(id){
                var user = {!! json_encode($user) !!};
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        developers = JSON.parse(this.responseText);
                        
                        var divFlex = document.createElement("DIV");
                        divFlex.className = "InfoDropBox";
                        var divFlex2 = document.createElement("DIV");
                        divFlex2.className = "InfoDropBox2";

                        var button = document.createElement("BUTTON");
                            button.className = "collapsible";
                            button.innerHTML = "Developers";
                            for (i = 0; i < 1; i++) {
                                button.addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    var content = this.nextElementSibling;
                                    if (content.style.maxHeight){
                                    content.style.maxHeight = null;
                                    } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                    }
                                });
                            }

                            divFlex.appendChild(button);
                        var div = document.createElement("DIV");
                            div.className = "content";
                            try {
                                developers.developers.forEach(element => {
                                div.innerHTML += element + "<br>";
                            });
                            } catch (error) {
                                div.innerHTML += "None" + "<br>";   
                            }

                        divFlex.appendChild(div);

                        var button = document.createElement("BUTTON");
                            button.className = "collapsible";
                            button.innerHTML = "Expansions";
                            for (i = 0; i < 1; i++) {
                                button.addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    var content = this.nextElementSibling;
                                    if (content.style.maxHeight){
                                    content.style.maxHeight = null;
                                    } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                    }
                                });
                            }

                        divFlex.appendChild(button);
                        var div = document.createElement("DIV");       
                            try {
                                div.className = "content";
                                developers.expansions.forEach(element => {
                                    div.innerHTML += element + "<br>";
                                });
                            } catch (error) {
                                div.innerHTML += "None" + "<br>";   
                            }
                        divFlex.appendChild(div);

                        var button = document.createElement("BUTTON");
                            button.className = "collapsible";
                            button.innerHTML = "Publishers";
                            for (i = 0; i < 1; i++) {
                                button.addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    var content = this.nextElementSibling;
                                    if (content.style.maxHeight){
                                    content.style.maxHeight = null;
                                    } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                    }
                                });
                            }
                        divFlex2.appendChild(button);
                        var div = document.createElement("DIV");
                        try {
                            div.className = "content2";
                            developers.publisher.forEach(element => {
                                div.innerHTML += element + "<br>";
                            });
                        } catch (error) {
                                div.innerHTML += "None" + "<br>";   
                            }
                        divFlex2.appendChild(div);


                        var button = document.createElement("BUTTON");
                            button.className = "collapsible";
                            button.innerHTML = "DLC";
                            for (i = 0; i < 1; i++) {
                                button.addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    var content = this.nextElementSibling;
                                    if (content.style.maxHeight){
                                    content.style.maxHeight = null;
                                    } else {
                                    content.style.maxHeight = content.scrollHeight + "px";
                                    }
                                });
                            }
                        divFlex2.appendChild(button);
                        var div = document.createElement("DIV");
                            try {
                                div.className = "content2";
                                developers.dlcs.forEach(element => {
                                    div.innerHTML += element[0] + "<br>";
                                });
                            } catch (error) {
                                div.innerHTML += "None" + "<br>";   
                            }
                            divFlex.appendChild(div);
                        divFlex2.appendChild(div);

                        InfoTextBox.appendChild(divFlex);
                        InfoTextBox.appendChild(divFlex2);

                        if(developers["date"]){
                            InfoTextBox2.innerHTML += "Release date: " + developers["date"];
                            InfoTextBox2.innerHTML += "<br>";
                        }
                        if(developers["name"]){
                            InfoTextBox2.innerHTML += "Game name: " + developers["name"];
                        InfoTextBox2.innerHTML += "<br>";
                        }
                        if(developers["platforms"]){
                            InfoTextBox2.innerHTML += "Platforms: " + developers["platforms"];
                        InfoTextBox2.innerHTML += "<br>";
                        }
                        if(developers["genres"]){
                            InfoTextBox2.innerHTML += "Genre: " + developers["genres"];
                        InfoTextBox2.innerHTML += "<br>";
                        }
                        if(developers["themes"]){
                            InfoTextBox2.innerHTML += "Themes: " + developers["themes"];
                        InfoTextBox2.innerHTML += "<br>";
                        }
                        if(developers["engines"]){
                            InfoTextBox2.innerHTML += "Engines: " + developers["engines"];
                        InfoTextBox2.innerHTML += "<br>";
                        }
                    }
                };
                xmlhttp.open("GET","/getExtraData.php?q="+id+"&q2="+user.id);
                xmlhttp.send();
            }
            function getScreens(callback,id,screen) {
                $.get("/getScreens.php?q="+id, callback);
            }       
            function build(obj,query){
                window.scrollTo(0, 0);
                console.log(obj);
                
                var container = document.getElementById('mainContainer');
                var searchTab = document.getElementById('searchTab');   

                pagesDiv = document.getElementById("pages");
                pagesDiv.innerHTML = "";

                if(query!=3){
                    var pagesArr = obj[2].split(",");
                    var maxPages = Math.round((pagesArr[0]/48));
                    try {
                        pages = document.getElementById('page'); 
                        pages.remove();  
                    } catch (error) {
                        
                    }
                    pages = document.createElement('input');                   
                    pages.type = "number";
                    pages.id = "page";
                    pages.min = "1";
                    pages.max =  maxPages;
                    if(query==0){
                        pages.onchange = function(e) { 
                            if(event.target.value>maxPages){
                                getData(maxPages);
                            }else{
                                getData(event.target.value);
                            }   
                        }  
                    }
                    else if (query==1) {
                        pages.onchange = function(e) { 
                            if(event.target.value>maxPages){
                                getSearchData(maxPages);
                            }else{
                                getSearchData(event.target.value);
                            }   
                        }  
                    }

                    searchTab.appendChild(pages);      

                    pagesDiv = document.getElementById("pages");
                    pagesDiv.innerHTML = "";

                    //Build pages
                    pages = obj[2].split(",");
                    
                    pagesDiv = document.getElementById("pages");
                    pagesDiv.innerHTML = "";

                    if(pages[1] >= 3){
                        var href = document.createElement("a");
                                href.href = "javascript:void(0);";
                                href.innerHTML = " <<    ";
                                if(query==0){
                                    href.onclick = function(e) { 
                                        getData(parseInt(pages[1])-2);
                                    } 
                                }
                                else if (query==1) {
                                    href.onclick = function(e) { 
                                        getSearchData(parseInt(pages[1])-2);
                                    } 
                                }
                                pagesDiv.appendChild(href);   
                    }
                    if(pages[1] != 1){                  
                        var href = document.createElement("a");
                                href.href = "javascript:void(0);";
                                href.innerHTML = " <    ";
                                if(query==0){
                                    href.onclick = function(e) { 
                                        getData(parseInt(pages[1])-1);
                                    } 
                                }
                                else if (query==1) {
                                    href.onclick = function(e) { 
                                        getSearchData(parseInt(pages[1])-1);
                                    } 
                                }
                                pagesDiv.appendChild(href);   
                    }
                    var count = 0;
                    for (let i= parseInt(pages[1])-5; i <= pages[1]; i++) {
                        if(i>=1 && i!=pages[1]){
                            var href = document.createElement("a");
                                href.href = "javascript:void(0);";
                                href.innerHTML = "    "+i+"    ";
                                if(query==0){
                                    href.onclick = function(e) { 
                                        getData(i)
                                    } 
                                }
                                else if (query==1) {
                                    href.onclick = function(e) { 
                                        getSearchData(i);
                                    } 
                                }
                            pagesDiv.appendChild(href);   
                            count++;
                        }
                    }
                    for (let i= pages[1]; i <= parseInt(pages[1])+(10-count); i++) {
                        if(i>pages[1] && i!=pages[1] && i<maxPages){
                            var href = document.createElement("a");
                                href.href = "javascript:void(0);";
                                href.innerHTML ="    "+i+"    ";
                                if(query==0){
                                    href.onclick = function(e) { 
                                        getData(i)
                                    } 
                                }
                                else if (query==1) {
                                    href.onclick = function(e) { 
                                        getSearchData(i);
                                    } 
                                }
                            pagesDiv.appendChild(href);  
                        }
                    }
                    if(pages[1] != maxPages){                  
                        var href = document.createElement("a");
                                href.href = "javascript:void(0);";
                                href.innerHTML = "    >    ";
                                if(query==0){
                                    href.onclick = function(e) { 
                                        getData(parseInt(pages[1])+1);
                                    } 
                                }
                                else if (query==1) {
                                    href.onclick = function(e) { 
                                        getSearchData(parseInt(pages[1])+1);
                                    } 
                                }

                                pagesDiv.appendChild(href);   
                    }
                    if(pages[1] < maxPages-2){
                        var href = document.createElement("a");
                                href.href = "javascript:void(0);";
                                href.innerHTML = "    >>";
                                if(query==0){
                                    href.onclick = function(e) { 
                                        getData(parseInt(pages[1])+2);
                                    } 
                                }
                                else if (query==1) {
                                    href.onclick = function(e) { 
                                        getSearchData(parseInt(pages[1])+2);
                                    } 
                                }
                                pagesDiv.appendChild(href);   
                    }
                }   


                //clear cards
                try {
                    var cards = document.getElementsByClassName('card');
                    while (cards[0]) {
                    cards[0].parentNode.removeChild(cards[0]); 
                    }
                } catch (error) {
                }
                //

                for(i = 0;i<obj[0].length;i++){
                    for(j = 0;j<obj[1].length;j++){
                        if(obj[0][i].id_igdb == obj[1][j].id_game){
                            var source = obj[1][j].link;
                            break;
                        }
                    }    
                    var newDiv = document.createElement("div"); 
                        newDiv.id = i;
                        newDiv.classList.add("card");
                        newDiv.onclick = reply_click; 
                        elem = document.createElement("img"); 
                        elem.classList.add("cardImg"); 
                        elem.src = source;
                    newDiv.appendChild(elem);
                    container.appendChild(newDiv);
                }
                
            }
            function getData(page){
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        obj = JSON.parse(this.responseText);
                        
                        var platform = document.getElementById("platform");
                        obj[3].forEach(element => {
                                var option = document.createElement("option");
                                option.text = element["name"];
                                option.value =  element["id_igdb"];
                                platform.appendChild(option);
                        });
                        var genre = document.getElementById("genre");
                        obj[4].forEach(element => {
                                var option = document.createElement("option");
                                option.text = element["name"];
                                option.value =  element["id_igdb"];
                                genre.appendChild(option);
                        });
                        var theme = document.getElementById("theme");
                        obj[5].forEach(element => {
                                var option = document.createElement("option");
                                option.text = element["name"];
                                option.value =  element["id_igdb"];
                                theme.appendChild(option);
                        });
                        
                        build(obj,0);
                    }
                };

                xmlhttp.open("GET","/getData.php?q1="+page);
                xmlhttp.send();
            }
            function getSearchData(page){
                var name = document.getElementById('nameSearch');
                    name = name.value;
                var genre = document.getElementById('genre');
                    genre = genre.options[genre.selectedIndex].value;
                var theme = document.getElementById('theme')   
                    theme = theme.options[theme.selectedIndex].value;
                var fromDate = document.getElementById('from');
                    fromDate = fromDate.value;
                var toDate = document.getElementById('to');
                    toDate = toDate.value;
                var platforms = document.getElementById('platform');
                    platforms = platforms.options[platforms.selectedIndex].value;        
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        obj = JSON.parse(this.responseText);
                        //console.log(this.responseText);
                        
                        build(obj,1);
                    }
                };
                xmlhttp.open("GET","/getSearchData.php?q="+genre+"&q1="+page+"&q2="+theme+"&q3="+platforms+"&q4="+fromDate+"&q5="+toDate+"&q6="+name);                     
                xmlhttp.send();
            }
            function getRecomendations(likes_t,likes_g,user,recommended){
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        obj = JSON.parse(this.responseText);          
                        build(obj,3);
                    }
                };
                xmlhttp.open("GET","/getRecData.php?q="+likes_t+"&q2="+likes_g+"&q3="+user+"&q4="+recommended);
                xmlhttp.send();
            }
            function getFavorites(favorites){
                var user = {!! json_encode($user) !!};    
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        obj = JSON.parse(this.responseText);    
                        build(obj,3);
                    }
                };
                xmlhttp.open("GET","/getFavorites.php?q="+user.id);
                xmlhttp.send();
            }
            function getRecomendationsList(recommended){
                var user = {!! json_encode($user) !!};     
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        obj = JSON.parse(this.responseText);       
                        build(obj,3);
                    }
                };
                xmlhttp.open("GET","/getRecDataLs.php?q="+user.id);
                xmlhttp.send();
            }
            function buildProfile(){
                var user = {!! json_encode($user) !!};
                try {
                    el = document.getElementById("popCardBox");
                    el.remove();
                } 
                catch (error) {
                }

                var PopCard = document.createElement("div"); 
                    PopCard.classList.add("popCard");       
                    PopCard.id = "popCardBox";  
                var div = document.createElement("div"); 
                    div.id = "mydivheader";
                var close = document.createElement("URL");  
                    close.className = "close";
                    close.onclick = function(){                  
                        el = document.getElementById("popCardBox");
                        el.remove();
                    };
                    div.appendChild(close);
                    PopCard.appendChild(div);
                var img = document.createElement("img"); 
                    img.src = "temp.jpg";     
                var div = document.createElement("div"); 
                    div.classList.add("profileImgDiv");  
                    div.appendChild(img);
                    PopCard.appendChild(div);
                var div = document.createElement("div"); 
                    div.classList.add("profileInfoDiv"); 
                    div.innerHTML += "User unique ID:";
                    div.innerHTML += "<br>";
                    div.innerHTML += user.id;
                    div.innerHTML += "<hr>";
                    div.innerHTML += "<br>";
                    div.innerHTML += "Username:";
                    div.innerHTML += "<br>";
                    div.innerHTML += user.name;
                    div.innerHTML += "<br>";
                    div.innerHTML += "<hr>";
                    div.innerHTML += "Account created at:";
                    div.innerHTML += "<br>";
                    div.innerHTML += user.created_at;
                    PopCard.appendChild(div);
                var div = document.createElement("div"); 
                    div.classList.add("profileNavDiv"); 
                var button = document.createElement("button");
                    button.innerHTML = "Get recomendations";
                    button.id = "recBut";
                    button.onclick = function(e) { 
                        getRecomendations(user.likes_t,user.likes_g,user.id,user.recommended,0);
                        div.classList.add("profileButton"); 
                    }
                    div.appendChild(button);
                var button = document.createElement("button");
                    button.innerHTML = "Get favorites";
                    button.id = "FavBut";
                    button.onclick = function(e) { 
                        getFavorites(user.Favorites,0);
                        div.classList.add("profileButton"); 
                    }
                    div.appendChild(button);
                var button = document.createElement("button");
                    button.innerHTML = "Get old recomendation list";
                    button.id = "recLsBut";
                    button.onclick = function(e) { 
                        getRecomendationsList(user.recommended,0);
                        div.classList.add("profileButton"); 
                    }
                    div.appendChild(button);

                    
                div.appendChild(button);
                PopCard.appendChild(div);
                document.body.appendChild(PopCard);
            }
            var reply_click = function(){ 
                try {
                    el = document.getElementById("popCardBox");
                    el.remove();
                } 
                catch (error) {
                }
                let sourceScreen = [];
                for(j = 0;j<obj[1].length;j++){
                    if(obj[0][this.id].id_igdb == obj[1][j].id_game){
                        sourceCover = obj[1][j].link;
                        break;
                    }

                }     
                if(obj[0][this.id].summary != "-"){
                    var text = obj[0][this.id].summary;
                }else{
                    var text = obj[0][this.id].storyline;
                }

                var id = obj[0][this.id].id_igdb;

                
                ////////////////////////////////////////////
                var PopCard = document.createElement("div"); 
                PopCard.classList.add("popCard");       
                PopCard.id = "popCardBox";  
                var drag = document.createElement("div"); 
                    drag.id = "mydivheader";
                var TextBox = document.createElement("div"); 
                    TextBox.id = "popText";
                var InfoTextBox = document.createElement("div"); 
                    InfoTextBox.id = "InfoTextBox";
                var InfoTextBox2 = document.createElement("div"); 
                    InfoTextBox2.id = "InfoTextBox2";

                getExtraData(obj[0][this.id].id_igdb);            

                for(j = 0;j<obj[2].length;j++){
                    if(obj[0][this.id].id_igdb == obj[2][j].id_game){
                        sourceScreen.push(obj[2][j].link);
                    }
                }  

                var divImg = document.createElement("div");  
                    divImg.id = "divIMG";                
                    for(j = 0;j<obj[1].length;j++){
                    if(id == obj[1][j].id_game){
                        divImg.style.backgroundImage = "url("+obj[1][j].link+")";
                        break;
                    }
                }  

                var divScreen = document.createElement("div");  
                    divScreen.id = "divScreen";
                    getScreens(function(data) {
                        data = JSON.parse(data);
                        divScreen = document.getElementById("divScreen");                         
                        divScreen.style.backgroundImage = "url("+data["screens"][0].link+")";
                    },id);

                var close = document.createElement("URL");  
                    close.className = "close";
                    close.onclick = function(){                  
                                el = document.getElementById("popCardBox");
                                el.remove();
                            };
                var min = document.createElement("URL");  
                    min.className = "min";
                    min.innerHTML = "&#9825";
                    min.onclick = function() {showAlert(id)};

                let screen = 0;
                divScreen.onclick = function(e) { 
                    var x = e.pageX - this.offsetLeft; 
                   if(x<1000){       
                        if(screen==0){
                            getScreens(function(data) {
                                data = JSON.parse(data);
                                screen = (data["count"])-1;                        
                                divScreen = document.getElementById("divScreen");                   
                                divScreen.style.backgroundImage = "url("+data["screens"][screen].link+")";
                            },id,screen);
                        }else{
                            screen--;
                            getScreens(function(data) {
                                data = JSON.parse(data);
                                divScreen = document.getElementById("divScreen");                         
                                divScreen.style.backgroundImage = "url("+data["screens"][screen].link+")";
                            },id,screen);
                        }
                    }else if(x>885){          
                        getScreens(function(data) {
                            data = JSON.parse(data);
                            lenght = data["count"];
                            if(screen==lenght-1){
                                screen = 0;
                            }else{
                                screen++;
                            }
                            divScreen = document.getElementById("divScreen");                         
                            divScreen.style.backgroundImage = "url("+data["screens"][screen].link+")";
                        },id,screen);
                    }
                }
                ////////////////////////////////////////////
                TextBox.innerHTML += text;
                ////////////////////////////////////////////
                drag.appendChild(close);
                drag.appendChild(min);
                PopCard.appendChild(drag);
                TextBox.appendChild(divImg);
                PopCard.appendChild(TextBox); 
                PopCard.appendChild(divScreen); 
                PopCard.appendChild(InfoTextBox);
                PopCard.appendChild(InfoTextBox2);
                document.body.appendChild(PopCard);
                dragElement(document.getElementById("popCardBox"));
            }           

            getData(1);
        </script>
        <div id ="mainContainer">
        </div>         
            <div class="searchTab" id ="searchTab">
                <hr>
                <button type="button" onclick="document.location.href='{{ url('/main/logout')}}';">Logout</button>
                <button type="button" onclick=buildProfile();>Profile</button>
                <button type="button" onclick=getData(1);>Mainlist</button>
                <hr>
                <label for="fname">Search by name:</label>
                <input type="text" id="nameSearch">
                <br>
                <label for="fname">Pick a platform:</label>
                <select id="platform" class="searchbox">
                    <option value="">None</option>
                </select>
                <br>
                <label for="fname">Pick a genre:</label>
                <select id="genre" class="searchbox">
                    <option value="">None</option>
                </select>
                <br>
                <label for="fname">Pick a theme:</label>
                <select id="theme" class="searchbox">
                    <option value="">None</option>
                </select>
                <hr>
                <label for="fname">Date selection:</label>
                <hr>
                Date from:
                <br>
                <input type="date" id="from" class="searchbox">
                <br>
                Date to:
                <br>
                <input type="date" id="to" class="searchbox">
                <br>
                <hr>
                <pre>               <button onclick="getSearchData(1)">Search</button></pre>
                <hr>
                <br>
                <label for="fname">Go to page:</label>
            </div>
        <div id ="pages">
        </div>
    @else 
        <script> window.location = "/login"; </script>
    @endif
    
    </body>
</html>
