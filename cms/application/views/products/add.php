
<?php if (isset($message) && $message != '') : ?>
	
	<p><?php echo $message; ?></p>

<?php endif; ?>

<?php $title = ucwords( str_replace('-',' ',$this->uri->segment(3)) );?>

<h1>Add New <?php echo $title; ?></h1>

<form method="POST">

	<?php if($title == 'Sub Category') : ?>
		<input type="hidden" name="prod_cat_id" value="<?php echo $this->uri->segment(4); ?>">
	<?php endif; ?>

	<p>
		<label for="prod_cat"><?php echo $title; ?>:</label>
		<input type="text" name="<?php echo ($title == 'Sub Category' ? 'sub_cat' : 'prod_cat'); ?>">
	</p>

	<?php if($this->uri->segment(3) == 'category') : ?>
	
	<p>
		<label for="prod_cat_desc">Description:</label>
		<textarea name="prod_cat_desc" id="editor"></textarea>
		<script>
			var editor = CKEDITOR.replace( 'editor', { customConfig : 'custom_config.js' } );
			CKFinder.setupCKEditor( editor, '<?php echo base_url(); ?>plugins/ckfinder/' );
		</script>
	</p>

	<?php endif; ?>

	<p><input type="submit" class="button" name="submit" value="Save <?php echo $title; ?>"></p>

</form>