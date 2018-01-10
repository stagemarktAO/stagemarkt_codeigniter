/**
 * Created by Gebruiker on 06/10/2017.
 */
$( document ).ready(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function() {
	$('.select2-single').select2();
});

$("#gradation").change(function () {
	var select = document.createElement("select");
	var option = document.createElement("option");
	select.append("option");
	document.getElementById("div69").append(select);
});