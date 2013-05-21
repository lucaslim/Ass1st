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
 * Populate data for search
 *
 */
// --------------------------------------------------------------------

$(function() {
	$('#btn_search').on({
		click: function(e) {
			e.preventDefault();

			window.location.replace($.myURL() + 'pages/search/?q=' + $('#search_box').val());
		}
	})

	//hide search box
	$('#search_results').hide();

	var search;

	$.ajax({
		type : 'get',
		url : $.myURL() + 'search/get_search_data/',
		dataType : "json",
		async: false,
		success : function(data) {
			search = data.result;
		}
	});

	$('#search_box').typeahead({
		source : function(query, process) {
			arr = [];

			$.each(search, function(i, result){
				arr.push(result.Name + '||' + result.Picture + '||' + result.Url + '||' + result.Type + '||' + result.Id);
			});

			process(arr);
		},
		sorter : function(items) {
			return items.sort(function(a, b){ 
				var arrA = a.split('||');
				var arrB = b.split('||');

				if(a[0] < b[0])
					return -1;

				if(a[0] > b[0])
					return 1;

				return;
			});
		},
		matcher : function(item) {
			var arr = item.split('||');
			if (arr[0].toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) 
        		return true;
		},
		highlighter: function(item) {
			var arr = item.split('||');

			html = '<div class="typeahead">';
            html += '<div class="media" style="width:100%"><a class="pull-left" href="#"><img style="width: 20px; height: 20px; margin:0 20px;" src='+ get_image(arr[3], arr[1]) +' /></a>'
            html += '<div class="media-body" >';
            html += '<p class="media-heading">'+arr[0]+' (@'+arr[3]+')'+'</p>';
            html += '</div>';
            html += '</div>';

			return html;
		},
		updater : function(item) {
			var arr = item.split('||');

			window.location.replace($.myURL() + arr[2] + arr[4]);
		}
	});
});

