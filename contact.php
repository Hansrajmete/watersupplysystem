<?php
include 'header.php'
?>
<!-- content -->
<div class="container">
<div class="main">
<div class="contact">				
					<div class="contact_info">
						<h2>get in touch</h2>
			    	 		<div class="map">
					   			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7569.17032914259!2d73.853086!3d18.457135!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x871eddd0a8a0a108!2sPune+Institute+of+Computer+Technology!5e0!3m2!1sen!2sus!4v1473526818893" width="100% height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
					   		</div>
      				</div>
				  <div class="contact-form">
			 	  	 	<h2>Contact Us</h2>
			 	 	    <form method="post" action="contact-post.php">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input name="userName" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="userEmail" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span><input name="userPhone" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Subject</label></span>
						    	<span><textarea name="userMsg"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" class="" value="Submit us"></span>
						  </div>
					    </form>
				    </div>
  				<div class="clearfix"></div>		
			  </div>
</div>
</div>

<?php
include 'footer.php'
?>
</body>
</html>