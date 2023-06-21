$(document).ready(function(){
    $(".verify_btn").click(function(){
        var user_id =  $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to verified this user",
            icon: 'warning',
            animation: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No', 
        }).then((result) => {
            if (result.value) {
                $(".verify_btn"+user_id).css('pointer-events','none');
                $(".verify_btn"+user_id).html("Please wait...");
                
                $.ajax({
                    url: "verify",
                    type: 'PUT',
                    data: { "_token": $('meta[name="csrf-token"]').attr('content'), user_id: user_id },
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == 'success'){
                            $(".response_success").html(response.message);
                            $(".response_success").show();
                            $(".verify_btn"+user_id).html("Verified");
                            $(".verify_reject_btn"+user_id).css('pointer-events','none');
                        } else{
                            $(".response_error").html(response.message);
                            $(".response_error").show();
                            $(".verify_btn"+user_id).html("Verify");
                        }
                    },
                    error: function(xhr, status, error) {
                        $(".response_error").html("Something wrong. Please try again!");
                        $(".response_error").show();
                        $(".verify_btn"+user_id).html("Verify");
                    },
                    complete : function() {
                        setTimeout(function(){
                            $(".alert").hide();
                        }, 7000);
                    }
                });
            }
        });
    });
    
    $(".verify_reject_btn").click(function(){
        $('.bd-example-modal-sm').modal('show');
        $("#user_id").val($(this).attr('data-id'));
    });
    
    $(".modal_close").click(function(){
        $('.bd-example-modal-sm').modal('hide')
        $(".btn_user_reject").prop('disabled', false);
    });

    $(".btn_user_reject").click(function(){
        $(".btn_user_reject").prop('disabled', true);
        $(".btn_user_reject").html("Please wait...");
        var reject_cause =  $("#reject_cause").val();
        var user_id =  $("#user_id").val();

        $.ajax({
            url: "user-reject",
            type: 'PUT',
            data: { "_token": $('meta[name="csrf-token"]').attr('content'), "user_id": user_id, "reject_cause": reject_cause },
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success'){
                    $(".response_success").html(response.message);
                    $(".response_success").show();
                    $(".verify_reject_btn"+user_id).css('pointer-events','none');
                    $(".verify_reject_btn"+user_id).html("Rejected");
                    $(".verify_btn"+user_id).css('pointer-events','none');
                } else{
                    $(".response_error").html(response.message);
                    $(".response_error").show();
                }
            },
            error: function(xhr, status, error) {
                $(".response_error").html("Something wrong. Please try again!");
                $(".response_error").show();
            },
            complete : function() {
                $('.bd-example-modal-sm').modal('hide')
                $(".btn_user_reject").prop('disabled', true);
                $(".btn_user_reject").html("Submit");
                $("#reject_cause").val('');
                $("#user_id").val('');
                setTimeout(function(){
                    $(".alert").hide();
                }, 7000);
            }
        });
    });
    
    // $(document).on('click', '.btn_edit_profile', function() {
    //     // e.preventDefault();
    //     $(".btn_edit_profile").prop('disabled', true);
    //     $(".btn_edit_profile").html("Please wait...");

    //     var photo = $('#profile_image').prop('files')[0];
    //     var first_name =  $("#first_name").val();
    //     var middle_name =  $("#middle_name").val();
    //     var last_name =  $("#last_name").val();
    //     var contact_number =  $("#contact_number").val();
    //     var company_address =  $("#company_address").val();
    //     var zip_code =  $("#zip_code").val();
    //     var state =  $("#state").val();
    //     var country =  $("#country").val();
    //     var department =  $("#department").val();
    //     var user_role =  $("#user_role").val();
    //     var zip_code =  $("#zip_code").val();
        
    //     if(first_name == ''){
    //         $(".first_name_error").html("First name is required");
    //         $(".btn_edit_profile").prop('disabled', false);
    //         $(".btn_edit_profile").html("Submit");
    //     } else if(last_name == ''){
    //         $(".last_name_error").html("Last name is required");
    //         $(".btn_edit_profile").prop('disabled', false);
    //         $(".btn_edit_profile").html("Submit");
    //     } else if(contact_number == ''){
    //         $(".contact_number_error").html("Last name is required");
    //         $(".btn_edit_profile").prop('disabled', false);
    //         $(".btn_edit_profile").html("Submit");
    //     } else if(company_address == ''){
    //         $(".company_address_error").html("Address name is required");
    //         $(".btn_edit_profile").prop('disabled', false);
    //         $(".btn_edit_profile").html("Submit");
    //     } else if(zip_code == ''){
    //         $(".zip_code_error").html("Zip is required");
    //         $(".btn_edit_profile").prop('disabled', false);
    //         $(".btn_edit_profile").html("Submit");
    //     } else{
    //         $.ajax({
    //             url: "user-edit",
    //             type: 'POST',
    //             // contentType: 'multipart/form-data',
    //             // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //             // data: formData,
    //             data: { "_token": $('meta[name="csrf-token"]').attr('content'), "first_name": first_name, "middle_name": middle_name, "last_name": last_name, 'contact_number': contact_number, 'company_address': company_address, 'zip_code': zip_code, 'state': state, 'country': country, 'user_role': user_role, 'department': department },
    //             dataType: 'json',
    //             // cache : false,
    //             // processData: false,
    //             success: function(response) {
    //                 $(".btn_edit_profile").prop('disabled', false);
    //                 $(".btn_edit_profile").html("Submit");
    //                 if(response.status == 'success'){
    //                     $(".response_success").html(response.message);
    //                     $(".response_success").show();
    //                 } else{
    //                     $(".response_error").html(response.message);
    //                     $(".response_error").show();
    //                 }
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log(xhr?.responseJSON);
    //                 $(".btn_edit_profile").prop('disabled', false);
    //                 $(".btn_edit_profile").html("Submit");
    //                 $(".response_error").html("Something wrong. Please try again!");
    //                 $(".response_error").show();
    //             },
    //             complete : function() {
    //                 setTimeout(function(){
    //                     $(".response_success").hide();
    //                     $(".response_error").hide();
    //                 }, 5000);
    //             }
    //         });
    //     }
    // });


    
    $("form#profile_edit_form").on("submit",function (e) {
        e.preventDefault();
        $(".btn_edit_profile").prop('disabled', true);
        $(".btn_edit_profile").html("Please wait...");
        $(".cls_err").html("");
        var formData = new FormData(this);

        var first_name =  $("#first_name").val();
        var middle_name =  $("#middle_name").val();
        var last_name =  $("#last_name").val();
        var contact_number =  $("#contact_number").val();
        var company_address =  $("#company_address").val();
        var zip_code =  $("#zip_code").val();
        var state =  $("#state").val();
        var country =  $("#country").val();
        var department =  $("#department").val();
        var user_role =  $("#user_role").val();
        
        if(first_name == ''){
            $(".first_name_error").html("First name is required");
            $(".btn_edit_profile").prop('disabled', false);
            $(".btn_edit_profile").html("Submit");
        } else if(last_name == ''){
            $(".last_name_error").html("Last name is required");
            $(".btn_edit_profile").prop('disabled', false);
            $(".btn_edit_profile").html("Submit");
        } else if(contact_number == ''){
            $(".contact_number_error").html("Last name is required");
            $(".btn_edit_profile").prop('disabled', false);
            $(".btn_edit_profile").html("Submit");
        } else if(company_address == ''){
            $(".company_address_error").html("Address name is required");
            $(".btn_edit_profile").prop('disabled', false);
            $(".btn_edit_profile").html("Submit");
        } else if(zip_code == ''){
            $(".zip_code_error").html("Zip is required");
            $(".btn_edit_profile").prop('disabled', false);
            $(".btn_edit_profile").html("Submit");
        } else{
            $.ajax({
                url : 'user-edit',
                type : "post",
                data : formData,
                dataType : 'json',
                success:function (response) {
                    $(".btn_edit_profile").prop('disabled', false);
                    $(".btn_edit_profile").html("Submit");
                    if(response.status == 'success'){
                        $(".response_success").html(response.message);
                        $(".response_success").show();
                        $(".user_name").html(first_name+' '+middle_name+' '+last_name);
                        $(".contact_number").html(contact_number);
                        $(".company_address").html(company_address);
                        $(".zip_code").html(zip_code);
                        $(".state").html(state);
                        $(".country").html(country);
                        $(".department").html(department);
                        $(".user_role").html(user_role);
                    } else{
                        $(".response_error").html(response.message);
                        $(".response_error").show();
                    }
                },
                contentType: false,
                processData: false,
                error: function(xhr, status, error) {
                    $(".btn_edit_profile").prop('disabled', false);
                    $(".btn_edit_profile").html("Submit");
                    $(".response_error").html("Something wrong. Please try again!");
                    $(".response_error").show();
                },
                complete : function() {
                    setTimeout(function(){
                        $(".response_success").hide();
                        $(".response_error").hide();
                    }, 5000);
                }
            });
        }
    });
    
    $(document).on('click', '.btn_save_comment', function() {
        $(".btn_save_comment").prop('disabled', true);
        $(".btn_save_comment").html("Please wait...");
        $(".cls_err").html("");
        $(".invalid-feedback").hide();

        var comment =  $("#comment").val();
        var base_url = window.location.origin;
        
        if(comment == ''){
            $(".invalid-feedback").show();
            $(".comment_error").html("Comment is required");
            $(".btn_save_comment").prop('disabled', false);
            $(".btn_save_comment").html("Submit");
        } else{
            console.log($('meta[name="csrf-token"]').attr('content'));
            $.ajax({
                url : base_url+'/user-session-comment',
                type : "POST",
                data : { "_token": $('meta[name="csrf-token"]').attr('content'), "comment": comment },
                dataType : 'json',
                success:function (response) {
                    $(".btn_save_comment").prop('disabled', false);
                    $(".btn_save_comment").html("Submit");
                    if(response.status == 'success'){
                        $("#comment").val("");
                        $("#comment_data").html("");
                        $("#comment_data").append(response.data);
                        // $(".response_success").html(response.message);
                        // $(".response_success").show();
                    } else{
                        // $(".response_error").html(response.message);
                        // $(".response_error").show();
                    }
                },
                error: function(xhr, status, error) {
                    $(".btn_save_comment").prop('disabled', false);
                    $(".btn_save_comment").html("Submit");
                    // $(".response_error").html("Something wrong. Please try again!");
                    // $(".response_error").show();
                },
                complete : function() {
                    setTimeout(function(){
                        // $(".response_success").hide();
                        // $(".response_error").hide();
                    }, 5000);
                }
            });
        }
    });

    $(document).on('click', '#btn_save_session', function() {
        $(".btn_save_session").prop('disabled', true);
        $(".btn_save_session").html("Please wait...");
        $(".cls_err").html("");
        $(".invalid-feedback").hide();

        var session_id =  $("#session_id").val();
        var product =  $("#product").val();
        var start_date =  $("#start_date").val();
        var end_date =  $("#end_date").val();
        var demographic =  $("#demographic").val();
        var kpi =  $("#kpi").val();
        var region =  $("#region").val();
        var prescriber_specialty =  $("#prescriber_specialty").val();

        var filter_obj = JSON.stringify({ "product": product, "start_date": start_date, "end_date": end_date, "demographic": demographic, "kpi": kpi, "region": region, "prescriber_specialty": prescriber_specialty });
        var url = "save-user-session"
        var method = "POST";
        var base_url = window.location.origin;
        
        if(session_id != ""){
            url = base_url+"/save-user-session-update/"+session_id;
            var method = "PUT";
        }

        $.ajax({
            url : url,
            type : method,
            data : { "_token": $('meta[name="csrf-token"]').attr('content'), "filter_obj": filter_obj },
            dataType : 'json',
            success:function (response) {
                $(".btn_save_session").prop('disabled', false);
                $(".btn_save_session").html("Save Session");
                if(response.status == 'success'){
                    $(".response_success").html(response.message);
                    $(".response_success").show();
                } else{
                    $(".response_error").html(response.message);
                    $(".response_error").show();
                }
            },
            error: function(xhr, status, error) {
                $(".btn_save_session").prop('disabled', false);
                $(".btn_save_session").html("Save Session");
                $(".response_error").html("Something wrong. Please try again!");
                $(".response_error").show();
            },
            complete : function() {
                setTimeout(function(){
                    $(".response_success").hide();
                    $(".response_error").hide();
                }, 5000);
            }
        });
    });

    $('.selectpicker').selectpicker();
    
});

function handleImage(event) {
    console.log("event: ",event);
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }

}


/** Infinite scroll pagination - Start */

var page = 1;
$("#post-data").scroll(function() {
    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        loadMoreData(page);
    }
});

function loadMoreData(page){
    $.ajax({
            url: 'get-product?page=' + page,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        }).done(function(data){
            console.log(data);
            if(data.html == " "){
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $("#post-data").append(data.html);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            console.log('server not responding...');
        });
}

/** Infinite scroll pagination - End */