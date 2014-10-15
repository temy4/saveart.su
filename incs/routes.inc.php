<?php
define('CURRENT_PAGE', isset( $_GET['p'] ) ? $_GET['p'] : '/');

function getMenu($main = true){
	require ('routes.conf.php');
	include('incs/settings.inc.php');
	$ret = array();
	
	foreach ($routes as $path => $route) {
		if ( $main == $route['main-menu'] && !$route['hidden'] ){
			if ( $overrideMenuSpaces ){
				$route['title'] = str_replace(' ', '&nbsp;', $route['title']);
			}
			$ret[$path] = $route;
			$link = $basePath.$path;
            $link = preg_replace('/[\/]{2,}/', '/', $link);
            $link = preg_replace('/([^\/])$/', '$1/', $link);

            $ret[$path]['link'] = $link;
		}
	}

	return $ret;
}

function getPage(){
	require ('routes.conf.php');

	$p = isset( $_GET['p'] ) ? $_GET['p'] : '/';
	if( array_key_exists($p, $routes) && file_exists('./pages/'.$routes[$p]['content']) ) {
		if(isset($routes[$p]['code'])){
			http_response_code($routes[$p]['code']);
		}
		return $routes[$p];
	}
	else {
		http_response_code(404);
		return $routes['notfound'];
	}
}

function getSubPage(){
	require ('routes.conf.php');

	$p = isset( $_GET['p'] ) ? $_GET['p'] : '/';
	$sp = isset( $_GET['sp'] ) ? $_GET['sp'] : '/';
	$sp = str_replace('/', '', $sp);

	if( empty($sp) ) {
		return false;
	}

	if( array_key_exists($p.'/'.$sp, $routes) && file_exists('./pages/'.$routes[$p]['content']) ) {
		if(isset($routes[$p]['code'])){
			http_response_code($routes[$p]['code']);
		}
		return $routes[$p];
	}
	else {
		if( array_key_exists($sp, $controllers) && file_exists('./controllers/'.$controllers[$sp]['src']) ) {
			include('./controllers/'.$controllers[$sp]['src']);
		}
		else{
			http_response_code(404);
		}
		exit();
	}
}
?>