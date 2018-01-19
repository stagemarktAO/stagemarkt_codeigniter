/**
 * Created by Gebruiker on 06/10/2017.
 */
$( document ).ready(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function() {
	$('.select2-single').select2();
});

$('#sandbox-container .input-daterange').datepicker({
	format: 'yyyy/mm/dd'
});

$("#addSkills").click(function () {
	var div = document.getElementById('skills_div'),
		clone = div.cloneNode(true);
	clone.id = 'skills_div1';
	document.body.append(clone);
	$("#skills_div").show();
	$("#gradation, #skills").prop("disabled", false);
});
