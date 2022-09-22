<?php 

include "app/config.php";
include "app/detect.php";

if ($page_name=='') {
	include "web".'/index.html';
	}
elseif ($page_name=='index.html') {
	include "web".'/index.html';
	}
elseif ($page_name=='404.html') {
	include "web".'/404.html';
	}
elseif ($page_name=='contact-post.html') {
	include 'app/contact.php';
	}
else
	{
		include "web".'/404.html';
	}

?>
