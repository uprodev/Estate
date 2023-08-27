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
			},
		});
		return false;
	}

	$(document).on('submit', '#filter_objects', function(e){
		e.preventDefault();
		filter_objects();
	});

	$(document).on('change', 'input[type=radio][name=sort]', function(e){
		filter_objects();
	});

	$(document).on('click', '#filter_objects_reset', function(e){
		e.preventDefault();
		$('#filter_objects').trigger("reset");
	});

});