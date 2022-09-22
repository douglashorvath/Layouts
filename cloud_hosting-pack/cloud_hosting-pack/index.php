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
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='domain.html') {
	include $browser_t.'/domain.html';
	}
elseif ($page_name=='webhosting.html') {
	include $browser_t.'/webhosting.html';
	}
elseif ($page_name=='email.html') {
	include $browser_t.'/email.html';
	}
elseif ($page_name=='support.html') {
	include $browser_t.'/support.html';
	}
elseif ($page_name=='contact-post.html') {
	include 'app/contact.php';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>
