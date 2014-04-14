# Zenify/FlashMessageComponent


## Requirements

This package requires PHP 5.4.

- [nette/nette](https://github.com/nette/nette/)


## Installation

The best way to install this package is using [Composer](http://getcomposer.org/):

```sh
$ composer require "zenify/flash-message-component:@dev"
```

And register the factory in `config.neon`:

```yaml
services:
	- Zenify\FlashMessageComponent\UI\IControl
```


## Use

Inject to presenter

```php
class Presenter ... {

	/** @inject @var Zenify\FlasMessageComponent\UI\IControl */
	public $flashMessageControl;


	public function createComponentFlashMessageControl()
	{
		return $this->flashMessageControl->create();
	}

}
```

Render in template

```smarty
{control flashMessageControl}
```

Translator support included.
