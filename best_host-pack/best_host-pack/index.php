<?php 
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
include "app/config.php";
include "app/detect.php";

if ($page_name=='') {
	include $browser_t.'/index.html';
	}
if ($page_name=='') {
	include $browser_t.'/hosting.html';
	}
if ($page_name=='') {
	include $browser_t.'/domain.html';
	}
if ($page_name=='') {
	include $browser_t.'/email.html';
	}
if ($page_name=='') {
	include $browser_t.'/ecommerce.html';
	}
if ($page_name=='') {
	include $browser_t.'/contact.html';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>
