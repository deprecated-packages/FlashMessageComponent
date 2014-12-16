# Zenify/FlashMessageComponent

[![Build Status](https://travis-ci.org/Zenify/FlashMessageComponent.svg?branch=master)](https://travis-ci.org/Zenify/FlashMessageComponent)
[![Downloads this Month](https://img.shields.io/packagist/dm/zenify/flash-message-component.svg)](https://packagist.org/packages/zenify/flash-message-component)
[![Latest stable](https://img.shields.io/packagist/v/zenify/flash-message-component.svg)](https://packagist.org/packages/zenify/flash-message-component)


- Includes translator support.


## Installation

Install the latest version via composer:

```sh
$ composer require zenify/flash-message-component
```

And register extension in `config.neon`:

```yaml
extensions:
	- Zenify\FlashMessageComponent\DI\FlashMessageExtension
```


## Use

Inject to presenter

```php
class Presenter ...
{

	/**
	 * @inject
	 * @var Zenify\FlashMessageComponent\FlashMessageControlFactory
	 */
	public $flashMessageControlFactory;


	/**
	 * @return Zenify\FlashMessageComponent\FlashMessageControl
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
