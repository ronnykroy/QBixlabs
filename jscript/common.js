/**
 * Created with JetBrains PhpStorm.
 * User: sugun
 * Date: 30/10/12
 * Time: 5:17 PM
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){
$('.menu_ic').click(function(){
    var left_pos = parseInt($('#inner_leftnav nav').css('left'));
    if(left_pos<0){
        init_pos = left_pos;
        $('#inner_leftnav nav').stop().animate({
            left: 0
        },200);
    } else {
        $('#inner_leftnav nav').stop().animate({
            left: init_pos
        },200);
    }
});
    $('div').not('#inner_leftnav,#inner_cnt_wrap,#inner_body_wrap,.PT_zero').click(function(){
        var left_pos = parseInt($('#inner_leftnav nav').css('left'));
        if(left_pos == 0){
            $('#inner_leftnav nav').stop().animate({
                left: init_pos
            },200);
        }
    });    
    if($('#contact_name').length)
    {    
        $('#contact_name').Watermark("Name");
        $('#contact_email').Watermark("Email");
        $('#contact_description').Watermark("Message");    
        $('#contact_submit').live('click',function(){
              var err_message ="Please enter valid ";
              if($.trim($('#contact_name').val())=="" || $.trim($('#contact_name').val())=="Name")  
              {
                  show_alert(err_message+ " Name.","error");
                  $('#contact_name').focus();
                  return false;
              }
              if($.trim($('#contact_email').val())=="" || $.trim($('#contact_email').val())=="Email")  
              {
                  $('#contact_email').focus();
                  show_alert(err_message+ " Email.","error");return false;
              }
              else {
                  if(validate_email($.trim($('#contact_email').val())) == false)
                  {
                    $('#contact_email').focus();
                    show_alert(err_message+ " Email.","error");return false;
                  }
              }
              if( $.trim($('#contact_description').val()) =="" || $.trim($('#contact_description').val())=="Message")  
              {
                  $('#contact_description').focus();
                  show_alert(err_message+ " Message.","error");return false;
              }
              $.ajax({
                  type: "POST",
                  url: "mail_send.php",
                  data: {contact_name: $.trim($('#contact_name').val()),
                      contact_email: $.trim($('#contact_email').val()),
                      contact_description: $.trim($('#contact_description').val() ),
                      action:"contact_form"}
                }).done(function( msg ) {
                  if(msg)
                  {
                      var obj_data = jQuery.parseJSON(msg);
                      if(obj_data.IsSuccess)
                      {                   
                        show_alert(obj_data.Msg,"success");  
                        $('#contact_name').val("Name");
                        $('#contact_email').val("Email");
                        $('#contact_description').val("Message");
                      }else if(obj_data.IsError) {
                        show_alert(obj_data.Msg,"error");
                     }                      
                  }
                });

        });
    }
    if($('#project_contact_name').length)
    {
        
        init_watermark();
        jQuery("#project_frm").live("submit", function(){
              var err_message ="Please enter valid ";
              $('.error_message').html("");
              if($.trim($('#project_contact_name').val())=="" || $.trim($('#project_contact_name').val())=="Name*")  
              {
                  show_error(err_message+ " Name.","lbl_name_error");
                  $('#project_contact_name').focus();
                  return false;
              }
              if($.trim($('#project_contact_company').val())=="" || $.trim($('#project_contact_company').val())=="Company/Organization*")  
              {
                  show_error(err_message+ " Company/Organization.","lbl_company_error");
                  $('#project_contact_company').focus();
                  return false;
              }
              if($.trim($('#project_contact_email').val())=="" || $.trim($('#project_contact_email').val())=="Email*")  
              {
                  $('#project_contact_email').focus();
                  show_error(err_message+ " Email.","lbl_email_error");
                  return false;
              }
              else {
                  if(validate_email($.trim($('#project_contact_email').val())) == false)
                  {
                    $('#project_contact_email').focus();
                    show_error(err_message+ " Email.","lbl_email_error");
                    return false;
                  }
                  if($.trim($('#project_contact_confirm_email').val())=="" || $.trim($('#project_contact_confirm_email').val())=="Confirm Email*")  
                  {
                      $('#project_contact_confirm_email').focus();
                      show_error(err_message+ " Confirm Email.","lbl_email_error"); 
                      return false;
                  } else {
                      if( $.trim($('#project_contact_email').val()) != $.trim($('#project_contact_confirm_email').val()) )                         
                      {                          
                          $('#project_contact_confirm_email').focus();
                          show_error("Enter Email and Confirm Email as same.","lbl_email_error");
                          return false;
                      }
                  }
              }
              $('#img_loader').show();
              jQuery(this).ajaxSubmit({
               url: "mail_send.php",
               success: function(data){
                  if(data)
                  {
                      var obj_data = jQuery.parseJSON(data);
                      if(obj_data.IsSuccess)
                      {                   
                        show_success(obj_data.Msg,"success_message");  
                        jQuery("#project_frm").resetForm();
                        init_watermark();
                      }else if(obj_data.IsError) {
                        show_error(obj_data.Msg,"error_message");
                     }
                     $('#img_loader').hide();
                     $('#file_message').html('');
                  }
               }
              });
              return false;
        });
    }
    
    $('#rd_other_other').live('click',function(){
        $('#project_other').removeAttr('readonly');
        $('#project_other').focus();
    });  
    $('#project_other').live('click',function(){
        $('#rd_other_other').attr('checked',true);
        $('#project_other').removeAttr('readonly');
    }); 
    $('#rd_other_yes , #rd_other_no').live('click',function(){
        $('#project_other').attr('readonly',true);
    });
    $('#project_doc').live('change',function(){
          var file_name = $(this).val();
          var n=file_name.lastIndexOf("\\");
          if(n != -1)
          {
              var str = file_name.substr(n+1,file_name.length);
              $('#file_message').html(str);
          } else {
              $('#file_message').html(file_name);
          }          
          //setTimeout("$('#file_message').html('');", 6000); 
    });
});

function show_alert(message,msg_type)
{
  if(msg_type=="success")
  {
      $('#success_message').html(message);
      $('#success_message').show(); 
      setTimeout("$('#success_message').hide(200);", 6000);
  } else if(msg_type=="error")
  {
      $('#error_message').html(message);
      $('#error_message').show(); 
      setTimeout("$('#error_message').hide(200);", 6000);
  }  
}
function show_error(message,lbl_id)
{
  $('#'+lbl_id).html(message);
  $('#'+lbl_id).show(); 
  setTimeout("$('#"+lbl_id+"').html('');", 6000); 
}
function show_success(message,lbl_id)
{
  $('#'+lbl_id).html(message);
  $('#'+lbl_id).show(); 
  setTimeout("$('#"+lbl_id+"').html('');", 6000); 
}
function validate_email($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( !emailReg.test( $email ) ) {
    return false;
  } else {
    return true;
  }
}

function init_watermark()
{
    $('#project_contact_name').Watermark("Name*");    
    $('#project_contact_company').Watermark("Company/Organization*");
    $('#project_contact_email').Watermark("Email*");
    $('#project_contact_confirm_email').Watermark("Confirm Email*");
    $('#project_contact_phone').Watermark("Telephone");
    $('#project_url').Watermark("Current Website URL");
    $('#project_type').Watermark("Project Type");
    $('#project_other').Watermark("Other");
    $('#project_time').Watermark("Project Time Frame");
    $('#project_budget').Watermark("Budget");
    $('#project_heard_from').Watermark("How did you hear about Qbix Labs?");
}


