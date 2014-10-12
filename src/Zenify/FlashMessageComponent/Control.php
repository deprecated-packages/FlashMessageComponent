<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\FlashMessageComponent;

use Kdyby\Translation\PrefixedTranslator;
use Nette;


/**
 * @property-read \Nette\Bridges\ApplicationLatte\Template|\stdClass $template
 * @method void setClassPrefix()
 * @method void setTranslatorPrefix()
 */
class Control extends Nette\Application\UI\Control
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
	 * @var boolean
	 */
	private $keepFirstItemOnly;

	/**
	 * @var Nette\Localization\ITranslator
	 */
	private $translator;


	public function __construct(Nette\Localization\ITranslator $translator = NULL)
	{
		$this->translator = $translator;
	}


	/**
	 * @param bool
	 */
	public function render($keepOnlyFirstItem = TRUE)
	{
		$this->keepFirstItemOnly = $keepOnlyFirstItem;
		$this->template->flashes = $this->getFlashes();
		$this->template->classPrefix = $this->classPrefix;
		$this->template->setFile(__DIR__ . '/templates/default.latte');
		$this->template->render();
	}


	/**
	 * @return mixed
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
	 * @return Nette\Localization\ITranslator
	 */
	private function getTranslator()
	{
		if ($this->translator && $this->translatorPrefix) {
			$this->translator = new PrefixedTranslator($this->translatorPrefix, $this->translator);
		}
		return $this->translator;
	}


	/**
	 * @return array
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
			return array($flash);
		}
		return array();
	}

}
