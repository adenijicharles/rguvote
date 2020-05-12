<?php

    $contestants = [
        [
            "name" => "Adeniji Charles",
            "student_id" => 3434333,
            "level" => "400",
            "school" => "CSDM",
            "sex" => "Male",
            "ethnicity" => "African",
            "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "manifesto" => "charles_vice_president.mp4",
            "pictures" => "charles_vice_president.jpg",
            "position" => "2"
        ],
        [
            "name" => "Leke Awonuga",
            "student_id" => 656333,
            "level" => "300",
            "school" => "CDSM",
            "sex" => "Male",
            "ethnicity" => "Hispanics",
            "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "manifesto" => "augustina_vice_president.mp4",
            "pictures" => "augustina_vice_president.jpg",
            "position" => "2"
        ],
        [
            "name" => "Precious Usman",
            "student_id" => 222344,
            "level" => "500",
            "school" => "Grays School of Art",
            "sex" => "Male",
            "ethnicity" => "African",
            "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "manifesto" => "sokunmbi_vice_president.mp4",
            "pictures" => "sokunmbi_vice_president.jpg",
            "position" => "2"
        ] 
        ,
        [
            "name" => "Abimbola Oladipo",
            "student_id" => 23245111,
            "level" => "500",
            "school" => "Grays School of Art",
            "sex" => "Male",
            "ethnicity" => "African",
            "bio" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            "manifesto" => "obj_vice_president.mp4",
            "pictures" => "obj_vice_president.jpg",
            "position" => "2"
        ]                        
        ];

    $connect = mysqli_connect("localhost", "root", "", "rguvote");

    foreach ($contestants as $key) {
        $name = $key["name"];
        $student_id = $key['student_id'];
        $level = $key['level'];
        $school = $key['school'];
        $sex = $key['sex'];
        $ethnicity = $key['ethnicity'];
        $bio = $key['bio'];
        $manifesto = $key['manifesto'];
        $pictures = $key['pictures'];
        $position = $key['position'];

        $insert = mysqli_query($connect, "INSERT INTO nominees (student_id, name, level, school, sex, ethnicity, bio, manifesto, position, picture) VALUES ('$student_id', '$name', '$level', '$school', '$sex', '$ethnicity', '$bio', '$manifesto', '$position', '$pictures')") or die(mysqli_error($connect));
    }    
?>