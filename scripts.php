<div id="ip-address" ip="<?php echo $_SERVER['REMOTE_ADDR']; ?>"></div>
<script src="<?php bloginfo('template_url'); ?>/jquery/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/flows.js"></script>
<script>$(function(){var e=$("#pull-menu");menu=$("ul#mobile-menu"),menuHeight=menu.height(),$(e).on("click",function(e){e.preventDefault(),menu.slideToggle()}),$(window).resize(function(){$(window).width()>980&&menu.is(":hidden")&&menu.removeAttr("style")})});</script>
<script>$(document).ready(function(){"undefined"==typeof YOUTUBE_VIDEO_MARGIN&&(YOUTUBE_VIDEO_MARGIN=5),$("iframe").each(function(t,i){if($(i).attr("src").match(/(https?:)?\/\/www\.youtube\.com/)){var e=$(i).attr("width"),s=$(i).attr("height"),a=s/e*100;a=a.toFixed(2),$(i).css("position","absolute"),$(i).css("top","0"),$(i).css("left","0"),$(i).css("width","100%"),$(i).css("height","100%"),$(i).css("max-width",e+"px"),$(i).css("max-height",s+"px"),$(i).wrap('<div style="max-width:'+e+"px;margin:0 auto; padding:"+YOUTUBE_VIDEO_MARGIN+'px;" />'),$(i).wrap('<div style="position: relative;padding-bottom: '+a+'%; height: 0; overflow: hidden;" />')}})});</script>
<script>for(var a=document.querySelectorAll(".tabs a"),i=0,length=a.length;i<length;i++)a[i].onclick=function(){var e=document.querySelector(".tabs li.active");e&&e.classList.remove("active"),this.parentNode.classList.add("active")};</script>
<?php if ( is_front_page() ) : ?>
<script>var $iframe=$("iframe"),src=$iframe.data("src");window.matchMedia("(min-width: 980px)").matches?$iframe.attr("src",src):$iframe.css("display","none");</script>
<script>
var reqURL = "https://api.rss2json.com/v1/api.json?rss_url=" + encodeURIComponent("https://www.youtube.com/feeds/videos.xml?channel_id=");

function loadVideo(iframe) {
  $.getJSON(reqURL + iframe.getAttribute('cid'),
    function(data) {
      var videoNumber = (iframe.getAttribute('vnum') ? Number(iframe.getAttribute('vnum')) : 0);
      console.log(videoNumber);
      var link = data.items[videoNumber].link;
      var title=data.items[videoNumber].title;
      id = link.substr(link.indexOf("=") + 1);
      iframe.setAttribute("src", "https://youtube.com/embed/" + id + "?controls=0&autoplay=1");
      //iframe.parentElement.querySelector("#video-title").innerText = title;
    }
  );
}

var iframes = document.getElementsByClassName('latestVideoEmbed');
for (var i = 0, len = iframes.length; i < len; i++) {
  loadVideo(iframes[i]);
}

</script>

<!-- <script>
class Sort {
		constructor() {
      this.keys = {
        'rank': 'rank',
        'newlyadded': 'newlyadded',
      }
      this.btnRank = document.querySelector('a#rank');
      this.btnNewlyadded = document.querySelector('a#newlyadded');
			
      this.boxesEl = document.querySelector('#boxes');
      this.boxEl = document.querySelectorAll('.box');

      this.box = [...this.boxEl];
			this.box.forEach(cc => {

        const rank = Number(cc.querySelector('.box-top-right').innerText.match(/\d*/)[0]);
		const newlyadded = Number(cc.querySelector('section').id.match(/\d+/)[0]);

        cc.data = {        
          rank,
          newlyadded
        }
      })

      this.btnRank.addEventListener('click', this.sortCasinos);
      this.btnNewlyadded.addEventListener('click', this.sortCasinos);
      
this.sortCasinos();
  	}
    
    sortCasinos = (event=null, id=null) => {
      if (event !== null)
      {
        event.preventDefault();
        id = event.target.id;
      }

 const sortKey = this.keys[id];
      
      this.boxesEl.innerHTML = '';
      this.sortBy(sortKey);
      this.box.forEach(cc => {
        this.boxesEl.appendChild(cc);
      })
    }
    
