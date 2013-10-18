<div id="container">
    <h1 align="center">Access Management</h1>
    <p>&nbsp;</p>
    <div class="cizacl_tabs">
        <ul>
            <li><a href="#tabs1"><?php echo $this->lang->line('roles')?></a></li>
            <li><a href="#tabs2"><?php echo $this->lang->line('resources')?></a></li>
            <li><a href="#tabs3"><?php echo $this->lang->line('rules')?></a></li>
        </ul>
        <div id="tabs1">
            <p align="right">
                <button type="button" class="cizacl_btn_add" onclick="add_role();"><?php echo $this->lang->line('add')?></button>
                &nbsp;
                <button type="button" class="cizacl_btn_edit" onclick="edit_role();"><?php echo $this->lang->line('edit')?></button>
                &nbsp;
                <button type="button" class="cizacl_btn_edit" onclick="del_role();"><?php echo $this->lang->line('del')?></button>
            </p>
            <p>&nbsp;</p>
            <table id="roles_table" class="jqgrid">
            </table>
            <div id="roles_navigator"></div>
        </div>
        <div id="tabs2">
            <p align="right">
                <button type="button" class="cizacl_btn_add" onclick="add_resource();"><?php echo $this->lang->line('add')?></button>
                &nbsp;
                <button type="button" class="cizacl_btn_edit" onclick="edit_resource();"><?php echo $this->lang->line('edit')?></button>
                &nbsp;
                <button type="button" class="cizacl_btn_edit" onclick="del_resource();"><?php echo $this->lang->line('del')?></button>
            </p>
            <p>&nbsp;</p>
            <table id="resources_table" class="jqgrid">
            </table>
            <div id="resources_navigator"></div>
        </div>
        <div id="tabs3">
            <p align="right">
                <button type="button" class="cizacl_btn_add" onclick="add_rule();"><?php echo $this->lang->line('add')?></button>
                &nbsp;
                <button type="button" class="cizacl_btn_edit" onclick="edit_rule();"><?php echo $this->lang->line('edit')?></button>
                &nbsp;
                <button type="button" class="cizacl_btn_edit" onclick="del_rule();"><?php echo $this->lang->line('del')?></button>
            </p>
            <p>&nbsp;</p>
            <table id="rules_table" class="jqgrid">
            </table>
            <div id="rules_navigator"></div>
        </div>
    </div>
</div>

