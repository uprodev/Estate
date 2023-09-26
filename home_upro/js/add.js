var DZ
jQuery(document).ready(function($) {

	$(document).on('change', 'input[name="tax_city"], input[name="city"]', function(){
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


	$(document).on('change', 'input[name="region"]', function(){

		let data = {
			'action': 'cities_from_db',
			'region_id': $(this).attr('region_id'),
		}

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: data,
			type: 'POST',
			success: function (data) {
				if (data) {
					let cities = JSON.parse(data.slice(0, -1));
					cities = cities.map(function (city) {
						return city.name
					})
					$('input[name="city"]').autocomplete({
						source: cities,
					});
				} else {
					console.log('Error!');
				}
			},
		});

		return false;
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

	/*$(document).on('click', '#filter_objects_reset', function(e){
		e.preventDefault();
		$('#filter_objects').trigger("reset");
	});*/


	function add_object() {

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: $("#add_object").serialize(),
			type: 'POST',
			success: function (data) {
				if (data) {
					window.location.href = data;
					//console.log(data);
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	}

	$(document).on('submit', '#add_object', function(e){
		e.preventDefault();
		add_object();
	});

	$(document).on('click', '#add_object_draft', function(e){
		e.preventDefault();
		if($('#add_object').valid()){
			$('input[name=draft]').val(true);
			add_object();
		}
	});


	function edit_object() {

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: $("#edit_object").serialize(),
			type: 'POST',
			success: function (data) {
				if (data) {
					window.location.href = data;
					//console.log(data);
				} else {
					console.log('Error!');
				}
			},
		});
		return false;
	}

	$(document).on('submit', '#edit_object', function(e){
		e.preventDefault();
		edit_object();
	});

	$(document).on('click', '#edit_object_draft', function(e){
		e.preventDefault();
		if($('#edit_object').valid()){
			$('input[name=draft]').val(true);
			edit_object();
		}
	});


	$(document).on('click', '.object_to_draft', function(e){
		e.preventDefault();

		let data = {
			'action': 'object_to_draft',
			'object_id': $(this).closest('.send-block').attr('object_id'),
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


	$(document).on('click', '.object_to_publish', function(e){
		e.preventDefault();

		let data = {
			'action': 'object_to_publish',
			'object_id': $(this).closest('.send-block').attr('object_id'),
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


	function form_sold() {

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: $("#form_sold").serialize(),
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

	$(document).on('submit', '#form_sold', function(e){
		e.preventDefault();
		form_sold();
	});


	function create_selection() {

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: $("#form_create_selection").serialize(),
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


	/*$(document).on('click', '.hide_object', function(e){
		e.preventDefault();
		$(this).closest('.item-home').remove();
	});*/


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



	function addChildDropzone() {
		var  childDropzoneArr = [];

		var url = '/wp-admin/admin-ajax.php' + '?action=dropzonejs_upload';

		if ($('#upload_user_avatar').length)
			var url = '/wp-admin/admin-ajax.php' + '?action=dropzonejs_upload&user_id=' + user_id;

		$("#dZUpload").dropzone({

			url: url,
			maxFiles: $('#upload_user_avatar').length  ? 1 : 10,

     // autoProcessQueue: false ,
			thumbnailWidth: 640,
			thumbnailHeight: 640,
			acceptedFiles: 'image/*',
			previewTemplate: "<figure><img data-dz-thumbnail /> <a data-id=''  href='#'>x</a> </figure>",
			init: function() {

				DZ = this
				var container = $(this.element);


				this.on("sending", function(files, xhr, formData) {
					container.addClass("loading");
				});

				this.on("complete", function(file, data) {

					$('#dZUpload figure.dz-image-preview').each(function(l){

						var id = childDropzoneArr[l];
            //console.log(l)
						$(this).find('a').attr('data-id', id);

					})

					$('[name="images"]').val(childDropzoneArr.join(','));

				});


				this.on("success", function(file, data) {
					childDropzoneArr.push(data);

				});

			},


		});
	}
	addChildDropzone();

	$(document).on('click', '.dz-image-preview a', function(e){
		e.preventDefault()
		var id = $(this).attr('data-id');
		$(this).parent().remove();

		childDropzoneArr = [];
		$('#dZUpload figure.dz-image-preview').each(function(){
			var id = $(this).find('a').attr('data-id');
			childDropzoneArr.push(id);

		})

		$('[name="images"]').val(childDropzoneArr.join(','))

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: {
				action : 'delete_attachment' ,
				id: id
			},
			type: 'POST',
			dataType: 'json',
			success: function (data) {
				if (data) {
					console.log(data)

				}
			}
		});
	})

});
