function listenerSubmit(formId, strCallback){
	$('#' + formId).bind('submit', function(){
		if ( ! $(this).find('input[type="submit"]').eq(0).hasClass('disabled') )
			window[strCallback]();
		return false;
	});
}

function disableSubmit(formId){
	$('#' + formId).find('input[type="submit"]').eq(0).addClass('disabled')
		.parent().append( $('<div class="loading">') );
}

function enableSubmit(formId){
	$('#' + formId).find('input[type="submit"]').eq(0).removeClass('disabled')
		.parent().find('.loading').eq(0).remove();
}

function addMessage(type, title, body){
	toastr[type](body, title);
}