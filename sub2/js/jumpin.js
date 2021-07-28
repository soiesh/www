$(document).ready(function () {
        
     //스크롤의 좌표가 변하면.. 스크롤 이벤트
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다
       
        console.log(scroll);
        $('.scale').text(scroll);
        //스크롤 좌표의 값을 찍는다.
        
         //스크롤의 거리의 범위를 처리
        if(scroll>700){
                        
            $('.content_area .content_01').addClass('boxMove');
            //첫번째 내용 콘텐츠 애니메이
        }
        if(scroll>=2300){                        
             $('.content_area .content_02').addClass('boxMove');
        }if(scroll>=3000){                        
            $('.content_area .content_03').addClass('boxMove');
        }if(scroll>=4500){                        
            $('.content_area .content_04').addClass('boxMove');
        }if(scroll>=5650){                        
            $('.content_area .content_05').addClass('boxMove');
        }
        
    });
  

});