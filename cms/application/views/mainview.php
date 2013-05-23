<?php $this->load->view('default/admin/header', $headerContent); ?>

<div id="mainview">
	
	<?php $this->load->view('default/admin/left'); ?>

	<div id="right">
		
		<?php if (isset($pageContent)) : ?>

			<?php $this->load->view($pageFile,$pageContent);?>

		<?php else : ?>
		
			<?php $this->load->view($pageFile);?>

		<?php endif; ?>

	</div>

</div>

<?php $this->load->view('default/admin/footer');?>