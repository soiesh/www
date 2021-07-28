$(document).ready(function () {
        
    $('.subNav li:eq(0)').find('a').addClass('spy');
    //첫번째 서브메뉴 활성화
    
    //$('#content .content_area div:eq(0)').addClass('boxMove');
    //첫번째 내용글 애니메이션 처리
    var smh= $('.subNav').offset().top-190;
    var h1= $('#content .content_area>div:eq(0)').offset().top-800 ;
    var h2= $('#content .content_area>div:eq(1)').offset().top-800 ;
    // var h3= $('#content .content_area div:eq()').offset().top-500 ;

     //스크롤의 좌표가 변하면.. 스크롤 이벤트
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다
       
        //$('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.
        
        //sticky menu 처리
        if(scroll>smh){ 
            $('.subNav').addClass('sticky');
            //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            $('header').hide();
        }else{
            $('.subNav').removeClass('sticky');
            //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
            $('header').show();
        }
        
        
        
        $('.subNav li').find('a').removeClass('spy');
        //모든 서브메뉴 비활성화~ 불꺼!!!
        
        
         //스크롤의 거리의 범위를 처리
        if(scroll>=h1 && scroll<h2){
            $('.subNav li:eq(0)').find('a').addClass('spy');
            //첫번째 서브메뉴 활성화
            
            $('.content_area>div:eq(0)').addClass('boxMove');
            //첫번째 내용 콘텐츠 애니메이
        }else if(scroll>=h2){
            $('.subNav li:eq(1)').find('a').addClass('spy');
            //두번째 서브메뉴 활성화
            
             $('.content_area>div:eq(1)').addClass('boxMove');
        }
         
    });
    //클릭시 부드럽게 해당 위치로 이동
    $('.subNav a').click(function(e){
        e.preventDefault();

        var value=0;

        if($(this).hasClass('link1')){  //첫번째 메뉴 버튼을 클릭하면
           value= $('.content_area .introduce').offset().top - 450;  // 해당 요소의 상단(top)까지의 거리 
        }else if($(this).hasClass('link2')){  //두번째 메뉴 버튼을 클릭하면
           value= $('.content_area .h3_div').offset().top - 120; 
        }
        
        $("html,body").stop().animate({"scrollTop":value},1000);
    });

});