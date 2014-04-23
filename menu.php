<?php $page = basename($_SERVER['REQUEST_URI']);  if ($_GET['page'] == 1) { ?>

<div id="inner_body_wrap">
    <div class="page_wrap PT_zero">
        <div class="nest_wrap">
            <div id="innerLogo" class="flt_left">
                <figure><img src="images/Logo.png" width="214" height="85" /></figure>
            </div>
        </div>
        <div class="nest_wrap" id="inner_cnt_wrap">
            <div id="inner_leftnav" class="flt_left">
                <nav class="web_app">
                    <a href="#" class="menu_ic"></a><span class="innerLogo_sm"><img src="images/Logo.png" /></span>
                    <ul>
                        <li><a href="index.html" <?php echo $page=="index.html"? 'class="current_tab"':'';?>>Home</a></li>
                        <li><a href="about.html" <?php echo $page=="about.html"? 'class="current_tab"':'';?>>About</a></li>
                        <li><a href="web-development.html" <?php echo $page=="labs.html" || $page=="mobile-apps.html" || $page=="web-development.html" || $page=="sentiment-analysis.html" ? 'class="current_tab"':'';?>>Services</a>
                       
                            <ol>
                            	<li><a href="labs.html" <?php echo $page=="labs.html"? 'class="txt_hilite"':'';?>>Innovation Labs</a></li>
                                <li><a href="mobile-apps.html" <?php echo $page=="mobile-apps.html"? 'class="txt_hilite"':'';?>>Mobile Apps</a></li>
                                <li><a href="web-development.html" <?php echo $page=="web-development.html"? 'class="txt_hilite"':'';?>>Web development</a></li>
                                <li><a href="sentiment-analysis.html" <?php echo $page=="sentiment-analysis.html"? 'class="txt_hilite"':'';?>>Sentiment Analysis</a></li>
                                <li><a href="management-consulting.html" <?php echo $page=="management-consulting.html"? 'class="txt_hilite"':'';?>>Management Consulting</a></li>
                            </ol>
                        </li>
                        <li><a href="careers.html" <?php echo $page=="careers.html"? 'class="current_tab"':'';?>>Careers</a></li>
                        <li><a href="contact.html" <?php echo $page=="contact.html"? 'class="current_tab"':'';?>>Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            
<?php } else { ?>
      <div id="rightnav">
            <nav>
   		<ul>				
                    <li><a href="index.html" class="current_tab_home">Home</a></li>
                    <li><a href="about.html" <?php echo $page=="about.html"? 'class="current_tab"':'';?>>About</a></li>
                    <li><a href="web-development.html" <?php echo $page=="web-development.html"? 'class="current_tab"':'';?>>Services</a></li>
                    <li><a href="careers.html" <?php echo $page=="careers.html"? 'class="current_tab"':'';?>>Careers</a></li>
                    <li><a href="contact.html" <?php echo $page=="contact.html"? 'class="current_tab"':'';?>>Contact Us</a></li>
                </ul>
	     </nav>
            </div>
    
<?php } ?>            