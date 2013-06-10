<?php 

Class IP {

	// reference http://stackoverflow.com/questions/594112/matching-an-ip-to-a-cidr-mask-in-php5
	private static function cidr_match($ip, $range)
	{
	    list ($subnet, $bits) = explode('/', $range);
	    $ip = ip2long($ip);
	    $subnet = ip2long($subnet);
	    $mask = -1 << (32 - $bits);
	    $subnet &= $mask;
	    return ($ip & $mask) == $subnet;
	}

	private static function getipfilter()
	{
		$ip = include ('ipfilter.php');
		return $ip['ip'];
	}

	public static function getip()
	{
		return $_SERVER['REMOTE_ADDR'];
	}

	public static function blocked()
	{
		$ip_config = IP::getipfilter();

		foreach($ip_config as $ip)
		{
			if((int)IP::cidr_match(IP::getip(), $ip) == 1) return true;
		}

		return false;
	}

	public static function test()
	{  
		$ip_config = IP::getipfilter();

		foreach($ip_config as $ip)
		{
			if(static::blocked())
				return "IP $ip is Blocked <br/>";
		}

		return 'Your IP is NOT Blocked';
	}

	// reference http://www.php-developer.org/simple-php-proxy-detection-script-and-client-real-ip-address/
	public static function proxy() {		
		return (empty($_SERVER["HTTP_X_FORWARDED_FOR"])) ? false : true;
	}
}

 ?>