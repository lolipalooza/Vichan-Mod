<?php

/*
 * Copyright: tu gfa :'v
 */

 
function email_dados($post)
{
	global $config;
	
	switch ( strtolower($post['email']) ) {
		case '#dados999': $class = "xl-dice"; $n = 999; break;
		case '#dados100': $class = "lg-dice"; $n = 100; break;
		case '#dados20': $class = "md-dice"; $n = 20; break;
		case '#dados10': $class = "sm-dice"; $n = 10; break;
		case '#dados6': $class = "xs-dice"; $n = 6; break;
		case '#dados2': $class = "coin"; $n = 2; break;
		default: return $post; break;
	}
	
	if ( $post['email'] == '#dados2' )
	{
		if ( isset($config['moneda']) && $config['moneda'] != "" )
			$post['body'] = sprintf($config['moneda'], $class, $class) . $post['body'];
		else
			$post['body'] = "<strong><em><u>Error</u>: no tienes configurada la moneda, lee la documentación y repara el error en instance-config.php</em></strong><br><br>" . $post['body'];
	}
	else
	{
		if ( isset($config['dados']) && $config['dados'] != "" )
			$post['body'] = sprintf($config['dados'], $class, $n, $class, rand(1,$n)) . $post['body'];
		else
			$post['body'] = "<strong><em><u>Error</u>: no tienes configurados los dados, lee la documentación y repara el error en instance-config.php</em></strong><br><br>" . $post['body'];
	}
	$post['email'] = '';
	
	return $post;
}



function email_ruleta($post)
{
	global $config;
	
	if (strtolower($post['email']) == '#ruleta') {
		if ( isset($config['ruleta']['mensajes']) && count($config['ruleta']['mensajes'])>0
			&& isset($config['ruleta']['ban']['mensajes']) && count($config['ruleta']['ban']['mensajes'])>0
			&& $config['ruleta']['default'] != ""
			&& $config['ruleta']['body1'] != ""
			&& $config['ruleta']['body2'] != "" )
		{
			$mensajes = $config['ruleta']['mensajes'];
			$mensaje = $mensajes[ rand(0,sizeof($mensajes)-1) ];
			$chance = rand(1,6);
			
			if ( isset($config['ruleta']['ban']['always']) && $config['ruleta']['ban']['always'] ) {
					$ruleta = $config['ruleta']['body1'] . ' ' . sprintf( $config['ruleta']['body2'], $mensaje );
					$post['fuscazo'] = true;
			}
			else switch(rand(1,$chance))
			{
				case 1:
					$ruleta = $config['ruleta']['body1'] . ' ' . sprintf( $config['ruleta']['body2'], $mensaje );
					$post['fuscazo'] = true;
					break;
				default:
					$ruleta = $config['ruleta']['body1'] . ' ' . $config['ruleta']['default'];
					break;
			}
			$post['body'] = $ruleta . "<br /><br />" . $post['body'];
		}
		else $post['body'] = "<strong><em><u>Error</u>: falta la configuración de uno o más parámetros para la ruleta, lee la documentación de instance-config.php</em></strong><br><br>" . $post['body'];
		$post['email'] = '';
	}
	return $post;
}

function ruleta___darse_un_fuscazo($ip, $boards)
{
	global $config;
	
	$tiempo =$config['ruleta']['ban']['time'];
	$mensajes = $config['ruleta']['ban']['mensajes'];
	$mensaje = $mensajes[ rand(0,sizeof($mensajes)-1) ];
	Bans::new_ban($ip, $mensaje, $tiempo, $boards);
}




function email_creditos($post)
{
	global $config;
	foreach ( $config['creditos'] as $code => $body )
		if ( $code != "" )
			if ( strtolower($post['email']) == $code ) {
				if ( $body != "" )
					$post['body'] = $post['body'] . '<br><br>' . $body;
				$post['email'] = '';
			}
	return $post;
}




function email_fortuna($post)
{
	global $config;
	if (strtolower($post['email']) == '#fortuna')
	{
		if ( isset($config['fortunas']) && count($config['fortunas'])>0 )
		{
			//for ($i=0; $i<sizeof($config['fortunas']); $i++) $config['fortunas'][$i] = acentos_y_caracteres_especiales($config['fortunas']);
			$post['body'] = sprintf('<span class="fortuna">Tu Fortuna:</span> <strong>"%s"</strong><br /><br />%s',
				$config['fortunas'][ rand(0,sizeof($config['fortunas'])-1) ], $post['body']);
			$post['email'] = '';
		}
		else $post['body'] = "<strong><em><u>Error</u>: no tienes configuradas las fortunas, lee la documentación y repara el error en instance-config.php</em></strong><br><br>" . $post['body'];
		$post['email'] = '';
	}
	return $post;
}




function email_namefag($post)
{
	global $config;
	if (strtolower($post['email']) == '#namefag')
	{
		if ( isset($config['namefag']['firstname']) && count($config['namefag']['firstname'])>0
			&& isset($config['namefag']['lastname']) && count($config['namefag']['lastname'])>0 )
		{
			$name1 = $config['namefag']['firstname'];
			$name2 = $config['namefag']['lastname'];
			
			$post['name'] = sprintf( '%s %s', $name1[ rand(0,sizeof($name1)-1) ], $name2[ rand(0,sizeof($name2)-1) ] );
		}
		else $post['body'] = "<strong><em><u>Error</u>: no tienes configurados los valores para #Namefag, lee la documentación y repara el error en instance-config.php</em></strong><br><br>" . $post['body'];
		$post['email'] = '';
	}
	return $post;
}





// Innecesario en Vichan, ya que éste trabaja con charset="utf-8", pero futura, que es una mierda vieja y obsoleta, si lo requeriría
// Igual lo dejo por si acaso jeje patineta
function acentos_y_caracteres_especiales($str)
{
	str_replace("Á", "&Aacute;", $str);
	str_replace("É", "&Eacute;", $str);
	str_replace("Í", "&Iacute;", $str);
	str_replace("Ó", "&Oacute;", $str);
	str_replace("Ú", "&Uacute;", $str);
	str_replace("á", "&aacute;", $str);
	str_replace("é", "&eacute;", $str);
	str_replace("í", "&iacute;", $str);
	str_replace("ó", "&oacute;", $str);
	str_replace("ú", "&uacute;", $str);
	str_replace("ñ", "&ntilde;", $str);
	str_replace("Ñ", "&Ntilde;", $str);
	str_replace("Ä", "&Auml;", $str);
	str_replace("Ë", "&Euml;", $str);
	str_replace("Ï", "&Iuml;", $str);
	str_replace("Ö", "&Ouml;", $str);
	str_replace("Ü", "&Uuml;", $str);
	str_replace("ä", "&auml;", $str);
	str_replace("ë", "&euml;", $str);
	str_replace("ï", "&iuml;", $str);
	str_replace("ö", "&ouml;", $str);
	str_replace("ü", "&uuml;", $str);
	str_replace("¿", "&iquest;", $str);
	str_replace("¡", "&iexcl;", $str);
	return $str;
}