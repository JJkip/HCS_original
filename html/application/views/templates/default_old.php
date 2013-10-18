<?php
$current_user = $this->session->userdata('row_content');
$user_role = $current_user->user_cizacl_role_id;
?>
<!doctype html>
<html lang="en">
    <head>
        <title>SHARE | Health Consortium in Somali</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/shell.css"  type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/styles.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/timepicker.css" type="text/css"/>
        <!-- Delete the CSS below-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/file_styles.css" type="text/css"/>


        <script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/jquery.min.js"></script>
        <script type="text/javascript" src= "<?php echo base_url(); ?>public/scripts/css3-mediaqueries.js"></script>
        <script type="text/javascript" src= "<?php echo base_url(); ?>public/scripts/script.js"></script>
        <script src="<?php echo base_url(); ?>public/scripts/jquery-1.8.3.js"></script>
        <script src="<?php echo base_url(); ?>public/scripts/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>public/scripts/timepicker.js"></script>



    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="fourcol">
                        <div id="logo">
                            <img src="<?php echo base_url(); ?>public/img/logo.png" alt="HCS">
                        </div>
                    </div>
                    <div class="fourcol"></div>

                    <div class="fourcol last">

<?php
$attributes = array('id' => 'search');
echo form_open('search_docs', $attributes);
$js = "onkeyup = 'alert()';";
echo form_input('search_docs', set_value('search_docs'), $js);
echo form_submit('search', 'Find');
echo form_close();
?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelvecol">
                        <nav id="nav-wrap">
                            <ul id="nav" class="links">
                                <li class="menu-370 first">
                                    <a href="<?php echo site_url('home'); ?>" title="" class=" icon-http:--54.235.202.148-?q=dashboard-"><span class='icon'></span><span class='label'>Home</span></a>
                                </li>
                                <li class="menu-371">
                                    <a href="" class=" icon-node-1"><span class='icon'></span><span class='label'>Somaliland</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url('documents/1/4') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/psi.jpg" width="304" height="95" alt="Save the Children"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('documents/1/3') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/thet.jpg" width="139" height="87" alt="THET"></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('documents/1/6') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/hpa.jpg" width="139" height="87" alt="THET"></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-372">
                                    <a href="" title="Puntland" class=" icon-node-2"><span class='icon'></span><span class='label'>Puntland</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url('documents/2/2') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/savethechildren.jpg" width="304" height="95" alt="Save the Children"></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-374">
                                    <a href="" title="South Central" class=" icon-node-3"><span class='icon'></span><span class='label'>South Central</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url('documents/3/5') ?>"><img src="<?php echo base_url(); ?>public/img/partnerlogos/trocaire.jpg" width="139" height="87" alt="THET"></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-378">
                                    <a href="<?php echo site_url('tools') ?>" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Tools</span></a>
                                </li>
                                <li class="menu-379">
                                    <a href="<?php echo site_url('innovations') ?>" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Innovation &amp; Lessons</span></a>
                                </li>

                                <li class="menu-380"><a href="#">Media centre</a>
                                    <ul>
                                        <li><a href="<?php echo site_url('media_centre/videos') ?>">Videos</a></li>
                                        <li><a href="<?php echo site_url('media_centre/radiospots') ?>">Radio spots</a></li>
                                        <li><a href="<?php echo site_url('media_centre/posters') ?>">Posters & Fliers</a></li>
                                        <li><a href="<?php echo site_url('gallery') ?>">Photo gallery</a></li>
                                    </ul>
                                </li>
                                <li class="menu-390"><a href="#" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>HCS</span></a>
                                    <ul>
                                        <?php if (strcasecmp($user_role, "1") == 0 || strcasecmp($user_role, "4") == 0): ?>
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
                                                 
                                                 <?php $year = date('Y'); $month = date('m');?>
                                                <li><a href="<?php echo site_url('events/show_calendar/'.$year.'/'.$month) ?>">Events</a></li>
                                                <li><a href="<?php echo site_url('meeting_minutes') ?>">Meeting minutes</a></li>
                                                <li><a href="<?php echo site_url('news') ?>">News</a></li>
                                            </ul>
                                        </li>
                                        <!--Champions & Admins -->
                                <?php if (strcasecmp($user_role, "1") == 0 || strcasecmp($user_role, "4") == 0): ?>
                                                    <li class="menu-395"><a href="#" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Champions</span></a>
                                                        <ul>
                                                            <li><a href="<?php echo site_url('documents/upload') ?>">Documents</a></li>
                                                            <li><a href="<?php echo site_url('tools/upload') ?>">Tools</a></li>
                                                            <li><a href="<?php echo site_url('innovations/uploads') ?>">Innovations &amp; Lessons</a></li>
                                                            <li><a href="#">Media centre</a>
                                                                <ul>
                                                                    <li><a href="<?php echo site_url('media_centre/index/video') ?>">Video</a></li>
                                                                    <li><a href="<?php echo site_url('media_centre/index/radiospot') ?>">Radio spot</a></li>
                                                                    <li><a href="<?php echo site_url('media_centre/index/poster') ?>">Posters & fliers</a></li>
                                                                    <li><a href="<?php echo site_url('gallery/upload') ?>">Photo gallery</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">HCS</a>
                                                                <ul>
                                                                    <li><a href="<?php echo site_url('hcs_tab_upload/1') ?>">Reports</a></li>
                                                                    <li><a href="<?php echo site_url('hcs_tab_upload/2') ?>">Meeting minutes</a></li>
                                                                    <li><a href="<?php echo site_url('hcs_tab_upload/3') ?>">Events</a></li>
                                                                    <li><a href="<?php echo site_url('hcs_tab_upload/4') ?>">News</a></li>
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
                                <?php endif; ?>

                                <?php if (strcasecmp($user_role, "3") == 0): ?>

                                                        <li class="menu-395"><a href="#" title="" class=" icon-node-1"><span class='icon'></span><span class='label'>Profile</span></a></li>
                                <?php endif; ?>

                                                        <li class="menu-398 last">
                                                            <a href="<?php echo site_url('login/logout'); ?>" title="" class="spaces-menu-editable icon-logout"><span class='icon'></span><span class='label'>Logout</span></a>
                                                        </li>
                                                    </ul>
                                                    <div class="clr"></div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row"><?php echo $body; ?></div>
        </div>

    </body>
</html>