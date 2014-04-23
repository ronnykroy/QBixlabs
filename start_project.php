<?php include 'header.php'; ?>

<body>
<?php include 'menu.php'; ?>
	
                <div id="inner_right_content" class="flt_right">
                	<div id="cnt_form">
                	<h1><img src="images/folder.png" align="baseline" class="MR_ten">Start a Project</h1>  
                    <p>To help us better understand your project, please provide us with as much information and detail as you can. Although each project varies in pricing according to your needs. Thank you for your interest in QbixLabs!</p>
                   <h4 class="MB_fifteenmp"><img src="images/cnt_icon.png" align="absmiddle" class="MR_ten">Contact information</h4>
                    
                  	<form name="project_frm" id="project_frm" method="post" enctype="multipart/form-data" >
                    	<input type="text" name="project_contact_name" id="project_contact_name" value="" class="MT_ten">
                        <label id="lbl_name_error" class="error_message PL_ten"></label>
                        <input type="text" name="project_contact_company" id="project_contact_company" value="">
                        <label id="lbl_company_error" class="error_message PL_ten"></label>
                        <input type="text" name="project_contact_email" value="" id="project_contact_email" class="frm_medium email_sp"> <input type="text" name="project_contact_confirm_email" id="project_contact_confirm_email" value="" class="frm_medium ML_threerpc">	
                        <label id="lbl_email_error" class="error_message PL_ten"></label>
                        <input type="text" name="project_contact_phone" id="project_contact_phone" value="" class="fld_fgap">
                        <h4><img src="images/bk_icon.png" align="absmiddle" class="MR_ten">About your Project</h4>
                      <input type="text" name="project_url" id="project_url" value="" class="MT_twenty fld_fgap">
                      <textarea name="project_type" id="project_type"></textarea><br />
                        <span class="runningTxt">Are you looking for a specific Content Management System (CMS) such as WordPress or Drupal?</span><br>
                      <div class="MT_fifteen">
                        <input type="radio" name="rd_other" id="rd_other_yes" value="1"  checked="checked" ><span class="runningTxt">Yes</span><input type="radio"  name="rd_other" id="rd_other_no" value="2"  style="margin-left:15px;"><span class="runningTxt">No</span><input class="ML_Ten" type="radio"  name="rd_other" id="rd_other_other" value="3" style="margin-left:15px;"><input type="text" name="project_other" id="project_other" value="" class="frm_medium1 fld_fgap" readonly ="true">
                        </div>
                         <input type="text" name="project_time" id="project_time" value="" class="fld_fgap">
                      <input type="text" name="project_budget" id="project_budget" value="" class="fld_fgap">
                      <input type="text" name="project_heard_from" id="project_heard_from" value="" class="fld_fgap">
                     
                         <div class="runningTxt"><strong>Upload RFP</strong></div>
                      <div class="runningTxt PT_ten">The following file extensions are allowed: pdf, doc, docx, rtf, txt</div>
                         <div class="txt_normal PT_ten txt_gray">                             
                             <div class="inputWrapper flt_left" onFocus="if(this.blur)this.blur()">                                
                                <input type="file" id="project_doc" name="project_doc" title="Choose file" class="MR_ten fileInput hidden ">                                
                             </div>      
                             <label id="file_message" class="file_message flt_left"></label>
                         </div>
                         <div class="messages" style="clear:both;">                            
                            <div id="success_message" class="success_message PL_ten"></div>
                        </div>
                        <label id="error_message" class="error_message PL_ten"></label>
                         <div class="PB_twenty"><input type="image" src="images/send.jpg" name="img_submit" /><img id="img_loader" class="loader_gif" align="top" src="images/loader.gif" alt="" style="display:none;"/></div>
                         <input type="hidden" name="action" id="action" value="project_enquiry_form">
                    </form>
                    </div>
				<?php include 'connect.php'; ?>
            </div>
            </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
