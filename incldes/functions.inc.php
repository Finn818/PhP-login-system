<?php

function emptyInputSignup($name, $email, $username, $password, $pwdRepeat) {
    $result;
    if (empty($name)  || empty($email) || empty($username) || empty($password) || empty($pwdRepeat)) {
    $result = true;
}
else {
    $result = false;
}
 return $result; 
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/"), $username) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $wdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function uidExist($conn, $username) {
    $sql = "SELECT * FROM users WHERE userUid = ? OR usersEmail = ?;";
    $stmt = mysql_stmt_init($conn);
    if (!mysql_stmt_prepare($stmt, $sql)) {
     header("location: ../signup.php?error=stmtfailed");
     exit();   
    }

    mysqli_sent_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysql_stmt_init($conn);
    if (!mysql_stmt_prepare($stmt, $sql)) {
     header("location: ../signup.php?error=stmtfailed");
     exit();   
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_sent_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
     exit();   
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($name)  || empty($pwd)) {
    $result = true;
}
else {
    $result = false;
}
 return $result;
}

function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $email);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["userid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}