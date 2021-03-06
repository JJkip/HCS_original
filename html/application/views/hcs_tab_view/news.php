<div class="twelvecol">
    <div class="dropdown_section">
        <h2>NEWS</h2>

        <div class="drop_down">
            <?php $js = 'id="organization"'; ?>

            <?php echo form_dropdown("organizations", $organizations, $org_id, $js); ?>
        </div>
    </div>
    <div id="message"><?php echo $this->session->flashdata('message'); ?> </div>
    
         <div id="news">
        <div class="twelvecol" >
        
    	<table class="table table-hover table-striped">
        <tbody>
        
        <?php
            for ($i = 0; $i < count($content); $i++):
                $current_doc = $content[$i];
        ?>
				<tr>
        <td>
                <div class="newstitle"><?php echo $current_doc['news_title']; ?></div>
                
                <p class="date">
            <?php
                echo 'Written on '.$current_doc['date_created'] . ' By ' . $current_doc['organization'] ;
				
            ?>
            </p>
            
            
            <p class="description">
            <?php echo $current_doc['description']; ?>
                      
			<?php if ($current_doc['readmore'] == true) {
            ?>
                        <!--<div class="readmore">-->
                            <a href="<?php echo $current_doc['url']; ?>">Read more</a>
                      <!--  </div>-->
            <?php } ?>
          
			</p>
        <?php if ($current_doc['file'] <> "") {
        ?>
                    <div class="download">
                        Download <a href="<?php echo base_url() . 'uploads/news/' . $current_doc['file']; ?>" target="_blank">
                <?php echo $current_doc['file']; ?>
                </a>
            </div>
            
        <?php } ?>
		<!-- <hr style="color:#9d9d9d;" />-->
         </td>
        </tr>
        <?php endfor; ?>
        
            
            
            </tbody>
           </table>
           </div>
        </div>
		
        <div class="threecol last"></div>
        <script type="text/javascript">// <![CDATA[
            $(document).ready(function(){
                $('#organization').change(function(){ //any select change on the dropdown with organization trigger this code
                    var org_id = $('#organization').val();  // here we are taking organization id of the selected one.
                    //we now redirect to the relevant controller
                    window.location.replace("<?php echo base_url() ?>index.php/news/filter/"+org_id);
        });
    });
    // ]]>
</script>