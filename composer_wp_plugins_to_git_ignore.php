<?php

	define('IGNORE_FILE', __DIR__ . '/.gitignore');
	define('COMPOSER_FILE', __DIR__ . '/composer.json');
	define('PLUGIN_PATH', 'content/plugins/');
	define('PLUGIN_DIR', __DIR__ . '/' . PLUGIN_PATH);

	$ignored = [];
	$new_ignores = [];
	$end_with_empty_row = TRUE;

	$composer_json = json_decode(file_get_contents(COMPOSER_FILE));
	if(!$composer_json)
	{
		die('Error reading composer.json' . PHP_EOL);
	}

	if(file_exists(IGNORE_FILE))
	{
		foreach(explode(PHP_EOL, file_get_contents(IGNORE_FILE)) as $row)
		{
			$end_with_empty_row = empty($row);

			if($end_with_empty_row)
			{
				continue;
			}

			if(substr($row, 0, strlen(PLUGIN_PATH)))
			{
				$ignored[] = trim(substr($row, strlen(PLUGIN_PATH)), '/');
			}
		}
		$ignored = array_combine($ignored, $ignored);
	}

	foreach($composer_json->require as $name => $version_string)
	{
		$name_parts = explode('/', $name, 2);

		if(isset($ignored[$name_parts[1]]))
		{
			continue;
		}

		if(is_dir(PLUGIN_DIR . $name_parts[1] . '/'))
		{
			$new_ignores[] = PLUGIN_PATH . $name_parts[1] . '/';
		}
	}

	if($new_ignores)
	{
		if(file_exists(IGNORE_FILE))
		{
			file_put_contents(IGNORE_FILE, ($end_with_empty_row ? '' : PHP_EOL) . implode(PHP_EOL, $new_ignores) . PHP_EOL, FILE_APPEND);
		}
		else
		{
			file_put_contents(IGNORE_FILE, implode(PHP_EOL, $new_ignores) . PHP_EOL);
		}
	}
