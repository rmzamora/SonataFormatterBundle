<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\FormatterBundle\Twig\Extension;

use Sonata\FormatterBundle\Formatter\Pool;

/**
 * @author Thomas Rabaix <thomas.rabaix@sonata-project.org>
 */
class TextFormatterExtension extends \Twig_Extension implements \Twig_Extension_InitRuntimeInterface
{
    protected $pool;

    public function __construct(Pool $pool)
    {
        $this->pool = $pool;
    }

    /**
     * Returns the token parser instance to add to the existing list.
     *
     * @return array An array of Twig_TokenParser instances
     */
    public function getTokenParsers()
    {
        return array(
        );
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('format_text', array($this, 'transform')),
        );
    }

    /**
     * @param string $text
     * @param string $type
     *
     * @return string
     */
    public function transform($text, $type)
    {
        return $this->pool->transform($type, $text);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sonata_text_formatter';
    }
}
