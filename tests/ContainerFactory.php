<?php

namespace Zenify\FlashMessageComponent\Tests;

use Nette\Configurator;
use Nette\DI\Container;


class ContainerFactory
{

	/**
	 * @return Container
	 */
	public function create()
	{
		$config = new Configurator;
		$config->setTempDirectory(TEMP_DIR);
		$config->addConfig(__DIR__ . '/config/default.neon');
		return $config->createContainer();
	}

}
