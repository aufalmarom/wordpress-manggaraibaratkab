jQuery( window ).on( 'elementor/frontend/init', function() {

    elementorFrontend.hooks.addAction( 'frontend/element_ready/wts-gmap.default', function( $scope ) {
        map = new_map($scope.find('.eae-markers'));

        function new_map( $el ) {
            $wrapper = $scope.find('.eae-markers');
            var zoom = $wrapper.data('zoom');
            var $markers = $el.find('.marker');
            var styles = $wrapper.data('style');
            var prevent_scroll = $wrapper.data('scroll')
            // vars
            var args = {
                zoom		: zoom,
                center		: new google.maps.LatLng(0, 0),
                mapTypeId	: google.maps.MapTypeId.ROADMAP,
                styles		: styles
            };

            // create map
            var map = new google.maps.Map( $el[0], args);

            // add a markers reference
            map.markers = [];

            // add markers
            $markers.each(function(){
                add_marker( jQuery(this), map );
            });

            // center map
            center_map( map, zoom );

            // return
            return map;
        }

        function add_marker( $marker, map ) {
            // var
            var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

            icon_img = $marker.attr('data-icon');
            if(icon_img != ''){
                var icon = {
                    url : $marker.attr('data-icon'),
                    scaledSize: new google.maps.Size($marker.attr('data-icon-size'), $marker.attr('data-icon-size'))
                };

                console.log(icon);
            }


            //var icon = $marker.attr('data-icon');

            // create marker
            var marker = new google.maps.Marker({
                position	: latlng,
                map			: map,
                icon        : icon
            });

            // add to array
            map.markers.push( marker );

            // if marker contains HTML, add it to an infoWindow

            if( $marker.html() )
            {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content		: $marker.html()
                });

                // show info window when marker is clicked
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open( map, marker );
                });
            }
        }

        function center_map( map, zoom ) {
            console.log(zoom);
            // vars
            var bounds = new google.maps.LatLngBounds();
            // loop through all markers and create bounds
            jQuery.each( map.markers, function( i, marker ){
                var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
                bounds.extend( latlng );
            });

            // only 1 marker?
            if( map.markers.length == 1 )
            {
                // set center of map
                map.setCenter( bounds.getCenter() );
                map.setZoom( zoom );
            }
            else
            {
                // fit to bounds
                map.fitBounds( bounds );
            }
        }
    });

});

