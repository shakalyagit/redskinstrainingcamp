<table class="table no-margin table-hover">

<thead>

	<tr class="label-info labelinfo1">

		<th class="text-center">Name</th>

		<th class="text-center">Email</th>

		<th class="text-center">Zip Code</th>

		<th class="text-center">No. of Guests</th>

		<th class="text-center">Date of Registration</th>

		<th class="text-center">Action</th>

	</tr>

</thead>

<tbody>



<?php
if (is_array($guestList) && count($guestList) > 0) {
	foreach ($guestList as $key => $value) {
?>
	<tr id="row">
		<td class="paddtop13 text-center"><?=$value['firstName']?> <?=$value['lastName']?></td>

		<td class="paddtop13 text-center"><?=$value['email']?></td>

		<td class="paddtop13 text-center"><?=$value['zipCode']?></td>

		<td class="paddtop13 text-center"><?=$value['noOfGuests']?></td>

		<td class="paddtop13 text-center"><?=date("F j, Y", strtotime($value['dateOfReg']));?></td>

		<td class="paddtop13 text-center">
			 <span onclick="window.location.href='<?php echo base_url(); ?>guest/view/<?=base64_encode($value['primaryGuestId'])?>';" class="btn btn-sm btn-default btn-circle"><i class="fa fa-search" aria-hidden="true"></i> View</span> 

		</td>

	</tr>

	

<?php } } ?>										

</tbody>

</table>





<div class="margintop20 col-md-6">

	<?php echo $this->ajax_pagination->create_links(); ?>							

</div>

