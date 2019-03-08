<?php
if (!function_exists('mysqldatetime'))
{
	function mysqldatetime()
	{
		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Jakarta'));
		return $date->format('Y-m-d H:i:s');
		//return date('Y-m-d H:i:s', $timestamp);
	}
}