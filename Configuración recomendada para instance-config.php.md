Configuración Recomendada para instance-config.php
==================================================

Es importante que tú mismo te familiarices con los archivos de configuración `inc/config.php` e `inc/instance-config.php`,
y descubras todas sus posibilidades. Para ello, lo mejor es ir leyendo poco a poco cada linea de código junto a los comentarios
en `config.php`, e ir incorporandolos a `instance-config.php`, y experimentando con cada variable de configuración. Recuerda que
__no debes modificar bajo ningún motivo__ el archivo `config.php`, que para eso está `instance-config.php`, o se te hará dificil
actualizar tu versión de _Vichan_.

Sin embargo, si careces totalmente de los conocimientos y no tienes tiempo o ganas, aquí te dejo la versión de `instance-config.php`
con la que trabaja _La Sociedad de los Lolchanesmuertos_.

__Nota__: no necesariamente es la configuración más óptima.

```
<?php

/*
*  Instance Configuration
*  ----------------------
*  Edit this file and not config.php for imageboard configuration.
*
*  You can copy values from config.php (defaults) and paste them here.
*/

	$config['php_md5'] = true;

	/* ¡Estos campos los tienes que rellenar tú, de acuerdo a tu servidor y tu base de datos!
		o en el caso de que ya los tengas, no debes modificarlos! */
	$config['db']['server'] = '';
	$config['db']['database'] = '';
	$config['db']['prefix'] = '';
	$config['db']['user'] = '';
	$config['db']['password'] = '';


	$config['cookies']['mod'] = 'mod';
	$config['cookies']['salt'] = 'MmJhMzc2ZTg4MjMzNjE2OTRiMmVjOG';

	$config['flood_time'] = 1;
	$config['flood_time_ip'] = 1;
	$config['flood_time_same'] = 1;
	$config['max_body'] = 1800;
	$config['reply_limit'] = 250;
	$config['max_links'] = 20;
	$config['thumb_width'] = 255;
	$config['thumb_height'] = 255;
	$config['threads_per_page'] = 10;
	$config['max_pages'] = 20;
	$config['threads_preview'] = 5;
	$config['root'] = '';
	$config['secure_trip_salt'] = 'MmU2OWQyNWYwZjIwNzE0YTdkNzc1OD';


	$config['debug'] = false;
	$config['debug_explain'] = false;
	$config['verbose_errors'] = true;




/*
 * ====================
 *  Post settings
 * ====================
 */

	// Do you need a body for new threads?
	$config['force_body_op'] = false;

	// Maximum post body length.
	$config['max_body'] = 8000;

	// Allow users to mark their image as a "spoiler" when posting. The thumbnail will be replaced with a
	// static spoiler image instead (see $config['spoiler_image']).
	$config['spoiler_images'] = true;

	// Allow "uploading" images via URL as well. Users can enter the URL of the image and then Tinyboard will
	// download it. Not usually recommended.
	$config['allow_upload_by_url'] = true;
	// The timeout for the above, in seconds.
	$config['upload_by_url_timeout'] = 1000;
	
	// Example: Custom tripcodes. The below example makes a tripcode of "#test123" evaluate to "!HelloWorld".
	// Example: Custom secure tripcode.
	//$config['custom_tripcode']['##securetrip'] = '!!somethingelse';
	
/*
* ====================
*  Ban settings
* ====================
*/

	// Show the post the user was banned for on the "You are banned" page.
	$config['ban_show_post'] = true;

/*
 * ====================
 *  Markup settings
 * ====================
 */

	// "Wiki" markup syntax ($config['wiki_markup'] in pervious versions):
	$config['markup'][] = array("*:v*", "<img src=\"../../pacman.png\" alt=\":v\" title=\"Pacman\">");
	
	// Symbols
	$config['markup'][] = array("/'''(.+?)'''/", "<strong>\$1</strong>");
	$config['markup'][] = array("/''(.+?)''/", "<em>\$1</em>");
	$config['markup'][] = array("/__(.+?)__/", "<u>\$1</u>");
	$config['markup'][] = array("/~~(.+?)~~/", "<strike>\$1</strike>");
	$config['markup'][] = array("/\*\*(.+?)\*\*/", "<span class=\"spoiler\">\$1</span>");
	$config['markup'][] = array("/^[ |\t]*==(.+?)==[ |\t]*$/m", "<span class=\"heading\">\$1</span>");
	$config['markup'][] = array("/\^\^\^(.+?)\^\^\^/", "<span class=\"smooth-blink\">\$1</span>");
	$config['markup'][] = array("/\^\^(.+?)\^\^/", "<span class=\"blink\">\$1</span>");
	$config['markup'][] = array("/^&lt;(.+?)$/m", "<span class=\"quote-alt\">&lt;\$1</span>");
	
	// BBCodes
	$config['markup'][] = array("/\[b\](.+?)\[\/b\]/", "<strong>\$1</strong>");
	$config['markup'][] = array("/\[i\](.+?)\[\/i\]/", "<em>\$1</em>");
	$config['markup'][] = array("/\[u\](.+?)\[\/u\]/", "<u>\$1</u>");
	$config['markup'][] = array("/\[s\](.+?)\[\/s\]/", "<strike>\$1</strike>");
	$config['markup'][] = array("/\[spoiler\](.+?)\[\/spoiler\]/", "<span class=\"spoiler\">\$1</span>");
	$config['markup'][] = array("/\[blink\](.+?)\[\/blink\]/", "<span class=\"blink\">\$1</span>");
	$config['markup'][] = array("/\[sblink\](.+?)\[\/sblink\]/", "<span class=\"smooth-blink\">\$1</span>");

/*
 * ====================
 *  Image settings
 * ====================
 */

	// Maximum image upload size in bytes.
	$config['max_filesize'] = 10 * 1024 * 1024; // 10MB
	// Maximum image dimensions.
	$config['max_width'] = 10000;
	$config['max_height'] = $config['max_width'];


/*
 * ====================
 *  Webm settings
 * ====================
 */


	//webm
	$config['allowed_ext_files'][] = 'webm';
	$config['webm']['allow_audio'] = true;
	$config['webm']['max_length'] = 5000;

/*
$config['webm']['use_ffmpeg'] = true;

// If your ffmpeg binary isn't in your path you need to set these options
// as well.

$config['webm']['ffmpeg_path'] = '/path/to/ffmeg';
$config['webm']['ffprobe_path'] = '/path/to/ffprobe';
*/


/*
 * ====================
 *  Display settings
 * ====================
 */

	/*
	 * For lack of a better name, “boardlinks” are those sets of navigational links that appear at the top
	 * and bottom of board pages. They can be a list of links to boards and/or other pages such as status
	 * blogs and social network profiles/pages.
	 *
	 * "Groups" in the boardlinks are marked with square brackets. Tinyboard allows for infinite recursion
	 * with groups. Each array() in $config['boards'] represents a new square bracket group.
	 */

	
	/** Opcional: debes modificarlo de acuerdo a tus necesidades **/
	/*$config['boards'] = array(
		array('home' => ''),
		array('b', 'arch', 'pro', 'h', 'q'),
		array(
			'recent' => '/recent.html',
			'mod' => '/mod.php'
		)
	);*/

	// Show "Catalog" link in page navigation. Use with the Catalog theme.
	$config['catalog_link'] = 'catalog.html';


/*
 * ====================
 *  Javascript
 * ====================
 */

	// Some scripts require jQuery. Check the comments in script files to see what's needed. When enabling
	// jQuery, you should first empty the array so that "js/query.min.js" can be the first, and then re-add
	// "js/inline-expanding.js" or else the inline-expanding script might not interact properly with other
	// scripts.
	$config['additional_javascript'] = array();

	$config['additional_javascript'][] = 'js/jquery.min.js';
	$config['additional_javascript'][] = 'js/inline-expanding.js';
	$config['additional_javascript'][] = 'js/auto-reload.js';
	$config['additional_javascript'][] = 'js/post-hover.js';
	$config['additional_javascript'][] = 'js/style-select.js';
	$config['additional_javascript'][] = 'js/show-op.js';
	$config['additional_javascript'][] = 'js/show-backlinks.js';
	$config['additional_javascript'][] = 'js/show-own-posts.js';

	$config['additional_javascript'][] = 'js/webm-settings.js';
	$config['additional_javascript'][] = 'js/expand-video.js';
	$config['additional_javascript'][] = 'js/youtube.js';
	$config['additional_javascript'][] = 'js/ytlinks.js';
	
	$config['additional_javascript'][] = 'js/chan-de-carton.js';

	//$config['additional_javascript'][] = 'js/happy-chon.js';
	//$config['additional_javascript'][] = 'js/shinku.js';
	
	/** Todo nuevo javascript que desees integrar a tus boards debe ir aquí **/
/*
 * ====================
 *  Video embedding
 * ====================
 */

	// Enable embedding (see below).
	$config['enable_embedding'] = true;

	// Custom embedding (YouTube, vimeo, etc.)
	// It's very important that you match the entire input (with ^ and $) or things will not work correctly.
	$config['embedding'] = array(
		array(
			'/^https?:\/\/(\w+\.)?youtube\.com\/watch\?v=([a-zA-Z0-9\-_]{10,11})(&.+)?$/i',
			//'<iframe style="float: left;margin: 10px 20px;" width="%%tb_width%%" height="%%tb_height%%" frameborder="0" id="ytplayer" src="https://www.youtube.com/embed/$2" allowfullscreen></iframe>'
			'<p class="fileinfo ytinfo"><a href="https://www.youtube.com/watch?v=$2" target="_blank">Enlace a YouTube</a></p>
			<div class="video-container" data-servicio="youtube" data-video="$2">
				<a href="https://www.youtube.com/watch?v=$2" target="_blank" class="file">
					<img style="max-width:%%tb_width%%px" src="//img.youtube.com/vi/$2/0.jpg" class="post-image">
				</a>
			</div>'
		),
		array(
			'/^https?:\/\/(\w+\.)?vimeo\.com\/(\d{2,10})(\?.+)?$/i',
			'<object style="float: left;margin: 10px 20px;" width="%%tb_width%%" height="%%tb_height%%"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="%%tb_width%%" height="%%tb_height%%"></object>'
		),
		array(
			'/^https?:\/\/(\w+\.)?dailymotion\.com\/video\/([a-zA-Z0-9]{2,10})(_.+)?$/i',
			'<object style="float: left;margin: 10px 20px;" width="%%tb_width%%" height="%%tb_height%%"><param name="movie" value="http://www.dailymotion.com/swf/video/$2"><param name="allowFullScreen" value="true"><param name="allowScriptAccess" value="always"><param name="wmode" value="transparent"><embed type="application/x-shockwave-flash" src="http://www.dailymotion.com/swf/video/$2" width="%%tb_width%%" height="%%tb_height%%" wmode="transparent" allowfullscreen="true" allowscriptaccess="always"></object>'
		),
		array(
			'/^https?:\/\/(\w+\.)?metacafe\.com\/watch\/(\d+)\/([a-zA-Z0-9_\-.]+)\/(\?.+)?$/i',
			'<div style="float:left;margin:10px 20px;width:%%tb_width%%px;height:%%tb_height%%px"><embed flashVars="playerVars=showStats=no|autoPlay=no" src="http://www.metacafe.com/fplayer/$2/$3.swf" width="%%tb_width%%" height="%%tb_height%%" wmode="transparent" allowFullScreen="true" allowScriptAccess="always" name="Metacafe_$2" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></div>'
		),
		array(
			'/^https?:\/\/video\.google\.com\/videoplay\?docid=(\d+)([&#](.+)?)?$/i',
			'<embed src="http://video.google.com/googleplayer.swf?docid=$1&hl=en&fs=true" style="width:%%tb_width%%px;height:%%tb_height%%px;float:left;margin:10px 20px" allowFullScreen="true" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>'
		),
		array(
			'/^https?:\/\/(\w+\.)?vocaroo\.com\/i\/([a-zA-Z0-9]{2,15})$/i',
			'<object style="float: left;margin: 10px 20px;" width="148" height="44"><param name="movie" value="http://vocaroo.com/player.swf?playMediaID=$2&autoplay=0"><param name="wmode" value="transparent"><embed src="http://vocaroo.com/player.swf?playMediaID=$2&autoplay=0" width="148" height="44" wmode="transparent" type="application/x-shockwave-flash"></object>'
		)
	);

/*
 * ====================
 *  Mod settings
 * ====================
 */

	// Enable the moving of single replies
	$config['move_replies'] = false;

/*
 * ====================
 *  Mod permissions
 * ====================
 */

	// "Move" a thread to another board (EXPERIMENTAL; has some known bugs)
	$config['mod']['move'] = ADMIN;
```