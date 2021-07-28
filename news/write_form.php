<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../lib/dbconn.php";

	if ($mode=="modify")  //수정 글쓰기면....
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
    <link rel="stylesheet" href="css/write.css">
   
    <script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
    </script>
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
                <li><a href="../sub5/sub5_1.html">A/S</a> </li>
                <li><a href="../sub5/sub5_2.html">CONTACT</a> </li>
                <li><a href="../sub5/sub5_3.html">FAQ</a> </li>
                <li class="current"><a href="./write_form.php">NEWS</a> </li>
				<li><a href="../download/list.php">DATA</a> </li>
            </ul>
        </div>


        <article id="content">
            <div class="title_area">
                <div class="line_map">
                    <img src="common/images/line_map_logo.png" alt="로고"> HOME &gt; 고객센터 &gt; <strong>NEWS</strong>                         
                </div>
                             
                <div class="h2_div02">
                    <h2>NEWS</h2>   
                    <i class="fas fa-angle-double-down"></i>
                    <p>롯데기공의 새로운 소식들을 만나실 수 있습니다<br>마음을 여는 서비스, 고객과 하나되는 롯데기공의 열린 마음입니다</p>
               </div>
            </div>

        
            <div class="content_area">
                
            <?
	if($mode=="modify")
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div>
<?
	if( $userid && ($mode != "modify") )
	{
?>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
<?
	}
?>						
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row4"><div class="col1"> 이미지파일1   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div id="write_row5"><div class="col1"> 이미지파일2  </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row6"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button"><a href="#" onclick="check_input()" >확인</a>&nbsp;
								<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>

		</form>



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