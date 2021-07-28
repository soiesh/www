function initialize() {
    var myLatlng = new google.maps.LatLng(37.52300746728429, 127.09922430006408);
    var myOptions = {
     zoom: 15,
     center: myLatlng
  
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
   
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"롯데기공 사업장소개"
       });   
    
   
    var infowindow = new google.maps.InfoWindow({
     content: "서울 동작구 보라매로 5길 51, 롯데관악타워 9층 "
    });
   
    infowindow.open(map,marker);
   }
   
   
   window.onload=function(){
    initialize();
   }