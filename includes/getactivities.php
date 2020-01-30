<?php

if (isset($_GET["ID"])){
    
    require 'dbcon.php';

    $sql = "SELECT * FROM user WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.html?error=mysqlerror_connection");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt,"s", $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc()){
            $pwdCheck = password_verify($password,$row['password']);
            if($pwdCheck == false){
                header("Location: ../index.html?error=wrongpassword");
                exit();
            }else if($pwdCheck == true){
                session_start();
                $_SESSION["userID"] = $row["iduser"];
                $_SESSION["useremail"] = $row["email"];
                header("Location: ../index.html?login=success");
                exit();
            }else{
                header("Location: ../index.html?error=wrongpassword");
            }
        }else{
            header("Location: ../index.html?error=nouser");
        }
    }

}else {
header("Location: ../index.html");
exit();
}//10:00:37	CREATE TABLE IF NOT EXISTS `mydb`.`Patient` 
//(   `first_name` VARCHAR(45) NULL,   `second_name` VARCHAR(45) NULL,   `age` INT NULL,   `house_num` INT NULL,   `street_name` VARCHAR(45) NULL,   `city` VARCHAR(45) NULL,   `county` VARCHAR(45) NULL,   `post_code` VARCHAR(45) NULL,   `User_idUser` INT NOT NULL,   PRIMARY KEY (`User_idUser`),   INDEX `fk_Patient_User1_idx` (`User_idUser` ASC) VISIBLE,   CONSTRAINT `fk_Patient_User1`     FOREIGN KEY (`User_idUser`)     REFERENCES `mydb`.`User` (`idUser`)     ON DELETE NO ACTION     ON UPDATE NO ACTION) ENGINE = InnoDB	Error Code: 1064. You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '   CONSTRAINT `fk_Patient_User1`     FOREIGN KEY (`User_idUser`)     REFERENCES ' at line 12	0.00029 sec
