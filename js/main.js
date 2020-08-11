$(function(){
// USER registration..........................................
	$('#register').on('click',function(){

		var name = $('#name').val();
		var username = $('#username').val();
		var password = $('#password').val();
		var email = $('#email').val();

		var dataString = 'name='+name+"&username="+username+"&password="+password+"&email="+email;
		// document.write(dataString);

		$.ajax({
			url:"check/checkUserRegister.php",
			method: "POST",
			data: dataString,
			dataType:'text',
			success:function(reflection)
			{
				if(reflection)
				{
				
					$("#msg").html(reflection);
				
				}
			} 
		});

		return false;
	});

// user login........................................
	$('#userlogin').click(function(){
		var email = $('#logemail').val();
		var password = $('#logpassword').val();

		var dataString = "email="+email+"&password="+password;
		// document.write(dataString);
		$.ajax({
			url:"check/checkUserLogin.php",
			method: "POST",
			data: dataString,
			dataType: 'text',
			success:function(reflection)
			{
				if($.trim(reflection)== 'empty')
				{
					$(".empty").show(4000);
						$(".empty").hide(2000);
					
				}
				else if($.trim(reflection)== 'disable')
				{
				
					$(".disable").show(4000);
					setInterval(function(){
						$(".disable").fadeOut()
					},2000);					
				}
				else if($.trim(reflection)== 'error')
				{				
					$(".error").show(4000);
					setTimeout(function(){
						$(".error").fadeOut()
					},3000);	
				}
				else{
					window.location = "exam.php ";
				}

			}
		});
		return false;
		
	});

	// Profile Update.......................

	$('#profileUdt').on('click',function(){
		var udtuserId = $('#udtuserId').val();
		var udtname = $('#udtname').val();
		var udtusername = $('#udtusername').val();
		var udtemail = $('#udtemail').val();

		var dataString = "udtuserId="+udtuserId+'&udtname='+udtname+"&udtusername="+udtusername+"&udtemail="+udtemail;
		// document.write(dataString); 

		$.ajax({
			url:"check/checkUserProfileUdt.php",
			method: "POST",
			data: dataString,
			dataType : 'text',
			success:function(reflection)
			{
				// $("#display").html(reflection);
				if($.trim(reflection) == 'empty')
				{
					$(".empty").show(4000);
					$(".empty").hide(2000);

							
				}
				else if($.trim(reflection) == 'disable')
				{
					$(".disable").show(4000); //Invalid Email Address<
					setInterval(function(){
						$(".disable").hide(2000);
					},2000);
				}
				else if($.trim(reflection) == 'success')
				{
					$(".success").show(4000); //>Successfully Profile Update
					setInterval(function(){
						$(".success").hide(2000);
					},2000);
				}
				else{
					$(".error").show(); //Profile update Fail!
					setInterval(function(){
						$(".error").hide(2000);
					},2000);
				}
			}
		});
		return false;
		
	});








});