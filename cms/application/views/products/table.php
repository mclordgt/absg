<?php $anchor 	= ($this->uri->segment(3) == '' ? 'Add New Category' : 'Add New Sub Category'); ?>
<?php $link 	= ($this->uri->segment(3) == '' ? 'products/add/category' : 'products/add/sub-category/'.$this->uri->segment(4)); ?>

<?php if($this->uri->segment(2) == 'view'): ?>
	<?php echo anchor('products/categories','Go Back to Category List', 'class="go-back"'); ?>
<?php endif; ?>

<?php echo anchor($link,$anchor, 'class="add-entry"'); ?>

<?php if($subocat == 'cat'): ?>
	<table>
		<tr>
			<th>Category</th>
			<th>Sub Category Count</th>
			<th>Category Items</th>
			<th>Action</th>
		</tr>
		<?php foreach($categories as $category) : ?>
		<tr>
			<td><?php echo $category['prod_cat']; ?></td>
			<td><?php echo $category['sub_cat_count']; ?> </td>
			<td><?php echo $category['itemCount']; ?> </td>
			<td><?php echo anchor('products/view/sub-category/'.$category['prod_cat_id'], 'View'); ?> / <?php echo anchor('products/delete/category/'.$category['prod_cat_id'], 'Delete'); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php else : ?>
	<table>
		<tr>
			<th>Sub Category</th>
			<th>Item Count</th>
		</tr>
		<?php if(count($subCategories) > 0) : ?>
			<?php foreach($subCategories as $subCategory) : ?>
			<tr>
				<td><?php echo $subCategory['sub_cat']; ?></td>
				<td><?php echo $subCategory['count']; ?></td>
			</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="2">There are no subcategories assigned to this category</td>
			</tr>
		<?php endif; ?>
	</table>
<?php endif; ?>