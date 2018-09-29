/*
 * Archivo Javascript general del Chan de Cartón
 * =============================================
 */
 
onready(function () {
	$("#email-sel").on( "change", function() {
		
		var emailFunction = $("#email-sel option:selected").val();
		
		if (emailFunction != "" && emailFunction != "sage" && emailFunction != "noko") {
			emailFunction = "#" + emailFunction;
		}
		$("input[name=email]").val( emailFunction );
	});
});