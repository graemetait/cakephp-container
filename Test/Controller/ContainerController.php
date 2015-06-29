<?php
App::uses('Controller', 'Controller');

class ContainerController extends Controller implements League\Container\ContainerAwareInterface
{
	use League\Container\ContainerAwareTrait;
}