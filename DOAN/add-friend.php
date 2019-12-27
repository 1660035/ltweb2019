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

    //sendFriendRequestNotifications($currentUser['id'], $profile['id'], 'Co nguoi da gui yeu cau ket ban!');

    sendNotificationLikeByPost($currentUser['id'], $profile['id'], "Sent a friend request", 0, "");

    // removeFriendRequestNotifications($currentUser['id'], $profile['id']);




    removeFriendRequestNotifications( $profile['id'], $currentUser['id']);

   




    header('Location: test.php?id=' . $_POST['id']);