<div class="threecol">
    <?php //var_dump($form);?>
</div>
<div class="ninecol last">
	<h1>Users</h1>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("user_management/edit_user"); ?>
	<p>
		<label>First Name</label>
		<?php echo form_input(textInputBuilder("user_profile_name", @$form["user_profile_name"])); ?>
	</p>
	<p>
		<label>Surname</label>
		<?php echo form_input(textInputBuilder("user_profile_surname", @$form["user_profile_surname"])); ?>
	</p>
	<p>
		<label>Email</label>
		<?php 
		    $email = textInputBuilder("user_profile_email", @$form["user_profile_email"]);
            $email['readonly'] = true;
            $email['style'] = 'background-color:#E8E8E8';
		?>
		<?php echo form_input($email); ?>
	</p>
	<p>
		<label>Region</label>
		<?php echo form_dropdown("region", $regions, "large" ) ?>
	</p>
	<p>
		<label>Role</label>
		<?php echo form_dropdown("role", $roles, "large" ) ?>
	</p>
	<p>
		<label>State</label>
		<?php echo form_dropdown("status", $status, "large" ) ?>
	</p>
	<br />
	<br />
      
       <?php echo form_hidden('user_id_edited', $form["user_id"]);
     
        ?>
	<p>
		<input type="submit" name="submit" value="Submit" id="submit" />
	</p>

	</form>

</div>