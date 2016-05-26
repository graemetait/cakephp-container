<?php
use League\Container\ContainerAwareInterface;

App::uses('Shell', 'Console');

class ContainerAwareShell extends Shell implements ContainerAwareInterface
{
	use League\Container\ContainerAwareTrait;

	public function __construct($stdout = null, $stderr = null, $stdin = null)
	{
		parent::__construct($stdout = null, $stderr = null, $stdin = null);

		if ($container = ClassRegistry::getObject('container')) {
			$this->setContainer(ClassRegistry::getObject('container'));
		}
	}
}
