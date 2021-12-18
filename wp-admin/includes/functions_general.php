<?php
function FormatDate($date)
{
	global $date_format;
	if($date == '0000-00-00')
		return '';
	else
		return date($date_format, strtotime($date));
}

function FormatDateMonth($date)
{
	global $date_format_month;
	return date($date_format_month, strtotime($date));
}
function FormatDateDay($date)
{
	global $date_day_format;
	return date($date_day_format, strtotime($date));
}

function FormatDateMonthNew($date)
{
	global $date_format_month;
	return date("d M, Y", strtotime($date));
}

function nowTime()
{
	return date("H:i:s");
}
function nowDate()
{
	return date("Y-m-d");
}
function nowDateTime()
{
	return date("Y-m-d H:i:s");
}
function FormatDateTimeNew($date)
{
	global $date_time_format;
	return date("d M, y", strtotime($date))." &nbsp;&nbsp; ".date("h:i A", strtotime($date));
}
function FormatDateTime($date)
{
	global $date_time_format;
	return date($date_time_format, strtotime($date));
}


function FormatNumberNew($val)
{
	return number_format($val,0,'.',',');
}

function randomcode($len = "6")
{
	return rand(000000,999999);
}

function randomNum($len = "6")
{
	return rand(000000,999999);
}


function shortString($str, $num=50)
{
	if (strlen($str)>$num)
		return substr($str,0,$num)."...";
	else
		return substr($str,0,$num);
}



function shortstringpos($str, $num=23)
{
	if (strlen($str)>$num)
		return substr($str,0,$num)."...";
	else
		return substr($str,0,$num);
}

function shortcontentString($str, $num=250)
{
	if (strlen($str)>$num)
		return substr($str,0,$num)."...";
	else
		return substr($str,0,$num);
}

function shorttitle($str, $num=45)
{
	if (strlen($str)>$num)
		return substr($str,0,$num)."...";
	else
		return substr($str,0,$num);
}

function get_client_ip() {
    return rand(000000,999999);
}