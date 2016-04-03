<?php

/*
 * This file is part of vaibhavpandeyvpz/consoler package.
 *
 * (c) Vaibhav Pandey <contact@vaibhavpandey.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.md.
 */

namespace Consoler;

use Interop\Container\ContainerInterface as Container;
use Symfony\Component\Console\Application as Base;

/**
 * Class Application
 * @package Consoler
 */
class Application extends Base
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * Application constructor.
     * @param Container $container
     * @param string $name
     * @param string $version
     */
    public function __construct(Container $container, $name = 'UNKNOWN', $version = 'UNKNOWN')
    {
        parent::__construct($name, $version);
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function add(Command $command)
    {
        if ($command instanceof Command) {
            $command->setContainer($this->container);
        }
        return parent::add($command);
    }
}
