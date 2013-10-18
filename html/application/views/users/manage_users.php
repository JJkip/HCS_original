<div class="threecol">   
 </div>
<div class="ninecol last">
   <h1 align="center">User Management</h1>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("user_management/manage_users"); ?>
<table  width="70%">
    <th align="left">Organization users</th>
    <th align="left"></th>
    <th align="left"></th>
   
 <?php 
         for($i=0; $i<count($org_users); $i++): 
          $user = $org_users[$i];
    ?>
     <tr>
         <td><?php echo $user["user_profile_name"] . " " . $user["user_profile_surname"]; ?></td>
         <td><?php echo form_button(buttonBuilder($user["user_id"], 'Edit')); ?></td>
         <td><?php echo form_button(buttonBuilder('#'.$user["user_id"], 'Delete')); ?></td>
     </tr>
    <?php endfor; ?>
</table>
<?php echo form_close(); ?>
</div>
