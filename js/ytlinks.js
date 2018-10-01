onready(function(){
	var embeds=function(e){
		$("div.video-container a", e).click(function(e2){
			e2.preventDefault();
			var e = $(this.parentNode).data("servicio"),
				t = $(this.parentNode).data("video");
			$(this).hide();
			$(this).parent().parent().find(".fileinfo")
				.append(' <b class="cerrar_video" data-servicio="' + e + '" data-video="' + t + 
				'"><a href="javascript:cerrar_video(\'' + e + "','" + t + "')\">[Ocultar]</a></b>");
			var a = i = 250;
			if (window.innerWidth > 767) var a = 640,
				i = 360;
			if (window.innerWidth > 1199) var a = 854,
				i = 480;
			return "youtube" == e && $(this.parentNode).append(vidEm(a, i, "//www.youtube.com/embed/", t, "?autoplay=1&html5=1")),
				"spankbang" == e && $(this.parentNode).append(vidEm(a, i, "https://spankbang.com/", t, "/embed/")),
				"xvideos" == e && $(this.parentNode).append(vidEm(a, i, "https://flashservice.xvideos.com/embedframe/", t, "")),
				"pornhub" == e && $(this.parentNode).append(vidEm(a, i, "https://www.pornhub.com/embed/", t, "")),
				"twitch" == e && $(this.parentNode).append(vidEm(a, i, "https://player.twitch.tv/?volume=1&channel=", t, "")),
				"soundcloud" == e && $(this.parentNode).append(vidEm(a, i, "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/", t, "&amp;auto_play=true&amp;hide_related=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true")),
				"mixlr" == e && $(this.parentNode).append(vidEm("100%", "180px", "https://mixlr.com/users/", t, "/embed")),
				document.addEventListener("keydown", function(a) {
					(27 == a.keyCode || 88 == a.keyCode) && cerrar_video(e, t)
				}, !1), !1
		});
	};
	embeds(document);
});

function cerrar_video(e,t){
	$(".video-container[data-servicio="+e+"][data-video="+t+"] a").show();
	$(".cerrar_video[data-servicio="+e+"][data-video="+t+"]").remove();
	$(".video-container[data-servicio="+e+"][data-video="+t+"] #mostrando-embed").remove();
}

function vidEm(e,t,a,i,o){
	return '<div id="mostrando-embed"><iframe style="display:block;margin:auto" width="'+e+
	'" height="'+t+'" src="'+a+i+o+'" allowfullscreen frameborder="0"/></div>'
}
