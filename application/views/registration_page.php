<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Redskins Training Camp Registration</title>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
      <script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   </head>
   <body class="landing">
      <div class="container-fluid">
         <div class="row">
            <div class="right-panel-container">
               <div class="right-panel">
                  <div class="custom-logo">
                     <img src="<?php echo base_url();?>assets/img/logo.png" attr="redskins logo">
                  </div>
                  <div class="player-img">
                     <img src="<?php echo base_url();?>assets/img/player-images.png">
                  </div>
               </div>
            </div>
            <div class="left-panel-container">
               <div class="left-panel">
                  <h4>Bon Secours Training Center, 2401 W Lelgh St, Richmond, VA 23220</h4>
                  <h4 class="text-center"><strong>2018 Redskins Training Camp</strong></h4>
                  <div class="registration_form">
                     <?php if(validation_errors() != false) { ?> 
                     <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                     </div>
                  <?php } ?>

<?php $attributes  = array('name' => 'registration', 'class' => 'clearfix'); echo form_open(base_url(), $attributes ); ?> 
                  
                     <div class="<?php echo ($primaryGuestId>1 ? 'hide' : ''); ?>">
                        <div class="input-field clearfix">
                           <div class="col-md-6">
                              <input type="text" id="registration_primaryGuest_firstName" name="firstName"  placeholder="First Name" required="required"  class="form-control form-control" />
                              
                           </div>
                           <div class="col-md-6">
                              <input type="text" id="registration_primaryGuest_lastName" name="lastName"  placeholder="Last Name" required="required" class="form-control form-control" />
                           </div>
                        </div>
                        <div class="input-field clearfix">
                           <div class="col-md-6">
                              <input type="email" id="registration_primaryGuest_email" name="email"  placeholder="Email" required="required" class="form-control form-control" />
                           </div>
                           <div class="col-md-6">
                              <input type="text" id="registration_primaryGuest_zipCode" name="zipCode" class="form-control zipcode-input form-control" placeholder="Zip Code" size="5" maxLength="5" maxlength="5" minlength="5" />
                           </div>
                        </div>
                        <div class="input-field clearfix">
                           <div class="col-md-6">
                              <select id="registration_noOfGuests" name="noOfGuests" placeholder="No. of Guests" class="form-control form-control">
                                 <option value="">No. of Guests</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="14">14</option>
                                 <option value="15">15</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                              </select>
                           </div>
                        </div>
                        <div class="input-field clearfix" style="margin-top: 25px;">
                           <div class="col-md-12">
                              <div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_seasonTicketWaitlist" name="seasonTicketWaitlist" value="1" />
                                 Yes, I would like to sign up for the FREE Season Ticket Waitlist.
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="input-field clearfix">
                           <div class="col-md-12">
                              <div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_womensClub" name="womensClub" value="1" />
                                 Yes, I would like to sign up for the FREE Redskins Women's club.
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="input-field clearfix">
                           <div class="col-md-12">
                              <div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_offers" name="offers" value="1" />
                                 Yes, I would like to receive special offers from the Redskins and her Partner*.
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="input-field clearfix">
                           <div class="col-md-12">
                              <div class="checkbox"><label><input type="checkbox" id="registration_primaryGuest_subscriptions_saluteMilitaryAppreciationClub" name="appreciationClub" value="1" />
                                 Yes, I would like to sign up for the FREE Redskins Salute Military Appreciation Club.
                                 </label>
                              </div>
                           </div>
                        </div>

                  </div> 

<div class="text-center">
<?php
if($primaryGuestId>0){
?>

<div class="col-md-12 thank">
<span class="thankyou">THANK YOU FOR SIGNING UP!</span>
</div>
<div class="col-md-12 thank">
<div class="col-md-12">
<span class="gst">GUEST</span>
</div>
<div class="col-md-12">
<span class="frname"><?=$primaryGuestDetails['firstName'];  ?> <?=$primaryGuestDetails['lastName'];  ?></span>
<span class="fremail"><?=$primaryGuestDetails['email'];  ?></span>
</div>

      <?php if (is_array($guestDetails) && count($guestDetails)) { ?>

      <?php foreach ($guestDetails as $key => $value) { ?>

            <div class="col-md-12">
            <span class="frname"><?=$value['firstName'];?> <?=$value['lastName'];?></span>
            <span class="fremail"><?=$value['email'];?></span>
            </div>

 
<?php } } ?>
</div>
<?php } ?>
     
</div>

                        <div class="invatation_details">
                           <p>
                              Invite your friends and family to the Redskins Training Camp. You are not required to register kids 13 and under - your Fan Mobile Pass will also be valid for their entry.
                           </p>
                        </div>
                        
                        <div style="margin-left:10%;" class="input_fields_wrap invitee-list form-inline"></div>
                        <div class="input-field clearfix text-center">
                           <div class="col-md-12">
                              <input type="button" name="addfriends" value="+ Add Friends" class="addfriend" id="add-invitee-trigger">
                              <input type="submit" name="getregisterd" value="Submit">
                           </div>
                        </div>
                        <div class="hide">
                           <div class="form-group">
                              <div class="form-group collection-items registration_guests_form_group" data-prototype="" data-prototype-name="__name__" data-prototype-label="__name__label__" id="collectionregistration_guests_form_group"></div>
                           </div>
                           <INPUT type="hidden" NAME="registration_control"  value="<?php echo $primaryGuestId; ?>"> 
                        </div>

                        
                     </form>
                     <div class="details_reg">
                        <p>Entry is first come, first serve. Date of camp are subject to change. See complete schedule and more information at <a href="http://www.redskins.com/trainingcamp" target="_blank">redskins.com/trainingcamp.</a> <br /><br />
                           * Please share my email address with NBC Universal, so NBC Universal can send me information about special offer and promotion. I have read and agree to <a href="https://tracking.cirrusinsight.com/6305dab5-367d-4a0f-a674-87d2e81e6e99/nbcuniversal-com-privacy" target="_blank"> NBC UNERVERSAL’S PRIVACY POLICY. </a><br /><br /><br />
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="add_friend"></div>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
      <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
   </body>
</html>