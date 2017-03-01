/**
 * 
 *
 */
CheckoutHelperJS={

	/* Global variable declarations */
	userType:'G',
	checkoutType:'Taxi',
	/**
	 * This function called when ciyt is changed in Taxi booking section,
	 * to populate the taxi office in selected city.
	 * 
	 */
	taxi_onCityChange:function(select){
		var cityId = select.value;
		$.ajax({
            url: "/checkout/ajaxGetOfficesByCity",
            type: "GET",
			dataType: "JSON",
            data: {cityId: cityId},
            success: function (data) {	
				var taxiOfficeSelect = document.getElementById('taxi_taxiOffice');
				taxiOfficeSelect.options.length = 0;
				
				var objOption = document.createElement("option");
				if (data.length > 0 ) {
					for (i = 0; i < data.length; i++) { 
						objOption = document.createElement("option");
						objOption.text = data[i]['name'];
						objOption.value = data[i]['taxioffice_id'];
						taxiOfficeSelect.options.add(objOption);
					}
				}
            },
        });
	},
	
	/**
	 * 
	 */
	startCheckout:function(){
		if(this.isValidateOrderForm()) {
			if (this.userType == 'G') {
				$('#logonAtCheckoutModal').modal('show');
			} else {
				this.processOrder();
			}
		}
	},
	
	/**
	 * 
	 */
	isValidGuestForm:function(){
		var guestCheckoutForm = document.forms['guestCheckoutForm'];
		this.clearErrorMessage('guest');
		if (guestCheckoutForm.firstName.value == '') {
			this.setErrorMessage('Please enter valid first name.', 'guest');
			return false;
		} else if (guestCheckoutForm.lastName.value == '') {
			this.setErrorMessage('Please enter valid last name.', 'guest');
			return false;
		} else if (guestCheckoutForm.phone.value == '') {
			this.setErrorMessage('Please enter valid phone number.', 'guest');
			return false;
		}
		return true;
	},
	
	/**
	 * 
	 */
	isValidateOrderForm:function(){
		if (this.checkoutType == 'Taxi') {
			this.clearErrorMessage('taxi');
			
			var fromAddress = document.getElementById('taxi_fromAddress').value;
			var toAddress = document.getElementById('taxi_toAddress').value;
			var cityId = document.getElementById('taxi_city').value;
			var taxiTypeId = document.getElementById('taxi_taxiType').value;
			var taxiOfficeId = document.getElementById('taxi_taxiOffice').value;
			var date = document.getElementById('taxi_date').value;
			var time = document.getElementById('taxi_time').value;
			
			if (fromAddress == '') {
				this.setErrorMessage('Please enter valid pick-up address.', 'taxi');
				return false;
			} else if (toAddress == '') {
				this.setErrorMessage('Please enter valid drop-off address.', 'taxi');
				return false;
			} else if (cityId == '') {
				this.setErrorMessage('Please select valid city.', 'taxi');
				return false;
			} else if (taxiTypeId == '') {
				this.setErrorMessage('Please select valid taxi type.', 'taxi');
				return false;
			} else if (taxiOfficeId == '') {
				this.setErrorMessage('Please select valid taxi office.', 'taxi');
				return false;
			} else if (date == '') {
				this.setErrorMessage('Please enter valid date.', 'taxi');
				return false;
			} else if (time == '') {
				this.setErrorMessage('Please enter valid time.', 'taxi');
				return false;
			}
		}
		return true;
	},
	
	
	/**
	 * 
	 */
	setErrorMessage:function(error, prefix){
		if (document.getElementById(prefix + '_error-message')) {
			document.getElementById(prefix + '_error-message').innerHTML = error;
		}
	},
	
	/**
	 * 
	 */
	clearErrorMessage:function(prefix){
		if (document.getElementById(prefix + '_error-message')) {
			document.getElementById(prefix + '_error-message').innerHTML = "";
		}
	},
	
	/**
	 * 
	 */
	processOrder:function(){
		var param = {};
		
		if (this.userType == 'G') {
			if (this.isValidGuestForm()) {
				var guestCheckoutForm = document.forms['guestCheckoutForm'];
				param['guest_firstName'] = guestCheckoutForm.firstName.value;
				param['guest_lastName'] = guestCheckoutForm.lastName.value;
				param['guest_phone'] = guestCheckoutForm.phone.value;
				param['guest_email'] = guestCheckoutForm.email.value;
			} else {
				return;
			}
		}
		
		if (this.checkoutType == 'Taxi') {
			param['checkoutType'] = 'Taxi';
			param['fromAddress'] = document.getElementById('taxi_fromAddress').value;
			param['toAddress'] = document.getElementById('taxi_toAddress').value;
			param['cityId'] = document.getElementById('taxi_city').value;
			param['taxiTypeId'] = document.getElementById('taxi_taxiType').value;
			param['taxiOfficeId'] = document.getElementById('taxi_taxiOffice').value;
			param['date'] = document.getElementById('taxi_date').value;
			param['time'] = document.getElementById('taxi_time').value;
		}
		
		$.ajax({
				url: "/checkout/ajaxCheckoutAsGuest",
				type: "POST",
				dataType: "JSON",
				data: param,
				
				success: function (data) {
					if (data['status'] == 'sucsess') {
						document.location.href = '/Checkout/confirmation?orderId=' + data['orders_id'];
					} else {
						CheckoutHelperJS.setErrorMessage(data['error_message']);
					}
				},
				error: function () {
					// handle error
				}
		});
	},
}