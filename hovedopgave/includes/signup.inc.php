<?php 

if (isset($_POST['signup-submit'])) {
 
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //TJEKKER OM BRUGEREN HAR SKREVET USERNAME, EMAIL, PASSWORD og PASSSWORD REPEAT - HVIS IKKE = EXIT
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();
    }
     //TJEKKER OM BRUGEREN INDTASTER EN VALID EMAIL SOM IKKE INDEHOLDER "MÆRKELIG TEGN" - HVIS IKKE = EXIT
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }

    //TJEKKER OM BRUGEREN INDTASTER EN VAILID EMAIL
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    }

    //TJEKKER OM BRUGEREN INDTASTER ET BRUGERNAVN UDEN "MÆRKELIGE TEGN" - HVIS IKKE = EXIT
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmuid&mail=".$email);
        exit();
    }

    //TJEkKER OM BRUGEREN SKRIVER DET SAMME PASSWORD BEGGE GANGE - HVIS IKKE = EXIT
    else if ($password !== $passwordRepeat ) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
        exit();
    }

    //TJEKKER OM BRUGERNAVNET ALLEREDE EXISTERE, MED ET PREPARED STATEMEMT FOR AT SIKRE SQL INJECTION - HVIS DET ALLEREDE EXISTERE = EXIT
    else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        
    //TJEKKER OM EMAILEN ALLEREDE EXISTERE, MED ET PREPARED STATEMEMT FOR AT SIKRE SQL INJECTION - HVIS DET ALLEREDE EXISTERE = EXIT

        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }

            // TJEKKET FOR SQL FEJL
            else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                //INDSÆTTER DATA HVIS OPLYSNINGERNE ER KORREKTE
                else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../signup.php");
    exit();
}
