jQuery(document).ready(function($) { 

	$(document).on('change', 'input[name="city"]', function(){
		const this_ = $(this);
		$('ul#districts').empty();
		$('#current_district').text('Район');
		$('ul#districts').append(`<li class="option selected focus"><label for="select-3-0"></label><input type="radio" name="district" id="select-3-0" value="" checked>Всі</li>`);
		let counter = 0;
		$.each(php_vars.cities, function(index, value){
			if(this_.val() == value.parent){
				//const li_class = counter == 0 ? ' selected focus' : '';
				//const checked = counter == 0 ? ' checked' : '';
				$('ul#districts').append(`<li class="option"><label for="select-3-${index + 1}"></label><input type="radio" name="district" id="select-3-${index + 1}" value="${value.term_id}">${value.name}</li>`);
				counter++;
			}
		});
	})


	function filter_objects() {
		const filter = $("#filter_objects");
		var url = filter.attr("action");
		var query = filter.attr("action");
		newurl = query;
		query = filter.serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: filter.serialize(), 
			type: filter.attr("method"),
			beforeSend: function (xhr) {},
			success: function (data) {
				$("#response_objects").html(data);
				$('.pagination-wrap').hide();
			},
		});
		return false;
	}


	$(document).on('change', '#sort input[type=radio]', function(e){
		$('input[name=sort]').val($(this).val());
		filter_objects();
	});

	$(document).on('submit', '#filter_objects', function(e){
		e.preventDefault();
		filter_objects();
	});

	$(document).on('click', '#filter_objects_reset', function(e){
		e.preventDefault();
		$('#filter_objects').trigger("reset");
	});


	function form_sold() {
		const form = $("#form_sold");

		let data = {
			'action': 'form_sold',
			'object_id': form.attr('object_id'),
			'selling_price': $('input[name="selling_price"]').val(),
			'commission_price': $('input[name="commission_price"]').val(),
			'buyer_name': $('input[name="buyer_name"]').val(),
			'buyer_phone': $('input[name="buyer_phone"]').val(),
			'lead': $('input[name="lead"]:checked').val(),
			'comment': $('textarea[name="comment"]').val(),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data, 
			type: 'POST',
			success: function (data) {
				if (data) {
					window.location.href = data;
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	}

	$(document).on('click', '#form_sold_publish', function(e){
		e.preventDefault();
		form_sold();
	});

	$(document).on('click', '#form_sold_draft', function(e){
		e.preventDefault();
		$('input[name=draft]').val(true);
		form_sold();
	});


	function create_selection() {

		let data = {
			'action': 'create_selection',
			'buyer_name': $('input[name="buyer_name"]').val(),
			'buyer_phone': $('input[name="buyer_phone"]').val(),
			'object_id': $('input[name="object_id"]').val(),
			'author_id': $('input[name="author_id"]').val(),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					window.location.href = data;
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	}

	$(document).on('submit', '#form_create_selection', function(e){
		e.preventDefault();
		create_selection();
	});


	$(document).on('click', '.delete_object_from_selection', function(e){
		e.preventDefault();
		
		let data = {
			'action': 'delete_object_from_selection',
			'object_id': $(this).attr('object_id'),
			'selection_id': $(this).attr('selection_id'),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					location.reload();
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});


	if ($('.loginform').length)
		$('.loginform').validate({
			errorPlacement: function(error, element) {
				var placement = $(element).data('error');
				var pl = $(element).closest('div')
				error.prependTo(pl);
			},

			submitHandler: function (form) {
				var data = $('.loginform').serialize()
				$.ajax({
					url: '/wp-admin/admin-ajax.php',
					data: data,
					type: 'POST',
					dataType: 'json',
					success: function (data) {
						if (data) {
							console.log(data)

							$('.result-login').html(data.status)

							if (data.update)
								location.href = data.redirect
						}
					}
				});
			}
		});

});