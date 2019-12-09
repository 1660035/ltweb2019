<?php
require_once('./vendor/autoload.php');
require_once ('config.php');

//https://myaccount.google.com/lesssecureapps
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;





function sum($a, $b)    {
    $c = $a + $b;
    return $c;
}

function findUserByEmail($email)   {
    global $db;
    
    $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function findUserById($id)   {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}




function sendEmail($to,$name,  $subject, $content) {
    // Instantiation and passing `true` enables exceptions0
    global $EMAIL_FROM, $EMAIL_NAME, $EMAIL_PASSWORD;
$mail = new PHPMailer(true);


    //Server settings
    $mail->isSMTP();  
    $mail->CharSet = 'UTF-8';                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $EMAIL_FROM;                     // SMTP username
    $mail->Password   = $EMAIL_PASSWORD;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($EMAIL_FROM, $EMAIL_NAME);
    $mail->addAddress($to, $name);     // Add a recipient
   
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $content;
    //$mail->AltBody = $content;

    $mail->send();


}

function createUser($displayName, $email, $hashPassword)   {
    global $db, $BASE_URL;
    $code = generateRandomString(16);

    
    $stmt = $db->prepare("INSERT INTO users(displayName, email, password, status, code) VALUE(?,?,?,?, ?)");
    $stmt->execute(array($displayName, $email, $hashPassword, 0, $code));
    
    $id = $db->lastInsertId();
    sendEmail($email, $displayName, 'Kich hoat tai khoan', "Ma kich hoat la <a href=\"$BASE_URL/activate.php?code=$code\">$BASE_URL/DOAN/activate.php?code=$code</a>");

    return $id;
}

//27-11
function newUser($displayName, $email, $hashPassword, $phone, $ddmmyyyy)  {
    global $db, $BASE_URL;
    $code = generateRandomString(16);

    // $date = "2012-08-06";
    // $date=date("Y-m-d",strtotime($date));

    //mysql_query( "INSERT INTO data_table (title, date_of_event) VALUES('" . $_POST['post_title'] . "','" . $date . "')" ) or die(mysql_error());


    $stmt = $db->prepare("INSERT INTO users(displayName, email, password, phone, ddmmyyyy, status, code, avatar, cover) VALUE(?,?,?,?,?,?,?,?,?)");
    $avatar = 'img/avatars/none-avatar.png';
    $cover = 'img/header/none.jpg';
    $stmt->execute(array($displayName, $email, $hashPassword, $phone, $ddmmyyyy, 0, $code, $avatar, $cover));

    $id = $db->lastInsertId();

    sendEmail($email, $displayName, 'KÍCH HOẠT TÀI KHOẢN', 
            

    "<h2 align='center'>XÁC THỰC TÀI KHOẢN</h2>
    <br>
    Chào bạn !
    <br>
    Bạn vừa gửi yêu cầu xác thực tài khoản trên ...
    <br>
    Vui lòng nhấn vào liên kết bên dưới để hoàn tất quá trình đăng ký . Nếu bạn không nhấn được vào link vui lòng sao chép liên kết bên dưới và dán vào trình duyệt
    <br>
    <a href=\"$BASE_URL/activate.php?code=$code\">$BASE_URL/DOAN/activate.php?code=$code</a>
    "
        );


    return $id;
}




function forgotUser($email)   {
    global $db, $BASE_URL;

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($email));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    sendEmail($email, user['displayName'], 'KHÔI PHỤC MẬT KHẨU', 
    
        "<h2 align='center'>KHÔI PHỤC MẬT KHẨU</h2>
        <br>
        Chào bạn !
        <br>
        Bạn vừa gửi yêu cầu xác thực tài khoản trên ...
        <br>
        Vui lòng nhấn vào liên kết bên dưới để đổi mật khẩu mới . Nếu bạn không nhấn được vào link vui lòng sao chép liên kết bên dưới và dán vào trình duyệt
        <br>
        <a href=\"$BASE_URL/reset.php?email=$email\">$BASE_URL/DOAN/reset.php?email=$email]</a>
        "

            );

    //return id;

}


function activateUser($code)    {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE code = ? AND status = ?");
    $stmt->execute(array($code, 0));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && $user['code'] == $code)
    {
        $stmt = $db->prepare("UPDATE users SET code = ?, status = ? WHERE id = ?");
        $stmt->execute(array('', 1, $user['id']));
        return true;
    }
    return false;

}



