


// 상단이동 코드
$(document).ready(function () {
            
    $('.topMove').hide();  //top버튼 보이지마~~~
  
    $(window).on('scroll',function(){   // 스크롤의 위치가 바뀌면 발생하는 이벤트
         var scroll = $(window).scrollTop();  //스크롤의 상단 부터의 거리
        
        
       //   $('.text').text(scroll);  // 스크롤의 거리를 출력
 
         if(scroll>500){    //스트롤 top의 거리가 500px 보다 커지면
             $('.topMove').fadeIn('slow');  //top메뉴가 보인다
         }else{
             $('.topMove').fadeOut('fast'); //top메뉴가 안보인다
         }
    });
  
     // top메뉴를 클릭하면 상단으로 이동시킨다 
     $('.topMove').click(function(e){
         e.preventDefault();
         //상단으로 스르륵 이동합니다.
        $("html,body").stop().animate({"scrollTop":0},1000); // 스크롤의 위치를 이동시킨다
     });
 
 });
 
 
 // FOOTER 관계사 바로가기 
 
 $(document).ready(function() {
     /*
     $('.select .arrow').click(function(){
         $('.select .aList').fadeIn('slow');			  
     });
     $('.select .aList').mouseleave(function(){
         $(this).fadeOut('slow');		  
     });
     */
     $('.select .arrow').toggle(function(){
         $('.select .aList').fadeIn('slow');	
     }, function(){
         $('.select .aList').fadeOut('slow');	
     });
 
     //tab키 처리
       $('.select .arrow').on('focus', function () {        
               $('.select .aList').show();	
        });
 
        $('.select .aList li:last').find('a').on('blur', function () {        
               $('.select .aList').hide();
        });  
 });
 
 

// NBSLIDE , 제품슬라이드

$(document).ready(function() {
    var position=0;  //최초위치 목적지 left값
    var movesize= 200; //이미지 한개 너비
    var timeonoff;    //자동기능

    $('.slide_gallery ul').after($('.slide_gallery ul').clone());
    // $(해당태그).after(뒤에 만들어붙일 태그); ul 한번 복제

    function lrslide() {
        position-=movesize;  // 150씩 감소
        $('.slide_gallery').stop().animate({left:position}, 'fast',
             function(){                     // <--콜백함수: 앞에 애니메이션 끝나고 작용							
            if(position == -1000 ){
               $('.slide_gallery').css('left',0);
               position=0;
            }
     });
     }

    timeonoff= setInterval(lrslide, 2000);

 
 
    $('.button').click(function(event){
     var $target=$(event.target);
     clearInterval(timeonoff);
     
     if($target.is('.m1')){   //왼쪽버튼 클릭했냐??
          
          if(position==-1000){
              $('.slide_gallery').css('left',0);
               position=0;
           }
           
         
          position-=movesize;  // 150씩 감소
              $('.slide_gallery').stop().animate({left:position}, 'fast',
             function(){							
             if(position==-1000){
                $('.slide_gallery').css('left',0);
                position=0;
             }
           });
           
     }else if($target.is('.m2')){  // 오른쪽 버튼 클릭했냐??
      
           if(position==0){
                $('.slide_gallery').css('left',-1000);
                position=-1000;
            }
     
            position+=movesize; // 150씩 증가
            $('.slide_gallery').stop().animate({left:position}, 'fast',
             function(){							
             if(position==0){
                $('.slide_gallery').css('left',-1000);
                position=-1000;
             }
            });
     }
    });
});


