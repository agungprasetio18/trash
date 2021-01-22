<?php 

function active(string $url, string $res = 'active', $group = null)
{
	$active = $group ? request()->is($url) || request()->is($url.'/*') : request()->is($url);

	return $active ? $res : '';
}


?>