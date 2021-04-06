# Simple and light PHP console logger

This library permits you to easily log messages in console.

## Prerequisites

* PHP >= 7.3

## Use

This library is an easy-to-use one. 

```php
use DvConsoleLogger\ConsoleLogger;

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

You can chain the functions like in the example above or you can just call your logger in different line.

## Full documentation

You can find full documentation here.

## Contributions

You can send PRs if you want to :)

Just, please, follow these conventions.
