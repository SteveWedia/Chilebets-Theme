<?php /* Template Name: Odds Summary*/ ?>
<?php get_header();
$bettingSummaryID = 4547;
?>
<div id="site-wrapper">
    <div id="main-area-casinoliste">
        <div class="odds-summary-page" id="casinoliste-inner">
            <h1>Resultatsammendrag</h1>
            <section class="summary-header">
                <div class="summary-container all" id="summary-container" roiAll="<?php the_field('roi', $bettingSummaryID); ?>" roiMonth="<?php the_field('m_roi', $bettingSummaryID); ?>" roiWeek="<?php the_field('w_roi', $bettingSummaryID); ?>">
                    <div class="summary-radio">
                        <div class="all-highlight" id="all-summary">
                            Alle
                        </div>
                        <div class="month-highlight" id="month-summary">
                            Siste 30 dager
                        </div>
                        <div class="week-highlight" id="week-summary">
                            Siste 7 dager
                        </div>
                    </div>
                    <div class="summary">
                        <div class="bet-info">
                            <h2>
                                Bets
                            </h2>
                            <span class="all-show"><?php the_field('bets', $bettingSummaryID); ?></span>
                            <span class="month-show">
                                <?php the_field('m_bets', $bettingSummaryID); ?>
                            </span>
                            <span class="week-show">
                                <?php the_field('w_bets', $bettingSummaryID); ?>
                            </span>
                        </div>
                        <div class="bet-info">
                            <h2>
                                ROI
                            </h2>
                            <span class="all-show">
                                <?php 
								$roi = get_field('roi', $bettingSummaryID);
								echo number_format( $roi, 2, '.', ''); ?>%
                            </span>
                            <span class="month-show">
                                <?php 
								$roi = get_field('m_roi', $bettingSummaryID);
								echo number_format( $roi, 2, '.', ''); ?>%
                            </span>
                            <span class="week-show">
                                <?php 
								$roi = get_field('w_roi', $bettingSummaryID);
								echo number_format( $roi, 2, '.', ''); ?>%
                            </span>
                        </div>
                        <div class="bet-info">
                            <h2>
                                Profitt
                            </h2>
                            <span class="all-show">
                                <?php $profit = get_field('profit', $bettingSummaryID);
								echo number_format( $profit, 0, '.', '');?> units
                            </span>
                            <span class="month-show">
                                <?php $profit = get_field('m_profit', $bettingSummaryID);
								echo number_format( $profit, 0, '.', '');?> units
                            </span>
                            <span class="week-show">
                                <?php $profit = get_field('w_profit', $bettingSummaryID);
								echo number_format( $profit, 0, '.', '');?> units
                            </span>
                        </div>
                        <div class="bet-info">
                            <h2>
                                Vunnet
                            </h2>
                            <span class="all-show">
                                <?php 
								$won_bets = get_field('won_bets', $bettingSummaryID);
								$total_bets = get_field('bets', $bettingSummaryID);
								echo $won_bets?> <span>(<?php if($total_bets != 0){echo number_format( ($won_bets/$total_bets)*100, 0, '.', ''); }else{ echo 0; }?>%)</span>
                            </span>
                            <span class="month-show">
                                <?php 
								$won_bets = get_field('m_won_bets', $bettingSummaryID);
								$total_bets = get_field('m_bets', $bettingSummaryID);
								echo $won_bets?> <span>(<?php if($total_bets != 0){echo number_format( ($won_bets/$total_bets)*100, 0, '.', ''); }else{ echo 0; }?>%)</span>
                            </span>
                            <span class="week-show">
                                <?php 
								$won_bets = get_field('w_won_bets', $bettingSummaryID);
								$total_bets = get_field('w_bets', $bettingSummaryID);
								echo $won_bets?> <span>(<?php if($total_bets != 0){echo number_format( ($won_bets/$total_bets)*100, 0, '.', ''); }else{ echo 0; }?>%)</span>
                            </span>
                        </div>
                    </div>
                </div>
				<div class="summary-buttons">
					<a href="/oddstips" class="button">
						Siste oddstips
					</a>
					<a href="/bettingsider-liste" class="button-4">
						Bettingsider Liste
					</a>
				</div>
            </section>
            <section class="summary-table-section" id="summary-table">
                <h2>
                    Spillresultat
                </h2>
                <div class="summary-table">
                    <div class="st-header">
                        <div class="mobile-hide">
                            Dato
                        </div>
                        <div>
                            Event
                        </div>
                        <div>
                            Spill
                        </div>
                        <div class="mobile-hide">
                            Bet Size
                        </div>
                        <div class="mobile-hide">
                            Odds
                        </div>
                        <div>
                            Resultat
                        </div>
                    </div>
                    <div class = "pag_loading">
                        <div class="loading" id="summary-loading">
                            <div class="inner">
                                <img src="<?php bloginfo('template_url'); ?>/images/loading.svg" alt="loading" height="150" width="150">
                                <p>Lasting</p>
                            </div>
                        </div>
                        <div class = "pagination_container">
                            <div class="st-data">
                                <?php
                                $args['posts_per_page'] = '20';
								$args['meta_key'] = 'od_datetime';
								$args['orderby'] = 'meta_value';
								$args['order'] = 'DESC';
								$args['post_status'] = 'publish';
								$args['post_type'] = 'odd';
								$args['meta_query'] = [['key' => 'od_result', 'compare' => 'IN', 'value' => ['Void', 'Profit', 'Loss', 'Half Win (AH)', 'Half Loss (AH)', 'Draw (AH)'] ]];
                                $result = new WP_Query( $args );
                                ?>
                                <?php 
                                while ($result->have_posts()) : $result->the_post();
                                    get_template_part( 'template-parts/odds-summary/odd-list-item', null, $post);
                                endwhile;
                                wp_reset_postdata(); 
                                ?>
                            </div>
                            <div class="post-content"></div>
                        </div>
                    </div>
                    <!-- <div class="st-data">
                        <?php
                        // $args['posts_per_page'] = '20';
                        // $args['meta_key'] = 'Stars';
                        // $args['orderby'] = 'meta_value_num';
                        // $args['order'] = 'DESC';
                        // $args['cat'] = '7';
                        // $args['post__not_in'] = array( 2702, );
                        // $result = new WP_Query( $args );
                        ?>
                        <?php 
                        // while ($result->have_posts()) : $result->the_post();
                        //     get_template_part( 'template-parts/odds-summary/odd-list-item');
                        // endwhile;
                        // wp_reset_postdata(); 
                        ?>
                    </div> -->
                </div>
            </section>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    // This is required for AJAX to work on our page
                    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                    function load_all_posts(page){
                    var data = {
                        page: page,
                        action: "demo_pagination_posts"
                    };
                    // Send the data
                    $.post(ajaxurl, data, function(response) {
                        $(".pagination_container").html(response);
                        $('#summary-loading').removeClass('show');
                    });
                    }
                    load_all_posts(1); // Load page 1 as the default
                    $(document).on('click','.pagination ul li',function(){
                        $('#summary-loading').addClass('show');
                    var page = $(this).attr('p');
                    load_all_posts(page);
                    smoothScroll();
                    });

                    function smoothScroll(){
                        document.querySelector('#summary-table').scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }); 
            </script>
            <div class="align-center">
                <a href="/oddstips" class="button">
                    Siste spilltips
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>