<?php include 'header.php'; ?>
<body>
<?php include 'menu.php'; ?>
                        <div id="inner_right_content" class="flt_right loc_map">
                                <h1 style="margin:2% 0 5% 4%;">Contact</h1>

                                <div class="contact_box MB_thrirtyfive">
                                <div class="acnt_line">
                                <strong>571-210-0271</strong></div>
                                <div class="adv_line MT_ten"><strong>12700 Fair Lakes Circle,<br />
                                Suite 160,<br />
                                Fairfax, VA 22033.</strong>
                                </div>
                        </div>
                 	<div class="contact_box">
                        	<strong>SEND US A MESSAGE</strong>

                        		<input type="text" name="contact_name" id="contact_name" value="" class="MT_ten">
                                <input type="text"  name="contact_email" id="contact_email" value="" class="MT_ten">
                                <textarea  name="contact_description" id="contact_description" class="MT_ten"></textarea>
                    		   <div class="messages">
                                    <div id="success_message" class="success_message" style="display:none;"></div>
                                    <div id="error_message"  class="error_message" style="display:none;"></div>
                                </div>
                    			<img src="images/submit.png" width="130" height="45" class="MT_ten" id="contact_submit" style="cursor:pointer;" >
                                <div class="req_message" >* All fields are mandatory</div> 
                   </div>

                  <div class="ML_fourpc MT_tenpc"><?php include 'connect.php'; ?></div>
	        </div>
    </div>
    </div>
<?php include 'footer.php'; ?>
    
</body>
</html>
