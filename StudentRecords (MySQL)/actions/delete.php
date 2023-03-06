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
        <meta name="description" content="Delete Student Record">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Student Record</title>
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
                <input type = "hidden" name = "page" value = "confirm" />
                <input name = "Submit" id="validate" class = "validate" type = "button" value = "Submit" onclick="validateDelete()">
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

    // Create the query as a string
    $command = "DELETE FROM STUDENTS WHERE ID = $id;";
    // Issue the query
    $result = $mysqli->query($command);
    // Verify the result
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command= $command");
    }
    else{
        print <<< UPDATE
        <script>document.getElementById('Result').innerText = "Student $id has been deleted."</script>
UPDATE;
    }
}
?>
