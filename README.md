# wp_composer
A basic wordpress setup, using composer

# Installation
* Fork or Unpacked an [archived version](https://github.com/SpiroAB/wp_composer/releases).
* Update composer.json with name, description and authors, and you may also remove any of the default plugins from require.
* run `composer install`
* install plugins `composer require <repo>/<name>`, the repo [wpackagist](https://wpackagist.org) have all offical plugins, and '[SpiroAB/composer-repo](https://github.com/SpiroAB/composer-repo)' have ours.
	* use `composer search` to find the composer-name of a plugin.
* configure worpdress using '/wp-config-local.php' or '/wp-config.php'
* give write persmission to the upload dir, configured in UPLOADS, or the default 'content/uploads'
* build your theme in 'content/themes/<theme_name>'