(function( $ ){

    $(window).on('elementor/frontend/init',function(){

        var ab_image = function($scope, $){
            ab_style = $scope.find('.eae-img-comp-container').data("ab-style");
            slider_pos = $scope.find('.eae-img-comp-container').data("slider-pos");
            if(ab_style == "horizontal"){
                horizontal($scope);
            }else{
               vertical();
            }

            function horizontal($scope) {
                var x, i, start_pos;
                /*find all elements with an "overlay" class:*/
                x = $scope.find(".eae-img-comp-overlay");
                start_pos = x.width();
                start_pos = start_pos * slider_pos /100;
                compareImages(x[0]);

                function compareImages(img) {
                    var slider, clicked = 0, w, h;
                    /*get the width and height of the img element*/
                    w = img.offsetWidth;
                    h = img.offsetHeight;
                    /*set the width of the img element to 50%:*/
                    img.style.width = start_pos + "px";
                    /*create slider:*/
                    slider = $scope.find(".eae-img-comp-slider");
                    slider = slider[0];
                    /*position the slider in the middle:*/
                    slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
                    slider.style.left = start_pos - (slider.offsetWidth / 2) + "px";
                    /*execute a function when the mouse button is pressed:*/
                    if(!$scope.hasClass('elementor-element-edit-mode')) {
                        slider.addEventListener("mousedown", slideReady);
                        //slider.addEventListener("mouseover", slideReady);
                        //img.addEventListener("mouseover", slideReady);

                        /*and another function when the mouse button is released:*/
                        window.addEventListener("mouseup", slideFinish);
                        //slider.addEventListener("mouseout", slideFinish);
                        //img.addEventListener("mouseout", slideFinish);
                        /*or touched (for touch screens:*/
                        slider.addEventListener("touchstart", slideReady);
                        /*and released (for touch screens:*/
                        window.addEventListener("touchstop", slideFinish);
                    }
                    function slideReady(e) {
                        /*prevent any other actions that may occur when moving over the image:*/
                        e.preventDefault();
                        /*the slider is now clicked and ready to move:*/
                        clicked = 1;
                        /*execute a function when the slider is moved:*/
                        window.addEventListener("mousemove", slideMove);
                        //window.addEventListener("mouseover", slideMove);
                        //window.addEventListener("touchmove", slideMove);
                        slider.addEventListener("touchmove", touchMoveaction);
                    }
                    function slideFinish() {
                        /*the slider is no longer clicked:*/
                        clicked = 0;
                    }
                    function slideMove(e) {
                        var pos;
                        /*if the slider is no longer clicked, exit this function:*/
                        if (clicked == 0) return false;
                        /*get the cursor's x position:*/
                        pos = getCursorPos(e);
                        /*prevent the slider from being positioned outside the image:*/
                        if (pos < 0) pos = 0;
                        if (pos > w) pos = w;
                        /*execute a function that will resize the overlay image according to the cursor:*/
                        slide(pos);
                    }

                    function touchMoveaction(e)
                    {
                        var pos;
                        /*if the slider is no longer clicked, exit this function:*/
                        if (clicked == 0) return false;
                        /*get the cursor's x position:*/
                        pos = getTouchPos(e);

                        /*prevent the slider from being positioned outside the image:*/
                        if (pos < 0) pos = 0;
                        if (pos > w) pos = w;
                        /*execute a function that will resize the overlay image according to the cursor:*/
                        slide(pos);
                    }

                    function getTouchPos(e) {
                        var a, x = 0;
                        a = img.getBoundingClientRect();

                        /*calculate the cursor's x coordinate, relative to the image:*/
                        x = e.changedTouches[0].clientX - a.left;
                         return x;
                    }

                    function getCursorPos(e) {
                        var a, x = 0;
                        e = e || window.event;
                        /*get the x positions of the image:*/
                        a = img.getBoundingClientRect();
                        /*calculate the cursor's x coordinate, relative to the image:*/
                        x = e.pageX - a.left;

                        /*consider any page scrolling:*/
                        //x = x - window.pageXOffset;
                        return x;
                    }
                    function slide(x) {
                        /*resize the image:*/
                        img.style.width = x + "px";
                        /*position the slider:*/
                        slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
                    }
                }
            }

            function vertical() {
                var x, i;
                /*find all elements with an "overlay" class:*/
                //x = document.getElementsByClassName("eae-img-comp-overlay");
                x = $scope.find(".eae-img-comp-overlay");
                start_pos = x.height();
                start_pos = start_pos * slider_pos /100;
                compareImages(x[0]);

                function compareImages(img) {
                    var slider, img, clicked = 0, w, h;
                    /*get the width and height of the img element*/
                    w = img.offsetWidth;
                    h = img.offsetHeight;
                    /*set the width of the img element to 50%:*/
                    img.style.height = start_pos + "px";
                    /*create slider:*/
                    slider = $scope.find(".eae-img-comp-slider");
                    slider = slider[0];
                    /*position the slider in the middle:*/
                    slider.style.top = start_pos - (slider.offsetHeight / 2) + "px";
                    slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
                    /*execute a function when the mouse button is pressed:*/
                    if(!$scope.hasClass('elementor-element-edit-mode')) {
                        slider.addEventListener("mousedown", slideReady);
                        /*and another function when the mouse button is released:*/
                        window.addEventListener("mouseup", slideFinish);
                        /*or touched (for touch screens:*/
                        slider.addEventListener("touchstart", slideReady);
                        /*and released (for touch screens:*/
                        window.addEventListener("touchstop", slideFinish);
                    }
                    function slideReady(e) {
                        /*prevent any other actions that may occur when moving over the image:*/
                        e.preventDefault();
                        /*the slider is now clicked and ready to move:*/
                        clicked = 1;
                        /*execute a function when the slider is moved:*/
                        window.addEventListener("mousemove", slideMove);
                        slider.addEventListener("touchmove", touchMoveaction);
                    }
                    function slideFinish() {
                        /*the slider is no longer clicked:*/
                        clicked = 0;
                    }
                    function slideMove(e) {
                        var pos;
                        /*if the slider is no longer clicked, exit this function:*/
                        if (clicked == 0) return false;
                        /*get the cursor's x position:*/
                        pos = getCursorPos(e)
                        /*prevent the slider from being positioned outside the image:*/
                        if (pos < 0) pos = 0;
                        if (pos > h) pos = h;
                        /*execute a function that will resize the overlay image according to the cursor:*/
                        slide(pos);
                    }

                    function getCursorPos(e) {
                        var a, x = 0;
                        e = e || window.event;
                        /*get the x positions of the image:*/
                        a = img.getBoundingClientRect();
                        /*calculate the cursor's x coordinate, relative to the image:*/
                        x = e.pageY - a.top;
                        /*consider any page scrolling:*/
                        x = x - window.pageYOffset;

                        return x;
                    }

                    function touchMoveaction(e)
                    {
                        var pos;
                        /*if the slider is no longer clicked, exit this function:*/
                        if (clicked == 0) return false;
                        /*get the cursor's x position:*/
                        pos = getTouchPos(e);

                        /*prevent the slider from being positioned outside the image:*/
                        if (pos < 0) pos = 0;
                        if (pos > h) pos = h;
                        /*execute a function that will resize the overlay image according to the cursor:*/
                        slide(pos);
                    }

                    function getTouchPos(e) {
                        var a, x = 0;
                        a = img.getBoundingClientRect();

                        /*calculate the cursor's x coordinate, relative to the image:*/
                        x = e.changedTouches[0].clientY - a.top;

                        //x = x - slider.offsetHeight;

                        return x;
                    }

                    function slide(x) {
                        /*resize the image:*/
                        img.style.height = x + "px";
                        /*position the slider:*/
                        slider.style.top = img.offsetHeight - (slider.offsetHeight / 2) + "px";
                    }
                }
            }
        }

        var ParticlesBG = function($scope, $){

            if($scope.hasClass('eae-particle-yes')){
                id = $scope.data('id');
                element_type = $scope.data('element_type');
                pdata = $scope.data('eae-particle');
                pdata_wrapper = $scope.find('.eae-particle-wrapper').data('eae-pdata');
                if(typeof pdata != 'undefined' && pdata != ''){

                    $scope.prepend('<div class="eae-particle-wrapper" id="eae-particle-'+ id +'"></div>');
                    particlesJS('eae-particle-'+ id, pdata);

                }else if(typeof pdata_wrapper != 'undefined' && pdata_wrapper != ''){

                    $scope.prepend('<div class="eae-particle-wrapper" id="eae-particle-'+ id +'"></div>');
                    console.log('calling particle js else', JSON.parse(pdata_wrapper));
                    particlesJS('eae-particle-'+ id, JSON.parse(pdata_wrapper));
                }

            }

        }

        elementorFrontend.hooks.addAction( 'frontend/element_ready/wts-ab-image.default', ab_image);
        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', ParticlesBG );

        });

})(jQuery)

