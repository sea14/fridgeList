//for scripts to check user input, utilizes jQuery

//login script below
$(function() {
	var action = '';
	var form_data = '';
	$('#submit').click(function () {
		action = $("#loginForm").attr("action");
		form_data = {
		email: $("#email").val(),
		password: $("#password").val(),
		is_ajax: '1'};

	$.ajax({
		type: 'POST',
		url: action,
		data: form_data,
		success: function(response) {
			if(response == 'success') {
				$("#loginForm").slideUp('slow', function() {
					$("#message").html('<p class="success">You have logged in successfully!</p>');
				});
			} else {
				$("#message").html('<p class = error"> Invalid username and/or password.</p>');
			}
		}
	});
	return false;
});


//email validation script below
 function validateEmail (email){
	var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	if(filter.test(email)) {
		return true;
	}
	else{
	return false;
	}
   }

}

$(document).ready(function(e){
	$('#password').click(function() {
	 var email = $('#email').val();
	if($.trim(email).length == 0) {
		alert('Please enter a valid email address');
	}
	if (validateEmail(email)) {
		alert('Congrats! You hava a valid email!);
	}else{

		alert('Please enter a valid email address');
		}
	});
});
