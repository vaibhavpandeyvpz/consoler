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
use Symfony\Component\Console\Command\Command as SymfonyCommand;

/**
 * Class Command
 * @package Consoler
 */
abstract class Command extends SymfonyCommand implements Container
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        return $this->container->get($id);
    }

    /**
     * {@inheritdoc}
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}
