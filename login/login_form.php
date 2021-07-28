<? session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../common/css/common.css">
    <!-- <link href="../css/member.css" rel="stylesheet" type="text/css" media="all"> -->
    
    <script src="https://kit.fontawesome.com/f8a0f5a24e.js" crossorigin="anonymous"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
</head>


<body>
    
<form  name="member_form" method="post" action="login.php"> 

<div class="logo">
    <a href="../index.html"><img src="../member/images/logo.png" alt="logo"></a>
</div>


<div class="content03">
    
    <div class="content01">
        <img src="../member/images/header_logo.png" alt="logo">
        <img src="../member/images/text_logo.png" alt="logo">
    </div>
    
    <div class="content02">    
        <div id="id_pw_input">
            <ul>
                <li><input type="text" name="id" class="login_input"  placeholder="ID (8자 이내로 입력하시오)"></li>
                <li><input type="password" name="pass" class="login_input" placeholder="PASSWORD 입력하시오"></li>
            </ul>						
        </div>
        
        
        <div id="login_button">
            <button type="submit"> LOGIN </button> 
        </div>
        
        <div id="join_button"> 
            <button> <a href="../member/member_check.html">JOIN</a> </button> 
        </div>
    </div>
                 
</div>

   <div class="find_button">
        <ul>
            <li><i class="fas fa-lock"></i> Secure Login</li>
            <li><span><a href="id_find.php">Find ID</a></span></li>
            <li><span><a href="pw_find.php">Find PW</a></span></li>
        <ul>
   </div>

</form>

</body>
</html>