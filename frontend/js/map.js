window.onload = function(){
    var options = {
        zoom: 13
        , 
        center: new google.maps.LatLng(-33.2835312, -62.1854591)
        , 
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map'), options);
};    

//-33.2835312,-62.1854591