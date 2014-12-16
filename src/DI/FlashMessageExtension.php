<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\FlashMessageComponent\DI;

use Nette\DI\CompilerExtension;
use Zenify\FlashMessageComponent\FlashMessageControlFactory;


class FlashMessageExtension extends CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('flashMessageFactory'))
			->setImplement(FlashMessageControlFactory::class);
	}

}
