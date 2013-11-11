		
		<div class="form">
		
			<?php echo form_open_multipart('drafts/edit'); ?>
			
			<div class="dropdown_section">
			<h2>EDIT DRAFT</h2>
			<span class="status"></span>
			<div class="addnew btn btn-info ">
        		<?php echo anchor('drafts/','Cancel');  ?>
        	</div>
			</div> 
			<?php if($this->session->flashdata('message')){?>
			<div class ="alert alert-success">
	       	<?php 
	      		echo $this->session->flashdata('message');
	       	?>
	       	
	       </div>
	       <?php } ?>
	       <input type="hidden" value="<?php echo $draft->draft_id;?>" name="draft_id"id="draft_id" /></br>
			<label>Title<span class="required" style="color:red;">*</span></label>
			<input type="text" value="<?php echo $draft->draft_title;?>" name="title"id="title" /></br>
			<span class="required" style="color:red;"><?php echo form_error('title'); ?></br></span>
			<label>Description<span class="required" style="color:red;">*</span></label>
			<textarea id="description"name="description"><?php echo $draft->description; ?></textarea></br>
			<span class="required" style="color:red;"><?php echo form_error('description'); ?></br></span>
			<input class="btn  btn-info" type="submit" value="Submit" id="submit_form" />
			<?php echo form_close(); ?>
		
		</div>