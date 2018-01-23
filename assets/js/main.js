/**
 * Created by Gebruiker on 06/10/2017.
 */
$( document ).ready(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$('#sandbox-container .input-daterange').datepicker({
	format: 'yyyy/mm/dd'
});

$("#addSkills").click(function () {
	var div = document.getElementById('skills_div'),
		clone = div.cloneNode(true);
	clone.id = 'skills_div';
	var removebutton = document.createElement("a");
	removebutton.setAttribute("id", "remove_skills");
	removebutton.innerHTML = "verwijder vaardigheid";
	clone.append(removebutton);
	$(".skills_group").append(clone);
});


$(".skills_group").click(function (e) {
	if (e.target.id == "remove_skills") {
		e.target.parentElement.remove();
	}
});
