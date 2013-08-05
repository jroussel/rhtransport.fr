<?php

$email = 'contact@rhtransport.fr';

$template = !empty($_REQUEST['template'])?$_REQUEST['template']:'index';

$root = dirname(__FILE__) . '/..';

$template_path = sprintf('%s/templates/%s.html.php', $root, $template);
if (!is_file($template_path)) {
	header('HTTP/1.0 404 Not Found');
	$template_path = sprintf('%s/templates/404.html.php', $root);
}

ob_start();
include $template_path;
$contents = ob_get_contents();
ob_end_clean();

include sprintf('%s/layout/default.html.php', $root);
