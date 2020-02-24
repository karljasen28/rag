<?php 

function db() {
    return new PDO("mysql:host=localhost;dbname=rag","root","");
}

function registerUser($fname, $lname, $gender, $bdate, $address, $contactno, $email, $password, $type, $status) {
    $db = db();
    $sql = "INSERT INTO users (fname, lname, gender, bdate, address, contactno, email, password, type, status) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($fname, $lname, $gender, $bdate, $address, $contactno, $email, $password, $type, $status));
    $db = null;

    return "Registration Success";
}

?>