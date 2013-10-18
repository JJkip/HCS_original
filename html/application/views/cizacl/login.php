<div id="content">
    <h1><?php echo $this->lang->line('login') ?></h1>
    <div id="jq_msg"></div>
    <div id="content-login">
        <form name="form1" id="form1" action="#">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td width="30%" align="right" valign="middle"><?php echo $this->lang->line('username') ?></td>
                    <td width="70%"><input type="text" name="username" id="username" size="30" /></td>
                </tr>
                <tr>
                    <td align="right" valign="middle"><?php echo $this->lang->line('password') ?></td>
                    <td><input type="password" name="password" id="password" size="30" /></td>
                </tr>
                <tr>
                    <td align="right" valign="middle">&nbsp;</td>
                    <td><button type="submit" class="cizacl_btn_check"><?php echo $this->lang->line('submit') ?></button>
                        &nbsp;
                        <button type="reset" class="cizacl_btn_del"><?php echo $this->lang->line('cancel') ?></button></td>
                </tr>
                <tr>
                    <td>
                        Forgot your password? Click <a href="<?php echo site_url() . '/reset_password' ?>">here</a> to reset it
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
