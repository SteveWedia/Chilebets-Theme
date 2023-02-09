<footer>
   <div class="footer-columns">
      <div class="footer-column">
         <h5>Últimas publicaciones</h5>
         <ul>
            <?php $recent = new WP_Query("showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
            <li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if (strlen($post->post_title) > 35) {
               echo substr(the_title($before = '', $after = '', FALSE), 0, 37) . '...'; } else {
               
               the_title();
               
               } ?></a></li>
            <?php endwhile; ?>
         </ul>
      </div>
      <div class="footer-column">
         <h4>Descargo de responsabilidad</h4>
         <p>En Chilebets.com no somos responsables de información incorrecta sobre bonos, ofertas o concursos ofrecidos atreves de nuestra página. Todas las ofertas en casas de apuestas / casinos son dinámicas y pueden ser alteradas sin previo aviso. El jugador debe siempre verificar la validez de la oferta en dicha página antes de aceptar cualquier promoción.</p>
         <h4>Juego responsable</h4>
         <p>En Chilebets.com siempre fomentamos el uso del juego responsable. Jugar en casas de apuestas / casinos estrictamente es para uso recreacional. Juegos de azar es un producto que puede causar adicción. Cada jugador es responsable por sus apuestas, y nunca se debe apostar sobre un límite predeterminado de cuánto puede permitirse perder. Nunca pidas dinero prestado para jugar. No juegue cuando esté bajo efectos de alcohol. El juego es un entretenimiento como ir al cine o a un concierto. Te quedas con la experiencia. Si siente malestar o piensas que está perdiendo el control, ¡DETÉNGASE!</p>
      </div>
      <div class="footer-column">
        
		  		
        
         <img src="<?php bloginfo('template_url'); ?>/images/18pluss.webp" alt="18 pluss" title="18 pluss" width="75" height="78">
      </div>
   </div>
   <div id="footer-bottom">
      <p>&copy; Chilebets.com <?php echo date('Y'); ?>. TODOS LOS DERECHOS RESERVADOS.</p>
   </div>
</footer>
<?php include(TEMPLATEPATH."/scripts.php");?>
</body>
<?php wp_footer(); ?>
</html>