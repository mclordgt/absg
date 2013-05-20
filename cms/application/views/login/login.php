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
    });
    </script>
</head>
<body>

	<div id="login-container">

		<p class="logo"><img src="<?php echo base_url(); ?>img/logo.png" alt=""></p>

			<?php if(validation_errors()): ?>
				<div id="error">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>

		<?php echo form_open('auth'); ?>
			<p>
				<?php echo form_label('Email','email'); ?>
				<?php echo form_input('email'); ?>
			</p>
			<p>
				<?php echo form_label('Password','password'); ?>
				<?php echo form_password('password'); ?>
			</p>
			<p>
				<?php 
					$submit = array(
						'type'	=> 'submit',
						'name'	=> 'submit',
						'value'	=> 'Login',
						'class'	=> 'button'
					); 
				?>
				<?php echo form_submit($submit); ?>
			</p>

		<?php echo form_close();?>

		<p class="signup">
			<a href="#">Forgot Password? </a>
		</p>

		<p class="signup">
			Sign up as a <a href="register/member">Member</a> or <a href="register/supplier">Supplier</a>
		</p>

	</div> <!-- /#login-container -->

</body>
</html>