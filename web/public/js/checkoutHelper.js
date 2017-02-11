/**
 * 
 *
 */
CheckoutHelperJS={

	/* Global variable declarations */
	userType:'R',
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
	 * 
	 * 
	 */
	taxi_processOrder:function(){
		if (this.taxi_validateForm()) {
			if (this.userType == 'G') {
				// show logon at checkout modal.
			} else {
				this.taxi_sendOrder();
			}
		}
	},
	/**
	 *
	 */
	taxi_sendOrder:function() {
		var fromAddress = document.getElementById('taxi_fromAddress').value;
		var toAddress = document.getElementById('taxi_toAddress').value;
		var cityId = document.getElementById('taxi_city').value;
		var taxiTypeId = document.getElementById('taxi_taxiType').value;
		var taxiOfficeId = document.getElementById('taxi_taxiOffice').value;
		var date = document.getElementById('taxi_date').value;
		var time = document.getElementById('taxi_time').value;
		
		$.ajax({
            url: "/checkout/ajaxProcessTaxiOrder",
            type: "POST",
			dataType: "JSON",
            data: {fromAddress: fromAddress, toAddress: toAddress, cityId: cityId
			, taxiTypeId: taxiTypeId, taxiOfficeId: taxiOfficeId, date: date,
			time: time},
            
			success: function (data) {
				if (data['status'] == 'sucsess') {
					document.location.href = '/Checkout/confirmation?ordersId=' + data['orders_id'];
				} else {
					this.taxi_setErrorMessage(data['error_message']);
				}
            },
			error: function () {
				this.taxi_setErrorMessage('Unable to process now. Please try again.');
			}
        });
	},
	
	/**
	 * 
	 */
	taxi_validateForm:function(){
		this.taxi_clearErrorMessage();
		
		var fromAddress = document.getElementById('taxi_fromAddress').value;
		var toAddress = document.getElementById('taxi_toAddress').value;
		var cityId = document.getElementById('taxi_city').value;
		var taxiTypeId = document.getElementById('taxi_taxiType').value;
		var taxiOfficeId = document.getElementById('taxi_taxiOffice').value;
		var date = document.getElementById('taxi_date').value;
		var time = document.getElementById('taxi_time').value;
		
		if (fromAddress == '') {
			this.taxi_setErrorMessage('Please enter valid pick-up address.');
			return false;
		} else if (toAddress == '') {
			this.taxi_setErrorMessage('Please enter valid drop-off address.');
			return false;
		} else if (cityId == '') {
			this.taxi_setErrorMessage('Please select valid city.');
			return false;
		} else if (taxiTypeId == '') {
			this.taxi_setErrorMessage('Please select valid taxi type.');
			return false;
		} else if (taxiOfficeId == '') {
			this.taxi_setErrorMessage('Please select valid taxi office.');
			return false;
		} else if (date == '') {
			this.taxi_setErrorMessage('Please enter valid date.');
			return false;
		} else if (time == '') {
			this.taxi_setErrorMessage('Please enter valid time.');
			return false;
		}
		return true;
	},
	
	
	/**
	 * 
	 */
	taxi_setErrorMessage:function(error){
		document.getElementById('taxi_error-message').innerHTML = error;
	},
	/**
	 * 
	 */
	taxi_clearErrorMessage:function(){
		document.getElementById('taxi_error-message').innerHTML = "";
	},
}