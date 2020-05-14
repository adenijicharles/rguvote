<?php
session_start();
require_once "include/connection.php";
if(!$_SESSION['student_id']){
    $_SESSION['error'] = "Please login to access the voting app";
    header("location: login.php");
}
$query = mysqli_query($connect, 'SELECT * FROM positions ORDER BY name ASC');
$vote_status = mysqli_query($connect, 'SELECT * FROM vote_status');
$fetch = mysqli_fetch_array($vote_status);
$status = $fetch['status'];
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
    <link rel="stylesheet" type="text/css" href="admin/assets/css/table.css">
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
        <?php if($status == 1){?>
            <div id="loader">
                <img src="images/loading.gif"> <br>
                loading............... please wait
            </div>

            <div id="done">
                <img src="images/verified.png"> <br>
                Thanks for voting 
            </div>
            <main id="root"></main>
        <?php } else { ?>
            <div style="width: 900px; margin: 70px auto">
                <b> VOTING RESULTS </b>
                <hr>
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <div style="border: 1px solid #000; padding: 20px; margin-bottom: 50px; max-width: 1000px; margin: 50px auto;">                
                        <b><?php echo $row['name']; ?></b>
                        <hr>
                        <!-- select nominees -->
                        <table class="table" style="margin: 30px 0">
                            <tr>
                                <td><b> Name </b> </td>
                                <td><b> Results </b> </td>
                            </tr>

                            <?php
                            $data = [];
                            $position_id = $row['id'];
                            $nominees = mysqli_query($connect, "SELECT * FROM nominees WHERE position = '$position_id'");
                            while ($rows = mysqli_fetch_array($nominees)) {
                            ?>
                                <tr>
                                    <td> <b> <?php echo $rows['name']; ?> </b>
                                    <td>
                                        <?php
                                        // get candidate total votes 
                                        $nominee_id = $rows['id'];
                                        $total_votes = mysqli_query($connect, "SELECT count(*) AS total_votes FROM votes WHERE nominee_id = '$nominee_id'");
                                        $fetch = mysqli_fetch_array($total_votes);
                                        echo $total_votes =  $fetch['total_votes'];
                                        if($total_votes != 0){
                                            $a = [$nominee_id =>$total_votes];
                                            $data += $a;
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }  ?>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td> <b>Highest Votes</b></td>
                                <td>
                                    <span style="color: green; font-weight: bold">
                                <?php 
                                if(count($data)) {
                                    $value = max($data);
                                    $winner_id = array_search($value,$data); 
                                    $nominees = mysqli_query($connect, "SELECT * FROM nominees WHERE id = '$winner_id'");
                                    $fetch_name = mysqli_fetch_array($nominees);
                                    echo $fetch_name['name'];
                                } ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <footer>
        <p>All rights reserved.2020</p>
    </footer>

<script>
    fetch('./api/positions.php').then(function(response) {
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

        fetch(`./api/nominees.php?position=${position_id}`).then(function(response) {
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