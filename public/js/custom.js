
// validation

(function () {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()

  
  $(document).ready(function(){
    $(".get_next_step").click(function(){
      $(".get_next_step").css('pointer-events','none');
      $(".get_next_step").html("Please wait...");
      $(".error_cls").html("");
      $(".invalid-feedback").show();

      var email = $("#email").val();
      
      if($("#first_name").val() == ''){
        $(".first_name_error").html("First name is required");
        $(".get_next_step").css('pointer-events','visible');
        $(".get_next_step").html("Next");
      } else if($("#last_name").val() == ''){
        $(".get_next_step").css('pointer-events','visible');
        $(".last_name_error").html("Last name is required");
        $(".get_next_step").html("Next");
      } else if($("#email").val() == ''){
        $(".get_next_step").css('pointer-events','visible');
        $(".email_error").html("Company email is required");
        $(".get_next_step").html("Next");
      } else if($("#user_role").val() == ''){
        $(".get_next_step").css('pointer-events','visible');
        $(".user_role_error").html("Role is required");
        $(".get_next_step").html("Next");
      } else{
          $.ajax({
            url: "register",
            type: 'POST',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), "email": email },
            dataType: 'json',
            success: function(response) {    
              $(".get_next_step").css('pointer-events','visible');
              $(".get_next_step").html("Next");          
            },
            error: function(xhr, status, error) {
              $(".get_next_step").css('pointer-events','visible');
              $(".get_next_step").html("Next");
              if(xhr?.responseJSON?.errors?.email){
                $(".response_error").html(xhr?.responseJSON?.errors?.email[0]);
                $(".response_error").show();
              } else{
                $(".step_one").hide();
                $(".step_two").show();
              }
            },
            complete : function() {
                setTimeout(function(){
                    $(".errormsg").hide();
                    $(".successmsg").hide();
                }, 7000);
            }
          });
      }

    });

    $(".register_btn").click(function(){
      $(".register_btn").css('pointer-events','none');
      $(".register_btn").html("Please wait...");
      $(".error_cls").html("");
      $(".invalid-feedback").show();
      
      var first_name = $("#first_name").val();
      var last_name = $("#last_name").val();
      var email = $("#email").val();
      var user_role = $("#user_role").val();
      var password = $("#password").val();
      var password_confirmation = $("#password_confirmation").val();
      var trams_of_conditions_status = $('#trams_of_conditions_status').is(':checked');

      if(password == ''){
        $(".password_error").html("Password is required");
        $(".register_btn").css('pointer-events','visible');
        $(".register_btn").html("Register");
      } else if(password_confirmation == ''){
        $(".password_confirmation_error").html("Re-enter password is required");
        $(".register_btn").css('pointer-events','visible');
        $(".register_btn").html("Register");
      } else if(!trams_of_conditions_status){
        $(".trams_of_conditions_status_error").html("This is required");
        $(".register_btn").css('pointer-events','visible');
        $(".register_btn").html("Register");
      } else{
        $.ajax({
          url: "register",
          type: 'POST',
          data: { "_token": $('meta[name="csrf-token"]').attr('content'), "first_name": first_name, "last_name": last_name, "email": email, "user_role": user_role, "password": password, "password_confirmation": password_confirmation, "trams_of_conditions_status": trams_of_conditions_status },
          dataType: 'json',
          success: function(response) {
            console.log("response: ",response);
              if(response.status == 'success'){
                  $(".response_success").html(response.message);
                  $(".response_success").show();
                  $("#first_name").val("");
                  $("#last_name").val("");
                  $("#email").val("");
                  $("#user_role").val("");
                  $("#password").val("");
                  $("#password_confirmation").val("");
                  $('#trams_of_conditions_status').prop('checked', false);
                  $(".step_two").hide();
                  $(".step_one").show();
              } else{
                  $(".response_error").html(response.message);
                  $(".response_error").show();
                  $(".register_btn").css('pointer-events','visible');
                  $(".register_btn").html("Register");
              }
          },
          error: function(xhr, status, error) {
            $(".register_btn").css('pointer-events','visible');
            $(".register_btn").html("Register");
            if(xhr?.responseJSON?.errors?.password){
              $(".response_error").html(xhr?.responseJSON?.errors?.password[0]);
              $(".response_error").show();
            } else{
              $(".response_error").html("Something wrong. Please try again!");
              $(".response_error").show();
            }
          },
          complete : function() {
              setTimeout(function(){
                  $(".errormsg").hide();
                  $(".successmsg").hide();
              }, 7000);
          }
        });
      }

    });

    $(".reset_password").click(function(){
      $(".reset_password").css('pointer-events','none');
      $(".reset_password").html("Please wait...");
      $(".password_error").html("");
      $(".password_confirmation_error").html("");
      $(".invalid-feedback").show();

      var password = $("#password").val();
      var password_confirmation = $("#password_confirmation").val();
      var email = $("#email").val();
      
      if(password == ''){
        $(".password_error").html("Password is required");
        $(".reset_password").css('pointer-events','visible');
        $(".reset_password").html("Save Password");
      } else if(password_confirmation == ''){
        $(".password_confirmation_error").html("Re-enter password is required");
        $(".reset_password").css('pointer-events','visible');
        $(".reset_password").html("Save Password");
      } else{
        document.getElementById("resetPasswordForm").submit();
      }
    });
    
    $(".send_password_reset_link").click(function(){
      $(".send_password_reset_link").css('pointer-events','none');
      $(".send_password_reset_link").html("Please wait...");
      $(".email_error").html("");
      $(".invalid-feedback").show();;
      
      if($("#email_reset").val() == ''){
        $(".email_error").html("Email is required");
        $(".send_password_reset_link").css('pointer-events','visible');
        $(".send_password_reset_link").html("Send Password Reset Link");
      } else{
        // document.getElementById("send_password_reset_link_form").submit();
        $.ajax({
          url: "password/email",
          type: 'POST',
          data: { "_token": $('meta[name="csrf-token"]').attr('content'), "email": $("#email_reset").val() },
          dataType: 'json',
          success: function(response) {
            console.log("response: ",response);
            $(".send_password_reset_link").css('pointer-events','visible');
            $(".send_password_reset_link").html("Send Password Reset Link");
              if(response.status == 'success'){
                  $(".response_success").html(response.message);
                  $(".response_success").show();
                  $("#email_reset").val("");
              } else if(response.status == 'error'){
                $(".response_error").html(response.message);
                $(".response_error").show();
              } else{
                  $(".response_error").html("Something wrong. Please try again!");
                  $(".response_error").show();
              }
          },
          error: function(xhr, status, error) {
            $(".send_password_reset_link").css('pointer-events','visible');
            $(".send_password_reset_link").html("Send Password Reset Link");
            if(xhr?.responseJSON?.errors?.email){
              $(".response_error").html(xhr?.responseJSON?.errors?.email[0]);
              $(".response_error").show();
            } else{
              $(".response_error").html("Something wrong. Please try again!");
              $(".response_error").show();
            }
          },
          complete : function() {
              setTimeout(function(){
                  $(".errormsg").hide();
                  $(".successmsg").hide();
              }, 5000);
          }
        });
      }
    });

    /** Dynamic Register - Start */
      $(".add_user_btn").click(function(){
        $(".add_user_btn").css('pointer-events','none');
        $(".add_user_btn").html("Please wait...");
        $(".error_cls").html("");
        $(".invalid-feedback").show();
        
        var token = $("#token").val();
        var first_name = $("#first_name").val();
        var company_name = $("#company_name").val();
        var last_name = $("#last_name").val();
        var company_address = $("#company_address").val();
        var email = $("#email").val();
        var zip_code = $("#zip_code").val();
        var contact_number_1 = $("#contact_number_1").val();
        var contact_number_2 = $("#contact_number_2").val();
        var contact_number_3 = $("#contact_number_3").val();
        var contact_number = "+1"+contact_number_1+contact_number_2+contact_number_3;
        var user_role = $("#user_role").val();

        if(first_name == ''){
          $(".first_name_error").html("First name is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(last_name == ''){
          $(".last_name_error").html("Last name is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(email == '' ){
          $(".email_error").html("Email is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(validMail(email) === false){
          $(".email_error").html("Invalid email address");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(contact_number_1 == ''){
          $(".contact_number_error").html("Please enter valid contact number");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(contact_number_2 == ''){
          $(".contact_number_error").html("Please enter valid contact number");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(contact_number_3 == ''){
          $(".contact_number_error").html("Please enter valid contact number");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(user_role == ''){
          $(".user_role_error").html("User role is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(company_name == ''){
          $(".company_name_error").html("Company name is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(company_address == ''){
          $(".company_address_error").html("Company address is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else if(zip_code == ''){
          $(".zip_code_error").html("Zip code is required");
          $(".add_user_btn").css('pointer-events','visible');
          $(".add_user_btn").html("Add User");
        } else{
          $.ajax({
            url: $("#url").val(),
            type: 'POST',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), "first_name": first_name, "last_name": last_name, "email": email, "user_role": user_role, "company_name": company_name, "company_address": company_address, "zip_code": zip_code, "contact_number": contact_number, "token": token },
            dataType: 'json',
            success: function(response) {
              console.log("response: ",response);
              $(".add_user_btn").css('pointer-events','visible');
              $(".add_user_btn").html("Add User");
              if(response.status == 'success'){
                  $(".response_success").html(response.message);
                  $(".response_success").show();
                  $(".show_data").html("");
                  $(".show_data").append(response.data);
                  $("#first_name").val("");
                  $("#last_name").val("");
                  $("#email").val("");
                  $("#contact_number").val("");
                  $("#contact_number_1").val("");
                  $("#contact_number_2").val("");
                  $("#contact_number_3").val("");
                  $("#user_role").val("");
              } else{
                  $(".response_error").html(response.message);
                  $(".response_error").show();
              }
            },
            error: function(xhr, status, error) {
              $(".add_user_btn").css('pointer-events','visible');
              $(".add_user_btn").html("Add User");
              if(xhr?.responseJSON?.errors?.email){
                $(".response_error").html(xhr?.responseJSON?.errors?.email[0]);
                $(".response_error").show();
              } else{
                $(".response_error").html("Something wrong. Please try again!");
                $(".response_error").show();
              }
            },
            complete : function() {
                setTimeout(function(){
                    $(".errormsg").hide();
                    $(".successmsg").hide();
                }, 7000);
            }
          });
        }

      });

    $(document).on('click', '.submit_user_btn', function() {
      $(".submit_user_btn").css('pointer-events','none');
      $(".submit_user_btn").html("Please wait...");
      $(".invalid-feedback").hide();
      var url = $("#surl").val();
      var success_url = $("#susurl").val();
      var trams_of_conditions_status = $('#trams_of_conditions_status').is(':checked');
      
      if(!trams_of_conditions_status){        
        $(".invalid-feedback").show();
        $(".trams_of_conditions_status_error").html("This is required");
        $(".submit_user_btn").css('pointer-events','visible');
        $(".submit_user_btn").html("Submit");
      } else{
        $.ajax({
          url: url,
          type: 'POST',
          data: { "_token": $('meta[name="csrf-token"]').attr('content'), "token": $("#token").val(), "trams_of_conditions_status": trams_of_conditions_status },
          dataType: 'json',
          success: function(response) {
            console.log("response: ",response);
            $(".submit_user_btn").css('pointer-events','visible');
            $(".submit_user_btn").html("Submit");
            if(response.status == 'success'){
                location.replace(success_url+"/"+$("#token").val());
                $(".response_success").html(response.message);
                $(".response_success").show();
                $(".show_data").html("");
                $("#trams_of_conditions_status").prop("checked", false);
            } else{
                $(".response_error").html(response.message);
                $(".response_error").show();
            }
          },
          error: function(xhr, status, error) {
            $(".submit_user_btn").css('pointer-events','visible');
            $(".submit_user_btn").html("Submit");
            $(".response_error").html("Something wrong. Please try again!");
            $(".response_error").show();
          },
          complete : function() {
              setTimeout(function(){
                  $(".errormsg").hide();
                  $(".successmsg").hide();
              }, 7000);
          }
        });
      }
    });

    $(document).on('click', '.temp_user_delete', function() {
      var use_id = $(this).attr('data-id');
      var url = $(this).attr('data-url');
      var token = $(this).attr('data-token');
      
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this user",
        icon: 'warning',
        animation: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No', 
      }).then((result) => {
        if (result.value) {
          $(".tempdel"+use_id).css('pointer-events','none');
          $(".tempdel"+use_id).html("wait...");

          $.ajax({
            url: url,
            type: 'POST',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), "temp_user_id": use_id, "token": token },
            dataType: 'json',
            success: function(response) {
              $(".tempdel"+use_id).css('pointer-events','visible');
              $(".tempdel"+use_id).html("Delete");
              if(response.status == 'success'){
                  console.log("response: ",response);
                  $(".response_success").html(response.message);
                  $(".response_success").show();
                  $(".show_data").html("");
                  $(".show_data").append(response.data);
              } else{
                  $(".response_error").html(response.message);
                  $(".response_error").show();
              }
            },
            error: function(xhr, status, error) {
              $(".tempdel"+use_id).css('pointer-events','visible');
              $(".tempdel"+use_id).html("Delete");
              $(".response_error").html("Something wrong. Please try again!");
              $(".response_error").show();
            },
            complete : function() {
                setTimeout(function(){
                    $(".errormsg").hide();
                    $(".successmsg").hide();
                }, 7000);
            }
          });
        }
      });      

      /** Dynamic Register - end */

      
    });

    /** Email validation */
    function validMail(mail){
        return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+([^<>()\.,;:\s@\"]{2,}|[\d\.]+))$/.test(mail);
    }

    $("#lat_area").addClass("d-none");
    $("#long_area").addClass("d-none");

  });

  /** Update Password Start */
  $(document).on('click', '.update_password', function() {
    $(".update_password").css('pointer-events','none');
    $(".update_password").html("Please wait...");
    $(".password_error").html("");
    $(".password_confirmation_error").html("");
    $(".invalid-feedback").show();

    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    var email = $("#email").val();
    
    if(password == ''){
      $(".password_error").html("Password is required");
      $(".update_password").css('pointer-events','visible');
      $(".update_password").html("Save Password");
    } else if(password_confirmation == ''){
      $(".password_confirmation_error").html("Re-enter password is required");
      $(".update_password").css('pointer-events','visible');
      $(".update_password").html("Save Password");
    } else{
      $.ajax({
        url: $("#url").val(),
        type: 'POST',
        data: { "_token": $('meta[name="csrf-token"]').attr('content'), "email": email, "password": password, 'password_confirmation': password_confirmation },
        dataType: 'json',
        success: function(response) {
          $(".update_password").css('pointer-events','visible');
          $(".update_password").html("Save Password");
          if(response.status == 'success'){
              $(".response_success").html(response.message);
              $(".response_success").show();
              $("#password").val("");
              $("#password_confirmation").val("");
          } else{
              $(".response_error").html(response.message);
              $(".response_error").show();
          }
        },
        error: function(xhr, status, error) {
          $(".update_password").css('pointer-events','visible');
          $(".update_password").html("Save Password");
          if(xhr?.responseJSON?.errors?.password){
            $(".response_error").html(xhr?.responseJSON?.errors?.password[0]);
            $(".response_error").show();
          } else{
            $(".response_error").html("Something wrong. Please try again!");
            $(".response_error").show();
          }
        },
        complete : function() {
            setTimeout(function(){
                $(".errormsg").hide();
                $(".successmsg").hide();
            }, 7000);
        }
      });
    }
  });
  /** Update Password End */

  function validate(event){
    if ((event.keyCode < 48 || event.keyCode > 57)) {
      event.returnValue = false;
    }
  }


  google.maps.event.addDomListener(window, 'load', initialize);

  function initialize() {
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          $('#latitude').val(place.geometry['location'].lat());
          $('#longitude').val(place.geometry['location'].lng());

      // --------- show lat and long ---------------
          $("#lat_area").removeClass("d-none");
          $("#long_area").removeClass("d-none");
      });
  }