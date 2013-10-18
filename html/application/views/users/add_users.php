<div class="threecol">
</div>
<div class="ninecol last">
   <h1>Users</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("user_management/add_user"); ?>
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
 
    <?php echo form_input(textInputBuilder("user_profile_email",@$form["user_profile_email"])); ?>
</p>

<p>
    <label>Password</label>
    <?php echo form_password(textInputBuilder("user_password", "")); ?>
</p>
<p>
    <label>Confirm password</label>
    <?php echo form_password(textInputBuilder("user_password2", "")); ?>
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
<p>
    <input type="submit" name="submit" value="Save" id="submit" />
</p>

</form>

</div>