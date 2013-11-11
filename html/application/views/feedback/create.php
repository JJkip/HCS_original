		 <div class ="flash_message">
       
      	
	<div class="form">
			<?php echo validation_errors(); ?>
			<?php echo form_open_multipart('feedback/create'); ?>
			<div class="dropdown_section">
				<h2>Please Send Us Your Feedback</h2>
				
			</div>
			<div class="class ="alert alert-success2"><?php echo $this->session->flashdata('message'); ?> </div>
      		<span class="status"></span>
      		<label>
      			Title <span class="required" style="color:red;">*</span>
      		</label>
			<input  class="span4" type="text" value="" name="title"id="title" /></br>
			<label>
				Category <span class="required" style="color:red;">*</span>
			</label>
			<select class="span4" name="category" id="category">
				<option value="">Choose category</option>
				<option value="feature">Feature request</option>
				<option value="error">Report error/bug</option>
			</select>
		
			<label> 
				Description <span class="required" style="color:red;">*</span>
			 </label>
			<textarea id="description"name="description"></textarea></br>
			<label>Upload screen shot</label>
			<input type="file" value="" name="userfile"id="userfile" /></br>
			<div class="sendcancelfeedback">
			<input class="btn  btn-info pull-left" type="submit" value="Submit" id="submit_form" />
			<div class="btn btn-info pull-right" id="cancelbtn>
        		<?php echo anchor('/home','Cancel');  ?>
        	</div>
        	</div>
			<?php echo form_close(); ?>
			</div>