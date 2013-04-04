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
 * Scorekeeper Buttons
 *
 * These functions prevent the user from submitting multiple goals on 
 * scoring play.
 *
 */
/*
$.fn.disableButton = function () {
	$(this).attr("disabled", true); // apply disabled attribute
  	return this;
};

$.fn.clearDisabled = function () {
	$(this).attr("disabled", false); // apply disabled attribute
  	return this;	
};

$.fn.cancelAll = function () {
	// clear all fields on cancel
	$("input[name=goal]").attr("checked", false);
	$("input[name=p_assist]").attr("checked", false);
	$("input[name=s_assist]").attr("checked", false);
	$("input.add-goal").attr("disabled", false); // disable disabled attribute
	$("input.add-p_assist").attr("disabled", false); 
	$("input.add-s_assist").attr("disabled", false);
	$('.submitScore').disableButton();
}

$(document).ready(function () {
	$('.submitScore').disableButton();

	$(".add-goal").click(function() {
		$(".add-goal").disableButton();
		$('.submitScore').clearDisabled();
		$(this).clearDisabled();			
		$(this).closest("tr").find(".add-p_assist").disableButton(); // disable ability to give single player assist and goal
		$(this).closest("tr").find(".add-s_assist").disableButton();
	});
	
	$(".add-p_assist").click(function() {
		$(".add-p_assist").disableButton();
		$(this).clearDisabled();		
		$(this).closest("tr").find(".add-goal").disableButton();
		$(this).closest("tr").find(".add-s_assist").disableButton();
	});
	
	$(".add-s_assist").click(function() {
		$(".add-s_assist").disableButton();
		$(this).clearDisabled();
		$(this).closest("tr").find(".add-goal").disableButton();
		$(this).closest("tr").find(".add-p_assist").disableButton(); 
	});	

	$("button[name=cancelAll]").click(function() {
		$.fn.cancelAll();
		$('select[name=add-pim]').prop('selectedIndex',0);
	});
});
*/
	
	