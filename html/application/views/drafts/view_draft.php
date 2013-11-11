<div class="twelvcol">

        	<div class="drop_down">
        	<div class="addnew btn btn-info ">
        		<?php echo anchor('drafts/','Back');  ?>
        	</div>
            <?php //$js = 'id="organization"'; ?>

            <?php //echo// form_dropdown("organizations", $organizations, $org_id, $js); ?>
        </div>
      <?php if($this->session->flashdata('message')) { ?>
       	
      <div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?> </div>
       	<?php } ?>
 
        <div class="newstitle"><?php echo $draft->draft_title ?></div>
        
        <p class="date"><?php echo 'written on ' . $draft->date_created . ' by ' . $draft->organization; ?></p>
        <p class="description">
            <?php echo $draft->description ?>
        </p>
        <?php if ($draft->file <> "") {
        ?>
        <div class="download">
                    Download <a href="<?php echo base_url() . 'uploads/feedback/' . $draft->file; ?>" target="_blank">
                <?php echo $draft->file; ?>
            </a>
        </div>
        <div class="comment">
        	<?php if(count($comments)>0) {?>
        		<h4> Comments and documents attached</h4>
        		<table class="table table-hover table-striped">
       		 <tbody>
        
        		<?php foreach($comments as $comment){?>
        			<tr><td>
        					<p><?php echo $comment['comment_title'];  ?></p>
        			<p class="date"><?php echo 'written on ' .  date('j F Y', strtotime($comment['timestamp'])).'by'.$comment['organization']; ?></p>
        		
        			<p></p>
        			<div class="download">
                    Download <a href="<?php echo base_url() . 'uploads/drafts/' . $comment['file']; ?>" target="_blank">
                <?php echo $comment['file']; ?>
            </a> </div>
        		
        			</td></tr>
        			<?php } ?>
        			</tbody>
        			</table>
        						
        		<?php } else{ ?>
        			<p class="alert alert-error2"> No comments yet</p>
        			<?php }?>
        			<div class="commenteditdraft">
	        			<div class="inner-comment pull-left">
	        				<a href="">comment</a>
	        			</div>
	        			<div class="pull-right">
					        <?php if($user_id==$draft->user_id){ ?>
						       	 <div> 
						       	 	<?php echo anchor("drafts/edit/".$draft->draft_id."",'edit');  ?> 
						       	 </div>
					        <?php } ?>
				        </div>
			        </div>
        			<div class="comment-box" style="display:none">
        				 
					<div class="form">
						<?php echo validation_errors(); ?>
						<?php echo form_open_multipart('drafts/doComment'); ?>
						<span class="status"></span>
						<label>comment</label>
						<input type="text" value="" name="title"id="title" /></br>
						<label>Upload revised doc</label>
						<input type="file" value="" name="userfile"id="userfile" /></br>
						<?php echo form_hidden('draft_id',$draft->draft_id);?>
						<input type="submit" value="Submit" id="submit_form" />
						<?php echo form_close(); ?>
					</div>
												
        			</div>
        	
       
        <!--</td>
        </tr>
        </tbody>
        </table>-->
        <?php } ?>
    </div>
    
</div>

<script type="text/javascript">
$(document).ready(function(){

	commentbox();
	
	
});
function commentbox(){
	
	$('.inner-comment a').on('click',function(e){
		e.preventDefault();
		
		$('.comment-box').show();
	});
}


</script>