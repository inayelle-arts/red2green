<?php

spl_autoload_register(
	function (string $class) : bool
	{
		$class = str_replace('\\','/', $class);
		
		$class = sprintf('%s/%s.php', FS_ROOT, $class);
		
		if (file_exists($class))
		{
			require_once $class;
			return true;
		}
		
		return false;
	}
);