<?php include 'header.php'; ?>
<head>
    <script>
        $(function () {
            window.onorientationchange = function() { var orientation = window.orientation; switch(orientation) { case 0: window.location.reload(); break; case 90: window.location.reload(); break; case -90: window.location.reload(); break; } }
            $('#slides').slides({
                preload:true,
//                preloadImage:'images/loading.gif',
                play:5000,
                pause:3000,
//                crossfade:2000,
                hoverPause:true,fadeSpeed:2000,slideSpeed:350,effect:'fade',crossfade:false
            });
	    $('.slides_container img').css('width','100%');
        });
    </script>
</head>

<body>
<div class="page_wrap">
  <header>
        <div class="nest_wrap">
           <div id="logo" class="flt_left">
                  <figure><img src="images/Logo.png" width="214" height="85" /></figure>
            </div>
            <?php include 'menu.php'; ?>
        </div>
            <div id="banner_slide" class="clear">
                <div id="slides" class="nest_wrap">
                <div class="slides_container">
                    <img src="images/Banner-1.png"  alt="baner" />
                    <img src="images/Banner-2.png"  alt="baner"/>
                    <img src="images/Banner-3.png"  />
                </div>
               </div>
  </div>
             	
  </header>
  
  <article class="MT_sixtyfive">
   		<section class="tricolumn flt_left MB_thrirtyfive">
           	<figure align="center"><img src="images/Mob.png" width="124" height="120" class="img1"  /> </figure>
            <h2>Mobile</h2>
            <p>We can help your organization chart out a mobile strategy and implement it. Whether you’re a bootstrapped startup, a small or medium-sized business, or an established  company, we understand the unique challenges you face each day. <span class="more_link"><em><a href="mobile-apps.html">Learn more...</a></em></span></p>
        </section>
        <section class="tricolumn flt_left">
           	<figure align="center"><img src="images/Web.png" class="img2" /> </figure>
            <h2>Web Apps</h2>
            <p>We have expertise developing a broad range of web applications from content management systems to highly available and secure enterprise applications. <span class="more_link"><em><a href="web-development.html">Learn more...</a></em></span></p>
        </section>
        <section class="tricolumn flt_left">
           	<figure align="center"><img src="images/Data.png" class="img3" /> </figure>
            <h2>Management Consulting</h2>
            <p>As part of our management consulting services, we offer services in the areas of business strategy, organizational transformation, human capital management, business process improvement, program management and information technology strategy. <span class="more_link"><em><a href="management-consulting.html">Learn more...</a></em></span></p>
        </section>
  </article>
 
  </div>
  <div class="sub_section clear nest_wrap">
  	<article class="page_wrap nest_wrap PB_twenty">
        	<section class="qtr_column flt_left qtr_divider">
            	<h2>Team Extension</h2>
                <p>We can help accelerate your development process by working with your team in an agile, collaborative way to accomplish defined milestones. Our engineers will work hand-in-hand with your team to help you meet the project goals.</p>
            </section>
            <section class="qtr_column flt_left qtr_divider">
            	<h2 class="h_space">Full Life Cycle Dev</h2>
                <p>If you have a new internal project we can build it, launch it, and then transition to your internal team. You get a dedicated team with zero incremental operating cost to your organization. We take responsiblity for optimizing resources to meet your milestones and deliverables.</p>
            </section>
            <section class="qtr_column flt_left qtr_divider">
            	<h2 class="h_space">On Demand</h2>
                <p>If your recruiting efforts are taking too long or you are looking for a back-fill positions, we can help you fill in the normal peaks-and valleys of development by having the QbixLabs resources available to you anytime, on demand helping you meet your project goals on time.</p>
            </section>
            <section class="qtr_column flt_left">
            	<h2 class="h_space">Have a project?</h2>
                <p>email: bizdev@qbixlabs.com</p><p class="or"><strong>or</strong></p><p><span class="str_pro"><a href="start-project.html">Start a Project</a></span></p>
            </section>
        </article>
    </div>
    <div class="tech_logos">
    	<div class="page_wrap PB_twenty tech_logos nest_wrap">
   	    	<ul>
                <li class="PT_ten"><img src="images/Php.png"></li>
                <li class="img_logos"><img src="images/Ruby.png"></li>
                <li class="img_logos"><img src="images/Java.png"></li>
                <li class="img_logos"><img src="images/Drupal.png"></li>
                <li class="img_logos"><img src="images/Lamp.png"></li>
                <li class="PT_ten img_logos"><img src="images/Wordpress.png"></li>
            </ul>
        </div>
        
    </div>
    <div class="page_wrap"><?php include 'connect.php'; ?></div>
<?php include 'footer.php'; ?>
</body>
</html>
