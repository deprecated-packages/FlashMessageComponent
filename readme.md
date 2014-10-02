# Zenify/FlashMessageComponent

[![Build Status](https://travis-ci.org/Zenify/FlashMessageComponent.svg?branch=master)](https://travis-ci.org/Zenify/FlashMessageComponent)
[![Downloads this Month](https://img.shields.io/packagist/dm/zenify/flash-message-component.svg)](https://packagist.org/packages/zenify/flash-message-component)
[![Latest stable](https://img.shields.io/packagist/v/zenify/flash-message-component.svg)](https://packagist.org/packages/zenify/flash-message-component)


## Requirements

See section `require` in [composer.json](composer.json).


## Installation

The best way to install this package is using [Composer](http://getcomposer.org/):

```sh
$ composer require zenify/flash-message-component:@dev
```

And register the factory in `config.neon`:

```yaml
services:
	- Zenify\FlashMessageComponent\ControlFactory
```


## Use

Inject to presenter

```php
class Presenter ...
{

	/**
	 * @inject
	 * @var Zenify\FlashMessageComponent\ControlFactory
	 */
	public $flashMessageControlFactory;


	/**
	 * @return Zenify\FlashMessageComponent\Control
	 */
	public function createComponentFlashMessage()
	{
		return $this->flashMessageControlFactory->create();
	}

}
```

Render in template

```smarty
{control flashMessage}
```

Translator support included.
