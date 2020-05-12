<?php
session_start();
require_once "include/connection.php";
if(!$_SESSION['student_id']){
    $_SESSION['error'] = "Please login to access the voting app";
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> RGU Vote - Welcome Page </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/modifiers.css" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert/sweetalert.css">
    <script src="sweetalert/jquery.min.js"></script>
    <script src="sweetalert/jquery-2.1.3.min.js"></script>
    <script src="sweetalert/sweetalert-dev.js"></script>
</head>
<body>
    <header>
        <div id="logo">
            <a href="welcome.php" style="text-decoration: none; ">
                <img src="images/logo.png"></a>      
            </a>
        </div>
        <div id="nav">
            Welcome <?php echo $_SESSION['student_name']?> (<?php echo $_SESSION["student_id"]; ?>) -- <a href="profile.php"> Manage Profile </a> -- <a href="logout.php"> Logout </a>
        </div>
    </header>
    <div id="loader">
        <img src="images/loading.gif"> <br>
        loading............... please wait
    </div>

    <div id="done">
        <img src="images/verified.png"> <br>
        Thanks for voting 
    </div>
    <main id="root"></main>
    <footer>
        <p>All rights reserved.2020</p>
    </footer>

<script>
    fetch('http://localhost/rguvote/api/positions.php').then(function(response) {
        return response.json();
    }).then(function(positions){
        setTimeout(() => {
            document.querySelector("#loader").style.display = "none";
            parsePositions(positions);
        }, 1000);        
    });

    function parsePositions(positions){
        let root = document.querySelector("#root");
        let article = positions.map(position => {
            return `            
                <article class='background-color-white color-white'>
                    <a href="javascript:;">
                        <h5> ${position.name} </h5>
                        <h6 id="view_nominees" onclick="viewNominees(this)" data-name="${position.name}" data-id="${position.id}"> View nominees </h6>
                    </a>
                </article>
            `;            
        });
        let div = document.createElement("div");
        let section = document.createElement("section");
        div.innerHTML = "<section id=heading> <h3 id=page_title> Welcome to the RGU:Union 2020 Elections Page </h3> <p id=page_sub> Select a position below to see nominees and cast your votes </p></section>";
        section.innerHTML = article;
        root.appendChild(div);
        root.appendChild(section);
    }

    function viewNominees(arg){
        let position_id = arg.getAttribute("data-id");
        let position_name = arg.getAttribute("data-name");

        let root = document.querySelector("#root");
        let loader = document.querySelector("#loader");
        
        root.innerHTML = '';
        loader.style.display = 'block';

        fetch(`http://localhost/rguvote/api/nominees.php?position=${position_id}`).then(function(response) {
            return response.json();
        }).then(function(nominees){

            let root = document.querySelector("#root");
            let length = nominees.length;
            document.querySelector("#loader").style.display = "none";
            if(length){
                let article = nominees.map(nominee => {
                    return `            
                    <article data-id="${nominee.id}">
                        <img src="pictures/${nominee.picture}" class="outline-thick" style="display: block; margin: auto; margin-bottom: 30px">                    
                        <input type="radio" data-name="${nominee.name}" data-pos="${position_name}" data-position-id="${position_id}" id="radio${nominee.id}" name="vote" class="" value="${nominee.id}">                    
                        <span>${nominee.name}</span>
                        <p> <a target="_blank" href="nominee.php?id=${nominee.student_id}&posname=${position_name}&position=${position_id}">View Profile / Manifesto</a> </p>
                    </article>
                    `;            
                });
                let div = document.createElement("div");
                let section = document.createElement("section");
                let section2 = document.createElement("section");
                let clear = document.createElement("div");
                clear.style = "display: block; content: ''; clear: both";
                div.innerHTML = `<section id=heading> <h3 id=page_title> ${position_name} Nominees Page </h3> <p> Select a nominee below to view his/her profile, manifesto or cast your vote</p></section>`;
                section.innerHTML = article;
                section2.innerHTML = `
                        <article style="margin-top: 0; padding-top: 0; float: right;">
                            <input type="hidden" value="${position_id}">
                            <input type="hidden" id="student_id" value="<?php echo $_SESSION['student_id']; ?>">
                            <input type="button" onclick="vote(this)" id="button" value="VOTE">
                        </article>`;
                section2.appendChild(clear);            
                root.appendChild(div);
                root.appendChild(section);
                root.appendChild(section2);            
            }else{
                root.innerHTML = "No nominees yet";
            }
        });
    }
</script>
<script type="text/javascript" src="js/app.js"> </script>
</body>
</html>