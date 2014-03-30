# Zenify/FlashMessageComponent


## Requirements

This package requires PHP 5.4.

- [nette/nette](https://github.com/nette/nette/)


## Installation

The best way to install this package is using [Composer](http://getcomposer.org/).
Add to your `composer.json`:

```js
"require": {
	"zenify/flash-message-component": "@dev"
}
```

Run `composer update`.

And register the extension in `config.neon`:

```neon
extensions:
	- Zenify\Components\FlasMessageComponent\DI\Extension
```

## Use

Inject to presenter

```php
class Presenter ... {

	/** @inject @var Zenify\Components\FlasMessageComponent\UI\IControl */
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
