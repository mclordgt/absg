<?php $this->load->view('default/site/header',$headerContent); ?>
			
	<?php if (isset($pageContent)) : ?>

		<?php $this->load->view($pageFile,$pageContent);?>

	<?php else : ?>
	
		<?php $this->load->view($pageFile);?>

	<?php endif; ?>

<?php $this->load->view('default/site/footer');?>