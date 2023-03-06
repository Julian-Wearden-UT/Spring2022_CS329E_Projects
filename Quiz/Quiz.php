<?php

    $q1 = $_POST["question1"];
    $q2 = $_POST["question2"];
    $q3 = $_POST["question3"];
    $q4 = $_POST["question4"];
    $q5 = $_POST["question5"];
    $q6 = $_POST["question6"];


    $correct = 0;
        if ($q1 == "false"){
            $correct = $correct + 1;
        }
        if ($q2 == "true"){
            $correct = $correct + 1;
        }
        if ( (sizeof($q3) <= 1) && ($q3[0] == "3b") ){
            $correct = $correct + 1;
        }
        if ( (sizeof($q4) <= 1) && ($q4[0] == "4c") ){
             $correct = $correct + 1;
        }
        if (strcasecmp($q5,"HTTP") == 0){
             $correct = $correct + 1;
        }
        if (strcasecmp($q6,"favicon") == 0){
                 $correct = $correct + 1;
        }

        echo "<script>alert('Your grade is '  + $correct + '/ 6')</script>";
?>