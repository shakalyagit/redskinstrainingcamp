$(function() {
var count =1;


 $("#add-invitee-trigger").click(function(e) {
     var html='<div class="input-field clearfix">'
                    +'<div class="col-md-3 add friend-firstname">'
                    +'<input type="text" id="guests_'+count+'_firstName" name="guests['+count+'][firstName]" required="required" placeholder="First Name" class="form-control form-control">'
                    +'</div>'
                    +'<div class="col-md-3 add friend-lastname">'
                    +'<input type="text" id="guests_'+count+'_lastName" name="guests['+count+'][lastName]" required="required" placeholder="Last Name" class="form-control form-control">'
                    +'</div>'
                    +'<div class="col-md-3 add friend-email">'
                    +'<input type="email" id="guests_'+count+'_email" name="guests['+count+'][email]" required="required" placeholder="Email" class="form-control form-control">'
                    +'</div>'
                    +'<div class="col-md-3 remove_field ">X</div>'
                    +'</div>';

   
    $(".invitee-list").append(html);
    count++;
   });  

 

    $(document).on('click', '.invitee-row-remove-trigger', function() {
        var row = $(this).closest(".form-row");
        row.hide('slow', function() {
            $(this).remove();
        })
    });
    $("form").validate();
    jQuery(".number-input").rules("add", {
        "number": true
    });
    jQuery(".zipcode-input").rules("add", {
        "zipcodeUS": true,
        "messages": {
            "zipcodeUS": "Please enter a valid US zip code",
        }
    });
});
$(document).ready(function() {
    $(document).on("click", ".remove_field", function(e) {
        
        e.preventDefault();
        if (!confirm('Are you sure you want to remove this friend?')) {
            return false;
        }
        $(this).parent('div').fadeOut('slow', function() {
            $(this).remove();
        });
    });
    $("#registration_primaryGuest_firstName").keypress(function(e) {
       
        var code = e.keyCode || e.which;
        if ((code < 65 || code > 90) && (code < 97 || code > 122)) {
            $('#namespan').html("Only alphabates are allowed");
            return false;
        } else {
            $('#namespan').html("");
            return true;
        }
    });
    $("#last_name").keypress(function(e) {
        var code = e.keyCode || e.which;
        if ((code < 65 || code > 90) && (code < 97 || code > 122)) {
            $('#lastspan').html("Only alphabates are allowed");
            return false;
        } else {
            $('#lastspan').html("");
            return true;
        }
    });
    $("#email").keyup(function() {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var email = $('#email').val();
        if (email.match(mailformat)) {
            $('#email_span').html('');
            return false;
        } else {
            $('#email_span').html('Invalid email');
            return true;
        }
    });
    $("#zip_code").keyup(function() {
        var zip_code = $('#zip_code').val();
        if (isNaN(zip_code)) {
            $('#zip_span').html('Only Number');
            return false;
        } else {
            $('#zip_span').html('');
            return true;
        }
    });
    $("#no_of_guest").keyup(function() {
        var no_of_guest = $('#no_of_guest').val();
        if (isNaN(no_of_guest)) {
            $('#guest_span').html('Only Number');
            return false;
        } else {
            $('#guest_span').html('');
            return true;
        }
    });
    $(".form-focus-trigger").click(function(e) {
        e.preventDefault();
        window.scrollTo(0, document.getElementsByClassName("address")[0].offsetTop);
        if ("#registration_primaryGuest_firstName") {
            $("#registration_primaryGuest_firstName").focus();
        }
    })
})