    sortBy = (sortKey) => {
      this.box.sort((a,b) => {
        if (sortKey === "rank") {
          if (a.data[sortKey] > b.data[sortKey]) return 1;
          if (a.data[sortKey] < b.data[sortKey]) return -1;  
        } else {
          if (a.data[sortKey] < b.data[sortKey]) return 1;
          if (a.data[sortKey] > b.data[sortKey]) return -1;
        }
        return 0;
      })
    }
}

window.onload = function() {
  const sort = new Sort();
}
</script> -->

<?php elseif ( is_page(98) || is_category(3) ) : ?>
<script>
class Sort {
		constructor() {
      this.keys = {
        'rank': 'rank',
        'newlyadded': 'newlyadded',
      }
      this.btnRank = document.querySelector('button#rank');
      this.btnNewlyadded = document.querySelector('button#newlyadded');
			
			
			
      this.boxesEl = document.querySelector('#toplist-boxes');
      this.boxEl = document.querySelectorAll('.toplist-box');

      this.box = [...this.boxEl];
			this.box.forEach(cc => {

        const rank = Number(cc.querySelector('.toplist-box-top-right').innerText.match(/\d*/)[0]);
		const newlyadded = Number(cc.querySelector('section').id.match(/\d+/)[0]);

        cc.data = {        
          rank,
          newlyadded
        }
      })

      this.btnRank.addEventListener('click', this.sortCasinos);
      this.btnNewlyadded.addEventListener('click', this.sortCasinos);
      
			
			
this.sortCasinos();
  	}
    
    sortCasinos = (event=null, id=null) => {
      if (event !== null)
      {
        event.preventDefault();
        id = event.target.id;
      }

 const sortKey = this.keys[id];
      
      this.boxesEl.innerHTML = '';
      this.sortBy(sortKey);
      this.box.forEach(cc => {
        this.boxesEl.appendChild(cc);
      })
    }
    
    sortBy = (sortKey) => {
      this.box.sort((a,b) => {
        if (sortKey === "rank") {
          if (a.data[sortKey] > b.data[sortKey]) return 1;
          if (a.data[sortKey] < b.data[sortKey]) return -1;  
			
        } else {
          if (a.data[sortKey] < b.data[sortKey]) return 1;
          if (a.data[sortKey] > b.data[sortKey]) return -1;
        }
        return 0;
      })
    }
}

window.onload = function() {
  const sort = new Sort();
}
</script>
<!-- <script>
function filterSelection(s){var e,l;for(e=document.getElementsByClassName("toplist-box"),"all"==s&&(s=""),l=0;l<e.length;l++)w3RemoveClass(e[l],"show"),e[l].className.indexOf(s)>-1&&w3AddClass(e[l],"show")}function w3AddClass(s,e){var l,a,t;for(a=s.className.split(" "),t=e.split(" "),l=0;l<t.length;l++)-1==a.indexOf(t[l])&&(s.className+=" "+t[l])}function w3RemoveClass(s,e){var l,a,t;for(a=s.className.split(" "),t=e.split(" "),l=0;l<t.length;l++)for(;a.indexOf(t[l])>-1;)a.splice(a.indexOf(t[l]),1);s.className=a.join(" ")}filterSelection("all");
</script> -->
<?php endif; ?>
<?php if ( is_page(711) ){?>
<script>$(document).ready(function(){"undefined"==typeof TWITCH_STREAM_MARGIN&&(TWITCH_STREAM_MARGIN5),$("iframe").each(function(t,i){if($(i).attr("src").match(/(https?:)?\/\/player\.twitch\.tv/)){var e=$(i).attr("width"),s=$(i).attr("height"),a=s/e*100;a=a.toFixed(2),$(i).css("position","absolute"),$(i).css("top","0"),$(i).css("left","0"),$(i).css("width","100%"),$(i).css("height","100%"),$(i).css("max-width",e+"px"),$(i).css("max-height",s+"px"),$(i).wrap('<div style="max-width:'+e+"px;margin:0 auto; padding:"+TWITCH_STREAM_MARGIN+'px;" />'),$(i).wrap('<div style="position: relative;padding-bottom: '+a+'%; height: 0; overflow: hidden;" />')}})});</script>
<?php }?>