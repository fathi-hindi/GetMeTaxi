/**
 * 
 *
 */
CheckoutHelperJS={

	/* Global variable declarations */
	
	/**
	 * This function called when ciyt is changed in Taxi booking section,
	 * to populate the taxi office in selected city.
	 * 
	 */
	onTaxiCityChange:function(select){
		var cityId = select.value;
		$.ajax({
            url: "/checkout/ajaxGetOfficesByCity",
            type: "GET",
			dataType: "JSON",
            data: {cityId: cityId},
            success: function (data) {	
				var taxiOfficeSelect = document.getElementById('taxiOffice');
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
}