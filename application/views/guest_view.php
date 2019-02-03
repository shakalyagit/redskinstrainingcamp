<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header content-header1">
	<?php
		$firstName= set_value('firstName', isset($primaryGuestDetails['firstName']) ? $primaryGuestDetails['firstName'] : 'New');
		$lastName= set_value('lastName', isset($primaryGuestDetails['lastName']) ? $primaryGuestDetails['lastName'] : 'Guest');
		$name = "(".$firstName.' '.$lastName.")";
	?>
		<h1>View guest details <?php echo $name; ?></h1>
		<div class="breadcrumb topright">
			<button data-toggle="control-sidebar" class="btn btn-outline green btn-sm opo addressEdit opened btn-circle mcfr addcatbtn active pad2_10 view" onclick="window.location.href='<?php echo base_url(); ?>dashboard'"><i style="font-size: 16px;" ></i> Back</button>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="col-md-12 custom-padding-0">
			<!-- tab section -->
			<div class="col-md-12 custom-padding-0">
				<div class="nav-tabs-custom">
					
					<div class="tab-content no-padding">
						<div id="home" class="tab-pane fade in active">
							<div class="box-body" id="">
								<div class="col-xs-12 col-md-12">
									<div class="col-lg-6 col-sm-12 col-xs-12 margintop10 paddingleft0">
										<h4><label>Primary guest Info</label></h4>
										<hr/>
										<table class="table no-margin table-hover">
											<tr>
												<td>Name</td>
												<td>:</td>
												<td><b style=" color: #f48120;"><?=$primaryGuestDetails['firstName'];?> <?=$primaryGuestDetails['lastName'];?></b></td>
											</tr>
											<tr>
												<td>Date of registration</td>
												<td>:</td>
												<td><b style=" color: #f48120;"><?=date("d-m-Y",strtotime($primaryGuestDetails['dateOfReg']));?></b></td>
											</tr>
											<tr>
												<td>Email</td>
												<td>:</td>
												<td><b style=" color: #f48120;"><?=$primaryGuestDetails['email'];?></b></td>
											</tr>
											<tr>
												<td>Zip Code</td>
												<td>:</td>
												<td><b style=" color: #f48120;"><?=$primaryGuestDetails['zipCode'];?></b></td>
											</tr>
											<tr>
												<td>No. of Guests</td>
												<td>:</td>
												<td><b style=" color: #f48120;"><?=$primaryGuestDetails['noOfGuests'];?></b></td>
											</tr>
											<tr>
												<?php
												 $ischecked=($primaryGuestDetails['seasonTicketWaitlist']==1 ? 'checked' : '');
												 ?>
												<td colspan="3">
													<div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_seasonTicketWaitlist" name="seasonTicketWaitlist" value="1" <?=$ischecked;?> disabled />
					                                 Yes, I would like to sign up for the FREE Season Ticket Waitlist.
					                                 </label>
					                              </div>
												</td>
											</tr>
											<tr>
												<?php
												 $ischecked=($primaryGuestDetails['womensClub']==1 ? 'checked' : '');
												 ?>
												<td colspan="3">
													<div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_womensClub" name="womensClub" value="1" <?=$ischecked;?> disabled />
					                                 Yes, I would like to sign up for the FREE Redskins Women's club.
					                                 </label>
					                              </div>
												</td>
											</tr>
											<tr>
												<?php
												 $ischecked=($primaryGuestDetails['offers']==1 ? 'checked' : '');
												 ?>
												<td colspan="3">
													 <div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_offers" name="offers" value="1" <?=$ischecked;?> disabled />
					                                 Yes, I would like to receive special offers from the Redskins and her Partner*.
					                                 </label>
					                              </div>
												</td>
											</tr>
											<tr>
												<?php
												 $ischecked=($primaryGuestDetails['appreciationClub']==1 ? 'checked' : '');
												 ?>
												<td colspan="3">
													  <div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_saluteMilitaryAppreciationClub" name="appreciationClub" value="1" <?=$ischecked;?> disabled />
					                                 Yes, I would like to sign up for the FREE Redskins Salute Military Appreciation Club.
					                                 </label>
					                              </div>
												</td>
											</tr>
											<tr>
												<td>Barcode</td>
												<td>:</td>
												<td><img src="<?php echo base_url(); ?>assets/barcode/P_<?=$primaryGuestDetails['primaryGuestId']; ?>.png" width="160" id="show_admin_image"></td>
												
											</tr>
										</table>
										<h4><label>Guest barcode</label></h4>
										<hr/>
										<div class="col-xs-12 col-md-12">
											<?php
											$noOfGuests = $primaryGuestDetails['noOfGuests'];
											if($noOfGuests>0){
											for ($i = 1; $i <= $noOfGuests; $i++){
												$barcode = 'P_'.$primaryGuestDetails['primaryGuestId'].'_G_'.$i;

											?>
											<div class="col-xs-4 col-md-4">
												<img src="<?php echo base_url(); ?>assets/barcode/<?=$barcode; ?>.png" width="160" id="show_admin_image">
											</div>

											<?php } }else{ ?>
												<div >
												  <strong>No guest found!</strong>
												</div>
											<?php } ?>
										</div>
									</div>




									<div class="col-lg-6 col-sm-12 col-xs-12 margintop10 paddingright0">
										<h4><label>Invited Friends and Family info</label></h4>
										<hr/>
									<table class="table no-margin table-hover">
									<thead>
										<tr class="label-info labelinfo1">
											<th class="text-center">Name</th>
											<th class="text-center">Email</th>
											<th class="text-center">Barcode</th>
										</tr>
									</thead>	
									<?php
									if (is_array($guestDetails) && count($guestDetails) > 0) {
										foreach ($guestDetails as $key => $value) {

										$barcode = "P_".$value['primaryguestId'].'_F_'.$value['guestId'];
									?>	
									<tr>
										<td><?=$value['firstName'];?> <?=$value['lastName'];?></td>
										<td><?=$value['email'];?></td>
										<td><img src="<?php echo base_url(); ?>assets/barcode/<?=$barcode; ?>.png" width="160" id="show_admin_image"></td>
									</tr>
									<?php } }else{ ?>
										<tr><td> <strong>No invitation found!</strong></td></tr>
									<?php } ?>
									</table>
									</div>						

								</div>
									
								</div>
							</div>
						</div>
						
					</div>
					
		</div>
				</div>
			</div>
			<!-- ./tab section -->
			

	</section>