function resetPassword($password, $currentemail) {
    global $db;
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? ");
    $stmt->execute(array($currentemail));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && $user['email'] = $currentemail) {
        $stmt = $db->prepare("UPDATE users SET password=?,  code = ?, status = ? WHERE email = ?");
        $stmt->execute(array($hashPassword,'', 1, $currentemail));
        return true;
    }
    return false;
    
    
}


function changePasswordUser($password, $id)   {
    global $db;
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    return $stmt->execute(array($hashPassword, $id));

}


function resizeImage($filename, $max_width, $max_height)
{
  list($orig_width, $orig_height) = getimagesize($filename);

  $width = $orig_width;
  $height = $orig_height;

  # taller
  if ($height > $max_height) {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
  }

  # wider
  if ($width > $max_width) {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
  }

  $image_p = imagecreatetruecolor($width, $height);

  $image = imagecreatefromjpeg($filename);

  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
  
  return $image_p;
}



//date("Y-m-d")


function getNewFeeds()   {
    global $db;
    $stmt  = $db->prepare("SELECT p.*, u.avatar, u.displayName FROM posts AS p JOIN users AS u ON p.userId = u.id ORDER BY  hour(p.createAt) DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getMyNewFeeds($id)    {
    global $db;
    $stmt = $db->prepare("SELECT p.*, u.avatar, u.displayName FROM posts AS p JOIN users AS u ON p.userId = u.id WHERE u.id = ? ORDER BY  hour(p.createAt) DESC");
    $stmt->execute(array($id));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getListFriend($id)    {
    global $db;
    $stmt = $db->prepare(" SELECT xx.*, u.avatar, u.displayName, u.id, COUNT(xx.userId2) as num_items
                        FROM  users AS u JOIN (SELECT f.userId2 FROM friendships AS f JOIN users AS u  ON f.userId1 = u.id WHERE u.id = ?) AS xx

                        WHERE u.id = xx.userId2
                        GROUP BY xx.userId2
                        ");
    $stmt->execute(array($id));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}






function createPost($userId, $displayName ,$content, $avatar)  {
    global $db;




    $stmt =  $db->prepare("INSERT IGNORE INTO posts (userId, displayName, content, createAt, imagePost) VALUES(?, ?, ?, ?, ?)");
    $stmt->execute(array($userId, $displayName,$content, date("Y-m-d"), $avatar));
    return $db->lastInsertId();
}

function editCover($id, $cover)  {
    global $db;
    $stmt = $db->prepare("UPDATE users SET cover = ? WHERE id = ?");
    return $stmt->execute(array($cover, $id));
}





function dirImage($dir) {
    $errors = array();
    $fileName = $_FILES[$dir]['name'];
    $fileSize = $_FILES[$dir]['size'];
    $fileTemp = $_FILES[$dir]['tmp_name'];
    $fileType = $_FILES[$dir]['type'];

    $fileExt = strtolower(end(explode('.', $_FILES[$dir]['name'])));

    $expensions = array("jpeg", "jpg", "png");

    if(in_array($fileExt, $expensions) == false)    {
        $errors[] = "JPEG or PNG";
    }

    return $errors;
}


function updateImageProfile($id, $avatar)   {
    global $db;
    $stmt = $db->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    return $stmt->execute(array($avatar, $id));
}


function updateUserProfile($id, $displayName, $phone, $ddmmyyyy)    {   
    global $db;
    $stmt = $db->prepare("UPDATE users SET displayName = ?, phone = ?, ddmmyyyy = ? WHERE id = ?");

 
    return $stmt->execute(array($displayName, $phone, $ddmmyyyy, $id));
}

function updateUserProfileAllPost($id, $curren_displayName)     {
    global $db;
    $stmt = $db->prepare("UPDATE posts SET displayName = ?  WHERE userId = ?");

    return $stmt->execute(array($curren_displayName, $id));

}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function sendFriendRequest($userId1, $userId2)    {
    global $db;
    $stmt = $db->prepare("INSERT INTO friendships (userId1, userId2) VALUE(?,?)");
    $stmt->execute(array($userId1, $userId2));


}


function removeFriendRequest($userId1, $userId2)    {
    global $db;
    $stmt = $db->prepare("DELETE FROM  friendships WHERE (userId1 = ? AND userId2 = ?) OR (userId1 = ? AND userId2 = ?)");
    $stmt->execute(array($userId1, $userId2, $userId2, $userId1));


}

function getFriendShip($userId1, $userId2)    {
    global $db;
   

    $stmt = $db->prepare("SELECT * FROM friendships WHERE userId1 = ? AND userId2 = ?");
    $stmt->execute(array($userId1, $userId2));
    return $stmt->fetch(PDO::FETCH_ASSOC);

}

















