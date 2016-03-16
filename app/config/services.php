<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Di\FactoryDefault;


// The FactoryDefault Dependency Injector automatically registers the
// right services providing a full-stack framework
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of URLs in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlProvider();

    $url->setBaseUri($config->application->baseUri);

    return $url;
});

$di->set('view', function () use ($config) {

	$view = new View();

	$view->setViewsDir(APP_PATH . $config->application->viewsDir);

	$view->registerEngines(array(
		".volt" => 'volt'
	));

	return $view;
});

/**
 * Setting up volt
 */
$di->set('volt', function ($view, $di) {

	$volt = new VoltEngine($view, $di);

	$volt->setOptions(array(
		"compiledPath" => APP_PATH . "cache/volt/"
	));

	$compiler = $volt->getCompiler();
	$compiler->addFunction('is_a', 'is_a');

	return $volt;
}, true);

// Start the session the first time a component requests the session service
$di->set('session', function () {
    $session = new Session();

    $session->start();

    return $session;
});


// Database connection is created based on parameters defined in the configuration file
$di->set('db', function () use ($config) {
    return new DbAdapter(
        array(
            "host"     => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname"   => $config->database->name
        )
    );
});