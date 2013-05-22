<?php if (isset($message) && $message != '') : ?>
	
	<p><?php echo $message; ?></p>

<?php endif; ?>



<?php if($form == TRUE) : ?>

	<h1>Add New Product</h1>

	<form method="POST">
		<script type="text/javascript">
			$(document).ready(function(){

				var defValue = $('select[name="prod_cat_id"] option:eq(0)').val();

				ajaxCall(defValue);

				$('select[name="prod_cat_id"]').change(function(){
					
					ajaxCall($(this).val());

				});

				function ajaxCall(id){

					var url = '<?php echo base_url(); ?>products/ajxCall',
						subCat = $('select[name="sub_cat_id"]');

					$.ajax({
						url : url,
						type: "POST",
						data: { prod_cat_id: id },
						success: function(data){
							var html = '',
								parseData = JSON.parse(data);

							$.each(parseData, function(index,value){
								// console.log(value.sub_cat_id);
								html += '<option value="'+value.sub_cat_id+'">'+value.sub_cat+'</option>'
							});

							subCat.empty().append(html);
						}, 
						error: function(xhr, ajaxOptions, thrownError){
							console.log(thrownError);
						}
					});
				}
			});
		</script>
		<input type="hidden" name="personal_id" value="1">

		<p>
			<select name="prod_cat_id" id="">
				<?php foreach($categories as $category): ?>		
				<option value="<?php echo $category['prod_cat_id']?>"><?php echo $category['prod_cat']?></option>		
				<?php endforeach; ?>
			</select>
		</p>

		<p>
			<select name="sub_cat_id" id=""></select>
		</p>

		<p>
			<label for="">Product</label>
			<input type="text" name="prod_name">
		</p>

		<p>
			<label for="">ABSG Code</label>
			<input type="text" name="absg_code">
		</p>

		<p>
			<label for="">Grade</label>
			<input type="text" name="grade">
		</p>
		<p>
			<label for="">Industry Code</label>
			<input type="text" name="ind_code">
		</p>
		<p>
			<label for="">Units</label><br />
			<select name="unit_id" id="">
				<?php foreach($units as $unit): ?>
					<option value="<?php echo $unit->unit_id; ?>"><?php echo $unit->unit; ?></option>			
				<?php endforeach; ?>
			</select>
		</p>
		<p>
			<label for="">Minimum Unit Size</label>
			<input type="text" name="min_unit_size">
		</p>
		<p>
			<label for="">Unit Required</label>
			<input type="text" name="unit_req">
		</p>
		<p>
			<input type="submit" name="submit" value="Add Product">
		</p>

	</form>

<?php else : ?>
	
	<?php echo anchor('products/add/product','Add Products', 'class="add-entry"'); ?>

	<h1>Product List</h1>

	<table>
		<tr>
			<th>Product</th>
			<th>Category</th>
			<th>Sub Category</th>
			<th>ABSG Code</th>
			<th>Units</th>
			<th>Action</th>
		</tr>
		<?php foreach($products as $product) : ?>
		<tr>
			<td><?php echo $product->prod_name; ?></td>
			<td><?php echo $product->prod_cat; ?> </td>
			<td><?php echo ucwords($product->sub_cat); ?> </td>
			<td><?php echo $product->absg_code; ?> </td>
			<td><?php echo $product->unit; ?> </td>
			<td><?php echo anchor('products/view/product/'.$product->prod_id,'View'); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

<?php endif; ?>