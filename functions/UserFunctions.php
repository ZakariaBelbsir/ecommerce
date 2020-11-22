<?php

function not_empty($fields=[]){
    if (count($fields)!=0)
        foreach($fields as $field)
        {
            if(empty($_POST[$field]) || trim($_POST[$field])==false)
                return false;
        }

    return true;
}

function is_already_in_use($field,$value,$table){
    global $bd;
    $query=$bd->prepare("select userId from $table where $field=?");
    $query->execute([$value]);
    $count=$query->rowCount();
    $query->closeCursor();
    return $count;
}

function setNotification($msg, $type='info'){
    $_SESSION['notification']['message'] = $msg;
    $_SESSION['notification']['type'] = $type;
}

function KeepData($input){
    if(isset($_POST[$input])){
        return $_POST[$input];
    }
    return null;
}

function find_user($id){
    global $bd;
    $query = $bd->prepare('select * from users where userId =?');
    $query->execute([$id]);
    $user = $query->fetch(PDO::FETCH_OBJ);
    return $user;
}

function verify_token($table, $field, $value){
    global $bd;
    $query = $bd->prepare("select * from $table where $field =? ");
    $query->execute([$value]);
    $query->rowCount();
}

function remember($id, $email){
   global $bd;
    do {
        $token = bin2hex(openssl_random_pseudo_bytes(15));
    } while(verify_token('session', 'token', $token));
    $expire = time()+3600*24*30;
//    $query = $bd->prepare('insert into session set token=?, userId=?, email=?, expiration=?');
//    $query->execute(array($token, $_SESSION['id'], $_SESSION['Email'], $expire));
    $query = $bd->prepare('insert into session (token, userId, email, expiration) values (?, ?, ?, ?)');
    $query->execute([$token, $id, $email, $expire]);
//    setcookie('remember_me', $token, $expire, null, null, false, true);

}

function keep_session(){
    global $bd;

}

