// Default
$(document).ready(function () {
	"use strict";

	$(document).on("click", ".open_jobInfoModal", function () {
		var jobId = $(this).data('id');
		$.ajax({
			type: 'GET',
			url: '/data/job/' + jobId,
			beforeSend: resetData(),
			success: loadData,
			complete: function () {
				$("#loadingModal").hide();
				$("#modalBody").show();
			},
		});

		function resetData() {
			$("#loadingModal").show();
			$("#modalBody").hide();
			$("#urlStProfile").attr('href', "#");
		}

		function loadData(data) {
			var urlStProfile = '/job/' + data.id;
			var urlCreateProposal = '/proposal/create_proposal/' + data.id;
			$("#nameJob").text(data.name_job);
			$("#levelJob").attr('value', data.level_need);
			$("#toolJob").attr('value', data.tool_need);
			$("#serviceJob").attr('value', data.service_need);
			$("#descriptionJob").attr('value', data.description);
			$("#inputFileJob").attr('value', data.input_file_url);
			$("#inputFileJob").attr('href', data.input_file_url);
			$("#openPriceJob").attr('value', data.open_price);
			$("#durationJob").attr('value', data.duration + ' Hari');
			// if (data.is_home_service) {
			// 	$("#isHomeServiceJob").text('Home Service');
			// } else {
			// 	$("#isHomeServiceJob").text('Tidak Home Service');
			// }
			$("#urlStProfile").attr('href', urlStProfile);
			$("#urlCreateProposal").attr('href', urlCreateProposal);
			// console.log(data);
		}

	});

	// Format mata uang.
	$('.uang').mask('000.000.000.000.000', { reverse: true });

	/* Select2 */
	$('select').select2();

	$('#select2kota').select2({
		placeholder: 'Cari kota...',
		ajax: {
			url: '/data/kota',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.location,
							id: item.location
						}
					})
				};
			},
			cache: true
		}
	});

	/* Tooltip */
	$('[data-toggle="tooltip"]').tooltip();

	/* index */
	$('.recent-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		responsive: [{
			breakpoint: 1099,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
			}
		}

		]
	});

	$('.services-slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		responsive: [{
			breakpoint: 1099,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
			}
		}

		]
	});

	$('.freelance-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		responsive: [{
			breakpoint: 1099,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
			}
		}

		]
	});
	$('.service-slider').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		responsive: [{
			breakpoint: 1099,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
			}
		}

		]
	});

	/* web design */
	$(function () {
		$('#aniimated-thumbnials').lightGallery({
			thumbnail: true,
		});

		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			adaptiveHeight: true,
			asNavFor: '.slider-nav'
		});

		$('.recommend').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: true,
			fade: false,
		});


		$('.slider-nav').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			dots: false,
			arrows: true,
			focusOnSelect: true,
			variableWidth: true,
			responsive: [{
				breakpoint: 1099,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
				}
			}

			]
		});
	});
	/* profile */

	/* wireframe */
	$('#aniimated-thumbnials').lightGallery({
		thumbnail: true,
	});

	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		fade: true,
		adaptiveHeight: true,
		asNavFor: '.slider-nav'

	});

	$('.recommend').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		responsive: [{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
			}
		}

		]
	});

	$('.view').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true,
		fade: false,
		responsive: [{
			breakpoint: 1099,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
			}
		}

		]
	});

	$('.slider-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		arrows: true,
		focusOnSelect: true,
		variableWidth: true,
		responsive: [{
			breakpoint: 1099,
			settings: {
				slidesToShow: 4,
			}
		},
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
			}
		}

		]
	});


});