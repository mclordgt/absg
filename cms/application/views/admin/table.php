		<?php if ($all) : ?>
			
			<h1>Admin - <?php echo ucwords($this->uri->segment(2))?> List</h1>

			<table width="30%">
				<tr>
					<th>First Name</th>
					<th>Surname</th>
					<th>Contact Email</th>
					<th>Contact Number</th>
					<th>Registration Date</th>
					<th>Action</th>
				</tr>

			<?php $groups = (isset($members) ? $members : $suppliers); ?>

			<?php if (count($groups) > 0) : ?>

				<?php foreach($groups as $group): ?>
					<tr>
						<td><?php echo $group->first_name; ?></td>
						<td><?php echo $group->surname; ?></td>
						<td><?php echo $group->email; ?></td>
						<td><?php echo $group->landline; ?></td>
						<td><?php echo date('m / d / Y',$group->date_joined); ?></td>
						<td>
							<?php echo anchor('admin/view/'.$group->personal_id, 'View'); ?> / 
							<?php echo anchor('admin/delete/'.$group->personal_id.'/'.$this->uri->segment(2), 'Delete'); ?>
						</td>
					</tr>
				<?php endforeach; ?>

			<?php else : ?>
				
					<tr>
						<td colspan="5">There is no record yet</td>
					</tr>

			<?php endif; ?>
			</table>

		<?php else : ?>

			<div id="steps_container">
					<h3>Personal Details</h3>
					<div class="personal_details">
						<p class="label_container">
							<span class="label">First Name</span>
							<span class="info"><?php echo $group->first_name; ?></span>
						</p>
						<p class="label_container">
							<span class="label">Surname</span>
							<span class="info"><?php echo $group->surname; ?></span>
						</p>
						<p class="label_container">
							<span class="label">Property Name</span>
							<span class="info"><?php echo $group->property_name; ?></span>
						</p>
						<br style="clear:none"/>
						<p class="label_container">
							<span class="label">Zone</span>
							<span class="info"><?php echo $group->zone_name; ?></span>
						</p>
						<p class="label_container">
							<span class="label">Trading Name</span>
							<span class="info"><?php echo $group->trading_name; ?></span>
						</p>
						<p class="label_container">
							<span class="label">Email</span>
							<span class="info"><?php echo $group->email; ?></span>
						</p>
						<br style="clear:none"/>
						<p class="label_container">
							<span class="label">Landline</span>
							<span class="info"><?php echo $group->landline; ?></span>
						</p>
						<p class="label_container">
							<span class="label">Mobile</span>
							<span class="info"><?php echo $group->mobile; ?></span>
						</p>
						<p class="label_container">
							<span class="label">Fax</span>
							<span class="info"><?php echo ( $group->fax == '' ? 'Not Available' : $group->fax); ?></span>
						</p>
					</div> <!-- /.personal_details -->

					<h3>Address</h3>
					<div class="address">
						<?php if(count($address) > 0): ?>
							<?php $address_count = 0; ?>
							<?php foreach($address as $addr) : ?>
							<?php $address_title = ($address_count == 0 ? 'billing' : 'postal'); ?>
							<h4><?php echo ucfirst($address_title); ?> Address</h4>
							<div class="<?php echo $address_title; ?>">
								<p class="text_container">
									<span class="label"><?php echo ucfirst($address_title); ?> Address 1</span>
									<span class="info"><?php echo $addr->address_1; ?></span>
								</p>
								<p class="text_container">
									<span class="label"><?php echo ucfirst($address_title); ?> Address 2</span>
									<span class="info"><?php echo $addr->address_2; ?></span>
								</p>
								<p class="label_container">
									<span class="label">Suburb</span>
									<span class="info"><?php echo $addr->suburb; ?></span>
								</p>
								<p class="label_container">
									<span class="label">State</span>
									<span class="info"><?php echo $addr->state; ?></span>
								</p>
								<p class="label_container">
									<span class="label">Postcode</span>
									<span class="info"><?php echo $addr->postcode; ?></span>
								</p>
								<p class="label_container">
									<span class="label">Country</span>
									<span class="info"><?php echo $addr->country; ?></span>
								</p>
							</div> <!-- /.<?php echo $address_title; ?> -->
							<?php $address_count++; ?>
							<?php endforeach; ?>
						<?php else : ?>
							<p>No Address Data</p>
						<?php endif; ?>
					</div> <!-- /.address -->

					<h3>Activities</h3>
					<div class="agriculture">
						<h4>Agricultural Acitivities</h4>
						<div class="activity">
							<?php foreach($activities as $activity) : ?>
								<p class="label_container">
								<?php if(!is_array($activity)) : ?>
									<span class="label">Primary Activity</span>
									<span class="info"><?php echo $activity; ?></span>
								<?php else : ?>
									<span class="label">Other Activities</span>
									<span class="info"><?php echo implode(', ', $activity); ?></span>
								<?php endif; ?>
								</p>
							<?php endforeach; ?>
						</div> <!-- /.activity -->

						<h4>Stock Number</h4>
						<div class="stocks">
							<?php foreach($stocks as $stock): ?>
								<p class="label_container">
									<span class="label"><?php echo $stock['stock_name']; ?></span>
									<span class="info"><?php echo $stock['stock_value']; ?></span>
								</p>
							<?php endforeach; ?>
						</div> <!-- /.stocks -->

						<h4>Total Hectares</h4>
						<div class="hectares">
							<?php foreach ($hectares as $hectare) : ?> 
								<p class="text_container">
									<span class="label"><?php echo $hectare['hectare_name']; ?></span>
									<span class="info"><?php echo $hectare['hectare_value']; ?></span>
								</p>
							<?php endforeach; ?>
						</div> <!-- /.hectares -->

						<h4>Product Usage</h4>
						<div class="usage">
							<?php foreach ($usages as $usage) : ?> 
								<p class="text_container">
									<span class="label"><?php echo $usage['usage_name']; ?></span>
									<span class="info"><?php echo $usage['usage_value']; ?></span>
								</p>
							<?php endforeach; ?>
						</div>	<!-- /.usage -->

						<h4>Vendor</h4>
						<div class="vendor">
							<?php foreach ($vendors as $key => $vendor) : ?> 	
								<p class="text_container">
									<span class="label"><?php echo ucwords( str_replace('_',' ',$key) ); ?></span>
									<span class="info"><?php echo $vendor; ?></span>
								</p>
							<?php endforeach; ?>
						</div> <!-- /.vendor -->
					</div> <!-- /.agriculture -->
					
					<h3>Accounts</h3>	
					<div class="accounts">
						<?php foreach ($accounts as $key => $account) : ?> 	
							<p class="text_container">
								<span class="label"><?php echo ($key == 'fertiliser_account_handler' ? 'Company that handles fertiliser account' : ($key == 'reseller_account' ? 'Rural re-sellers with which you hold accounts' : 'Stockfeed companies with which you hold accounts') ); ?></span>
								<ul>
									<?php foreach ($account as $accVal) : ?>
										<li><?php echo ucwords($accVal); ?></li>
									<?php endforeach; ?>
								</ul>
							</p>
						<?php endforeach; ?>
					</div>	
					
					<h3>Professional Services</h3>
					<div class="services">
						<?php foreach($services as $key => $serv) : ?>
							<p class="text_container">
								<span class="label">Do you use an <?php echo str_replace('_',' ',$key); ?>?</span>
								<span class="info"><?php echo ucwords($serv); ?></span>
							</p>
						<?php endforeach; ?>
					</div> <!-- /.services -->

					<h3>Other</h3>
					<div class="other">
						<p class="text_container">
							<span class="label">How did you hear about us?</span>
							<span class="info"><?php echo $other['how_hear']; ?></span>
						</p>
						<p class="text_container">
							<span class="label">Area in which you would most like to save money??</span>
							<span class="info"><?php echo $other['receive_free_text']; ?></span>
						</p>
						<p class="text_container">
							<span class="label">Priority assignment</span>
							<ol>
								<?php foreach($priorities as $kval) : ?>
									<li><?php echo ucwords( str_replace('_',' ',$kval) ); ?></li>
								<?php endforeach; ?>
							</ol>
						</p>
					</div> <!-- /.services -->

			</div> <!-- /#steps_container -->

		<?php endif; ?>