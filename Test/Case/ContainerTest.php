<?php

App::uses('ClassRegistry', 'Utility');

require(__DIR__ . '/../Controller/ContainerController.php');

class ContainerTest extends CakeTestCase
{
	public function testContainerAddedToController()
	{
		$controller = $this->bootController();

		$this->assertInstanceOf('League\Container\Container', $controller->getContainer());
	}

	public function testContainerAddedToClassRegistry()
	{
		$this->assertInstanceOf('League\Container\Container', ClassRegistry::getObject('container'));
	}

	public function testAllUsingSameInstance()
	{
		$controller = $this->bootController();

		$this->assertEqual($controller->getContainer(), ClassRegistry::getObject('container'));
	}

	public function tearDown()
	{
		// Overriding so ClassRegistry isn't flushed
	}

	private function bootController()
	{
		$controller = new ContainerController();
		$controller->startupProcess();

		return $controller;
	}
}