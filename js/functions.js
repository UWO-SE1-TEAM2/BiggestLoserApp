window.onload = function()
{
	$('#confirmPassword').on('keyup', function () {
	    if ($(this).val() == $('#password').val()) {
	        $('#confirmMsg').html('Password Matches').css('color', 'green');
	    } else $('#confirmMsg').html('Passwords do not match. Check and try again')
			.css('color', 'red');
	});
}
