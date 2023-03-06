<?php
    session_start();
    if(isset($_GET['page_key'])){
        $question_number = $_GET['page_key'];           //Get question number
        $answer = $_POST["question$question_number"];   //Stores answer to question
        $_SESSION['current_question'] = $question_number;
        
        //Check if question is correct and increment 'correct' session variable by 10 if so
        switch($question_number){
            case 1:
                if ($answer === "false"){$_SESSION['correct'] = $_SESSION['correct'] + 10;}
                break;
            
            case 2:
                if ($answer === "true"){$_SESSION['correct'] = $_SESSION['correct'] + 10;}
                break;
            
            case 3:
                if ((sizeof($answer) <= 1) && ($answer[0] === "3b")){$_SESSION['correct'] = $_SESSION['correct'] + 10;}
                break;
                
            case 4:
                if ((sizeof($answer) <= 1) && ($answer[0] === "4c")){$_SESSION['correct'] = $_SESSION['correct'] + 10;}
                break;

            case 5:
                if (strcasecmp($answer,"HTTP") === 0){$_SESSION['correct'] = $_SESSION['correct'] + 10;}
                break;

            case 6:
                if (strcasecmp($answer,"favicon") === 0){$_SESSION['correct'] = $_SESSION['correct'] + 10;}
                break;
            
            default:
                $_SESSION['correct'] = $_SESSION['correct'];
                break;
        }
    }

    //Update Score
    $file = fopen ("./results.txt", "a");
    $name = $_SESSION['user_name'];
    $correct = $_SESSION['correct'];
    $temp_string = "$name:$correct\n";   // temp string with username:score
    fputs($file, $temp_string);
    fclose($file);

    header("Location: ./user_session.php?page_key=$question_number");

?>