<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\FlashMessageComponent;

use Kdyby\Translation\PrefixedTranslator;
use Nette;
use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Localization\ITranslator;


/**
 * @property-read Template $template
 * @method setClassPrefix()
 * @method setTranslatorPrefix()
 */
class FlashMessageControl extends Control
{

	/**
	 * @var string
	 */
	private $classPrefix = 'alert alert-';

	/**
	 * @var string
	 */
	private $translatorPrefix = NULL;

	/**
	 * @var bool
	 */
	private $keepFirstItemOnly;

	/**
	 * @var ITranslator
	 */
	private $translator;


	public function __construct(ITranslator $translator = NULL)
	{
		$this->translator = $translator;
	}


	/**
	 * @param bool
	 */
	public function render($keepOnlyFirstItem = FALSE)
	{
		$this->keepFirstItemOnly = $keepOnlyFirstItem;
		$this->template->setParameters([
			'flashes' => $this->getFlashes(),
			'classPrefix' => $this->classPrefix
		]);
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
			$flashes = $this->translateFlashes($flashes);
		}
		if ($this->keepFirstItemOnly === TRUE) {
			$flashes = $this->keepOnlyFirstItem($flashes);
		}
		return $flashes;
	}


	/**
	 * @return ITranslator
	 */
	private function getTranslator()
	{
		if ($this->translator && $this->translatorPrefix) {
			$this->translator = new PrefixedTranslator($this->translatorPrefix, $this->translator);
		}
		return $this->translator;
	}


	/**
	 * @return string[]
	 */
	private function translateFlashes(array $flashes)
	{
		if ($translator = $this->getTranslator()) {
			foreach ($flashes as $key => $row) {
				$flashes[$key]->message = $translator->translate($row->message);
			}
		}
		return $flashes;
	}


	/**
	 * @param array $flashes
	 * @return array
	 */
	private function keepOnlyFirstItem($flashes)
	{
		foreach ($flashes as $flash) {
			return [$flash];
		}
		return [];
	}

}
