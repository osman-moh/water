$(document).ready( function() {
	$(document).on('change', '.purchase_quantity', function(){
		update_table_total( $(this).closest('table'));
	});
	$(document).on('change', '.unit_price', function(){
		update_table_total( $(this).closest('table'));
	});

	$('.os_exp_date').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        clearBtn: true
    });

    $('.add_stock_row').click( function(){
    	var tr = $(this).data('row-html');
    	var key = parseInt($(this).data('sub-key'));
    	tr = tr.replace(/\__subkey__/g, key);
    	$(this).data('sub-key', key+1);

    	$(tr).insertAfter($(this).closest('tr')).find('.os_exp_date').datepicker({
	        autoclose: true,
	        format: 'dd-mm-yyyy',
	        clearBtn: true
	    });
    });
});

function update_table_total(table){
	var total_subtotal = 0;
	table.find('tbody tr').each( function(){
		var qty = __read_number($(this).find('.purchase_quantity'));
		var unit_price = __read_number($(this).find('.unit_price'));
		var row_subtotal = qty * unit_price;
		$(this).find('.row_subtotal_before_tax').text(__number_f(row_subtotal));
		total_subtotal += row_subtotal
	});
	table.find('tfoot tr #total_subtotal').text(__currency_trans_from_en(total_subtotal, true));
	table.find('tfoot tr #total_subtotal_hidden').val(total_subtotal);

}