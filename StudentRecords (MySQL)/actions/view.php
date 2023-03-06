<?php
if ($_POST["page"] == "confirm"){
    outputResults();
}
else{
    formPage();
}

function formPage(){
    $script = $_SERVER['PHP_SELF'];
    print <<< FORMPAGE
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta name="description" content="View Student Record">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Student Record</title>
        <link rel="stylesheet" href="./records.css">
        <script src="validate.js"></script>
    </head>


    <body>
        <form method="POST" action="$script" id="form">
            <p>
                <label for="firstField" id="firstLabel">View All Student Records:</label>
                <input name = "all" class="info" type = "checkbox" value = "All Students">
            </p>
            <p>
                <label for="idField" id="idLabel">ID:</label>
                <input class="info" name="idField" id="id" type="text" />
            </p>
            <p>
                <label for="lastField" id="lastLabel">LAST:</label>
                <input class="info" name="lastField" id="last" type="text" />
            </p>
            <p>
                <label for="firstField" id="firstLabel">FIRST:</label>
                <input class="info" name="firstField" id="first" type="text" />
            </p>
            <p>
                <input type = "hidden" name = "page" value = "confirm" />
                <input name = "Submit" id="validate" class = "validate" type = "button" value = "Submit" onclick="validateView()">
            </p>
        </form>
FORMPAGE;
    }
    
function outputResults(){
    formPage();
    // Optionally store the parameters in variables
    $server = "spring-2022.cs.utexas.edu";
    $user = "cs329e_bulko_jwearden";
    $pwd = "road8clung4Gamble";
    $dbName = "cs329e_bulko_jwearden";
    $mysqli = new mysqli ($server,$user,$pwd,$dbName);
    // If it returns a non-zero error number, print a
    // message and stop execution immediately
    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }

    $whereCommand="";
    if(isset($_POST["idField"]) && $_POST["idField"] != ""){
        $id = $_POST["idField"];
        $id = (int)$id;
        $whereCommand = "ID = $id";
    }
    if(isset($_POST["lastField"]) && $_POST["lastField"] != ""){
        $last = $_POST["lastField"];
        if($whereCommand != ""){
            $whereCommand = $whereCommand . " AND LAST = \"$last\"";
        }
        else{
            $whereCommand = "LAST = \"$last\"";
        }
    }
    if(isset($_POST["firstField"]) && $_POST["firstField"] != ""){
        $first = $_POST["firstField"];
        if($whereCommand != ""){
            $whereCommand = $whereCommand . " AND FIRST = \"$first\"";
        }
        else{
            $whereCommand = "FIRST = \"$first\"";
        }
    }
    
    if(isset($_POST['all'])){
        $command = "SELECT * FROM STUDENTS ORDER BY LAST, FIRST;";
    }
    else{
        $command = "SELECT * FROM STUDENTS WHERE $whereCommand;";
    }
    // Issue the query
    $result = $mysqli->query($command);
    // Verify the result
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command= $command");
    }
    else{
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["ID"]. ", Last: " . $row["LAST"]. ", First: " . $row["FIRST"] . ", Major: " . $row["MAJOR"] . ", GPA: " . $row["GPA"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
}


?>