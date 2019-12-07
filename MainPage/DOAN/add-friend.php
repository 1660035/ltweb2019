<?php
    require_once 'init.php';
    require_once 'functions.php';
   
    if(!$currentUser) {
        header('Location: index.php');
        exit();
    }

    $userId = $_POST['id'];
    $profile = findUserById($userId);

    sendFriendRequest($currentUser['id'], $profile['id']);

    header('Location: test.php?id=' . $_POST['id']);