	<div id="left">
		<ul id="menu" class="menu">
			<li>
				<?php echo anchor('admin/', 'Admin'); ?>
			</li>
			<li><?php echo anchor('admin/members', 'Members'); ?></li>
			<li><?php echo anchor('admin/suppliers', 'Suppliers'); ?></li>
			<li>
				<a>Pages</a>
				<ul class="sub_menu">
					<!-- <li><?php echo anchor('admin/page/homepage','Homepage'); ?></li> -->
					<li><?php echo anchor('admin/page/about','About'); ?></li>
					<li><?php echo anchor('admin/edit/benefits-of-being-a-member','Membership'); ?></li>
					<li><?php echo anchor('admin/page/pricing','Pricing'); ?></li>
					<li><?php echo anchor('admin/page/faqs','FAQs'); ?></li>
					<li><?php echo anchor('admin/edit/contact-us','Contact Us'); ?></li>
					<li><?php echo anchor('admin/page/news','News'); ?></li>
					<li><?php echo anchor('admin/edit/membership-regulations','Membership Regulations'); ?></li>
					<li><?php echo anchor('admin/edit/privacy-policy','Policy Policy'); ?></li>
					<li><?php echo anchor('admin/page/savings', 'Savings'); ?></li>
					<li><?php echo anchor('admin/page/deals', 'Deals'); ?></li>
				</ul>
			</li>
			<li><?php echo anchor('admin/media','Media'); ?></li>
			<li><?php echo anchor('auth/logout','Logout');?></li>
		</ul>
	</div>