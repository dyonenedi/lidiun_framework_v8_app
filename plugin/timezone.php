<?php
	use Lidiun_Framework_v7\Conf;

	Class Timezone
	{
		public static function format($date, $utc, $format='d/m/Y H:i:s'){
			$time = $utc.' seconds';
			return date($format, strtotime($date.$time));
		}

		public static function getUTC($timezone=null){
			$timezone = (!empty($timezone)) ? $timezone : 'America/Sao_Paulo';
			date_default_timezone_set($timezone);
			$utc = date("Z");
			date_default_timezone_set(Conf::$_conf['preset']['timezone']);

			return $utc;
		}
	}