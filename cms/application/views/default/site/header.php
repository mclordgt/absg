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
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>   
        
        <?php if($this->uri->segment(1) == 'register'): ?>
            <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/mCustomScroll/jquery.mCustomScrollbar.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/slide.css">
            <script type="text/javascript" src="<?php echo base_url(); ?>plugins/mCustomScroll/jquery.mCustomScrollbar.concat.min.js"></script>  
            <script type="text/javascript">
                (function($){
                    $(window).load(function(){
                        $(".clauses").mCustomScrollbar();
                    });
                })(jQuery);
            </script>
        <?php endif; ?>

        <?php if($this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''): ?>
            <script type="text/javascript">
                var photos = [
                    <?php foreach($banners as $banner) : ?> {
                        "image" : "<?php echo 'http://localhost'.$banner->media_url ;?>",
                    }, <?php endforeach; ?>
                ];
            </script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/easySlider1.7.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){   
                    $("#slider").easySlider({
                        continuous: true,
                        nextId: "slider1next",
                        prevId: "slider1prev"
                    });
                }); 
            </script>
        <?php endif; ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <header id="header">
            <section id="top-header">
                <h2><a href="/"><img src="<?php echo base_url(); ?>img/logo.png" alt=""></a></h2>
                <nav id="login">
                    <ul>
                        <li class="login"><?php echo anchor('contact','<img src="'.base_url().'img/login.png" alt="">'); ?></li>
                        <li><?php echo anchor('register/member','<img src="'.base_url().'img/signup.png" alt="">'); ?></li>
                    </ul>
                </nav>

                <?php 
                    $a  = '';
                    $b  = '';
                    $b1 = '';
                    $b2 = '';
                    $b3 = '';
                    $b4 = '';
                    $c  = '';
                    $c1 = '';
                    $c2 = '';
                    $d  = '';
                    $d1 = '';
                    $d2 = '';
                    $e  = '';
                    $f  = '';

                    switch($this->uri->segment(1)):

                        case 'about':
                            $b = ' class = "active"';

                            switch($this->uri->segment(3)){

                                case 'us':
                                    $b1 = ' class="active"';
                                break;

                                case 'how-it-works':
                                    $b2 = ' class="active"';
                                break;

                                case 'un-committed-purchasing':
                                    $b3 = ' class="active"';
                                break;

                                case 'committed-purchasing':
                                    $b4 = ' class="active"';
                                break;                                
                            }

                        break;

                        case 'membership':
                            $c = ' class = "active"';

                            switch($this->uri->segment(3)){

                                case 'benefits-of-being-a-member':
                                    $c1 = ' class="active"';
                                break;

                            }                            
                        break;

                        case 'pricing':
                            $d = ' class = "active"';

                            switch($this->uri->segment(3)){

                                case 'first-three-months':
                                    $d1 = ' class="active"';
                                break;

                                case 'after-the-first-three-months':
                                    $d2 = ' class="active"';
                                break;

                            }                            
                        break;

                        case 'faqs':
                            $e = ' class = "active"';
                        break;

                        case 'contact':
                            $f = ' active';
                        break;

                        case '': 
                        case 'home':
                            $a = ' class = "active"';
                        break;

                    endswitch;

                ?>

                <nav id="main-menu">
                    <ul class="dropdown">
                        <li<?php echo $a; ?>><?php echo anchor('/','Home'); ?></li>
                        <li<?php echo $b; ?>>
                            <?php echo anchor('about/page/us','About'); ?>
                            <ul class="sub_menu">
                                <li<?php echo $b1; ?>><?php echo anchor('about/page/us','Us'); ?></li>
                                <li<?php echo $b2; ?>><?php echo anchor('about/page/how-it-works','How it works'); ?></li>
                                <li<?php echo $b3; ?>><?php echo anchor('about/page/un-committed-purchasing','Un-committed Purchasing'); ?></li>
                                <li<?php echo $b4; ?>><?php echo anchor('about/page/committed-purchasing','Committed Purchasing'); ?></li>
                            </ul>
                        </li>
                        <li<?php echo $c; ?>>
                            <?php echo anchor('membership/page/benefits-of-being-a-member','Membership'); ?>
                            <ul class="sub_menu">
                                <li<?php echo $c1; ?>><?php echo anchor('membership/page/benefits-of-being-a-member','Benefits of being a a member'); ?></li>
                                <li><?php echo anchor('register/member','Become a member'); ?></li>
                            </ul>
                        </li>
                        <li<?php echo $d; ?>>
                            <?php echo anchor('pricing/page/first-three-months','Pricing'); ?>
                            <ul class="sub_menu">
                                <li<?php echo $d1; ?>><?php echo anchor('pricing/page/first-three-months','First 3 months'); ?></li>
                                <li<?php echo $d2; ?>><?php echo anchor('pricing/page/after-the-first-three-months','After the first 3 months'); ?></li>
                            </ul>
                        </li>
                        <li<?php echo $e; ?>><?php echo anchor('faqs','Faqs'); ?></li>
                        <li class="last<?php echo $f?>"><?php echo anchor('contact','Contact Us'); ?></li>
                    </ul>
                </nav>
            </section>
            <?php if($this->uri->segment(1) == 1 || $this->uri->segment(1) == '') : ?>
            <div id="headerimgs">

                <div id="headerimg1" class="headerimg"></div>
                <div id="headerimg2" class="headerimg"></div>
                
            </div>
            <div id="control-box">
                <div id="control-main">
                    <div id="slidebox">
                        <div id="back">&lt; PREVIOUS</div>
                        <div id="circles"></div>
                        <div id="next"> NEXT &gt;</div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </header>
        <div id="content">