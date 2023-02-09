jQuery( document ).ready( function() {


    // If banner is available
    if($('#slideshow-container').length){
        var slideContainer = $('#slideshow-container');
        var slideCount = $('.slides').length;

        // If banner-area has 8 slots
        if(slideCount >= 8){
            var IP = $('#ip-address').attr('ip');
            //console.log("IP", IP);

            var settings = {
                "url": "https://quantum-api-v-2-lmfvs.ondigitalocean.app/Flows/scheduleRun/e7212bea-92d2-4461-8903-561b1228fd98",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "qToken": "9de0d2a9-fa2b-409f-8557-ed33b674cb08",
                    "Content-Type": "text/plain"
                },
                "data": "{payload:{IP:"+IP+",Count:4}}",
            };
        
            $.ajax(settings).done(function (response) {
                var banners = response.flowdata.Banners;
                var active = (document.getElementById("giveaway-status").getAttribute("active") === 'true');
                var bannerArray = ['BannerA', 'BannerB', 'BannerC', 'BannerD', 'BannerE', 'BannerF', 'BannerG', 'BannerH'];

                var currentBanner = $('.slide-show').attr('id');

                if(!active){
                  // Replace one of the banners with the current active one.

                  // 1. Check whether banner is already in there
                  if(!banners.includes(currentBanner)){
                    banners.shift();
                    banners.unshift(currentBanner);
                  }
                }else{
                  // Giveaway active, so we need to preserve banner A

                  // If banner A is not in Arrray add it to first instance of the array
                  if(!banners.includes("BannerA")){
                    banners.shift();
                    banners.unshift('BannerA');
                  }


                  if(!banners.includes(currentBanner)){
                    var replaced = false;
                    banners.forEach(function(item, index) {
                      if(item !== 'BannerA' && !replaced){
                        banners[index] = currentBanner;
                        replaced = true;
                      }
                    });

                  } 
                }

                console.log("banners new", banners);

                bannerArray = bannerArray.filter( function( el ) {
                  return banners.indexOf( el ) < 0;
                } );
                if (active && searchStringInArray('BannerA', bannerArray) >= 0){
                  bannerArray = bannerArray.filter(e => e !== 'BannerA');
                  bannerArray.push(banners[banners.length - 1]);
                }

                // Remove banners that we will not show.
                bannerArray.forEach(function(item) {
                  $('#'+item).remove();
                });
                
                var randNum =  Math.floor(Math.random() * 4) + 1;
                var slideIndex=randNum;
                if(active){
                  slideIndex=1;
                }
                var timer=null;
                var l,s=document.getElementsByClassName("slides");
                if(active){
                  var last3 = Array.from(s).slice(-3);
                  last3 = shuffle(last3);
                  s = Array.from(s).slice(0,1).concat(last3);
                }

                $('#arrow-prev').click(function() {
                  plusSlides(-1);
                });
                $('#arrow-next').click(function() {
                  plusSlides(1);
                });
              
                function plusSlides(e){clearTimeout(timer),showSlides(slideIndex+=e)}
                function currentSlide(e){clearTimeout(timer),showSlides(slideIndex=e)}
                function showSlides(e){
                  for(null==e&&(e=++slideIndex),e>s.length&&(slideIndex=1),e<1&&(slideIndex=s.length),l=0;l<s.length;l++)s[l].style.display="none";s[slideIndex-1].style.display="block",timer=setTimeout(showSlides,6e3)}
                showSlides(slideIndex);
                function shuffle(array) {
                  let currentIndex = array.length,  randomIndex;
              
                  // While there remain elements to shuffle.
                  while (currentIndex != 0) {
              
                    // Pick a remaining element.
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex--;
              
                    // And swap it with the current element.
                    [array[currentIndex], array[randomIndex]] = [
                      array[randomIndex], array[currentIndex]];
                  }
              
                  return array;
                }
            });
        }else{
            var active = (document.getElementById("giveaway-status").getAttribute("active") === 'true');
            var randNum =  Math.floor(Math.random() * 4) + 1;
            var slideIndex=randNum;
            if(active){
              slideIndex=1;
            }
            var timer=null;
            var l,s=document.getElementsByClassName("slides");
            if(active){
              var last3 = Array.from(s).slice(-3);
              last3 = shuffle(last3);
              s = Array.from(s).slice(0,1).concat(last3);
            }

            $('#arrow-prev').click(function() {
              plusSlides(-1);
            });
            $('#arrow-next').click(function() {
              plusSlides(1);
            });
          
            function plusSlides(e){clearTimeout(timer),showSlides(slideIndex+=e)}
            function currentSlide(e){clearTimeout(timer),showSlides(slideIndex=e)}
            function showSlides(e){
              for(null==e&&(e=++slideIndex),e>s.length&&(slideIndex=1),e<1&&(slideIndex=s.length),l=0;l<s.length;l++)s[l].style.display="none";s[slideIndex-1].style.display="block",timer=setTimeout(showSlides,6e3)}
            showSlides(slideIndex);
            function shuffle(array) {
              let currentIndex = array.length,  randomIndex;
          
              // While there remain elements to shuffle.
              while (currentIndex != 0) {
          
                // Pick a remaining element.
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex--;
          
                // And swap it with the current element.
                [array[currentIndex], array[randomIndex]] = [
                  array[randomIndex], array[currentIndex]];
              }
          
              return array;
            }
        }

    }

    function setSlideMovement (){
        
    }

    function searchStringInArray (str, strArray) {
      for (var j=0; j<strArray.length; j++) {
          if (strArray[j].match(str)) return j;
      }
      return -1;
    }

});