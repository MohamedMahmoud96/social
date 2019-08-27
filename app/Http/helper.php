<?php

if(! function_exists('aurl'))
{
	function aurl($url = null)
	{
		return url('admin/'. $url);
	}
}
if(!function_exists('authAdmin'))
{
	function authAdmin()
	{
		return auth()->guard('admin');
	}
}