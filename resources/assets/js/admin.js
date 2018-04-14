$(".role_checkbox").change(function () {

	$.ajax({
		type: 'POST',
		url: "/admin/user/postAssignRoles",
		headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
		data: {
			userId: $(this).val(),
			roleName: $(this).attr('name')
		}
	});

});

$(".titleimage").change( function () {

	$.ajax({
		type: 'POST',
		url: "/admin/gallery/images/albums/"+$('#album_id').val()+"/setThumb",
		headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
		data: {
			thumbImage: $(this).val()
		}
	});

})

$(document).ready(function(){

	$( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();

    $( ".datepicker" ).datetimepicker({
    	changeMonth: true,
    	changeYear: true,
    	dateFormat: "dd.mm.yy",
    	firstDay: 1,
    	controlType: 'select'
    });
	
});