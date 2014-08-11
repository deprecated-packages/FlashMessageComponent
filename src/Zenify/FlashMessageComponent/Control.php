<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\FlashMessageComponent;

use Kdyby\Translation\PrefixedTranslator;
use Nette;


/**
 * @method void setClassPrefix()
 * @method void setTranslatorPrefix()
 */
class Control extends Nette\Application\UI\Control
{
	/** @var string */
	private $classPrefix = 'alert alert-';

	/** @var string */
	private $translatorPrefix = NULL;

	/** @var Nette\Localization\ITranslator */
	private $translator;


	public function __construct(Nette\Localization\ITranslator $translator = NULL)
	{
		$this->translator = $translator;
	}


	public function render()
	{
		$this->template->flashes = $this->getFlashes();
		$this->template->classPrefix = $this->classPrefix;
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}


	/**
	 * @return string[]
	 */
	private function getFlashes()
	{
		$flashes = $this->parent->template->flashes;
		if ($this->getTranslator()) {
			foreach ($flashes as $key => $row) {
				$flashes[$key]->message = $this->getTranslator()->translate($row->message);
			}
		}

		return $flashes;
	}


	/**
	 * @return Nette\Localization\ITranslator
	 */
	private function getTranslator()
	{
		if ($this->translator && $this->translatorPrefix) {
			$this->translator = new PrefixedTranslator($this->translatorPrefix, $this->translator);
		}

		return $this->translator;
	}

}
