<?php
App::uses('CakeEventManager', 'Event');
App::uses('ClassRegistry', 'Utility');

call_user_func(function() {
	$container = new League\Container\Container();

	// Store instance of Container for use as singleton
	ClassRegistry::addObject('container', $container);

	if (file_exists(APP.'Config/container.php')) {
		require APP.'Config/container.php';
	}

	// Add Container instance to all controllers that implement ContainerAwareInterface
	CakeEventManager::instance()->attach(function ($event) use ($container) {
		$controller = $event->subject;
		if ($controller instanceof League\Container\ContainerAwareInterface) {
			$controller->setContainer($container);
		}
	}, 'Controller.initialize');
});
