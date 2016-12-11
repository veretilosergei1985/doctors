(function($) {
	"use strict";
	$( document ).ready( function() {
		$( "div" ).removeClass( "hide-if-no-js" );
		if ( $(".owl-carousel").length != 0 ) {
			$( '.owl-carousel' ).owlCarousel( {
				items: 1,
				center: true,
				loop: true,
				margin: 1,
				autoplayTimeout: 800,
				autoplay: false,
				autoplayHoverPause: true
			} );
		}

		if ( $.browser.mobile ) {
			$( 'body' ).addClass( 'mobile' );
			if ( $('#book-a-date' ).length != 0 )
				$( '<input class="datepicker ll-skin-melon" type="date"/>' ).insertAfter( '#book-a-date .overlabel' );
		}

		$( 'select.custom' ).ikSelect({
			ddFullWidth: false
		});

		$( '#sticky-tabs a' ).click( function (e) {
			e.preventDefault();
			$( this ).tab( 'show' );
		});
		$( '.thumbnail' ).find( 'p.excerpt' ).hide();
		the_excerpt();

		if ( $( '#map_canvas' ).length != 0 )
			initialize();

		med_datepicker();

		$( '.buttonWithCaret' ).on( 'click', function() {
			var $buttonCaret = $(this).find( '.caret' );
			$buttonCaret.caretToggle();
		});


		$( "#input-21f" ).rating();
		$( ".input-21e" ).rating({'readonly':'true'});
		/* Changes selected value of selectbox */
		$( '#input-21f' ).on( 'rating.change', function(event, value, caption) {
			$( 'a.rating-select' ).find( 'span.selectBox-label' ).html(value + ' Stars' );
		});

		if ( $( '#add_review' ).length != 0 ) {
			var  add_review_button = $( '#add_review' );
			add_review_button.click( function(){
				$( '#add_review_wrapper' ).animate({ opacity: '1', height: '100%' }, 500);
			});
			$( '#book_trigger' ).click( function() {
				$( 'a[href="#book"]' ).click();
			})
		}

		$( '.mobile input[type="date"].datepicker' ).click( function(){
			$( 'span.overlabel' ).hide();
		});

		$( "a.btn[href^='#']" ).on( 'click', function(e) {
			// prevent default anchor click behavior
			e.preventDefault();
			var target = this.hash;
			target = $(target);

			$( 'html, body' ).stop().animate({
				'scrollTop': target.offset().top
			}, 900, 'swing', function () {
				window.location.hash = target;
			});
		});


		$( '.sort .buttonWithCaret, #search_btn, .bg-info, #submit_search, .pagination li a'  ).on( 'click', function(){
			ajax_load_search_frontend();
		});

		$( 'label' ).find( '.star-rating' ).hide();

		if ( $( 'input[type="checkbox"]' ).length != 0 ) {
			$( 'input[type="checkbox"]' ).iCheck({
				labelHover: true,
				cursor: true,
				checkboxClass: 'icheckbox_square-orange'
			});
		}

		if ( $( '.select_appointment input[type="radio"]' ).length != 0 ) {
			$( '.select_appointment input[type="radio"]' ).iCheck( {
				labelHover: true,
				cursor: true,
				radioClass: 'icheckbox_square-orange'
			} );
		}

		if ( $( '.time-radioboxes' ).length != 0 ) {
			var button_pick_time = $( '.btn-pick-time' );
			button_pick_time.button();
			button_pick_time.on( 'click', function(){
				button_pick_time.removeClass( 'active' );
				$(this).addClass( 'active' );
			});
			/* Next Book section unhide function */
			$( '.doctor_controls button[type="submit"], .forgot_password_trigger' ).click( function(e){
				e.preventDefault();
				var current_element = $( this );
				current_element.parents( '.book_section' ).addClass( 'hidden' ).next( '.book_section.hidden' ).removeClass( 'hidden' );
			});
			/* Prev Book section unhide function */
			$( '.doctor_controls button[type="reset"], #book_section_back_link' ).click( function(e) {
				e.preventDefault();
				var current_element = $( this );
				current_element.parents( '.book_section' ).addClass( 'hidden' ).prev( '.book_section.hidden' ).removeClass( 'hidden' );
			});
		}
		scroll_to();

		$( '.post_meta.likes-button' ).on( 'click', function(){
			var container_meta = $( this ).find( '.badge' );
			var count = parseInt( container_meta.html() );
			if ( ! $( this ).hasClass( 'active' ) ) {
				container_meta.html( count + 1 );
				$( this ).addClass( 'active' );
			} else {
				container_meta.html( count - 1 );
				$( this ).removeClass( 'active' );
			}
			return false;
		});

		function scroll_to() {
			if($(window.location.hash).length > 0) {
				var hash = window.location.hash;
				if ( hash == '#reviews' ) {
					$( '#reviews' ).addClass( 'active' );
					$( '#book' ).removeClass( 'active' );
				}
				$( 'a[href="'+hash+'"]' ).click();
				$( 'html, body' ).animate( { scrollTop: $(hash).offset().top -80 }, 1000);
			}
		}

		if ( $( '#countdown' ).length != 0 ) {
			var newYear = new Date();
			newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1);
			$( '#countdown' ).countdown({until: newYear, format: 'dHM'});
		}

	});

	/*-----------------document,ready end -------------------*/

	$( window ).resize( function() {
		the_excerpt();
	});

	/* Google maps */
	function initialize() {
		var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
		var mapOptions = {
			zoom: 4,
			center: myLatlng
		}

		var map = new google.maps.Map(document.getElementById( "map_canvas" ),
			mapOptions);
		var marker = new google.maps.Marker({
			map: map,
			position: map.getCenter()
		});
	}

	function ajax_load_search_frontend() {
		var loader = $( '.bg-ajax-loader' );
		var loader_parent = loader.parent();
		var bg_height = loader.parent().outerHeight( true );
		if ( loader_parent.hasClass( 'profiles-loop' ) || loader_parent.hasClass( 'posts-loop' ) ) {
			var bg_width = loader_parent.outerWidth( true ) + 20;
		} else {
			var bg_width = loader_parent.outerWidth( true );
		}
		if ( $( '.post_meta.watched-button' ).length != 0 )
			$( '.post_meta' ).hide( 100 ).delay( 1200 ).fadeIn();
		loader.width( bg_width ).height( bg_height ).show();
		loader.delay(1200).fadeOut();
	}

	function the_excerpt() {
		if ( window.innerWidth > 782 ){
			$( '.thumbnail' ).on( 'mouseover', function() {
				$( this ).find( 'p.excerpt' ).show();
				var thumb_height = $( this ).outerHeight( true );
				if ( $( this ).find( 'p.excerpt' ).height() != 0 )
					var exerpt_height = $( this ).find( 'p.excerpt' ).outerHeight( true );
				var thumb_width = $( this ).width();
				$( this ).find( '.caption' ).css({position: "absolute", width: thumb_width} ).css( 'margin-top', -exerpt_height );
			});
			$( '.thumbnail' ).on( 'mouseout', function() {
				$( this ).find( '.caption' ).attr( 'style', ''  );
				$( this ).find( 'p.excerpt' ).hide();
			});
		}
	}

	$.fn.caretToggle = function () {
	// get caret element
		var $caretElement = $(this[0]);
	// if is wrapped inside of a span with the dropup, then unwrap else wrap
		// inside of a span with class dropup
		if (!$caretElement.parent().hasClass( 'dropup' )) {
			var $caretWrapper = $caretElement.parent().addClass( 'dropup' );
		} else {
			$caretElement.parent().removeClass( 'dropup' );
		}
		// for chainablity
		return $caretElement;
	};

	function med_datepicker() {
		$( "#book_an_appointment_date" ).datepicker({
			showOtherMonths: true
		});
		$( '#book_datepicker' ).datepicker({
			showOtherMonths: true,
			inline: true
		});
		$( '#ui-datepicker-div' ).addClass( 'll-skin-melon' );
		$( "input.datepicker" ).datepicker( "option", "dateFormat", "d MM, yy" );
	};
})(jQuery);