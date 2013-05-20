<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/slide.css">
        <link href="<?php echo base_url(); ?>plugins/jquery-ui-1.10.3.custom.agribsg/css/agribsg/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>plugins/jquery-ui-1.10.3.custom.agribsg/js/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>plugins/jquery-ui-1.10.3.custom.agribsg/js/jquery-ui-1.10.3.custom.js"></script>
    <?php if(in_array($this->uri->segment(2),array('page','add','edit','media'))): ?>

        <script src="<?php echo base_url(); ?>plugins/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url(); ?>plugins/ckfinder/ckfinder.js"></script>

    <?php endif; ?>
        <script>
        $(function() {
            
            $('#menu').css({'width':'200px'}).menu();

            <?php if( $this->uri->segment(2) == 'view') : ?>
                $( "#steps_container" ).accordion({ 
                    collapsible: true,
                    heightStyle: 'content',
                    clearStyle: true
                });
            <?php endif; ?>
        });
        </script>
    </head>
    <body>
        <header id="header">
            <section id="top-header">
                <h2><a href="/"><img src="<?php echo base_url(); ?>img/logo.png" alt=""></a></h2>
                <nav id="login">
                    <ul>
                        <li class="login">Welcome, Admin</li>
                    </ul>
                </nav>
            </section>
        </header>
        <div id="container">