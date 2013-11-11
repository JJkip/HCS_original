
<div class="twelvecol">
    <div class="dropdown_section">
        <h2>FEEDBACK AND REPORTING TOOL</h2>

        <div class="drop_down">
        	<div class="addnew btn btn-info">
        		<?php echo anchor('feedback/create','Add new');  ?>
        	</div>
	            <?php //$js = 'id="organization"'; ?>
	
	            <?php //echo// form_dropdown("organizations", $organizations, $org_id, $js); ?>
        </div>
    </div>
    
    <div id="message"><?php echo $this->session->flashdata('message'); ?> </div>
    
         <div id="news">
        <div class="twelvecol" >
        
    	<table class="table table-hover table-striped"id="display">
    		<thead>
    			 <tr>
       	<th>Issue</th>
       	<th>Date created</th>
       	<th>Description</th>
       	<th>Status</th>
       </tr>
    		</thead>
      <tbody>
        	
        <?php
        	foreach ($content as $feedback ) {
			
        ?>
				<tr>
        <td>
   <div class="newstitle"><?php echo anchor("feedback/view_feedback/".$feedback['feedback_id']."","".$feedback['title'].""); ?></div> </td>

              <td>  
                <p class="date">
            <?php
                echo 'Reported by '.$feedback['date_created'] . ' By ' . $feedback['organization'] ;
				
            ?>
            </p>
            </td>
            <td>
            <p class="description">
            <?php echo $feedback['description']; ?>
                      
			<?php if ($feedback['readmore'] == true) {
            ?>
                        <!--<div class="readmore">-->
                            <a href="<?php echo $feedback['url']; ?>">Read more</a>
                      <!--  </div>-->
            <?php } ?>
          
			</p>
       
		<!-- <hr style="color:#9d9d9d;" />-->
         </td>
        
        
        <td><?php  if($feedback['status']==0){?>
        	Unresolved 
        	<?php } else{?>
        		Resolved
        		<?php }?>
        </td>
            <?php }; ?>
            </tr>
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
<script type="text/javascript">
$(document).ready( function () {
    $('#display').dataTable();
} );
</script>