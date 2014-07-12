<?php

/**
 * Test: Zenify\FlashMessageComponent\Control.
 *
 * @testCase
 * @package Zenify\FlashMessageComponent
 */

namespace ZenifyTests\FlashMessageComponent;

use Nette;
use Tester\Assert;
use Tester\TestCase;
use Zenify;


require_once __DIR__ . '/../bootstrap.php';

class CreateComponentTest extends TestCase
{

	/**
	 * @return \SystemContainer|\Nette\DI\Container
	 */
	private function createContainer()
	{
		$config = new Nette\Configurator;
		$config->setTempDirectory(TEMP_DIR);
		$config->addConfig(__DIR__ . '/files/default.neon');

		return $config->createContainer();
	}


	/**
	 * @return Zenify\FlashMessageComponent\Control
	 */
	private function getControl()
	{
		$factory = $this->createContainer()->getByType('Zenify\FlashMessageComponent\IControlFactory');
		return $factory->create();
	}


	public function testFactory()
	{
		$container = $this->createContainer();
		$factory = $container->getByType('Zenify\FlashMessageComponent\IControlFactory');
		Assert::true($factory instanceof Zenify\FlashMessageComponent\IControlFactory);
	}


	public function testControl()
	{
		$control = $this->getControl();
		Assert::true($control instanceof Zenify\FlashMessageComponent\Control);
	}

}


\run(new CreateComponentTest());
