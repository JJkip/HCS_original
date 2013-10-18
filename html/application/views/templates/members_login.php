<!doctype html>
<html lang="en">
    <head>
        <title>SHARE | Health Consortium in Somali</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <?php echo $this->login->getCss();?>
        <?php echo $this->login->getScripts();?>
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


                    </div>
                </div>

                <div class="row">
                    <div class="twelvecol">
                        <nav id="nav-wrap">
                            <ul id="nav" class="links">
                                <li class="menu-370 first">
                                    <a href="<?php echo site_url('home'); ?>" title="" class=" icon-http:--54.235.202.148-?q=dashboard-"><span class='icon'></span><span class='label'>Home</span></a>
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