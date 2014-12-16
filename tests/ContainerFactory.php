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
		$config->setTempDirectory($this->createAndGetTempDir());
		$config->addConfig(__DIR__ . '/config/default.neon');
		return $config->createContainer();
	}


	/**
	 * @return string
	 */
	private function createAndGetTempDir()
	{
		$tempDir = __DIR__ . '/temp';
		@mkdir($tempDir, 0777, TRUE);
		return $tempDir;
	}

}
