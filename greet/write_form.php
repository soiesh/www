<?  
	session_start(); 

    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>롯데기공:고객센터</title>

    <script src="https://kit.fontawesome.com/f5208ed402.js" crossorigin="anonymous"></script>  <!-- 폰트어썸 -->
    <script src="../common/js/prefixfree.min.js"></script> 
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="common/css/sub5common.css">
    <!-- <link rel="stylesheet" href="css/sub5_4content.css"> -->
    <link rel="stylesheet" href="css/write.css">

 <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

     
</head>

<body>   
    <div class="wrap">
       
       <!-- header 헤더 영역 -->
        <? include "../common/sub_head.html" ?>

        <div class="visual"><img src="common/images/visual_bg4.jpg" alt="서브메뉴 배경화면"></div>    

        <div class="sub_menu">
            <h3>고객센터</h3>
            <ul>
                <li><a href="./sub5_1.html">A/S</a> </li>
                <li><a href="./sub5_2.html">CONTACT</a> </li>
                <li><a href="./sub5_3.html">FAQ</a> </li>
                <li class="current"><a href="./sub5_4.html">공지사항</a> </li>
            </ul>
        </div>


        <article id="content">
            <div class="title_area">
                <div class="line_map">
                    <img src="common/images/line_map_logo.png" alt="로고"> HOME &gt; 고객센터 &gt; <strong>공지사항</strong>                         
                </div>
                             
                <div class="h2_div02">
                    <h2>공지사항</h2>   
                    <i class="fas fa-angle-double-down"></i>
                    <p>롯데기공의 새로운 소식들을 만나실 수 있습니다<br>마음을 여는 서비스, 고객과 하나되는 롯데기공의 열린 마음입니다</p>
               </div>
            </div>

        
            <div class="content_area">
                
            <form  name="board_form" method="post" action="insert.php"> 
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject"></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"></textarea></div>
			</div>
			<div class="write_line"></div>
		</div>

		<div id="write_button">
			<input type="submit" value="확인">&nbsp;
			<a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>   
                          
               <!-- <h3>공지사항</h3>
               <div class="content02">
                   공지사항 (게시판)
                   https://www.lottelem.co.kr/company/news_list.asp
               </div> -->

            </div>    <!-- .content_area end-->

        </article>

        <!-- footer 푸터 영역 -->
        <? include "../common/sub_foot.html" ?>
    </div>
       <!-- jquery -->
       <script src="../common/js/jquery-1.12.4.min.js"></script>
       <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
       <script src="../common/js/fullnav.js"></script>      
       <script src="./js/faq.js"></script>
</body>
</html>