		<?php if (isset($message)) : ?>
			
			<p><?php echo $message; ?></p>

		<?php endif; ?>
		
		<h1>Add new entry</h1>

		<form method="POST">	

			<input type="hidden" name="sub_id">

			<p>
				<input type="text" name="sub_title" placeholder="Title">
			</p>

			<textarea name="sub_content" id="editor"></textarea>
			<script>
				var editor = CKEDITOR.replace( 'editor', { customConfig : 'custom_config.js' } );
				CKFinder.setupCKEditor( editor, '<?php echo base_url(); ?>plugins/ckfinder/' );
			</script>

			<p><input type="submit" class="button" name="submit" value="Save"></p>

		</form>