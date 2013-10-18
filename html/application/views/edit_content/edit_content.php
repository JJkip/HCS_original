<div class="threecol"> </div>
<div class="ninecol last">
    <div class="upload"><a href=<?php echo site_url('edit_content/redirect_to_upload') ?>><span>&#43;</span>&nbsp;New <?php echo $this -> session ->userdata('upload_label') ?></a></div>
    <div id="message">
        <?php
        echo $this->session->flashdata('message');
        ?>
    </div>
    <?php if (count($content) > 0){ ?>
            <h2>Manage content</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open("edit_content/redirect_to_edit"); ?>


            <table  width="70%">
        <?php foreach ($content as $key => $value): ?>
                <tr>
                    <td><?php echo $value; ?></td>
                    <td><?php echo form_button(buttonBuilder($key, 'Edit')); ?></td>
                    <td><?php echo form_button(buttonBuilder('#' . $key, 'Delete')); ?></td>
                </tr>
        <?php endforeach; ?>
            </table>
    <?php echo form_close(); ?>
    <?php }else{ ?>
            <div id="no_content">
                You have not added any content in this section
            </div>
      <?php } ?>
</div>

