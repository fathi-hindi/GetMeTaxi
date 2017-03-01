/**
 * Error handling accros the site.
 * To use this class, you should define a error panle with id as following: 
 * 		
 *		<p calss="error-message" id="prefix_error-message" ></p>
 *
 * AS such, you can call setErrorMessage to display the error message or clearErrorMessage
 * to clear all error messages in the panle.
 *
 */
ErrorHelperJS={

	/* Global variable declarations */
	ERROR_DIV_ID_POSTFIX: 'error-panle',
	TAXI_FORM_ERROR_DIV_ID_PREFIX: 'taxi_',
	GUEST_FORM_ERROR_DIV_ID_PREFIX: 'guest_',
	LOGON_FORM_ERROR_DIV_ID_PREFIX: 'logon_',
	REGISTRATION_FORM_ERROR_DIV_ID_PREFIX: 'registration_',
	
	/**
	 * 
	 */
	setErrorMessage:function(error, prefix){
		if (document.getElementById(prefix + this.ERROR_DIV_ID_POSTFIX)) {
			document.getElementById(prefix + this.ERROR_DIV_ID_POSTFIX).innerHTML = error;
		}
	},
	
	/**
	 * 
	 */
	clearErrorMessage:function(prefix){
		if (document.getElementById(prefix + this.ERROR_DIV_ID_POSTFIX)) {
			document.getElementById(prefix + this.ERROR_DIV_ID_POSTFIX).innerHTML = "";
		}
	},
	
}