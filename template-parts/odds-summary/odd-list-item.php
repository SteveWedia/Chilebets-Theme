<?php
$odDate = get_field('od_datetime', $post);
// if($odDate){
// 	$odDate = DateTime::createFromFormat('Y-m-d H:i:s', $odDate);
// }
$oddResult = get_field('od_result', $post);
$odd = get_field('od_odds', $post);
$units = get_field('od_units', $post);

$profit = number_format( ($odd*$units)-$units, 2, '.', '');

if($oddResult == 'Void'){
	$oddResultDisplay = "±0";
}
if($oddResult == 'Profit'){
	$oddResultDisplay = '+'. $profit;
}
if($oddResult == 'Loss'){
	$oddResultDisplay = '-'. number_format( $units, 2, '.', '');
}
?>
<div class="row">
    <?php $post = $args; ?>
    <div class="time mobile-hide">
		<?php echo $odDate; ?>
    </div>
    <div class="event">
        <?php echo $post->post_title; ?>
    </div>
    <div class="selection">
		<?php the_field('od_predicted_outcome', $post); ?>
    </div>
    <div class="stake mobile-hide">
        <?php the_field('od_units', $post); ?>
    </div>
    <div class="odds mobile-hide">
        <?php echo $odd; ?>
    </div>
    <div class="result">
		<?php echo $oddResultDisplay;?>
    </div>
</div>