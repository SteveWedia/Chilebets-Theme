<?php if( $Question1 ){ ?>
<div class="faq-section">
   <h2>
      Preguntas Frecuentes
   </h2>
   <div class="faq-element">
      <p class="question"><?php echo $Question1;?></p>
      <p class="answer"><?php echo $Answer1;?></p>
   </div>
   <div class="faq-element">
      <p class="question"><?php echo $Question2;?></p>
      <p class="answer"><?php echo $Answer2;?></p>
   </div>
   <?php if( $Question3 ){ ?>
   <div class="faq-element">
      <p class="question"><?php echo $Question3;?></p>
      <p class="answer"><?php echo $Answer3;?></p>
   </div>
   <?php } ?>
   <?php if( $Question4 ){ ?>
   <div class="faq-element">
      <p class="question"><?php echo $Question4;?></p>
      <p class="answer"><?php echo $Answer4;?></p>
   </div>
   <?php } ?>
</div>
<?php } ?>