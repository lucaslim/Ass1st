/**
 * Custom JavaScript Functions
 *
 * This file contains all custom JavaScript functions including jQuery.
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

/**
 * jQuery Accordion
 * 
 * Alter the settings for the jQuery accordion here.
 * Documentation:
 * http://api.jqueryui.com/accordion/
 *
 */

 $(function() {
 	var icons = {
 		header: "ui-icon-circle-arrow-e",
 		activeHeader: "ui-icon-circle-arrow-s"
 	};
 	$( "#accordion" ).accordion({
 		active: false,
 		icons: icons,
 		animate: 100,
 		heightStyle: "content",
 		collapsible: false
 	});
 });

// --------------------------------------------------------------------

/**
 * jQuery Nivo Slider
 * 
 * Adjust Nivo slider options here
 * Documentation:
 * http://dev7studios.com/nivo-slider/
 *
 */

 $(window).load(function() {
 	$('#slider').nivoSlider();
 }); 

// --------------------------------------------------------------------

/**
 * 
 * Ajax for Quick Register
 *
 */

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

 // --------------------------------------------------------------------

/**
 *
 * User Login
 *
 */

$(document).ready(function() {
	//Form
	$('#login_header_form').submit(function(e) {
		e.preventDefault();
		
		dataString = $(this).serialize();

		$.ajax({
			type : $(this).attr("method"),
			url : $(this).attr("action"),
			data : dataString,
			dataType : "json",
			success : function(data) {
				if(!data.success)
				{
					alert('hi');
					$('#error_message').html(data.message);
					$('#error_box').dialog("open");
				}
			}
		});
	});

	//Error Box
	$('#error_box').dialog({
		resizable : false,
		autoOpen : false,
		modal : true,
		stack: false,
		zIndex: 100000,
		buttons : {
			Cancel : function() {
				$(this).dialog("close");
			}
		}
	});
});

// --------------------------------------------------------------------

/**
 *
 * Login modal
 *
 * This will pop up the login dialog upon clicking the login button
 *
 */

 $(document).ready(function () {
 	var fade_time = 700;

 	$('#sign_in').on({
 		click: function(e) {
 			e.preventDefault();
 			$('#signin_dialog').fadeToggle(fade_time);

 			//toggle background fade
 			$('#bg_fade').fadeToggle($('#signin_dialog').is(':visible'));
 			
 		}
 	});

	//Exit Button
	$('#signin_exit').on({
		click: function(e) {
			e.preventDefault();
			$('#signin_dialog').fadeToggle(fade_time);
			$('#bg_fade').fadeOut(fade_time);
		}
	});

	//Escape Button
	$(this).on({
		keyup: function(e){
			e.preventDefault();
			if(e.keyCode == 27){
				$('#signin_dialog').fadeOut(fade_time);
				$('#bg_fade').fadeOut(fade_time);
			}
		}
	});
});

// --------------------------------------------------------------------


/**
 *
 * Attendance Login Ajax
 * This will submit the radio button changes when the user clicks the radio button
 *
 */

$(document).ready(function(){

	$('#attendance_yes').on({
		click: function(e) {
			rsvpAttendance($(this));
		}
	});

	$('#attendance_no').on({
		click: function(e) {
			rsvpAttendance($(this));
		}
	});
});

function rsvpAttendance(objRadioButton) {
	var attendance = objRadioButton.val();

	//alert(attendance);

	$.ajax({
            type: "get",
			url: 'http://localhost:8888/ass1st/index.php/matchAttendance/addAttendance',
            data: {"attendance" : attendance},
            dataType: 'html',
            success: function(data)
            {
            	if (data == 'Yes') {
                	$("#msg").html('<i class="icon-ok attendance_yes_check"></i>');
                }
                else if (data == 'No'){
                	$("#msg").html('<i class="icon-remove attendance_no_x"></i>');
                }
            }
        });

}



