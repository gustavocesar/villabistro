<?php
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

CakePlugin::load('DebugKit');
CakePlugin::load('AclExtras');
CakePlugin::load('AuditLog');

//https://github.com/CakeDC/recaptcha/blob/master/Docs/Documentation/Setup.md
CakePlugin::load('Recaptcha');

/**
 * To prefer app translation over plugin translation, you can set
 *
 * Configure::write('I18n.preferApp', true);
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

Configure::write('ShowDateTimeFormat', 'd/m/Y H:i:s');
Configure::write('number_locale', 'pt_BR');

//Configure::write('Recaptcha.publicKey', '6Lc1yRcTAAAAAD8ddVCDiPN23Hd2m_rWmQ7Szwiu');
//Configure::write('Recaptcha.privateKey', '6Lc1yRcTAAAAAFFkJ_vdyGOYZvSHBWUXG2LaXKsm');

Configure::write('Language.default', 'pt-br');
Configure::write('Config.language', 'pt-BR');

Configure::write('google-analytics.tracker-code', 'UA-67514463-4'); // Google Analytics Enabled

Configure::write('Status.pendent', 1);
Configure::write('Status.payd', 2);

Configure::write('Recaptcha.publicKey', '6Lc1yRcTAAAAAD8ddVCDiPN23Hd2m_rWmQ7Szwiu');
Configure::write('Recaptcha.privateKey', '6Lc1yRcTAAAAAFFkJ_vdyGOYZvSHBWUXG2LaXKsm');