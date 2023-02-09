<section class="odds-list-container">
	<h2>Últimas apuestas</h2>
	<div class="odds-list-wrapper">
		<div class="list-container">
			<div class="header-list-item">

				<div>
					Fecha
				</div>
				<div class="align-left">
					Evento
				</div>
				<div class="align-left">
					Juego
				</div>
				<div>
					Cuota
				</div>
				<div>

				</div>
			</div>
			<?php
			$args['posts_per_page'] = '30';
			$args['post_type'] = 'odd';
			$args['post_status'] = 'publish';
			$args['meta_key'] = 'od_datetime';
			$args['orderby'] = 'meta_value';
			$args['order'] = 'ASC';
			$args['meta_query'] = [['key'=>'od_datetime', 'value' => date("Y-m-d H:i:s", strtotime('+2 hours')), 'compare' => '>=', 'type' => 'DATETIME']];
			$result = new WP_Query( $args );
			
	// 		$args2['posts_per_page'] = '30';
	// 		$args2['post_type'] = 'odd';
	// 		$args2['post_status'] = 'publish';
	// 		$args2['meta_key'] = 'od_datetime';
	// 		$args2['orderby'] = 'meta_value';
	// 		$args2['order'] = 'ASC';
			//$result2 = new WP_Query( $args2 );
			//echo $result;
			?>
			<ul class="odds-list">
				<?php 
				while ($result->have_posts()) : $result->the_post();
				get_template_part( 'template-parts/odds/item-table-list', null, $post );
				endwhile;
				wp_reset_postdata(); 
				?>
				<?php
				$args2['posts_per_page'] = '50';
				$args2['post_type'] = 'odd';
				$args2['post_status'] = 'publish';
				$args2['meta_key'] = 'od_datetime';
				$args2['orderby'] = 'meta_value';
				$args2['order'] = 'DESC';
				$args2['meta_query'] = [['key'=>'od_datetime', 'value' => date("Y-m-d H:i:s", strtotime('+2 hours')), 'compare' => '<', 'type' => 'DATETIME']];
				$result2 = new WP_Query( $args2 );
				while ($result2->have_posts()) : $result2->the_post();
				get_template_part( 'template-parts/odds/item-table-list', null, $post );
				endwhile;
				wp_reset_postdata(); 
				?>
			</ul>
		</div>
		<div class="odds-list-sidebar">
			<?php
                     $id = get_the_ID();
                     $args3['posts_per_page'] = '4';
                     $args3['orderby'] = 'rand';
					 $args3['cat'] = '3';
                     $args3['meta_query'] = [['key' => 'Stars', 'value' => '4.6', 'compare' => '>=', 'type' => 'DECIMAL(10,3)']];
                     $result3 = new WP_Query( $args3 );
                     //shuffle($result);
                     ?>
			<?php 
			while ($result3->have_posts()) : $result3->the_post();
			get_template_part( 'template-parts/casino/item-row-sidebar' );
			endwhile;
			wp_reset_postdata(); 
			?>
		</div>
	</div>
</section>