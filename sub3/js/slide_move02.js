    $(document).ready(function () {
            
         //한페이에서 메뉴 클릭시 원하는 위치로 스무스하게 이동시키는 코드 
              $('.slideMenu a').click(function(e){
                  e.preventDefault();

                  var value=0;

                  if($(this).hasClass('link1')){  //첫번째 메뉴 버튼을 클릭하면
                     value= $('.content_area .h3_div:eq(0)').offset().top-100;  // 해당 요소의 상단(top)까지의 거리 
                  }else if($(this).hasClass('link2')){  //두번째 메뉴 버튼을 클릭하면
                     value= $('.content_area .h3_div:eq(1)').offset().top-100; 
                  }
                  
                  $("html,body").stop().animate({"scrollTop":value},1000);
              });
       });