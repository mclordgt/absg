		<?php if (isset($message)) : ?>
			
			<p><?php echo $message; ?></p>

		<?php endif; ?>
		
		<h1>Add new entry</h1>

		<form method="POST">	

			<input type="hidden" name="sub_id">

			<p>
				<input type="text" name="sub_title" placeholder="Title">
			</p>
			
			<!-- p>
				<input type="text" name="sub_url" placeholder="Url">
			</p -->

<!-- 			<p>
				<label for="parent_id">Parent Page:</label>
				<select name="parent_id">
					<?php foreach ($pages as $page) : ?>
						<option value="<?php echo $page->page_id; ?>"><?php echo ucwords($page->page_title); ?></option>	
					<?php endforeach; ?>			
				</select>
			</p>
			<p>
				<label for="">Category:</label>
				<select name="category_id">
					<option value="0"></option>
					<?php foreach ($categories as $category) : ?>
						<option value="<?php echo $category->category_id; ?>"><?php echo ucwords($category->category); ?></option>	
					<?php endforeach; ?>
				</select>

			</p> -->

			<textarea name="sub_content" id="editor"></textarea>
			<script>
				var editor = CKEDITOR.replace( 'editor', { customConfig : 'custom_config.js' } );
				CKFinder.setupCKEditor( editor, '<?php echo base_url(); ?>plugins/ckfinder/' );
			</script>

			<p><input type="submit" class="button" name="submit" value="Save"></p>

		</form>