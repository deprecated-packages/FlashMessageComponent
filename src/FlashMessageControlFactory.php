<?php

/**
 * This file is part of Zenify
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 */

namespace Zenify\FlashMessageComponent;


interface FlashMessageControlFactory
{

	/**
	 * @return FlashMessageControl
	 */
	function create();

}
