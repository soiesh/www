<? session_start(); ?>
<?
   	@extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION); 

    /*
        $table='download'
        $num=1
        $real_name='2021_07_27_10_01_18_0.jpg'
        $show_name='dog.jpg'
        $file_type='image/jpeg'
    */

	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}
    $file_path = "./data/".$real_name;  // './data/2021_07_27_10_01_18_0.jpg'

    if( file_exists($file_path) )
    { 
		   $fp = fopen($file_path,"rb"); // 파일의 시작 메모리의 주소 => 파일포인터

           if( $file_type ) 
           { 
				Header("Content-type: application/x-msdownload"); 
                Header("Content-Length: ".filesize($file_path));     
                Header("Content-Disposition: attachment; filename=$show_name");   
                Header("Content-Transfer-Encoding: binary"); 
				Header("Content-Description: File Transfer"); 

                header("Expires: 0"); 
            } 
            else 
            { 
                if(eregi("(MSIE 5.0|MSIE 5.1|MSIE 5.5|MSIE 6.0)", $HTTP_USER_AGENT)) 
                { 
                    Header("Content-type: application/octet-stream"); 
                    Header("Content-Length: ".filesize($file_path));     
                    Header("Content-Disposition: attachment; filename=$show_name");   
                    Header("Content-Transfer-Encoding: binary");   
                    Header("Expires: 0");   
                 } 
                 else 
                 { 
                    Header("Content-type: file/unknown");     
                    Header("Content-Length: ".filesize($file_path)); 
                    Header("Content-Disposition: attachment; filename=$show_name"); 
                    Header("Content-Description: PHP3 Generated Data"); 
                    Header("Expires: 0"); 
                 } 
             } 

			if(!fpassthru($fp)) //파일을 다운로드한다
				fclose($fp);  // 파일을 메모리에서 내린다/삭제한다
	}
?>

  
