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
