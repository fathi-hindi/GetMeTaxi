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
				objOption.text = 'Select Taxi Office';
				objOption.value = "";
				taxiOfficeSelect.options.add(objOption);
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
		ErrorHelperJS.clearErrorMessage(ErrorHelperJS.GUEST_FORM_ERROR_DIV_ID_PREFIX);
		if (guestCheckoutForm.firstName.value == '') {
			ErrorHelperJS.setErrorMessage('Please enter valid first name.', ErrorHelperJS.GUEST_FORM_ERROR_DIV_ID_PREFIX);
			return false;
		} else if (guestCheckoutForm.lastName.value == '') {
			ErrorHelperJS.setErrorMessage('Please enter valid last name.', ErrorHelperJS.GUEST_FORM_ERROR_DIV_ID_PREFIX);
			return false;
		} else if (guestCheckoutForm.phone.value == '') {
			ErrorHelperJS.setErrorMessage('Please enter valid phone number.', ErrorHelperJS.GUEST_FORM_ERROR_DIV_ID_PREFIX);
			return false;
		}
		return true;
	},
	
	/**
	 * 
	 */
	isValidateOrderForm:function(){
		if (this.checkoutType == 'Taxi') {
			ErrorHelperJS.clearErrorMessage(ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
			
			var fromAddress = document.getElementById('taxi_fromAddress').value;
			var toAddress = document.getElementById('taxi_toAddress').value;
			var cityId = document.getElementById('taxi_city').value;
			var taxiTypeId = document.getElementById('taxi_taxiType').value;
			var taxiOfficeId = document.getElementById('taxi_taxiOffice').value;
			var date = document.getElementById('taxi_date').value;
			var time = document.getElementById('taxi_time').value;
			
			if (fromAddress == '') {
				ErrorHelperJS.setErrorMessage('Please enter valid pick-up address.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			} else if (toAddress == '') {
				ErrorHelperJS.setErrorMessage('Please enter valid drop-off address.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			} else if (cityId == '') {
				ErrorHelperJS.setErrorMessage('Please select valid city.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			} else if (taxiTypeId == '') {
				ErrorHelperJS.setErrorMessage('Please select valid taxi type.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			} else if (taxiOfficeId == '') {
				ErrorHelperJS.setErrorMessage('Please select valid taxi office.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			} else if (date == '') {
				ErrorHelperJS.setErrorMessage('Please enter valid date.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			} else if (time == '') {
				ErrorHelperJS.setErrorMessage('Please enter valid time.', ErrorHelperJS.TAXI_FORM_ERROR_DIV_ID_PREFIX);
				return false;
			}
		}
		return true;
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
						ErrorHelperJS.setErrorMessage(data['error_message']);
					}
				},
				error: function () {
					// handle error
				}
		});
	},
}