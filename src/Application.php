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
use Symfony\Component\Console\Application as SymfonyApplication;
use Symfony\Component\Console\Command\Command;

/**
 * Class Application
 * @package Consoler
 */
class Application extends SymfonyApplication
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function add(Command $command)
    {
        if ($command instanceof \Consoler\Command) {
            $command->setContainer($this->container);
        }
        return parent::add($command);
    }

    /**
     * Application constructor.
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}
