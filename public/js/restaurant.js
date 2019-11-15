$(document).ready( function(){

	//If location is set then show tables.
	getLocationTables($('input#location_id').val());

	$('select#select_location_id').change(function(){
		var location_id = $(this).val();
		getLocationTables(location_id);
	});

});

function getLocationTables(location_id){
	var transaction_id = $('span#restaurant_module_span').data('transaction_id');

	if(location_id != ''){
		$.ajax({
			method: "GET",
			url: '/restaurant/data/get-pos-details',
			data: {'location_id': location_id, 'transaction_id': transaction_id},
			dataType: "html",
			success: function(result){
				$('span#restaurant_module_span').html(result);
			}
		});
	}
}