function get_image(type, image) {
	switch(type.toLowerCase()) {
		case 'player':
			return $.myURL() + 'uploads/playerlogo/' + image;

		case 'team':
			return $.myURL() + 'uploads/teamlogos/' + image;

		default:
			return $.myURL() + 'uploads/playerlogo/blank_avatar.png';
	}
}


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
					if(!data.success){
						$('#error_message').html(data.message);
						$('#error_box').dialog("open");
					}
					else{
						window.location.replace($.myURL() + 'edit_profile');
					}
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
 * Ajax for Quick Team Register
 *
 */

 $(document).ready(function() {
		//Form
		$('#quick_team_register_form').submit(function(e) {
			e.preventDefault();

			dataString = $(this).serialize();

			$.ajax({
				type : $(this).attr("method"),
				url : $(this).attr("action"),
				data : dataString,
				dataType : "json",
				success : function(data) {
					if(data.success){
						window.location.replace(data.url);
						return;
					}

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
 * Ajax for Edit Profile
 *
 */

 $(document).ready(function() {
		//Form
		$('#edit_profile_form').submit(function(e) {
			e.preventDefault();

			dataString = $(this).serialize();

			$.ajax({
				type : $(this).attr("method"),
				url : $(this).attr("action"),
				data : dataString,
				dataType : "json",
				success : function(data) {
					if(!data.success){
						$('#error_message').html(data.message);
						$('#error_box').dialog("open");
					}
					else{
						window.location.replace($.myURL() + 'pages/user_profile');
					}
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
	

/**
 *
 * Attendance Login Ajax
 * This will submit the radio button changes when the user clicks the radio button
 *
 */

function rsvp_attendance(match_fixture_id, radiobutton) {
	$.ajax({
            type: "get",
			url: $.myURL() + 'MatchAttendance/add_attendance',
            data: {"attendance" : $(radiobutton).val(), "matchfixtureid" : match_fixture_id},
            dataType: 'json',
            success: function(data)
            {
            	if (data.success) {
                	$("#msg").html('<i class="icon-ok attendance_yes_check"></i>');
                }
                else {
                	$("#msg").html('<i class="icon-remove attendance_no_x"></i>');
                }
            }
        });
}

// --------------------------------------------------------------------

/**
 *
 * Snaping 
 * This snaps the menu to the top of the page when the screen scrolls past a defined point
 *
 */

//Top menu 
$(document).ready(function() {
 
    //Calculate the height of #headerWrapper
    //Use outerHeight() instead of height() if have padding
    var aboveHeight = $('#headerWrapper').outerHeight() + 128;

	//When scrolling
    $(window).scroll(function(){

        //if scrolled down more than the header’s height
      	if ($(window).scrollTop() > aboveHeight){
 
       		// if yes, add “fixed” class to the .navi-menu
        	// add padding top to the content 
    	    // (value is same as the height of the .navi-menu)
            $('.navi-menu').addClass('fixedToTopNav').css('top','0')
            .next().css('padding-top','40px');
 
   	    } 
       	else { 
	        // when scroll up or less than aboveHeight,
	        //remove the “fixed” class, and the padding-top
	      	 $('.navi-menu').removeClass('fixedToTopNav')
	      	 .next().css('padding-top','0');
        }
    });
});

// //Profile menu  and team logo Snap
// $(document).ready(function() {
 
//     //Calculate the height of #headerWrapper
//     //Use outerHeight() instead of height() if have padding
//     var aboveHeight = $('#headerWrapper').outerHeight() + 102;

// 	//When scrolling
//     $(window).scroll(function(){

//         	//if scrolled down more than the #headerWrapper's height
//             if ($(window).scrollTop() > aboveHeight){
// 		        // if yes, add “fixed” class to the #ppp_player_menu'
// 		        // add padding top to the content 
//         		// (value is same as the height of the #ppp_player_menu')
//             	$('#ppp_player_menu').addClass('fixedToTopNav').css('top','44px').css('position', 'fixed').css('left', '160px').css('width', '18.8%')
//             	.next().css('padding-top','0px');
//             } 
//             else{
//         		// when scroll up or less than aboveHeight,
//         		//remove the “fixed” class, and the padding-top
//             	$('#ppp_player_menu').removeClass('fixedToTopNav').css('top','-240px').css('position', 'relative').css('left', '20px').css('width', '23.1%')
//             	.next().css('padding-top','0');
//             }
//     });
// });

// --------------------------------------------------------------------

/**
 *
 * Scorekeeper Validation jQuery
 *
 */
$(document).ready(function() {

	// disable buttons on load
    $('form input.submitPenalty').disableButton();
    $('form input.submitGoal').disableButton();

	$('.teamScoring select').change(function() {
		
		// gather values
		var submit = $(this).closest('form').find('.submitGoal');
		var A = $(this).closest('form').find('.goalScorer').val();
		var B = $(this).closest('form').find('.pAssist').val();
		var C = $(this).closest('form').find('.sAssist').val();
		//console.log(A, B, C);

	  if(// case 1: only A 
	    (A != "" && B == "" && C == "") ||  

	    // case 2: only A and B, A != B
	    (A != "" && B != "" && C == "" && A != B) || 

	    // case 3: A, B, C, all unique
	    (A != "" && B != "" && C != "" && A != B && A != C && B != C) ) { 
  			submit.clearDisabled();
		}
		else {
		    submit.disableButton();
		}
	});

	// Penalty Validation
    // disable submit button unless the select 'player' has a value
    var player = $(":input[name='player']");
    player.change(function() {
    	var submit = $(this).closest('form').find('.submitPenalty');
    	if($(this).val() != "") {
    		submit.clearDisabled();
    	}
    	else {
    		submit.disableButton();
    	}
    });		       
});

$.fn.disableButton = function () {
	$(this).attr("disabled", true); // apply disabled attribute
  	return this;
};

$.fn.clearDisabled = function () {
	$(this).attr("disabled", false); // apply disabled attribute
  	return this;	
};

/**
 * Set Division
 * 
 * Set divison based on the given league id
 *
 */
$(function() {
	$('#ddl_league').on({
		change: function(e){
			e.preventDefault();

			$.ajax({
				type : "POST",
				url : "quick_team_register/get_division",
				data : {"id": $(this).val()},
				dataType : "json",
				success : function(data) {
					var str = '';
					$.each(data, function(key, val) {
						str += '<option value="' + val + '">' + key + '</option>';
					});
					$('#ddl_division').html(str);
				}
			});
		}
	});
});

/**
 * Team Name Check
 * 
 * Check if team name exist;
 *
 */
$(function() {
	var time_out = 0;

	$('#team_name').after('<div id="team_name_exist" style="color:red; font-style:italic;">Team name already exist</div>');
	$('#team_name_exist').hide();

	$('#team_name').on({
		keyup: function(e){
			e.preventDefault();

			clearTimeout(time_out);

			time_out = setTimeout(function(){
				$.ajax({
					type : "POST",
					url : "quick_team_register/check_team_name",
					data : {"s": $('#team_name').val()},
					dataType : "json",
					success : function(data) {
						if(!data.success)
							$('#team_name_exist').show();
						else
							$('#team_name_exist').hide();
				}
			});

			}, 500);
		}
	});
});
