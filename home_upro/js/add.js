jQuery(document).ready(function($) { 

	$(document).on('change', 'input[name="city"]', function(){
		const this_ = $(this);
		$('ul#districts').empty();
		$('#current_district').text('Район');
		$('ul#districts').not('.not_all').append(`<li class="option selected focus"><label for="select-3-0"></label><input type="radio" name="district" id="select-3-0" value="" checked>Всі</li>`);
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
			/*'draft': $('input[name="draft"]').val(),*/
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

	/*$(document).on('click', '#form_sold_publish', function(e){
		e.preventDefault();
		form_sold();
	});*/

	$(document).on('submit', '#form_sold', function(e){
		e.preventDefault();
		form_sold();
	});

	/*$(document).on('click', '#form_sold_draft', function(e){
		e.preventDefault();
		if($('#form_sold').valid()){
			$('input[name=draft]').val(true);
			form_sold();
		}
	});*/


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


	$(document).on('click', '.delete_object_from_favourite', function(e){
		e.preventDefault();
		
		let data = {
			'action': 'delete_object_from_favourite',
			'object_id': $(this).closest('.send-block').attr('object_id'),
			'current_user_id': $(this).closest('.send-block').attr('current_user_id'),
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


	$(document).on('click', '.delete_object', function(e){
		e.preventDefault();
		
		let data = {
			'action': 'delete_object',
			'object_id': $(this).closest('.send-block').attr('object_id'),
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
	});


	$(document).on('click', '.delete_selection', function(e){
		e.preventDefault();
		
		let data = {
			'action': 'delete_selection',
			'selection_id': $(this).closest('.item-user').attr('selection_id') ? $(this).closest('.item-user').attr('selection_id') : $(this).closest('.item-photo').attr('selection_id'),
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


	$(document).on('click', '.like-item a', function(e){
		e.preventDefault();
		let _this = $(this);
		
		let data = {
			'action': 'add_to_favourite',
			'object_id': _this.attr('object_id'),
			'current_user_id': _this.attr('current_user_id'),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					_this.closest('.like-item').toggleClass('is-like');
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});


	$(document).on('click', '.add_object_to_selection a', function(e){
		e.preventDefault();
		let _this = $(this);
		
		let data = {
			'action': 'add_object_to_selection',
			'object_id': _this.closest('.item-photo').attr('object_id'),
			'selection_id': _this.closest('.item-photo').attr('selection_id'),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					_this.closest('.add_object_to_selection').toggleClass('is_added');
					location.reload();
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	});


	function edit_user_phone() {

		let data = {
			'action': 'edit_user_phone',
			'current_user_id': $('.edit_user_phone').attr('current_user_id'),
			'current_user_phone': $('input[name="user-tel"]').val(),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					//window.location.href = data;
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	}

	$(document).on('click', '.edit_user_phone', function (e){
		e.preventDefault();
		$(this).toggleClass('is-active');
		if($(this).hasClass('is-active')){
			$(this).closest('.text-wrap').find('input').prop("disabled",false);
		}else{
			edit_user_phone();
			$(this).closest('.text-wrap').find('input').prop("disabled",true);
		}

	});

	$(document).on('input', '#user-tel', function(e){
		e.preventDefault();
		edit_user_phone();
	});


	$(document).on('click', '.hide_object', function(e){
		e.preventDefault();
		$(this).closest('.item-home').remove();
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