<?php

namespace Zenify\FlashMessageComponent\Tests;

use Nette;
use Nette\DI\Container;
use PHPUnit_Framework_TestCase;
use Zenify;
use Zenify\FlashMessageComponent\FlashMessageControl;
use Zenify\FlashMessageComponent\FlashMessageControlFactory;


class CreateComponentTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var Container
	 */
	private $container;


	public function __construct()
	{
		$this->container = (new ContainerFactory)->create();
	}


	/**
	 * @return mixed
	 */
	public function testFactory()
	{
		/** @var FlashMessageControlFactory $factory */
		$factory = $this->container->getByType(FlashMessageControlFactory::class);
		$this->assertInstanceOf(FlashMessageControlFactory::class, $factory);
		$this->assertInstanceOf(FlashMessageControl::class, $factory->create());
	}

}
