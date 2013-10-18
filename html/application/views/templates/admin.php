<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<?php echo $this->cizacl->css() ?><?php echo $this->cizacl->scripts() ?>
<script type="text/javascript" src="<?php echo site_url('cizacl_js/cizacl')?>"></script>
<script type="text/javascript" src="<?php echo site_url('cizacl_js/users')?>"></script>
<link href="<?php echo base_url(); ?>public/menu_assets/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
          <div id='cssmenu'>
            <ul>
                <li class='active'><a href=<?php echo site_url('cizacl/')?> ><span>Summary</span></a></li>
                <li class='active'><a href=<?php echo  site_url('cizacl/users')?> ><span>Users</span></a></li>
                <?php 
                    $user_id = $this->session->userdata('user_cizacl_role_id');
                   if(strcasecmp($user_id, "1")==0):
                ?>
                <li class='active'><a href=<?php echo site_url('cizacl/management')?> ><span>Rules, Roles and Resources</span></a></li>
                <?php endif; ?>
                <li class='active'><a href=<?php echo site_url('cizacl/sessions')?> ><span>Sessions</span></a></li>
                <li class='active'><a href=<?php echo site_url('home/home')?> ><span>HCS</span></a></li>
                <li class='last'><a href=<?php echo site_url('login/logout')?>><span>Logout</span></a></li>
            </ul>
        </div>        
        <?php echo $body; ?>
</body>
</html>
    
      