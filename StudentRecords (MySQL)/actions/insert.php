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
        <meta name="description" content="Insert Student Record">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Student Record</title>
        <link rel="stylesheet" href="./records.css">
        <script src="validate.js"></script>
    </head>

    <body>
        <form method="POST" action="$script" id="form">
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
                <label for="majorField" id="majorLabel">MAJOR:</label>
                <input class="info" name="majorField" id="major" type="text" />
            </p>
            <p>
                <label for="gpaField" id="gpaLabel">GPA:</label>
                <input class="info" name="gpaField" id="gpa" type="text" />
            </p>
            <p>
                <input type = "hidden" name = "page" value = "confirm" />
                <input name = "Submit" id="validate" class = "validate" type = "button" value = "Submit" onclick="validateInsert()">
            </p>
        </form>

        <p id='Result'></p>
    </body>
    </html>

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

    if(isset($_POST["idField"])){
        $id = $_POST["idField"];
        $id = (int)$id;
    }
    if(isset($_POST["lastField"])){
        $last = $_POST["lastField"];
    }
    if(isset($_POST["firstField"])){
        $first = $_POST["firstField"];
    }
    if(isset($_POST["majorField"])){
        $major = $_POST["majorField"];
    }
    if(isset($_POST["gpaField"])){
        $gpa = $_POST["gpaField"];
        $gpa = (float)$gpa;
    }

    // Create the query as a string
    $command = "INSERT INTO STUDENTS VALUES ($id, \"$last\", \"$first\", \"$major\", $gpa);";
    // Issue the query
    $result = $mysqli->query($command);
    // Verify the result
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command= $command");
    }
    else{
        print <<< UPDATE
        <script>document.getElementById('Result').innerText = "$id, $last, $first, $major, $gpa has been inserted."</script>
UPDATE;
    }
}
?>
