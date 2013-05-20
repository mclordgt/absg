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
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/slide.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.js"></script>  
    </head>
    <body>

		<?php if (isset($pageContent)) : ?>

			<?php $this->load->view($pageFile,$pageContent);?>

		<?php else : ?>
		
			<?php $this->load->view($pageFile);?>

		<?php endif; ?>

    </body>
</html>