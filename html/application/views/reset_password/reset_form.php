<div class="threecol">
</div>
<div class="ninecol last">
   <h1>Users</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("reset_password/reset_user_password"); ?>

<p>
    <label>Password</label>
    <?php echo form_password(textInputBuilder("user_password", "")); ?>
</p>
<p>
    <label>Confirm password</label>
    <?php echo form_password(textInputBuilder("user_password2", "")); ?>
</p>

<p>
    <input type="submit" name="submit" value="Save" id="submit" />
</p>

</form>

</div>