<!DOCTYPE html>

<html class="no-js"> 

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Login</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />

  <script src="<?php echo base_url(); ?>assets/js/validator.js"></script>

</head>

<body>

  <div class="content">

    <div class="icon-item text--center">

      <a href="javascript:void(0)">

        <img src="<?php echo base_url(); ?>assets/img/mobile_logo.png" style="margin-top:20px;">

      </a>

    </div>

    <div id="fb-root"></div>
    <!-- <h3 class="h3custom">EMPLOYEE PORTAL</h3> -->

    <p class="primary-font primary-font--semibold background-line push--top push--bottom">

      <span style="color: black;">Redskins Training Camp </span>

    </p>

    <?php if(validation_errors() != false) { ?> 

      <div class="alert alert-danger" style="text-align: center;">

          <?php echo validation_errors(); ?>

      </div>

    <?php } ?>

    <?php if($this->session->flashdata('error_msg')) { ?>
          <div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?php echo $this->session->flashdata('error_msg'); ?></strong> 
          </div>
        <?php } ?>

 <?php $validator = array('role' => 'form', 'data-toggle' => 'validator'); echo form_open('admin', $validator); ?> 

      <div class="form-group push-tiny--top flush--bottom " id="input-container">

        <input type="username"  name="userName"

          class="text-input square--bottom "

            placeholder="User name"

          value="<?php echo set_value('userName', isset($data['userName']) ? $data['userName'] : ''); ?>" id="userName" autofocus autocomplete="off" maxlength="50" />

      </div>

      <div class="form-group push--bottom">

        <input type="password" name="password" value=""

          class="text-input square--top "

          placeholder="Password" id="password" style="margin-top:15px;" maxlength="20"  />

      </div>

      
      <button  type="submit" class="btn btn--large btn--full" type="submit" style="background:#3C8DBC">Sign In</button>  

    </form> 


<div style="margin-top: 10px;">

<p class="primary-font primary-font--semibold background-line push--top push--bottom">

     

    </p>


  </div>

  <style type="text/css">

    .has-error.has-danger input, .has-error input, .has-danger input, .has-error.has-danger textarea, .has-error textarea, .has-danger textarea, .has-error.has-danger select, .has-error select, .has-danger select {

      border-color: #a94442 !important;

      box-shadow: 0px 0px 0px #fff !important;

    }

    .alert {

      margin-top: 10px;

      margin-bottom: 10px;

    }

    html { 
    background: url(<?php echo base_url()  ?>assets/img/FedExField01.jpg) no-repeat center center fixed #000; 
    background-size: cover;
  }
  body{
    background: none;
  }
.content {
    margin: 0 auto;
    padding: 0 20px;
    max-width: 440px;
    margin-top: 30px;
    background: rgba(255, 255, 255, 0.6);
    padding-bottom: 10px;
}
  </style>

</body>

</html>