</div>


<script type="text/javascript">
	function upload_photo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        if(input.files[0].type.indexOf("image") == -1) 
		{ 
			$('#siteLogoError').show();
			return false; 
		}else{ 

	        reader.onload = function (e) {
	        	$('#siteLogoError').hide();
	            $('#uploaded_img').attr('src', e.target.result).height(95);
	        }
    	}

        reader.readAsDataURL(input.files[0]);
    }
}


function calculate()
{
	var TotalPay = parseInt($('#total_pay').val());


	if(TotalPay=='' || isNaN(TotalPay))
	{
		
		$("#total_pay").css("border-color", "red");
		
	}else{

		var BasicPer = '<?php echo isset($payroll['basic_pay']) ? $payroll['basic_pay'] : ''; ?>';

		var HraPer = '<?php echo isset($payroll['hra']) ? $payroll['hra'] : ''; ?>';

		var MedicalAllow = '<?php echo isset($payroll['medical']) ? $payroll['medical'] : ''; ?>';

		var LtaAllow = '<?php echo isset($payroll['ta']) ? $payroll['ta'] : ''; ?>';
		//alert(HraPer);
		
		$("#total_pay").css("border-color", "");

		var basic = (TotalPay * (BasicPer/100));
		$("#basic_pay").val(basic);

		var hra = (basic * (HraPer/100));
		$("#hra").val(hra);

		var medical = MedicalAllow;
		$("#medical").val(medical);

		var lta = LtaAllow;
		$("#ta").val(lta);

		var conv = TotalPay - (parseInt(basic) + parseInt(hra) + parseInt(medical) + parseInt(lta));

		
		$("#conveyance").val(conv);

		var pf = (basic * 0.12);
		$("#provident_fund").val(pf);

		//Professional tax slab 

		var gross_earnings = parseInt(basic) + parseInt(hra) + parseInt(medical) + parseInt(lta) + parseInt(conv);
		var professional_tax = 0;
		if(gross_earnings > 10000 && gross_earnings <= 15000)
		{
			professional_tax = 110;

		}else if(gross_earnings > 15000 && gross_earnings <= 25000)
		{
			professional_tax = 130;

		}else if(gross_earnings > 25000 && gross_earnings <= 40000)
		{
			professional_tax = 150;
		}else if(gross_earnings > 40000)
		{
			professional_tax = 200;
		}
		
		//$("#profession_tax").val(professional_tax);

	}
 
	
}


$(document).ready(function() {
    $('select.EmpType').change(function() {
    	
        var PfValue = $('select.EmpType').find(':selected').data('pf');
        if (PfValue == '1') {
    	
            $('#pf_deduct_cheek').iCheck('check');
            $('#pf_deduct').val('1');
            $('#pf_deduct_div').show();
         }else{
         	$('#pf_deduct_cheek').iCheck('uncheck');
         	$('#pf_deduct').val('0');
         	$('#pf_deduct_div').hide();
         }
    });

    $('select.marital_status').change(function() {
    	
    	var Mstatus = $('#marital_status').val();
    	if(Mstatus=='married')
    	{
    		$("#no_of_child_div").show();
    	}else{
    		$("#no_of_child").val('0');
    		$("#no_of_child_div").hide();
    	}
        
    });
});




</script>


