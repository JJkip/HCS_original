 <div class="threecol">
 </div>
<div class="ninecol last">
    <h1>Documents</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("documents/do_upload"); ?>

<label for="title">Title</label>
<?php echo form_input(textInputBuilder("doc_title", @$doc_title)); ?>

<label>Description</label>
<?php echo form_textarea(textAreaBuilder('description', @$form["description"])); ?>
<br />
<table>
   <th align="left">Category</th>
   <th align="left">Select</th>
<?php
//$categories =$this->session->userdata('categories');
foreach ($categories as $key => $value):
?>
<tr>
    <td><?php echo form_label($value); ?></td>
    <td width="10px"><?php echo form_checkbox($key, $value, FALSE);?></td>
</tr>
<?php endforeach; ?>
</table>
<br />
<input type="file" name="userfile" id="userfile" size="20" />
<p>
	<input type="submit" name="submit" value="Save" id="submit" />
</p>

</form>


</div>