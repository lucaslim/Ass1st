$(document).ready(function() {
	//Form
	$('#quick_register_form').submit(function(e) {
		e.preventDefault();

		dataString = $(this).serialize();

		$.ajax({
			type : $(this).attr("method"),
			url : $(this).attr("action"),
			data : dataString,
			dataType : "json",
			success : function(data) {
				$('#error_message').html(data.message);
				$('#error_box').dialog("open");
			}
		});
	});

	//Error Box
	$('#error_box').dialog({
		resizable : false,
		autoOpen : false,
		modal : true,
		buttons : {
			Cancel : function() {
				$(this).dialog("close");
			}
		}
	});
}); 