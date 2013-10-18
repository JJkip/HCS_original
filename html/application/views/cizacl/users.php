
<div id="container">
	<h1 align="center"> Users Management</h1>
	<p align="right">
		<button type="button" onclick="view();" class="cizacl_btn_view"><?php echo $this->lang->line('view')?></button>
		
		<button type="button" onclick="add();" class="cizacl_btn_add"><?php echo $this->lang->line('add')?></button>
	
		<button type="button" onclick="edit();" class="cizacl_btn_edit"><?php echo $this->lang->line('edit')?></button>
		
		<button type="button" onclick="del();" class="cizacl_btn_del"><?php echo $this->lang->line('del')?></button>
	</p>
	<p></p>
	<table id="users_table" class="jqgrid">
	</table>
	<div id="users_navigator"></div>
</div>

