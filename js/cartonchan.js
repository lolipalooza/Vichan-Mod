/*
 * Archivo Javascript general del Chan de Cartón
 * =============================================
 */
 
onready(function () {
	$(".email-sel").on( "change", function() {
		var emailFunction = $(".email-sel option:selected").val();
		$("input[name=email]").val( emailFunction );
	});
	
	$("input[name=email]").bind( 'input', asdf = function() {
		var sel = $("input[name=email]").val();
		$(".email-sel").val( sel );
	}).on( 'change', asdf );
});