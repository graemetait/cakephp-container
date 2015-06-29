<?php
App::uses('CakeEventManager', 'Event');
App::uses('ClassRegistry', 'Utility');

// Store instance of Container for use as singleton
ClassRegistry::addObject('container', new League\Container\Container());

// Add Container instance to all controllers that implement ContainerAwareInterface
CakeEventManager::instance()->attach(function ($event) {
	$controller = $event->subject;
	if ($controller instanceof League\Container\ContainerAwareInterface) {
		$controller->setContainer(ClassRegistry::getObject('container'));
	}
}, 'Controller.initialize');
