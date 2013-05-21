<h1><?php echo ucwords($this->uri->segment(2)); ?> Signup</h1>


<?php echo (isset($message) ? $message : '' ); ?>

<?php echo (isset($temp_pass) ? $temp_pass : '' ); ?>

<ul class="progress_bar">
	<li class="active"><span class="bar_count">1</span> <span class="bar_double_name">Membership<br />Regulations</span></li>
	<li><span class="bar_count">2</span> <span class="bar_double_name">Personal<br />Details</span></li>
	<li><span class="bar_count">3</span> <span class="bar_name">Address<br /></span></li>
	<li><span class="bar_count">4</span> <span class="bar_name">Activities<br /></span></li>
	<li><span class="bar_count">5</span> <span class="bar_name">Products<br /></span></li>
	<li><span class="bar_count">6</span> <span class="bar_name">Accounts<br /></span></li>
	<li><span class="bar_count">7</span> <span class="bar_double_name">Professional<br />Services</span></li>
	<li class="last"><span class="bar_count">8</span> <span class="bar_name">Other<br /></span></li>
</ul>

<?php echo form_open('register/'.$this->uri->segment(2)); ?>

<div id="steps_container">
	<div id="toc" class="steps">
		
		<div class="fieldset">
			<h3 style="text-align: center;">Agricultural Buying and Selling Group Pty Ltd (ACN: 162 904 770) <br /> Membership Regulations</h3>
			
			<div class="clauses">

				<?php echo($regulations->sub_content); ?>

			</div>

			<div class="agree">
				<p class="toc_confirmation">The <b>Member</b> accepts these terms and conditions:</p>
				<span class="check">
					<?php echo form_radio('terms_and_conditions','Yes'); ?> <?php echo form_label('Yes', 'terms_and_conditions'); ?> 
				</span>
				<span class="check">
					<?php echo form_radio('terms_and_conditions','No', TRUE); ?> <?php echo form_label('No', 'terms_and_conditions'); ?> 
				</span>
			</div> <!-- /.agree -->

		</div> <!-- /.fieldset -->
		<span id="terms" class="button_container">
			<a class="button left" data-dir="prev" data-value="1">Next ></a>
		</span>	
	</div> <!-- /.steps -->
	<div id="personal_details" class="steps">
		
		<div class="fieldset personal_details">
			<h3>Personal Details</h3>
			<span class="label_container">
				<?php echo form_label('First Name','first_name'); ?>
				<?php echo form_input(array('name'=>'first_name', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('Surname','surname'); ?>
				<?php echo form_input(array('name'=>'surname', 'tabindex'=>'-1')); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_label('Property Name','property_name'); ?>
				<?php echo form_input(array('name'=>'property_name', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('Zone', 'zone'); ?>
				<?php $zones_array = array('0' => 'Select Zones'); ?>

				<?php foreach ($zones as $zone) : ?>

					<?php $zones_array[$zone->zone_id] = $zone->zone_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('zone',$zones_array, '', 'tabindex="-1"'); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_label('Trading Name','trading_name'); ?>
				<?php echo form_input(array('name'=>'trading_name', 'tabindex'=>'-1')); ?>
			</span>

		</div> <!-- /.fieldset -->

		<div class="fieldset contact_details">
			<h3>Contact Details</h3>	
			<span class="label_container">
				<?php echo form_label('Email', 'email'); ?>
				<?php echo form_input(array('name'=>'email', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('Landline', 'landline'); ?>
				<?php echo form_input(array('name'=>'landline', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container">
				<?php echo form_label('Mobile', 'mobile'); ?>
				<?php echo form_input(array('name'=>'mobile', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('Fax', 'fax'); ?>
				<?php echo form_input(array('name'=>'fax', 'tabindex'=>'-1')); ?>
			</span>
		</div> <!-- /.fieldset -->

		<span id="personal_details" class="button_container">
			<a class="button" data-dir="prevs" data-value="0">< Prev</a>
			<a class="button" data-dir="next" data-value="2">Next ></a>
		</span>	
	</div> <!-- /.steps -->
	<div id="billing_details" class="steps">
		
		<div class="fieldset billing">
			<h3>Billing Address</h3>

			<span class="text_container">
				<label for="">Billing Address 1</label>
				<?php echo form_input( array('name' => 'billing_address_1', 'tabindex'=>'-1')); ?>
			</span>
			<span class="text_container">
				<label for="">Billing Address 2</label>
				<?php echo form_input( array('name' => 'billing_address_2', 'tabindex'=>'-1')); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_label('Suburb', 'billing_suburb'); ?>
				<?php echo form_input( array('name' => 'billing_suburb', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('State', 'billing_state'); ?>
				<?php echo form_input( array('name' => 'billing_state', 'tabindex'=>'-1')); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_label('Postcode', 'billing_postcode'); ?>
				<?php echo form_input( array('name' => 'billing_postcode', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('Country', 'billing_country'); ?>
				<?php echo form_input( array('name' => 'billing_country', 'tabindex'=>'-1')); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_checkbox(array( 'name' => 'same_postal', 'value' => 'same_postal', 'tabindex' => '-1', 'checked' => TRUE)); ?> 
				<?php echo form_label( 'Same Postal', 'same_postal' ); ?>
			</span>

		</div> <!-- /.fieldset -->

		<div class="fieldset postal">
			<h3>Postal Address</h3>

			<span class="text_container">
				<?php echo form_label('Address 1', 'postal_address_1'); ?>
				<?php echo form_input( array('name' => 'postal_address_1', 'tabindex'=>'-1')); ?>
			</span>
			<span class="text_container">
				<?php echo form_label('Address 2', 'postal_address_2'); ?>
				<?php echo form_input( array('name' => 'postal_address_2', 'tabindex'=>'-1')); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_label('Suburb', 'postal_suburb'); ?>
				<?php echo form_input( array('name' => 'postal_suburb', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('State', 'postal_state'); ?>
				<?php echo form_input( array('name' => 'postal_state', 'tabindex'=>'-1')); ?>
			</span>

			<br class="clear">

			<span class="label_container">
				<?php echo form_label('Postcode', 'postal_postcode'); ?>
				<?php echo form_input( array('name' => 'postal_postcode', 'tabindex'=>'-1')); ?>
			</span>
			<span class="label_container right">
				<?php echo form_label('Country', 'postal_country'); ?>
				<?php echo form_input( array('name' => 'postal_country', 'tabindex'=>'-1')); ?>
			</span>

		</div> <!-- /.fieldset -->

		<span id="address" class="button_container">
			<a class="button left" data-dir="prev" data-value="1">< Prev</a>
			<a class="button left" data-dir="next" data-value="3">Next ></a>
		</span>
	</div> <!-- /.steps -->

	<?php if ($this->uri->segment(2) == 'member') : ?>

	<div id="activities" class="steps">
		
		<div class="fieldset">
			<h3>Agricultural Activity</h3>
			
			<span class="label_container">
				<?php echo form_label('Primary Activity', 'primary_activity'); ?>
				<?php $options = array('0' => 'Select Primary Activity'); ?>

				<?php foreach ($primaryActivity as $primary) : ?>

					<?php $options[$primary->activity_id] = $primary->activity_name; ?>

				<?php endforeach;?> 
					<?php $options[5] = 'Other'; ?>

				<?php echo form_dropdown('primary_activity',$options, '', 'tabindex="-1"'); ?>		
				<input type="text" name="primary_activity_other" class="hide"/>		
			</span>

			<span class="checkbox_container">
				<label for="activity" class="check_exception">Other Activities</label>
				<span class="check_span">&nbsp;</span>
				<?php foreach ($primaryActivity as $activity) : ?>
					<span class="check">
						<?php echo form_checkbox( array('name' => 'activity[]','value' => $activity->activity_id, 'tabindex'=>'-1') ); ?> <?php echo form_label($activity->activity_name, 'activity'); ?>
					</span>
				<?php endforeach; ?>
					<span class="check">
						<?php echo form_checkbox( array('name' => 'activity[]','value' => 5, 'tabindex'=>'-1', 'class' => 'other_activity') ); ?> <?php echo form_label('Other', 'activity'); ?>
					</span>
					<input type="text" name="other_activity_other" class="hide"/>	
			</span>

		</div> <!-- /.fieldset -->

		<div class="fieldset">
			<h3>Stock Number</h3>
			<span class="text_container stock_number">
				<?php foreach ($stocks as $stock) : ?>
					<span class="stock_input">
						<?php echo form_label($stock->stock_name, 'stocks'); ?>
	 					<?php echo form_input( array('name' => 'stocks['.$stock->stock_id.']', 'tabindex' => '-1') ); ?>
					</span>
				<?php endforeach; ?>
			</span>
		</div> <!-- /.fieldset -->

		<div class="fieldset">
			<h3>Total Hectares</h3>
			
			<span class="text_container hectares_input">
				
				<?php foreach ($hectares as $hectare) : ?>
					<span class="hectare_input">
						<?php echo form_label($hectare->hectare_name, 'hectares'); ?>
						<?php echo form_input( array( 'name' => 'hectares['.$hectare->hectare_id.']', 'tabindex' => '-1') ); ?> 
					</span>

				<?php endforeach; ?>

			</span>

		</div> <!-- /.fieldset -->

		<span id="activity" class="button_container">
			<a class="button left" data-dir="prev" data-value="2">< Prev</a>
			<a class="button left" data-dir="next" data-value="4">Next ></a>
		</span>
	</div> <!-- /.steps -->

	<div id="prod_usage" class="steps">
		
		<div class="fieldset">
			<h3>Product Usage</h3>
			<span class="text_container">
				<?php foreach ($usages as $usage) : ?>
					<span class="usage_input">
						<?php echo form_label($usage->product_usage_name, 'usages'); ?>
						<?php echo form_input( array('name' => 'usages['.$usage->usage_id.']', 'tabindex' => '-1' ) ); ?> <br />
					</span>
				<?php endforeach; ?>
			</span>
		</div> <!-- /.fieldset -->

		<div class="fieldset vendor">
			<h3>Vendor</h3>
			<span class="select_container">
				<?php echo form_label('Usual Rural Reseller','rural_reseller'); ?>
				<?php $rural_resellers = array('0' => 'Select Reseller'); ?>

				<?php foreach ($ruralResellers as $ruralReseller) : ?>

					<?php $rural_resellers[$ruralReseller->sp_id] = $ruralReseller->sp_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('rural_reseller',$rural_resellers, '', 'tabindex="-1"'); ?>

				<input type="text" name="rural_reseller_other" placeholder="Please enter rural reseller" class="hide" tabindex="-1"/>
			</span>
			<span class="select_container">
				<?php echo form_label('Usual Stockfeed Provider','stockfeed_provider'); ?>
				<?php $stockfeed_provider = array('0' => 'Select Provider'); ?>

				<?php foreach ($stockfeedProviders as $stockfeedProvider) : ?>

					<?php $stockfeed_provider[$stockfeedProvider->sp_id] = $stockfeedProvider->sp_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('stockfeed_provider',$stockfeed_provider, '', 'tabindex="-1"'); ?>	
				
				<input type="text" name="stockfeed_provider_other" placeholder="Please enter stockfeed provider" class="hide"/>
			</span>
			<span class="select_container">
				<?php echo form_label('Usual Fertiliser Provider','fertiliser_provider'); ?>
				<?php $fertiliser_provider = array('0' => 'Select Provider'); ?>

				<?php foreach ($fertiliserProviders as $fertiliserProvider) : ?>

					<?php $fertiliser_provider[$fertiliserProvider->sp_id] = $fertiliserProvider->sp_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('fertiliser_provider',$fertiliser_provider, '', 'tabindex="-1"'); ?>

				<input type="text" name="fertiliser_provider_other" class="hide" placeholder="Please enter fertiliser provider" tabindex="-1"/>
			</span>
			<span class="select_container">
				<?php echo form_label('Usual Fuel Supplier','fuel_supplier'); ?>
				<?php $fuel_supplier = array('0' => 'Select Supplier'); ?>

				<?php foreach ($fuelSuppliers as $fuelSupplier) : ?>

					<?php $fuel_supplier[$fuelSupplier->sp_id] = $fuelSupplier->sp_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('fuel_supplier',$fuel_supplier, '', 'tabindex="-1"'); ?>
				<input type="text" name="fuel_supplier_other" class="hide" placeholder="Please enter fuel supplier" tabindex="-1"/>
			</span>
			<span class="select_container">
				<?php echo form_label('Usual Agro-chemical Provider','agro_chemical_provider'); ?>
				<?php $agro_chemical_provider = array('0' => 'Select Account Handler'); ?>

				<?php foreach ($agroChemicalProviders as $agroChemicalProvider) : ?>

					<?php $agro_chemical_provider[$agroChemicalProvider->sp_id] = $agroChemicalProvider->sp_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('agro_chemical_provider',$agro_chemical_provider, '', 'tabindex="-1"'); ?>
				<input type="text" name="agro_chemical_provider_other" class="hide" placeholder="Please enter Agro-chemical Provider" tabindex="-1"/>
			</span>
		</div> <!-- /.fieldset -->

		<span id="usage" class="button_container">
			<a class="button left" data-dir="prev" data-value="3">< Prev</a>
			<a class="button left" data-dir="next" data-value="5">Next ></a>
		</span>
	</div> <!-- /.steps -->

	<div id="accounts" class="steps">
		<div class="fieldset">
			<h3>Company that handles fertiliser account</h3>
			<span class="check_container fertiliser-account">
				<label for="fertiliser_account_handler"></label>
				<?php foreach ($fertiliserAccountHandlers as $fertiliserAccountHandler) : ?>
					<span class="check">
						<?php echo form_checkbox( array('name' => 'fertiliser_account_handler[]', 'value' => $fertiliserAccountHandler->sp_id, 'tabindex' => '-1') ); ?><?php echo form_label($fertiliserAccountHandler->sp_name, 'fertiliser_account_handler'); ?> <br />
					</span>	
				<?php endforeach;?> 
			</span>
			<input type="text" name="fertiliser_account_handler_other" class="hide" tabindex="-1"/>
		</div> <!-- /.fieldset -->
		<div class="fieldset">
			<h3>Rural re-sellers with which you hold accounts</h3>
			<span class="check_container resellers">
				<label for="resellers"></label>
				<?php foreach ($resellerAccounts as $resellerAccount) : ?>
					<span class="check">
						<?php echo form_checkbox( array( 'name' => 'resellers[]', 'value' => $resellerAccount->sp_id, 'tabindex' => '-1') ); ?> <?php echo form_label($resellerAccount->sp_name, 'resellers'); ?> <br />
					</span>
				<?php endforeach; ?>
			</span>
			<input type="text" name="resellers_other" class="hide" tabindex="-1"/>
		</div> <!-- /.fieldset -->
		<div class="fieldset">
			<h3>Stockfeed companies with which you hold accounts</h3>
			<span class="check_container stockfeeds">
				<label for="stockfeeds"></label>
				<?php foreach ($stockfeedAccounts as $stockfeedAccount) : ?>
					<span class="check">
						<?php echo form_checkbox( array('name' => 'stockfeeds[]', 'value' => $stockfeedAccount->sp_id, 'tabindex' => '-1') ); ?> <?php echo form_label($stockfeedAccount->sp_name, 'stockfeeds'); ?> <br />
					</span>
				<?php endforeach; ?>
			</span>
			<input type="text" name="stockfeeds_other" class="hide" tabindex="-1"/>
		</div> <!-- /.fieldset -->

		<span id="account" class="button_container">
			<a class="button left" data-dir="prev" data-value="4">< Prev</a>
			<a class="button left" data-dir="next" data-value="6">Next ></a>
		</span>
	</div> <!-- /.steps -->

	<div id="prof_services" class="steps">

		<div class="fieldset">
			<h3>Do you use an independent nutritionist?</h3>
			<span class="check_container nutritionist-section">
				<label for="nutritionist" class="independent_extend"></label>
				<span class="check">
					<?php echo form_radio( array( 'name' => 'nutritionist', 'value' => 'Yes','checked' => TRUE, 'tabindex' => '-1') ); ?> <?php echo form_label('Yes', 'nutritionist'); ?> 
				</span>
				<span class="check">
					<?php echo form_radio( array('name' => 'nutritionist','value' => 'No', 'tabindex' => '-1') ); ?> <?php echo form_label('No', 'nutritionist'); ?> 
				</span>
				<span class="check">
					<?php echo form_radio( array('name' => 'nutritionist', 'value' => 'N/A', 'tabindex' => '-1') ); ?> <?php echo form_label('N/A', 'nutritionist'); ?> 
				</span>
			</span>
		</div>

		<div class="fieldset">
			<h3>Do you use an independent agronomist?</h3>
			<span class="check_container agronomist-section">
				<label for="agronomist" class="independent_extend"></label>
				<span class="check">
					<?php echo form_radio( array('name' => 'agronomist', 'value' => 'Yes','checked' => TRUE, 'tabindex' => '-1') ); ?> <?php echo form_label('Yes', 'agronomist'); ?> 	
				</span>
				<span class="check">
					<?php echo form_radio( array('name' => 'agronomist', 'value' => 'No', 'tabindex' => '-1') ); ?> <?php echo form_label('No', 'agronomist'); ?>	
				</span>
				<span class="check">
					<?php echo form_radio( array('name' => 'agronomist', 'value' => 'N/A', 'tabindex' => '-1') ); ?> <?php echo form_label('N/A', 'agronomist'); ?>	
				</span>
			</span>
		</div>
		
		<span id="services" class="button_container">
			<a class="button left" data-dir="prev" data-value="5">< Prev</a>
			<a class="button left" data-dir="next" data-value="7">Next ></a>
		</span>
	</div> <!-- /.steps -->

	<div id="how_medium" class="steps">
		<div class="fieldset">
			<h3>Other</h3>

			<span class="label_container">
				<?php echo form_label('How did you hear about us?','how_hear'); ?>
				<?php $how_hear = array('0' => ''); ?>

				<?php foreach ($hearMediums as $hearMedium) : ?>

					<?php $how_hear[$hearMedium->medium_id] = $hearMedium->medium_name; ?>

				<?php endforeach;?> 

				<?php echo form_dropdown('how_hear',$how_hear, '', 'tabindex="-1"'); ?>
				<input type="text" name="how_hear_other" class="hide" tabindex="-1"/>
			</span>
		</div> <!-- /.fieldset -->

		<div class="fieldset">
			<h3>Please enter the area in which you would most like to save money?</h3>
			<span class="check_container">
				<label for="" class="free_extend"></label>
				<input type="text" name="free_text" tabindex="-1"/>
			</span>
		</div> <!-- /.fieldset -->
		<div class="fieldset">
			<h3>Please assign 1 - 4, 1 being the highest which is most important to you...</h3>
			<span class="check_container">
				<label for="" class="imp_extend"></label>
				<span class="imp_check">
					<?php $product_priority 	= array(); ?>
					<?php $price_priority 		= array(); ?>
					<?php $payment_priority 	= array(); ?>
					<?php $service_priority 	= array(); ?>

					<?php for ($i=0; $i < 5; $i++) : ?>

						<?php $product_priority[$i] = $i; ?>
						<?php $price_priority[$i] = $i; ?>
						<?php $payment_priority[$i] = $i; ?>
						<?php $service_priority[$i] = $i; ?>
								
					<?php endfor; ?>

					<?php echo form_dropdown('product_priority',$product_priority, '', 'tabindex="-1"'); ?>  Product <br />
					<?php echo form_dropdown('price_priority',$price_priority, '', 'tabindex="-1"'); ?>  Price <br />
					<?php echo form_dropdown('payment_priority',$payment_priority, '', 'tabindex="-1"'); ?>  Payment Terms <br />
					<?php echo form_dropdown('service_priority',$service_priority, '', 'tabindex="-1"'); ?>  Service <br />
				</span>
			</span>
		</div> <!-- /.fieldset -->
		<span id="other" class="button_container">
			<a class="button left" data-dir="prev" data-value="6">< Prev</a>
			<input type="submit" name="submit" value="Sign Up" class="button" tabindex="-1">
		</span>
	</div> <!-- /.steps -->

	<?php endif; ?>
</div>
	
<?php echo validation_errors(); ?>

<?php echo form_close();?>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('.postal').css({'display':'none'});

		var width = $('.steps').width(),
			same_postal = $('input[name="same_postal"]'),
			current = 0;

		$('.steps a').click(function(){

			var dataValue = $(this).data('value'),
				dataDir   = $(this).data('dir'),
				parentLoc = $(this).parent().parent(),
				parentId  = $(this).parent().attr('id');

			if(parentId != 'terms'){

				if(dataDir == 'next'){

					var returnValue = validateForm(parentId);

					if(jQuery.inArray(1,returnValue) != -1 || jQuery.inArray(1,returnValue) > -1){

						return false;

					} else {

						removeTabIndex(parentLoc.next('div').attr('id'));
						slideDir(dataValue);
						updateProgressBar(dataValue);

					}

				} else {

					removeTabIndex(parentLoc.next('div').attr('id'));
					updateProgressBar(dataValue);
					slideDir(dataValue);
				}

			} else {

				var toc_checked = $('input[name="terms_and_conditions"]:checked');

				if(toc_checked.val() == 'Yes'){

					removeTabIndex(parentLoc.next('div').attr('id'));
					slideDir(dataValue);
					updateProgressBar(dataValue);

				}

			}

		});

		function updateProgressBar(dataValue){
			$('.progress_bar li').eq(dataValue).addClass('active');
		}

		function slideDir(dataValue){

	        $('#steps_container').stop().animate({
	            marginLeft: '-' + dataValue * width + 'px',
	        },500, gotoTop);

		}

		function removeTabIndex(parentNextLoc){

			$('#'+parentNextLoc).find('input').removeAttr('tabindex');
			$('#'+parentNextLoc).find('select').removeAttr('tabindex');
			$('#'+parentNextLoc).find('a').attr('tabindex', 0);

		}

		function gotoTop(){

			$("html, body").animate({ scrollTop: 200 }, 500);

		}

		$(same_postal).change(function(){

			if(!$(this).is(':checked')){

				$('.postal').css({'display':'block'});

			} else {

				$('.postal').css({'display':'none'});

			}

		});


		$('.vendor select').change(function(){

			if($(this).val() == 5){
				$(this).parent().find('input').removeClass('hide');
			} else {
				$(this).parent().find('input').addClass('hide');
			}

		});

		$('select[name="primary_activity"]').change(function(){

			if($(this).val() == 5){

				$('input[name="primary_activity_other"]').removeClass('hide');

			} else {
				
				$('input[name="primary_activity_other"]').addClass('hide');

			}

		});

		$('.other_activity').change(function(){	
			if($(this).is(':checked')){

				$('input[name="other_activity_other"]').removeClass('hide');

			} else {

				$('input[name="other_activity_other"]').addClass('hide');
				
			}
		});

		$('input[name="fertiliser_account_handler[]"]').change(function(){
			if( $(this).val() == 5){
				$('input[name="fertiliser_account_handler_other"]').removeClass('hide');
			} else {
				$('input[name="fertiliser_account_handler_other"]').addClass('hide');
			}
		});

		$('input[name="resellers[]"]').change(function(){
			if( $(this).val() == 5 ){
				$('input[name="resellers_other"]').removeClass('hide');
			} else {
				$('input[name="resellers_other"]').addClass('hide');
			}
		});

		$('input[name="stockfeeds[]"]').change(function(){
			if( $(this).val() == 5 ){
				$('input[name="stockfeeds_other"]').removeClass('hide');
			} else {
				$('input[name="stockfeeds_other"]').addClass('hide');
			}
		});

		$('select[name="how_hear"]').change(function(){

			if($(this).val() == 4){
				$(this).parent().find('input').removeClass('hide');
			} else {
				$(this).parent().find('input').addClass('hide');
			}

		});


		$('.imp_check select').change(function(){

			var selectedValue = $(this).val();

			$(this).siblings().find('option[value="'+selectedValue+'"]').remove();

			if($(this).find('option[value="0"]')){

				$(this).each(function(){

					$(this).find('option[value="0"]').remove();

				});

			}

		});

		function validateForm(fieldsetId){

			var perr  	= new Array(),
				intRegex 	= /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/,
				emailRegex 	= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
			
			switch(fieldsetId){

				case 'personal_details':

					var zvalue  	= $('select[name="zone"]'),
						email 		= $('input[name="email"]'),
						landline 	= $('input[name="landline"]'),
						mobile  	= $('input[name="mobile"]');


					$('.personal_details input').each(function(){

						var tempString = $(this).parent().find('label').text();
						
						if($(this).val() == ''){

							if(tempString.indexOf(' cannot be empty') == -1){

								$(this).parent().find('label').append(' cannot be empty').addClass('error');	

							} 
							
							perr.push(1);

						} else {

							if(tempString.indexOf(' cannot be empty')== -1){

								var newString = tempString.replace(' cannot be empty', '');

							} 
							
							$(this).parent().find('label').text(newString).removeClass('error');		

						}

					});

					if(zvalue.val() == 0) {

						zvalue.parent().find('label').html('Please select appropriate zone value').addClass('error');
						perr.push(1); 

					} else {

						zvalue.parent().find('label').html('Zone').removeClass('error');

					}

					if( !emailRegex.test(email.val()) ){

						email.parent().find('label').html('Please enter a valid email address').addClass('error');
						perr.push(1); 

					} else {

						email.parent().find('label').html('Email').removeClass('error');

					}

					if( !intRegex.test(landline.val())){

						landline.parent().find('label').html('Please enter landline number').addClass('error');
						perr.push(1); 

					} else {

						landline.parent().find('label').html('Landline').removeClass('error');

					}

					if( !intRegex.test(mobile.val())){

						mobile.parent().find('label').html('Please enter mobile number').addClass('error');
						perr.push(1); 

					} else {

						mobile.parent().find('label').html('Mobile').removeClass('error');

					}

					return perr;

				break;

				case 'address':

					$('.billing input').each(function(){

						var tempString = $(this).parent().find('label').text(),
							excludeInput 	= new Array("Billing Address 1","Billing Address 2");

							if( tempString == "Billing Address 1" || tempString == "Billing Address 2" ){} else {

								if( $(this).val() == '' ){

									if(tempString.indexOf(' cannot be empty') == -1){

										$(this).parent().find('label').append(' cannot be empty').addClass('error');	

									} 
									
									perr.push(1);

								} else {

									if(tempString.indexOf(' cannot be empty')== -1){

										var newString = tempString.replace(' cannot be empty', '');

									} 
									
									$(this).parent().find('label').text(newString).removeClass('error');	

								}

							}


					});

					if(!same_postal.is(':checked')){

						$('.postal input').each(function(){

							var tempString = $(this).parent().find('label').text();

							if($(this).val() == '' && tempString != 'Address 2'){

								if(tempString.indexOf(' cannot be empty') == -1){

									$(this).parent().find('label').append(' cannot be empty').addClass('error');	

								} 
								
								perr.push(1);

							} else {

								if(tempString.indexOf(' cannot be empty')== -1){

									var newString = tempString.replace(' cannot be empty', '');

								} 
								
								$(this).parent().find('label').text(newString).removeClass('error');	

							}


						});

					}

					return perr;

				break;

				case 'activity':

					var primary_activity	= $('select[name="primary_activity"]'),
						activities			= $('input[name="acitivity[]"]'),
						tempActivity		= new Array();

					$('input[name="activity[]"]:checked').each(function(){
						tempActivity.push($(this).val());
					});

					// Activities
					if(primary_activity.val() == 0){
						primary_activity.parent().find('label').html('Please select primary activity').addClass('error');
						perr.push(1);
					} else {
						primary_activity.parent().find('label').html('Primary Activity').removeClass('error');
					}

					// Stocks
					$('.stock_number input').each(function(){

						var tempString = $(this).parent().find('label').text();

						if(tempString == 'Other Stock' || tempString == 'Other Stock (Please specify)'){

							// if( zeroRegex.test($(this).val()) ){

							// 	if(tempString.indexOf(' (Please specify)') == -1){

							// 		$(this).parent().find('label').append(' (Please specify)').addClass('error');	
							// 	}
							// 	perr.push(1);	

							// } else {

							// 	var newString = tempString.replace(' (Please specify)', '');
							// 	$(this).parent().find('label').text(newString).removeClass('error');									

							// }

						} else {

							if(!intRegex.test($(this).val())){

								if(tempString.indexOf(' (Please enter numbers only)') == -1){
									$(this).parent().find('label').append(' (Please enter numbers only)').addClass('error');
								}
								perr.push(1);

							} else {

								var newString = tempString.replace(' (Please enter numbers only)', '');
								$(this).parent().find('label').text(newString).removeClass('error');									
							}

						}

					});


					// Hectares
					$('.hectares_input input').each(function(){

						var tempString = $(this).parent().find('label').text();


						if(!intRegex.test($(this).val())){

							if(tempString.indexOf(' (Please enter numbers only)') == -1){
								$(this).parent().find('label').append(' (Please enter numbers only)').addClass('error');
							}
							perr.push(1);

						} else {

							var newString = tempString.replace(' (Please enter numbers only)', '');
							$(this).parent().find('label').text(newString).removeClass('error');									
						}

					});

					return perr;

				break;

				case 'usage':

					$('.usage_input input').each(function(){

						var tempString = $(this).parent().find('label').text();

						if(!intRegex.test($(this).val())){

							if(tempString.indexOf(' (Please enter numbers only)') == -1){
								$(this).parent().find('label').append(' (Please enter numbers only)').addClass('error');
							}

							perr.push(1);

						} else {

							var newString = tempString.replace(' (Please enter numbers only)', '');

							$(this).parent().find('label').text(newString).removeClass('error');
						}
					});


					$('.vendor select').each(function(){

						var tempString 		= $(this).parent().find('label').text(),
							excludeSelect 	= new Array('Usual Stockfeed Provider','Usual Agro-chemical Provider');

						if($(this).val() == 0 && jQuery.inArray(tempString,excludeSelect) || $(this).val() == 5 && $(this).parent().find('input').val() == ''){

							if(tempString.indexOf(' (Please select provider or supplier)') == -1){
								$(this).parent().find('label').append(' (Please select provider or supplier)').addClass('error');
							}

							perr.push(1);							

						} else {

							var newString = tempString.replace(' (Please select provider or supplier)', '');

							$(this).parent().find('label').text(newString).removeClass('error');

						}

					});

					return perr;

				break;

				case 'account':

					var fertiliserAccount 	= $('.fertiliser-account'),
						resellersAccount 	= $('.resellers'),
						stockfeedsAccount 	= $('.stockfeeds'),
						tempAccount			= new Array(),
						tempreseller		= new Array(),
						tempStockfeeds 		= new Array();

					$('input[name="fertiliser_account_handler[]"]:checked').each(function(){
						tempAccount.push($(this).val());
					});

					if(tempAccount.length == 0){
						fertiliserAccount.find('label').eq(0).text('Please select a company that handles fertiliser account').addClass('error');
						perr.push(1);
					} else {
						fertiliserAccount.find('label').eq(0).empty().removeClass('error');
					}

					$('input[name="resellers[]"]:checked').each(function(){
						tempreseller.push($(this).val());
					});

					if(tempreseller.length == 0){
						resellersAccount.find('label').eq(0).text('Please select a company that handles reseller account').addClass('error');
						perr.push(1);
					} else {
						resellersAccount.find('label').eq(0).empty().removeClass('error');
					}

					$('input[name="stockfeeds[]"]:checked').each(function(){
						tempStockfeeds.push($(this).val());
					});

					if(tempStockfeeds.length == 0){
						stockfeedsAccount.find('label').eq(0).text('Please select a company that handles stockfeeds account').addClass('error');
						perr.push(1);
					} else {
						stockfeedsAccount.find('label').eq(0).empty().removeClass('error');
					}

					return perr;

				break;

				case 'other':

					if($('select[name="how_hear"]').val() == 0){

						$('select[name="how_hear"]').parent().find('label').addClass('error');
						perr.push(1);
					} else {
						$('select[name="how_hear"]').parent().find('label').removeClass('error');
					}

					$('.imp_check select').each(function(){
						
						if($(this).val() == 0){
							$(this).parent().parent().find('label').text('Please make sure to label 1 - 4').addClass('error');
							perr.push(1);
						} else {
							$(this).parent().parent().find('label').empty().removeClass('error');
						}

					});

					return perr;

				break;

			}


			return false;
		}

	});

</script>