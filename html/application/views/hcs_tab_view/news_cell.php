<?php $current_doc = $content[$i]; ?>
<h5 class="newstitle"><?php echo $current_doc['news_title']; ?></h5>
                
<p class="date">
   <?php echo 'Written on ' . $current_doc['date_created'] . ' By ' . $current_doc['organization']; ?>
</p>
                
<p class="description">
   <?php echo $current_doc['description']; ?>
                    
   <?php if ($current_doc['readmore'] == true):?>
         
      <!--<div class="readmore">-->
        <a href="<?php echo $current_doc['url']; ?>">Read more</a>
      <!--  </div>-->
   <?php endif; ?>
          
</p>

<?php if ($current_doc['file'] <> ""):?>
    <div class="download">
         Download <a href="<?php echo base_url() . 'uploads/news/' . $current_doc['file']; ?>" target="_blank">
        <?php echo $current_doc['file']; ?> </a> 
    </div>
            
<?php endif; ?>
<hr style="color:#9d9d9d;" />
     