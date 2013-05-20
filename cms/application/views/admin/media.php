		<script type="text/javascript">

			function BrowseServer()
			{
				// You can use the "CKFinder" class to render CKFinder in a page:
				var finder = new CKFinder();
				finder.selectActionFunction = SetFileField;
				finder.popup();

				// It can also be done in a single line, calling the "static"
				// popup( basePath, width, height, selectFunction ) function:
				// CKFinder.popup( '../', null, null, SetFileField ) ;
				//
				// The "popup" function can also accept an object as the only argument.
				// CKFinder.popup( { basePath : '../', selectActionFunction : SetFileField } ) ;
			}

			// This is a sample function which is called when a file is selected in CKFinder.
			function SetFileField( fileUrl )
			{
				document.getElementById( 'xFilePath' ).value = fileUrl;
			}

		</script>
		
		<?php if(isset($message)) :?>
			
			<p><?php echo $message; ?></p>

		<?php endif; ?>
			

		<form method="POST">
			<p>
				<select name="media_type" id="" class="media_type">
					<option value="0">Banner</option>
					<option value="1">Thumbnail</option>
				</select>
				
				<select name="media_content_id" id="media_content_id" class="hide">
					
					<?php foreach ($media_parents as $media_parent) : ?>
						<option value="<?php echo $media_parent->sub_id; ?>"><?php echo ucfirst($media_parent->sub_title); ?></option>
					<?php endforeach; ?>

				</select>

			</p>
			<p>
				Selected File URL <span class="image_notification">(Please make sure that the dimension is <span class="dimension">1420x416 px</span> to avoid layout error)</span><br />
				<?php 
					$media_url_data = array(
				              'name'        => 'media_url',
				              'id'          => 'xFilePath',
				              'style'       => 'width:70%',
					        );
				?>
				<?php echo form_input($media_url_data); ?>
				<input type="button" class="button" value="Browse Server" onclick="BrowseServer();" />
			</p>
			<p>
				<input type="submit" name="submit" class="button" value="Add Image">
			</p>

		</form>

	
		<table class="media">
			
			<tr>
				<th>Media Url</th>
				<th>Media Type</th>
				<th>Media Content</th>
				<th>Media Size</th>
				<th>Action</th>
			</tr>

			<?php if(count($medias) > 0 ): ?>
				<?php foreach ($medias as $media) : ?>

					<tr>
						<td><img src="<?php echo base_url().'../..'.$media->media_url; ?>" width="100" height="auto"/></td>
						<td><?php echo ($media->media_type == 0 ? 'Banner' : 'Thumbnail'); ?></td>
						<td><?php echo (isset($media->media_content_id) ? $media->sub_title : ''); ?></td>
						<td><?php echo (isset($media->media_content_id) ? $media->media_size : ''); ?></td>
						<td><?php echo anchor('admin/delete/'.$media->media_id.'/media','Delete', 'class="button"'); ?></td>
					</tr>

				<?php endforeach; ?>

			<?php else : ?>

				<tr>
					<td colspan="3">There are no image uploaded. </td>
				</tr>

			<?php endif; ?>

		</table>
		<script type="text/javascript">

			$('.media_type').change(function(){
				if($(this).val() == 1){

					$('#media_content_id').removeClass('hide');
					$('.dimension').empty().html('300x141 px');

				} else {

					$('#media_content_id').addClass('hide');
					$('.dimension').empty().html('1400x416 px');

				}

			});

			$('input[name="submit"]').click(function(){
				
				if ($('input[name="media_url"]').val() == '') {

					alert('Please select a file to upload, Thanks!');
					return false;

				} else {

					return true;
				}

			});

		</script>