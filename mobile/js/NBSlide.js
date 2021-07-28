// JavaScript Document

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
