<?php
 $to  = 'anoopnath@qburst.com' ; 
 //$to  = 'bizdev@qbixlabs.com' ;
if(isset($_POST) && isset($_POST['action']) && $_POST['action'] == "contact_form")
{
    //print '<pre>';print_r($_POST);print '<pre>';
    $arr_post = $_POST;
    $error_message = "Please enter valid ";
    $success_message = "Mail send to admin.";
    if(isset($arr_post['contact_name']) && $arr_post['contact_name']=="")
    {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = $error_message. " Name.";
        echo json_encode($ret);
        die();
    }
    if(isset($arr_post['contact_email']) && $arr_post['contact_email']=="")
    {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = $error_message. " Email.";
        echo json_encode($ret);
        die();
    }
    else {
       if(is_valid_email($arr_post['contact_email']) == false)
        {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = $error_message. " Email.";
            echo json_encode($ret);
            die();
        } 
    }
    if(isset($arr_post['contact_description']) && $arr_post['contact_description']=="")
    {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = $error_message. " Message.";
        echo json_encode($ret);
        die();
    }
    
    // subject
    $subject = 'Enquiry from QbixLabs';

    // message
    $message_prefix ="Hi Adminstrator, " . "\r\n<br/>"."\r\n<br/>"."You have recieved a message. ". "\r\n<br/>" ; 
    $message_prefix .="\r\n<br/><strong>Name</strong>: ".$arr_post['contact_name'] ;
    $message_prefix .="\r\n<br/><strong>Email</strong>: ".$arr_post['contact_email'] ;
    $message_prefix .="\r\n<br/><strong>Message</strong>: ".nl2br($arr_post['contact_description']). "\r\n<br/>" ;
    $message_suffix ="\r\n<br/>" ."Thanks, " . "<br/>\r\n".'QbixLabs'. "\r\n<br/>" ;
    $message = $message_prefix.$message_suffix;
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    $headers .= 'To: ContactForm <'.$to.'>' . "\r\n";
    $headers .= 'From: '.$arr_post['contact_name'].' <'.$arr_post['contact_email'].'>' . "\r\n";

    // Mail it
    if(mail($to, $subject, $message, $headers))
    {
        $ret = array();
        $ret['IsSuccess'] = true;
        $ret['Msg'] = $success_message;
        echo json_encode($ret);
        die();
    } else {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = "Please try after sometime.";
        echo json_encode($ret);
        die();
    }
    
}
else if(isset($_POST) && isset($_POST['action']) && $_POST['action'] == "project_enquiry_form")
{
    //print '<pre>';print_r($_POST);print '<pre>';
    //print '<pre>';print_r($_FILES);print '<pre>';
    $max_upload_size ="2048000";
    $allowed_files = array('text/plain',
						'text/richtext','text/rtf',	'application/msword',
						 'application/pdf');
    $arr_post = $_POST;
    $error_message = "Please enter valid ";    
    if(isset($arr_post['project_contact_name']) && $arr_post['project_contact_name']=="")
    {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = $error_message. " Name.";
        echo json_encode($ret);
        die();
    }
    if(isset($arr_post['project_contact_company']) && $arr_post['project_contact_company']=="")
    {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = $error_message. " Company/Organization..";
        echo json_encode($ret);
        die();
    }
    if(isset($arr_post['project_contact_email']) && $arr_post['project_contact_email']=="")
    {
        $ret = array();
        $ret['IsError'] = true;
        $ret['Msg'] = $error_message. " Email.";
        echo json_encode($ret);
        die();
    }
    else {
       if(is_valid_email($arr_post['project_contact_email']) == false)
        {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = $error_message. " Email.";
            echo json_encode($ret);
            die();
        } 
        if(isset($arr_post['project_contact_confirm_email']) && $arr_post['project_contact_confirm_email']=="")
        {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = $error_message. " Confirm Email.";
            echo json_encode($ret);
            die();
        } else {
          if($arr_post['project_contact_email'] != $arr_post['project_contact_confirm_email'])
            {
                $ret = array();
                $ret['IsError'] = true;
                $ret['Msg'] = "Enter Email and Confirm Email as same.";
                echo json_encode($ret);
                die();
            }  
        }
    }
    $file_arr = array();
    if(isset($_FILES ['project_doc'] ) && isset($_FILES['project_doc']['size']) && $_FILES['project_doc']['size']>0)
    {
        $file_arr = $_FILES['project_doc'];
        if($file_arr['size'] > $max_upload_size)
        {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = "File size exceeds the limit of ".($max_upload_size/1024)." MB.";
            echo json_encode($ret);
            die();
        }
        if(!in_array($file_arr['type'],$allowed_files) )
        {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = "File not of valid file type .";
            echo json_encode($ret);
            die();
        }
    }
    
    $subject = 'Project Enquiry from QbixLabs';
    // message
    $message ="Hi Adminstrator, " . "\r\n<br/>"."\r\n<br/>"."You have recieved a Project Enquiry. ". "\r\n<br/>" ; 
    $message .="\r\n<br/><strong>Name</strong>: ".$arr_post['project_contact_name'] ;
    $message .="\r\n<br/><strong>Company/Organization</strong>: ".$arr_post['project_contact_company'] ;
    $message .="\r\n<br/><strong>Email</strong>: ".$arr_post['project_contact_email'] ;
    $message .="\r\n<br/><strong>Telephone</strong>: ".$arr_post['project_contact_phone'] ;
    $message .="\r\n<br/><strong>Current Website URL</strong>: ".$arr_post['project_url'] ;
    $message .="\r\n<br/><strong>Project Type</strong>: ".$arr_post['project_type'] ;
    $str_other ="Are you looking for a specific Content Management System (CMS) such as WordPress or Drupal?";
    if($arr_post['rd_other'] == 1)
    {
        $message .="\r\n<br/><strong>".$str_other."</strong>: "."Yes" ;
    } else if($arr_post['rd_other'] == 2)
    {
        $message .="\r\n<br/><strong>".$str_other."</strong>: "."No" ;
    }else if($arr_post['rd_other'] == 3)
    {
        $message .="\r\n<br/><strong>".$str_other."</strong>: ".$arr_post['project_other'] ;
    }
    $message .="\r\n<br/><strong>Project Time Frame</strong>: ".$arr_post['project_time'] ;
    $message .="\r\n<br/><strong>Budget</strong>: ".$arr_post['project_budget'] ;
    $message .="\r\n<br/><strong>How did you hear about Qbix Labs?</strong>: ".nl2br($arr_post['project_heard_from']). "\r\n<br/>" ;
    $message .="\r\n<br/>" ."Thanks, " . "<br/>\r\n".'QbixLabs'. "\r\n<br/>" ;    
    mail_attachment($file_arr, $to, $arr_post['project_contact_email'], 
            $arr_post['project_contact_name'], $arr_post['project_contact_email']
            , $subject, $message);
    
}
function is_valid_email($email) {
    return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
}
function mail_attachment($file, $mailto, $from_mail, $from_name, $replyto, $subject, $message)
{
    $success_message = "Enquiry send to admin.";
    $temp_file = isset($file['tmp_name']) ? $file['tmp_name'] : "";
    if($temp_file != "")
    {
        $filename = isset($file['name']) ? $file['name'] : "";
        $content = file_get_contents($temp_file);
        $content = chunk_split(base64_encode($content));
        $uid = md5(uniqid(time()));
        $header = "From: ".$from_name." <".$from_mail.">\r\n";
        $header .= "Reply-To: ".$replyto."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        $header .= "--".$uid."\r\n";
        $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
        $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $header .= $message."\r\n\r\n";
        $header .= "--".$uid."\r\n";
        $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
        $header .= "Content-Transfer-Encoding: base64\r\n";
        $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
        $header .= $content."\r\n\r\n";
        $header .= "--".$uid."--";
        if (mail($mailto, $subject, "", $header)) 
        {
            $ret = array();
            $ret['IsSuccess'] = true;
            $ret['Msg'] = $success_message;
            echo json_encode($ret);
            die();
        } else {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = "Please try after sometime." ;
            echo json_encode($ret);
            die();
        }
    } else {
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: Project Enquiry Form <'.$mailto.'>' . "\r\n";
        $headers .= 'From: '.$from_name.' <'.$from_mail.'>' . "\r\n";
        if(mail($mailto, $subject, $message, $headers))
        {
            $ret = array();
            $ret['IsSuccess'] = true;
            $ret['Msg'] = $success_message;
            echo json_encode($ret);
            die();
        } else {
            $ret = array();
            $ret['IsError'] = true;
            $ret['Msg'] = "Please try after sometime.";
            echo json_encode($ret);
            die();
        }
    }
}
?>
