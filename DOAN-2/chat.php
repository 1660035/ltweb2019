<?php
    require_once 'init.php';
    require_once 'functions.php';
    $posts = getNewFeeds();

    

    if(!$currentUser) {
        header('Location: index.php');
        exit();
    }

    $userId = $_GET['id'];
    $profile = findUserById($userId);

    $isFollowing = getFriendShip($currentUser['id'], $userId);
    $isFollower =  getFriendShip($userId, $currentUser['id']);

    // $posts1 = getMyNewFeeds($userId);
    
    $getListFriends = getListFriend($userId);


    $sdas = getMessagesOneLastTime(17,18);
    $getListFriends = getListFriend($currentUser['id']);
    $getToUser = findUserById($userId);
?>
<?php include 'header.php'; ?>
<div class="row" style="">
    <div class="col-12">
<div class="container" style="margin-top:50px;">

    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="overflow-auto  card" style="overflow-y:auto;  height:300px; background-color: transparent;">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>Chat</h2>                        
                    </div>
                </div>
                <div class="card-body" >
                <?php foreach($getListFriends as $gt): ?>
                    <div id="toast9" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
                        <div class="toast-header">
                            <img src="<?php echo $gt['avatar']; ?>" style="width:22px; height:22px;" class="rounded-circle" alt="">
                            <strong style="margin-left:5px; font-size:14px;" class="mr-auto"><?php echo $gt['displayName']; ?></strong>                        </div>
                        <div class="toast-body" id="sam" name="sam" style="font-size:12px;">

<?php $lastone = getMessagesOneLastTime($currentUser['id'], $gt['id']); ?>

                            <a href="chat.php?id=<?php echo $gt['id']; ?>" name="chatchat" id="chatchat "  ><?php echo $lastone['content']; ?></a>

                        </div>

                    </div>
                <?php endforeach ?>
                </div>
            </div>




        </div>
        <div class="col-md-8 col-sm-8">
        
            <div class="card" style=" height:500px; background-color:transparent;">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>
                            <?php echo $getToUser['displayName'];?>
                        </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12"> 
                        <?php $getMFU = getMessagesFromUser( $currentUser['id'], $getToUser['id']); ?>

                            <div class="overflow-auto card " style="overflow-y:auto;  height:350px;">
                                <?php foreach($getMFU as $gMFU): ?>


                                    <?php if($gMFU['userId'] == $currentUser['id']): ?>


                                        <div >
                                        
                                            <?php $findfind = findUserById($gMFU['fromUserId']); ?>
                                            <p style="float:right; margin:10px 10px 0 0 ;">

                                            <?php echo $gMFU['content']; ?>
                                            <img src="<?php echo $findfind['avatar']; ?>" style="width:22px; height:22px;" class="rounded-circle" alt="">

                                            </p>
                                         
                                        </div>
                                        <br>


                                    <?php else: ?>

                                        <div >
                                            <?php $findfind = findUserById($gMFU['fromUserId']); ?>
                                            <p style="float:left; margin:10px 0 0 10px;">
                                            <img src="<?php echo $findfind['avatar']; ?>" style="width:22px; height:22px;" class="rounded-circle" alt="">

                                            <?php echo $gMFU['content']; ?>
                                                </p>
                                        </div>
                                        <br>


                                    <?php endif; ?>
                                    




                                <?php endforeach ?>
                            </div>  
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-12"> 
                            <!-- <input style="margin:0 0 0 0;" id="comment" name="comment" type="text" class="form-control" placeholder="Comments in here!" aria-label="Recipient's username" aria-describedby="basic-addon2">                                                -->
                        
                                <form action="send-chat.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" class="form-control-file " id="fromUserId" name="fromUserId" style="display:none;" value="<?php echo $currentUser['id'];?>">                                    
                                    <input type="hidden" class="form-control-file " id="toUserId" name="toUserId" style="display:none;" value= "<?php echo $userId; ?>">    
                                    <input style="margin:10px 0 0 0;" id="comment" name="comment" type="text"
                                    class="form-control" placeholder=" Comments in here!" aria-label="Recipient's username" aria-describedby="basic-addon2">     



                                </form>
                        
                        </div>
                    </div>

                   
                </div>
            </div>
           
            
        </div>
    </div>


</div>



</div>
</div>

<?php include 'footer.php'; ?>