<?
	session_start();
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1  (나야나~~~~~)
        $page=1
	*/

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    <link rel="stylesheet" href="css/view.css">

 <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

    <script>
        function del(href) 
     {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href; //'delete.php?num=1'
        }
     }
    </script>
     
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
                
            <div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="master")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>

<? 
	if($userid )
	{
?>
				<a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>

               
             
               

               <!-- <h3>공지사항</h3>
               <div class="content02">
                   공지사항 (게시판)
                   https://www.lottelem.co.kr/company/news_list.asp
               </div> -->

            </div>

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