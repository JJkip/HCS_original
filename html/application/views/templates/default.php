<?php 
$current_user = $this -> session -> userdata('row_content');
$is_registerd = is_object($current_user);
$user_role = NULL;
if ($is_registerd) {
	$user_role = $current_user -> user_cizacl_role_id;
}
?>

<!doctype html>
<html lang="en"> 
    <head>
        <title>SHARE | Health Consortium in Somali</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/icons/favicon.png" type="image/x-icon" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis|Roboto' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/shell.css"  type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/styles.css" type="text/css" media="screen" />
         <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/feedback.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/timepicker.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css" type="text/css"/>
    	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/default.css"  type="text/css"  />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/component.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/calendar.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.dataTables.css" type="text/css"/>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/menu.css" type="text/css"/>
		

        <!-- Delete the CSS below-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/file_styles.css" type="text/css"/>


        <script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/jquery.min.js"></script>
        <script type="text/javascript" src= "<?php echo base_url(); ?>public/scripts/css3-mediaqueries.js"></script>
       
        <script src="<?php echo base_url(); ?>public/scripts/jquery-1.8.3.js"></script>
        <script src="<?php echo base_url(); ?>public/scripts/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>public/scripts/timepicker.js"></script>
        <script src="<?php echo base_url(); ?>public/scripts/modernizr.custom.js"></script>
	


    </head>
