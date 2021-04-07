# Simple and light PHP console logger

This library permits you to easily log messages in console for PHP scripts and apps.

## Prerequisites

* PHP >= 7.3

## Use

This library is an easy-to-use and light one. 

```php
use ScoobyConsoleLogger\ConsoleLogger;

$consoleLogger = new ConsoleLogger();

$consoleLogger->alert('This is an alert !')
    ->divider()
    ->critical('This is critical :/')
    ->emergency('This is an emergency !')
    ->echo('echo some text')
    ->error('This is an error :(')
    ->info('There can be some informations')
    ->notice('Something you need to notice')
    ->success('This is a success !')
    ->warning('This is a warning')
    ->debug('Some debug informations you need to print')
    ->title('This is for some title')
;

$consoleLogger->divider();
```

![](./doc/images/all_functions.png)

You can chain the functions like in the example above or you can just call your logger in different line.

## Full documentation

To know all what you can do, you can find full documentation [here](./doc/doc.md).

## Contributions

You can send PRs if you want to :)

Just, please, follow these [conventions](./doc/conventions.md).
