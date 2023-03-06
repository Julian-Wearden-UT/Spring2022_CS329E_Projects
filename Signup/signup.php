<?php
    $NAMES = array (0 => "", 1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", 7 => "", 8 => "", 9 => "");
    //$NAMES = array();
    $TIMES = array (0 => "8:00 am", 1 => "9:00 am", 2 => "10:00 am", 3 => "11:00 am", 4 => "12:00 pm", 5 => "1:00 pm", 6 => "2:00 pm", 7 => "3:00 pm", 8 => "4:00 pm", 9 => "5:00 pm");
    
    function readNames(&$NAMES){
        $file = fopen ("./signup.txt", "r");
        $i = 0;
        for ($i = 0; $i < 10; $i++){
            if (!feof($file)){
                $NAMES[$i] = fgets($file);
            }
            else{
                $NAMES[$i] = "";
            }
        }
        // while (!feof($file)){
        //     $NAMES[$i] = fgets($file);
        //     $i = $i + 1;
        // }
        fclose($file);
    }

    function displayForm(&$NAMES, &$TIMES){
        $script = $_SERVER['PHP_SELF'];
        print <<<TOP
        <html>
        <head>
        <title> Sign-Up Sheet </title>
        </head>
        <body>
        <h3> Sign-Up Sheet </h3>
        <form method="POST" action="$script">
        <table border = "1">
            <tr>
                <td><b>Time</b></td>
                <td><b>Name</b></td>
            </tr>
            
TOP;

        for ($i = 0; $i < 10; $i++){
            $Time = $TIMES[$i];
            if ($NAMES[$i] != ""){
                $Name = $NAMES[$i];
            }
            else {
                $Name = '<input type="text" name="field' . $i . '"/>';
            }
            
            print <<<SLOT
            <tr>
                <td>$Time</td>
                <td>$Name</td>
            <tr>
SLOT;
        }

        print <<<BOTTOM
        <tr>
            <td><input type = "submit" name = "submited" value = "Submit" /></td>
        </tr>
        </table>
        </form>
        </body>
        </html>
BOTTOM;
        }

    function writeNames(&$NAMES){
        for ($i = 0; $i < 10; $i++){
            if (isset($_POST['field'.$i])){
            $NAMES[$i] = $_POST['field'.$i];
        }
    }
        $file = fopen ("./signup.txt", "w");
        for ($i = 0; $i < 10; $i++){
            fwrite($file, $NAMES[$i]); 
        }
        fclose($file);
    }


    if(isset($_POST['submited'])){
        writeNames($NAMES);
        
        displayForm($NAMES, $TIMES);
    }
    else{
        readNames($NAMES);
        displayForm($NAMES, $TIMES);
    }

?>