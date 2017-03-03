/*
 * ValidationHelperJS
 *
 * Copyright 2017, Fathi Hindi
 *
 */
ValidationHelperJS=
{

	/* Global variable declarations */
	
	/**
	 * This function validate date.
	 */
	validate_date:function(value)
	{
		return true;
	},
	
	/**
	 * This function validate time.
	 */
	validate_time:function(value)
	{
		return true;
	},
	
	/**
	 * This function validate password.
	 */
	validate_password:function(value)
	{
		return true;
	},
	
	/**
	 * This function validate if the 'required' form field has a value.
	 */
	validate_req:function(value)
	{
		if(eval(this.eliminateLeadingAndTrailingSpaces(value).length) == 0) 
		{
			return false;
		}
			
		return true;
	},
	
	/**
	 * This function validates the 'maxLength' feature of the value entered for a field.
	 */
	validate_maxlen:function(value,len)
	{
		if(eval(value.length) > len) 
		{ 
			return false; 
		}
		return true;
	},
	
	/**
	 * This function validates the 'minLength' feature of the value entered for a field.
	 */
	validate_minlen:function(value,len)
	{
		if(eval(value.length) < len) 
		{ 
			return false; 
		}
		return true;
	},
	
	/**
	 * This function validates if a form field has an alpha-numeric value.
	 */
	validate_alphanumeric:function(value)
	{
		var charpos = value.search("[^A-Za-z0-9]"); 
		if(value.length > 0 &&  charpos >= 0) 
		{ 
			return false; 
		}
		return true;
	},
	
	/**
	 * This function validates if a form field has an alpha-space value.
	 */
	validate_alphaspace:function(value)
	{
		var charpos = value.search("[^A-Za-z\\s]"); 
		if(value.length > 0 &&  charpos >= 0) 
		{ 
			return false; 
		}
		return true;
	},
	
	/**
	 * This function validates if a form field has an alphabetical value.
	 */
	validate_letter:function(value)
	{
		var reg = /^[a-zA-Z]+$/;
		if(!reg.test(value))
		{
			return false; 
		}
		return true;
	},
	
	/**
	 * This function validates if a form field has an numeric value, e.g. zip code, phone numbers.
	 */
	validate_numeric:function(value)
	{
		var reg = /^[0-9]+$/;
		if(!reg.test(value))
		{
			return false; 
		}
		return true;
	},

	/**
	 * This function eliminate leading and trailing spaces.
	 */
	eliminateLeadingAndTrailingSpaces:function(value)
	{
		var trimmedValue = value.replace(/^\s+|\s+$/g, "");
		return trimmedValue;
	},

	/**
	 * This function validates email address.
	 */
	validate_email:function(value, isReq)
	{	
		if (isReq && !this.validate_req(value))
		{
			return false;
		}			
		
		// This restricts legit email addresses (e.g., x..y@z.com, x.@y.com, etc.)
		var reg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)|(^\#)|(^\*)|(^\@)|(^\&)|(^\^)|(%)/; //not valid 
		var reg2 = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{1,6}|[0-9]{1,3})(\]?)$/; // valid
		
		if (reg1.test(value) || !reg2.test(value)) { 
			return false;
		} 
		
		return true;
	},
	
	/**
	 * This function validates phone number.
	 */
	validate_phone:function(value, required)
	{
		if (required && !this.validate_req(value))
		{
			return false;
		}
		var reg = /^[\d]+$/;
		
		if (!reg.test(value))
		{
			return false;
		}
		return true;
	},
}