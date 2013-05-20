		<?php if($this->uri->segment(3) == "faqs" || $this->uri->segment(3) == "news"): ?>
			<?php echo anchor('admin/add/'.$this->uri->segment(3), 'Add New Entry', 'class="add-entry"'); ?>
		<?php endif; ?>
		
		<?php if ($this->uri->segment(4) && $this->uri->segment(4) == 'deleted') : ?>
			<p class="message"> An entry has been deleted! </p>
		<?php endif; ?>

		<?php if ($all) : ?>

			<?php if (count($contents) > 0) : ?>

				<table class="list" cellpadding="10">
					<tr>
						<!-- <th width="20">&nbsp;</th> -->
						<th width="630">TITLE</th>
						<th>Action</th>
					</tr>
					
					<?php foreach ($contents as $value) : ?>

						<tr>

							<!-- <td align="center"><?php echo $value->sub_id; ?></td> -->
							<td><?php echo anchor('admin/edit/'.$value->sub_url, $value->sub_title); ?></td>
							<td><?php echo anchor('admin/delete/'.$value->sub_id.'/page/'.$this->uri->segment(3), 'Delete', 'class="button"'); ?></td>

						</tr>

					<?php endforeach; ?>

				</table>

			<?php else : ?>
				<p>There are no contents for this page. </p>
			<?php endif; ?>

		<?php else: ?>

			<?php echo anchor('admin/', '< Go Back'); ?>

			<form method="POST">	

				<input type="hidden" name="sub_id" value="<?php echo $content->sub_id; ?>">

				<p>
					<input type="text" name="sub_title" value="<?php echo $content->sub_title; ?>">
				</p>
				
				<!-- <p>
					<input type="text" name="sub_url" value="<?php echo $content->sub_url; ?>">
				</p> -->

				<textarea name="editor<?php echo $content->sub_id; ?>" id="editor<?php echo $content->sub_id; ?>"><?php echo $content->sub_content; ?></textarea>
				<script>
					var editor<?php echo $content->sub_id; ?> = CKEDITOR.replace( 'editor<?php echo $content->sub_id; ?>', { customConfig : 'custom_config.js' } );
					CKFinder.setupCKEditor( editor<?php echo $content->sub_id; ?>, '<?php echo base_url(); ?>plugins/ckfinder/' );
				</script>

				<p><input type="submit" class="button" name="submit" value="Save"></p>

			</form>

		<?php endif; ?>