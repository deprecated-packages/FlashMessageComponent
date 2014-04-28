# Zenify/FlashMessageComponent


## Requirements

This package requires PHP 5.4.

- [nette/application](https://github.com/nette/application/)
- [nette/utils](https://github.com/nette/utils/)


## Installation

The best way to install this package is using [Composer](http://getcomposer.org/):

```sh
$ composer require zenify/flash-message-component:@dev
```

And register the factory in `config.neon`:

```yaml
services:
	- Zenify\FlashMessageComponent\IControl
```


## Use

Inject to presenter

```php
class Presenter ... {

	/** @inject @var Zenify\FlasMessageComponent\IControl */
	public $flashMessageControl;


	public function createComponentFlashMessage()
	{
		return $this->flashMessageControl->create();
	}

}
```

Render in template

```smarty
{control flashMessage}
```

Translator support included.
