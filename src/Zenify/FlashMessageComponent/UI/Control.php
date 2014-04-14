<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\FlashMessageComponent\UI;

use Nette;


class Control extends Nette\Application\UI\Control
{
	/** @var Nette\Localization\ITranslator */
	private $translator;


	public function __construct(Nette\Localization\ITranslator $translator = NULL)
	{
		$this->translator = $translator;
	}


	public function render()
	{
		$this->template->flashes = $this->getFlashes();
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}


	/**
	 * @return []
	 */
	private function getFlashes()
	{
		$flashes = $this->parent->template->flashes;
		if ($this->translator) {
			foreach ($flashes as $key => $row) {
				$flashes[$key]->message = $this->translator->translate($row->message);
			}
		}

		return $flashes;
	}

}