<body>
	<div id="layout">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="span4 pull-right">
                        <div id="logo">
                            <img src="<?php echo base_url(); ?>public/img/hcs_ukaid7.jpg" alt="HCS">
                        </div>
                     </div>
 
                    <div id="search" >
                    	<form class="form-search" accept-charset="utf-8" method="post" action="http://www.hcsshare.org/index.php/search_docs">
							<input type="text" value="" name="search_docs" placeholder="Enter your search term...">
							<input type="submit" value="Search" name="search" class="btnsearch">
						</form>
						
                    </div>
                    <div class="fourcol"></div>
				</div>
				<div class="row">
                    <div class="twelvecol">
                        <nav id="nav-wrap">
                            <ul id="nav" class="links">
                                <li class="menu-370 first" style="border-left: solid 1px #a51313;">
                                    <a href="<?php echo site_url('home'); ?>" title="" class=" icon-http:--54.235.202.148-?q=dashboard-"><span class='icon'></span><span class='label'>Home</span></a>
                                </li>
                                <li class="menu-371" style="border-left: solid 1px #a51313;">
                                    <a href="" class=" icon-node-1"><span class='icon'></span><span class='label'>Somaliland</span></a>
                                    <ul class="menu-371sub" >
                                        <li>
                                            <a href="<?php echo site_url('documents/1/4') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/psi_sub.jpg"  alt="Save the Children"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('documents/1/3') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/thet_sub.jpg"  alt="THET"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('documents/1/6') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/hpa_sub.jpg"alt="HPA" ></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-372" style="border-left: solid 1px #a51313;">
                                    <a href="" title="Puntland" class=" icon-node-2"><span class='icon'></span><span class='label'>Puntland</span></a>
                                    <ul class="menu-372sub">
                                        <li>
                                            <a href="<?php echo site_url('documents/2/2') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/savethechildren.jpg" width="304" height="95" alt="Save the Children"></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-374" style="border-left: solid 1px #a51313;">
                                    <a href="" title="South Central" class=" icon-node-3"><span class='icon'></span><span class='label'>South Central</span></a>
                                    <ul class="menu-374sub">
                                        <li>
                                            <a href="<?php echo site_url('documents/3/5') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/trocaire.jpg" width="139" height="87" alt="THET"></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-378" style="border-left: solid 1px #a51313;">
                                    <a href="<?php echo site_url('tools') ?>" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Tools</span></a>
                                </li>
                                <li class="menu-379" style="border-left: solid 1px #a51313;">
                                    <a href="<?php echo site_url('innovations') ?>" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Innovation &amp; Lessons</span></a>
                                </li>
                                <li class="menu-380" style="border-left: solid 1px #a51313;"><a href="#">Media centre</a>
                                    <ul class="menu-380sub">
                                        <li><a href="<?php echo site_url('media_centre/videos') ?>">Videos</a></li>
                                        <li><a href="<?php echo site_url('media_centre/radiospots') ?>">Radio spots</a></li>
                                        <li><a href="<?php echo site_url('media_centre/posters') ?>">Posters & Fliers</a></li>
                                        <li><a href="<?php echo site_url('gallery') ?>">Photo gallery</a></li>
                                    </ul>
                                </li>
                                <?php if(!is_null($user_role)):?>
		                                <li class="menu-390" style="border-left: solid 1px #a51313;"><a href="#" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>HCS</span></a>
		                                    <ul class="menu-390sub"> 
		                                    	<?php if (strcasecmp($user_role, "1") == 0 || strcasecmp($user_role, "4") == 0): ?>
			                                         <li><a href="<?php echo site_url('drafts') ?>">Drafts and internal documents</a></li>
			                                         <li><a href="#">Reports</a>
			                                                <ul>
			                                                    <li><a href="<?php echo site_url('reports/1') ?>">Financial</a></li>
			                                                    <li><a href="<?php echo site_url('reports/2') ?>">Narrative</a></li>
			                                                </ul>
			                                          </li>
		                                  		<? endif ?>
			                                    <?php if (strcasecmp($user_role, "3") == 0): ?>
			                                          <li><a href="<?php echo site_url('reports/2') ?>">Reports</a></li>
			                                    <?php endif; ?>
				                                  <?php $year = date('Y');
                                                                        $month = date('m');
												  ?>
		                                            <li><a href="<?php echo site_url('events/show_calendar/'.$year.'/'.$month) ?>">Events</a></li>
		                                            <li><a href="<?php echo site_url('meeting_minutes') ?>">Meeting minutes</a></li>
		                                            <li><a href="<?php echo site_url('news') ?>">News</a></li>
		                                            <li><a href="<?php echo site_url('feedback') ?>">Feedback</a></li>
		                                            
		                                          
		                                      </ul>
		                                      </li>
                                  <?php endif;?>
                                       
                                  <!--Champions & Admins -->
                                   <?php if (strcasecmp($user_role, "1") == 0 || strcasecmp($user_role, "4") == 0): ?>
                                                    <li class="menu-395" style="border-left: solid 1px #a51313;"><a href="#" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Champions</span></a>
                                                        <ul class="menu-395sub">
                                                            <li><a href="<?php echo site_url('edit_content/1') ?>">Documents</a></li>
                                                            <li><a href="<?php echo site_url('edit_content/2') ?>">Tools</a></li>
                                                            <li><a href="<?php echo site_url('edit_content/3') ?>">Innovations &amp; Lessons</a></li>
                                                            <li><a href="#">Media centre</a>
                                                                <ul>
                                                                    <li><a href="<?php echo site_url('media_centre/index/video') ?>">Video</a></li>
                                                                    <li><a href="<?php echo site_url('edit_content/8') ?>">Radio spots</a></li>
                                                                    <li><a href="<?php echo site_url('edit_content/9') ?>">Posters & fliers</a></li>
                                                                    <li><a href="<?php echo site_url('gallery/upload') ?>">Photo gallery</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">HCS</a>
                                                                <ul>
                                                                    <li><a href="<?php echo site_url('edit_content/4') ?>">Reports</a></li>
                                                                    <li><a href="<?php echo site_url('edit_content/5') ?>">Meeting minutes</a></li>
                                                                    <li><a href="<?php echo site_url('edit_content/6') ?>">Events</a></li>
                                                                    <li><a href="<?php echo site_url('edit_content/7') ?>">News</a></li>
                                                                      
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Categories</a>
                                                                <ul>
                                                                    <li><a href="<?php echo site_url('categories/1') ?>">Add</a></li>
                                                                    <li><a href="<?php echo site_url('categories/2') ?>">Edit</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">Users</a>
                                                                <ul>
                                                                    <li><a href="<?php echo site_url('user_management/1'); ?>">Add</a></li>
                                                                    <li><a href="<?php echo site_url('user_management/2'); ?>">Manage</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    	
                                                    	<div class="share_box" ><?php echo anchor('/feedback/create','Feedback') ?></div>
                                                    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
                                                   <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
                                                    <script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/calendar.js"></script>
                                                     
                                                    
                                <?php endif; ?>

                              

                                                        <li class="menu-398 last" style="border-left: solid 1px #a51313;">
                                                        	<?php if(is_object($current_user)): ?>
                                                        	
                                                            <a href="<?php echo site_url('login/logout'); ?>" title="" class="spaces-menu-editable icon-logout"><span class='icon'></span><span class='label'>Logout</span></a>
                                                            <?php endif; ?>
                                                            <?php if(!is_object($current_user)): ?>
                                                            <a href="<?php echo site_url('login'); ?>" title="" class="spaces-menu-editable icon-logout"><span class='icon'></span><span class='label'>Login</span></a>
                                                            <?php endif; ?>
                                                        </li>
                                                    </ul>
                                                    <div class="clr"></div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
         </div>
        <div id="content">
        	
             <div class="row"><?php echo $body; ?></div>
        </div>
        
   </div>
      <div id="dialog" style="display: none"  >
      	<div class="form">
		
			<?php echo form_open_multipart('drafts/create'); ?>
			
			<div class="dropdown_section">
			<h2>Add new Event</h2>
			<span class="status"></span>
			</div> 
			<div id ="message" style="color: red;">
	       
	       </div>
			<label>Event</label>
			<input type="text" value="" name="title"id="title" /></br>
			<?php echo form_error('title'); ?></br>
			<label>Venue</label>
			<input type="text" value="" name="venue"id="venue" /></br>
			<?php echo form_error('title'); ?></br>
			<label>Description</label>
			<textarea id="description"name="description"></textarea></br>
			<?php echo form_error('description'); ?></br>
			
			<?php echo form_close(); ?>
		
		</div>
      	
      	
      	
      </div>
	    <div id="footer" style="color:#858585">
	  		<!--<div class="container ">
						

							<div class="twelvecol">-->
                            <!--<div id="navcontainer">-->
                            <ul>
								<!--[if IE 8]>
										<p>LOREM IPSUJM DSJACLKCJIU VKNADOWEFW WKDFLAQJSO</p>
								<![endif]-->

                                  <li><div class="span2"><a  href="http://www.savethechildren.org/site/c.8rKLIXMGIpI4E/b.6115947/k.8D6E/Official_Site.htm" target="_blank"> <div id="save_the_children"></div></a></div></li>
								
									<li><div class="spantwo"><a  href="http://psi.org/" target="_blank"> <div id="psi"></div></a></div></li>
							
									<li><div class="spantwo"><a href="http://www.thet.org/" target="_blank"> <div id="thet"></div></a></div></li>
								
									<li><div class="spantwo"><a href="http://www.healthpovertyaction.org/" target="_blank"> <div id="hpa"></div></a></div></li>
                                    
									<li><div class="spantwo"><a href="http://www.trocaire.org/" target="_blank"> <div id="trocaire"></div></a></div></li>
								
									<li><div class="spantwo"><a href="https://www.gov.uk/government/organisations/department-for-international-development" target="_blank"><div id="dfid"></div> </a></div></li>
                                    </ul>
                                    <div class="span12" ><hr style="color: #9FA5AA; background: #9FA5AA; width:94%; height: 3px;" /> </div>
        <div class="span9 pull-left"><p>&copy;&nbsp;2013 <a href="">hcsshare.org </a> &nbsp;|&nbsp;<a href="http://www.hcsshare.org/index.php/home/privacy_policy">Privacy Policy</a>&nbsp;|&nbsp;<a href="http://www.hcsshare.org/index.php/home/terms_of_use">Terms of use</a>&nbsp;|&nbsp;<a href=" http://www.hcsshare.org/index.php/home/contacts">Contact Us</a></p></div>
        								

        </div>
      
			 <script type="text/javascript" src= "<?php echo base_url(); ?>public/scripts/script.js"></script>	
			 	 <script src="<?php echo base_url(); ?>public/scripts/jquery.dataTables.js"></script>                              
    </body>
</html>

    
    
    
    <?php endif ?>