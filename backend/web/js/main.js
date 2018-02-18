$(function(){
	// alert('it is working.');


	$('#modalButton').click(function(){
		
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});
	
	
$('#modalButton2').click(function(){
		
		$('#modal2').modal('show')
			.find('#modalContent2')
			.load($(this).attr('value'));
	});
	
$('#selButton').click(function(){
	
		var keys = $('#selFactu').yiiGridView('getSelectedRows');
	alert(keys);	
		if (keys.length == 0){
			alert ('No ha seleccionado facturas');
		}else{
			alert ('Si ha seleccionado facturas');
		}
			
});
	

})