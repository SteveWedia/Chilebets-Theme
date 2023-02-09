<?php $Description= get_post_meta($post->ID, 'Description', true); ?>
   <div id="main-area-casinoliste">
      <div id="casinoliste-inner">
         <header id="casinoliste-top" class="odds-2">
            <div id="casinoliste-top-left">
               <h1><?php the_title(); ?></h1>
               <p><span class="ingress"><?php echo $Description;?></span></p>
            </div>
         </header>
         <div id="casinoliste-list-section">
            <p>Sorter etter:</p>
            <div id="current-casinolist-selection" class="default"></div>
            <ul id="casinoliste-tabs">
               <li ><button id="rank" class="focus" href="#" type="button">Topp vurdering</button></li>
               <li><button id="newlyadded" href="#" type="button">Nylig lagt til</button></li>
               <li><button id="crypto" href="#" type="button">Crypto</button></li>
            </ul>