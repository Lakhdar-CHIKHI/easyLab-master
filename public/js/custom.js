(function($){
  "use strict";
	
	// on ready function
	jQuery(document).ready(function($) {
   		var $this = $(window);
	//revel slider
	var revapi = jQuery("#rev_slider").revolution({
			sliderType:"standard",
			sliderLayout:"fullwidth",
			delay:9000,
			navigation: {
				arrows:{enable:true}				
			},			
			gridwidth:1230,
			gridheight:600		
		});		
		// for counter 
		$('.timer').appear(function() {
			$(this).countTo();
		});
		
	//  event on map/image js     
		$('.on_map').on("click", function() {
			$('.ed_event_wrapper_item_img').html('<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2487.7976787272055!2d-0.220688!3d51.42514310000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x487608ce712e537b%3A0x65dcfea053cfc083!2s42+High+Street+Wimbledon%2C+Wimbledon%2C+London+SW19+5AU%2C+UK!3m2!1d51.4251431!2d-0.220688!5e0!3m2!1sen!2sin!4v1441369941136" allowfullscreen></iframe>');
			$('.on_map').hide();
			$('.on_image').show();
		});
		
		$('.on_image').on("click", function() {
			$('.ed_event_wrapper_item_img').html('<img src="images/slider/sec1_s5.jpg" alt="item1" class="img-responsive">');
			$('.on_image').hide();
			$('.on_map').show();
		});
	
	// video section
		jQuery(function($){
		$('#educo_video').css("display", "none");
		$('.ed_video_section .ed_img_overlay a i').on("click", function(e) {
			e.preventDefault();
			$('.ed_video_section .ed_video').hide();	
			$('#educo_video').css("display", "block");
			$('#educo_video').attr('src',$('#educo_video').attr('src')+'?rel=0&autoplay=1');
		});
		
			});
			
	// woocommerce checkout process
		$("input[name$='checkout']").on("click",function () {
        var test = $(this).val();
        $(".payment_box").hide('slow');
        $(".payment_box[data-period='" + test + "']").show('slow');
		});
	
	// On focus Placeholder css
	var place = '';
		$('input,textarea').focus(function(){
			place = $(this).attr('placeholder');
		$(this).attr('placeholder','');
		}).blur(function(){
		$(this).attr('placeholder',place);
		});
	
	// Menu js for Position fixed
		$(window).scroll(function(){
			var window_top = $(window).scrollTop() + 1; 
				if (window_top > 500) {
					$('.ed_header_bottom').addClass('menu_fixed animated fadeInDown');
				} else {
					$('.ed_header_bottom').removeClass('menu_fixed animated fadeInDown');
				}
		});
	
	//show hide login form js
		$('#login_button').on("click", function(e) {
			$('#login_one').slideToggle(1000);
			e.stopPropagation(); 
		});
	
	$(document).click(function(e){
		if(!(e.target.closest('#login_one'))){	
			$("#login_one").slideUp("slow");    		
		}
   });
	
	//show hide share button
		$('#ed_share_wrapper').on("click", function() {
			$('#ed_social_share').slideToggle(1000);
		});
	
	// invitation_form on Event single page
		$('#invitation_form').on('shown.bs.modal', function () {
		$('#myInput').focus();
		});	

	//initialise Stellar.js
		$(window).stellar();
		
	//section one slider
		$(".section_one_slider .owl-carousel, .ed_populer_areas_slider .owl-carousel").owlCarousel({
		items:4,
		dots: false,
		nav: true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoHeight: true,
		touchDrag: false,
		mouseDrag: false,
		margin:30,
		loop: true,
		autoplay:false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:true
			},
			992:{
				items:3,
				nav:true
			},
			1200:{
				items:4,
				nav:true
			}
		}
		});	
		
	//section four slider
		$(".section_four_slider .owl-carousel, .ed_mostrecomeded_course_slider .owl-carousel").owlCarousel({
		items:4,
		dots: false,
		nav: true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoHeight: true,
		touchDrag: false,
		mouseDrag: false,
		margin:30,
		loop: true,
		autoplay:false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:true
			},
			992:{
				items:3,
				nav:true
			},
			1200:{
				items:4,
				nav:true
			}
		}
		});	
		
	//section five slider
		$(".section_five_slider .owl-carousel, .ed_latest_news_slider .owl-carousel").owlCarousel({
		items:3,
		dots: false,
		nav: true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoHeight: true,
		touchDrag: false,
		mouseDrag: false,
		margin:30,
		loop: true,
		autoplay:false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:true
			},
			992:{
				items:3,
				nav:true
			}
		}
		});	
	
	//client slider
		$(".ed_clientslider .owl-carousel").owlCarousel({
		items:5,
		dots: false,
		nav: false,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoHeight: true,
		touchDrag: false,
		mouseDrag: false,
		margin:0,
		loop: true,
		autoplay:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:5
			},
			1000:{
				items:5
			}
		}
		});	
		
	//section sidebar slider
		$(".ed_sidebar_slider .owl-carousel").owlCarousel({
		items:1,
		dots: false,
		nav: true,
		loop: true,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		autoHeight: true,
		touchDrag: false,
		mouseDrag: false,
		margin:30,
	
		autoplay:false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:1,
				nav:true
			},
			1000:{
				items:1,
				nav:true
			}
		}
		});	
	
	// Contact Form Submition
		$("#ed_submit").on("click", function() {
        var e = $("#uname").val();
        var t = $("#umail").val();
        var s = $("#sub").val();
        var r = $("#msg").val();
        $.ajax({
            type: "POST",
            url: "ajaxmail.php",
            data: {
                username: e,
                useremail: t,
                useresubject: s,
                mesg: r
            },
            success: function(n) {
                var i = n.split("#");
                if (i[0] == "1") {
                    $("#uname").val("");
                    $("#umail").val("");
                    $("#sub").val("");
                    $("#msg").val("");
                    $("#err").html(i[1]);
                } else {
                    $("#uname").val(e);
                    $("#umail").val(t);
                    $("#sub").val(s);
                    $("#msg").val(r);
                    $("#err").html(i[1]);
                }
            }
        });
		});
	
	// SmoothScroll js
		smoothScroll.init({
			speed: 1000,
			easing: 'easeInOutCubic',
			offset: 0,
			updateURL: true,
			callback: function ( toggle, anchor ) {}
		});
		
	// Event Page Select Box
		var selectToggleOptions = function(e) {
		e.preventDefault();
		var selectBox = $(this);
		var options = selectBox.next('.ed_custom_select_box_options');
		
		options.toggle();
		};
		
		var selectSwap = function(e) {
		e.preventDefault();
		
	// Store the elements
		var listItem = $(this);
		var listItemParent = listItem.parent().parent();
		var selectBoxButton = listItemParent.prev('.ed_custom_select_box_button');
		var selectBoxSpan = selectBoxButton.children('span');
		
	// Store the current values
		var currentText = selectBoxSpan.text();
		var currentValue = selectBoxButton.data('selectValue');
		
	// Store the new values
		var newText = listItem.text();
		var newValue = listItem.data('selectValue');
		
		if(currentText != newText) {
			selectBoxSpan.empty().text(newText);
		}
		
		if(currentValue != newValue) {
			selectBoxButton.attr('data-select-value', newValue);
		}
		
		listItemParent.toggle();
		
		};
		
		$('.ed_custom_select_box_button').on("click", (selectToggleOptions));
		$('.ed_custom_select_box_options li a').on("click",(selectSwap));
		
	// Video Play js
		function play_utube_video()
		{
			$('#utube_video_ply').attr('src',$('#utube_video_ply').attr('src')+'?rel=0&autoplay=1');
		}
	// Calender js
	
	/* "YYYY-MM[-DD]" => Date */
	function strToDate(str) {
		try {
			var array = str.split('-');
			var year = parseInt(array[0], 10);
			var month = parseInt(array[1], 10);
			var day = array.length > 2? parseInt(array[2], 10): 1 ;
			if (year > 0 && month >= 0) {
				return new Date(year, month - 1, day);
			} else {
				return null;
			}
		} catch (err) {return null; } // just throw any illegal format
	}

	/* Date => "YYYY-MM-DD" */
	function dateToStr(d) {
		/* fix month zero base */
		var year = d.getFullYear();
		var month = d.getMonth();
		return year + "-" + (month + 1) + "-" + d.getDate();
	}

	$.fn.calendar = function (options) {
		var _this = this;
		var opts = $.extend({}, $.fn.calendar.defaults, options);
		var week = ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa','Su'];
		var tHead = week.map(function (day) {
			return "<th>" + day + "</th>";
		}).join("");

		_this.init = function () {
			var tpl = '<table class="cal">' +
			'<caption>' +
			'	<span class="prev"><a href="javascript:void(0);">&larr;</a></span>' +
			'	<span class="next"><a href="javascript:void(0);">&rarr;</a></span>' +
			'	<span class="month"><span>' +
			"</caption>" +
			"<thead><tr>" +
			tHead +
			"</tr></thead>" +
			"<tbody>" +
			"</tbody>" + "</table>";
			var html = $(tpl);
			_this.append(html);
		};

		function daysInMonth(d) {
			var newDate = new Date(d);
			newDate.setMonth(newDate.getMonth() + 1);
			newDate.setDate(0);
			return newDate.getDate();
		}

		_this.update = function (date) {
			var mDate = new Date(date);
			mDate.setDate(1); /* start of the month */
			var day = mDate.getDay(); /* value 0~6: 0 -- Sunday, 6 -- Saturday */
			mDate.setDate(mDate.getDate() - day); /* now mDate is the start day of the table */

			function dateToTag(d) {
				var tag = $('<td><a href="javascript:void(0);"></a></td>');
				var a = tag.find('a');
				a.text(d.getDate());
				a.data('date', dateToStr(d));
				if (date.getMonth() != d.getMonth()) { // the bounday month
					tag.addClass('off');
				} else if (_this.data('date') == a.data('date')) { // the select day
					tag.addClass('active');
					_this.data('date', dateToStr(d));
				}
				return tag;
			}

			var tBody = _this.find('tbody');
			tBody.empty(); /* clear previous first */
			var cols = Math.ceil((day + daysInMonth(date))/7);
			for (var i = 0; i < cols; i++) {
				var tr = $('<tr></tr>');
				for (var j = 0; j < 7; j++, mDate.setDate(mDate.getDate() + 1)) {
					tr.append(dateToTag(mDate));
				}
				tBody.append(tr);
			}

			/* set month head */
			var monthStr = dateToStr(date).replace(/-\d+$/, '');
			_this.find('.month').text(monthStr);
		};

		_this.getCurrentDate = function () {
			return _this.data('date');
		};

		_this.init();
		/* in date picker mode, and input date is empty,
		 * should not update 'data-date' field (no selected).
		 */
		var initDate = opts.date? opts.date: new Date();
		if (opts.date || !opts.picker) {
			_this.data('date', dateToStr(initDate));
		}
		_this.update(initDate);

		/* event binding */
		_this.delegate('tbody td', 'click', function () {
			var $this = $(this);
			_this.find('.active').removeClass('active');
			$this.addClass('active');
			_this.data('date', $this.find('a').data('date'));
			/* if the 'off' tag become selected, switch to that month */
			if ($this.hasClass('off')) {
				_this.update(strToDate(_this.data('date')));
			}
			if (opts.picker) {  /* in picker mode, when date selected, panel hide */
				_this.hide();
			}
		});

		function updateTable(monthOffset) {
			var date = strToDate(_this.find('.month').text());
			date.setMonth(date.getMonth() + monthOffset);
			_this.update(date);
		}

		_this.find('.next').on("click", function () {
			updateTable(1);

		});

		_this.find('.prev').on("click", function () {
			updateTable(-1);
		});

		return this;
	};

	$.fn.calendar.defaults = {
		date: new Date(),
		picker: false
	};

	$.fn.datePicker = function () {
		var _this = this;
		var picker = $('<div></div>').
			addClass('picker-container').
			hide().
			calendar({'date': strToDate(_this.val()), 'picker': true});

		_this.after(picker);

		/* event binding */
		// click outside area, make calendar disappear
		$('body').on("click", function() {
			picker.hide();
		});

		// click input should make calendar appear
		_this.on("click", function () {
			picker.show();
			return false; // stop sending event to docment
		});

		// click on calender, update input
		picker.on("click", function () {
			_this.val(picker.getCurrentDate());
			return false;
		});

		return this;
	};

	$(window).load(function () {
		$('.jquery-calendar').each(function () {
			$(this).calendar();
		});
	});
	
	});
})(); 