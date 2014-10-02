<?php

/**
 * @testCase
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
		$factory = $this->createContainer()->getByType('Zenify\FlashMessageComponent\ControlFactory');
		return $factory->create();
	}


	public function testFactory()
	{
		$container = $this->createContainer();
		Assert::type(
			'Zenify\FlashMessageComponent\ControlFactory',
			$container->getByType('Zenify\FlashMessageComponent\ControlFactory')
		);
	}


	public function testControl()
	{
		Assert::type(
			'Zenify\FlashMessageComponent\Control',
			$this->getControl()
		);
	}

}


\run(new CreateComponentTest());
