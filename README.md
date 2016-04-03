# vaibhavpandeyvpz/consoler
Extensions for [symfony/console](https://github.com/symfony/console) adding support for using any [container-interop/container-interop](https://github.com/container-interop/container-interop) compatible package.

Install
------
```bash
composer require vaibhavpandeyvpz/consoler
```

You may also want to install [vaibhavpandeyvpz/katora](https://github.com/vaibhavpandeyvpz/katora) to provide ```Interop\Container\ContainerInterface```. To do so, run following:

```bash
composer require vaibhavpandeyvpz/katora
```

Usage
------
Initialize a instance of ```Consoler\Application``` with an ```Interop\Container\ContainerInterface``` instance and run as usual.

```php
#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Consoler\Application($container = new Katora\Container());

$container[PDO::class] = $container->share(function () {
    return new PDO(/** args */);
});

$app->add(new SearchCommand());

$app->run();
```

Since ```Consoler\Command``` class implements ```Interop\Container\ContainerInterface```, you can just extend it & use the container as below:

```php
use Consoler\Command;
use Symfony\Component\Console\Input\InputInterface as Input;
use Symfony\Component\Console\Output\OutputInterface as Output;

class SearchCommand extends Command
{
    protected function execute(Input $input, Output $output)
    {
        /** @var \PDO $pdo */
        $pdo = $this->get(\PDO::class);
        // ...more code!
    }
}
```

License
------
See [LICENSE.md](https://github.com/vaibhavpandeyvpz/consoler/blob/master/LICENSE.md) file.
