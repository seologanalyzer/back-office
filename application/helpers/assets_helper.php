<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//é
if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/javascript/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/img/' . $nom;
	}
}

if ( ! function_exists('uploads_url'))
{
	function uploads_url($nom)
	{
		return base_url() . 'assets/uploads/' . $nom;
	}
}

if ( ! function_exists('txt_url'))
{
	function txt_url($nom)
	{
		return base_url() . 'assets/txt/' . $nom;
	}
}

if ( ! function_exists('assets_url') )
{
	function assets_url($file)
	{
		return base_url() . 'assets/' . $file;
	}
}

if ( ! function_exists('img'))
{
	function img($nom, $alt = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
	}
}

if ( ! function_exists('convert_https_to_http'))
{
	function convert_https_to_http($str)
	{
		if ( substr($str, 0, 8) == "https://" )
		{
			return "http://" . substr($str, 8);
		}
		else
		{
			return $str;
		}
	}
}

if ( ! function_exists('url_base64_encode'))
{
	function url_base64_encode($str) {

	 $array = array(
	  '+' => '.',
	  '=' => '-',
	  '/' => '~'
	 );
			
		return strtr(base64_encode($str), $array);
		
	}
}

if ( ! function_exists('url_base64_decode'))
{
	function url_base64_decode($str) {

	 $array = array(
	  '.' => '+',
	  '-' => '=',
	  '~' => '/'
		);

		return base64_decode(strtr($str, $array));
		
	}
}

if ( ! function_exists('get_class_item'))
{
	function get_class_item( $sItem, $first = NULL, $last = NULL ) {
	
		$CI =& get_instance();
		
		$str   = "";
		$cURI  = $CI->uri->rsegment_array();
		$cCtrl = $cURI[1];
	
		if ( $first ) $str .= "first ";
		if ( $last ) $str .= "last ";
	
	
		if ($sItem === $cCtrl) $str .= "active";
		
		return ( $str === "" ? NULL : 'class="' . $str . '"' );
	}
}

?>