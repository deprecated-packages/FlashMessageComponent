# Zenify/FlashMessageComponent

[![Build Status](https://img.shields.io/travis/Zenify/FlashMessageComponent.svg?style=flat-square)](https://travis-ci.org/Zenify/FlashMessageComponent)
[![Quality Score](https://img.shields.io/scrutinizer/g/Zenify/FlashMessageComponent.svg?style=flat-square)](https://scrutinizer-ci.com/g/Zenify/FlashMessageComponent)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/Zenify/FlashMessageComponent.svg?style=flat-square)](https://scrutinizer-ci.com/g/Zenify/FlashMessageComponent)
[![Downloads this Month](https://img.shields.io/packagist/dm/zenify/flash-message-component.svg?style=flat-square)](https://packagist.org/packages/zenify/flash-message-component)
[![Latest stable](https://img.shields.io/packagist/v/zenify/flash-message-component.svg?style=flat-square)](https://packagist.org/packages/zenify/flash-message-component)


This extension simplifies use of flash messages in templates just to `{control flashMessage}`:
Also includes translator support and css class prefix.


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
