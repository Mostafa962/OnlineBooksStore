<!-- footer -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
//Send Data By as A JSON Object
<script type="text/javascript">
    $(document).on('click','#submit',function(){
        var form = $('#contact').serialize();
         var url = $('#contact').attr('action');
         $.ajax({
            url:url,
            dataType:'json',
            data:form,
            type:'post',
            beforeSend: function(){
                $('.errors h1').empty();
                $('.errors ul').empty();

            },success: function(data){
                if (data.status == true) {
                    // $('#table tbody').append(data.results);
                    $('#contact').reset();
                    alert('done');
                }
            },error:function(data_error,exception){
                if (exception=='error') {
                    $('.errors h1').html(data_error.responseJSON.message);
                    var errorsList=''
                    $.each(data_error.responseJSON.errors,function(index,v){
                        errorsList += '<li>'+v+'</li>';
                    });
                    $('.errors ul').html(errorsList);
                }
            }
         });
        return false;
    });
</script> -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids wthree-agile">

				<div class="col-lg-6 footer-grid-left">
					<h3>contact Us</h3>
					<form method="POST" action="{{route('contact')}}" id="contact">
						@csrf
						<input type="text" name="fullname" placeholder= "enter your full name" required="required">
						<input type="email" name="email" placeholder="enter your email address"  required="required">
						<textarea name="message"  required="required" placeholder="Message..."></textarea>
						<input type="submit" id="submit" value="Send" >
					</form>
				</div>
				<div class="col-lg-6 footer-grid-left">
					<h3>about us</h3>
					<p>We are Start up Online Website For Storing Books about Computer Science and Software Engineering,Computers Books is the one of biggest  Books Store in Middle East .We offer Books For Free to read and download Books in PDF Format.! 
						<span>This Website is developed and Edited By <a href="">Mostafa</a> ALy Elegebaly  and Design By<a href="">W3layouts.</a></span>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-bottom">
				<div class="footer-bottom-left-whtree-agileinfo">
					<p>&copy <?php echo date('Y'); ?> Computers Books. All rights reserved | Developd by <a href="http://w3layouts.com/">Mostafa Elgebaly.</a></p>
				</div>
				<div class="footer-bottom-right-whtree-agileinfo">
					<ul>
						<li><a href="https://web.facebook.com/MELgebaly96" target="_blank" class="btn btn-social-icon btn-facebook">
						    <span class="fa fa-facebook"></span>
						  </a></li>
						 <li><a href="https://twitter.com/melgebaly48" target="_blank" class="btn btn-social-icon btn-twitter">
						    <span class="fa fa-twitter"></span>
						  </a></li>
						  	<li><a href="https://github.com/Mostafa962" target="_blank" class="btn btn-social-icon btn-github">
						    <span class="fa fa-github"></span>
						  </a></li>
						<li><a class="btn btn-social-icon btn-linkedin" target="_blank"  href="https://www.linkedin.com/in/mostafa-elgebaly-b2b386123/">
						    <span class="fa fa-linkedin"></span>
						  </a></li>
						  <li><a href="https://instagram.com/Mgebaly96?" target="_blank" class="btn btn-social-icon btn-instagram">
						    <span class="fa fa-instagram"></span>
						  </a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
	<script src="{{url('webFrontEnd/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
</body>
</html>