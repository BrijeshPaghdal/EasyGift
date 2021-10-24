/*************** TO DO **********************/
'use strict';
$(document).on('click', '.to-do-list .form-check-label .form-check-input', function () {
	$(this).parent('label').toggleClass('line-through');
});
$(document).on('click', '.todo-remove', function () {
	$(this).closest("li").remove();
	return false;
});

$(document).on('click', '.panel .tools .fa-times', function () {
	$(this).parents(".panel").parent().remove();
});