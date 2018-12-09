$(() => {
	
	const form = $("#sign-form");
	const submit = $("#sign-submit-btn");
	const passwordField = $("#password");
	const confirmField = $("#password-confirm");
	
	const errorField = $("#sign-error-field");
	
	submit.on('click', () => {
		//@ts-ignore
		if (!form.validate())
		{
			return false;
		}
		
		if (confirmField.length && confirmField.val() != passwordField.val())
		{
			errorField.text("Passwords did not matched");
			return false;
		}
		
		//@ts-ignore
		const hash = CryptoJS.MD5(passwordField.val() as string).toString();
		console.log(hash);
		passwordField.val(hash);
		
		return true;
	});
});