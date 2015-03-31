<?php

/**
 * This file is part of expect-filesystem package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace expect\filesystem\matcher;

use expect\FailedMessage;
use expect\matcher\ReportableMatcher;
use SplFileInfo;


final class ToBeMode implements ReportableMatcher
{
    /**
     * @var string
     */
    private $actual;

    /**
     * @var int
     */
    private $expected;


    private $actualPermission;


    public function __construct($expected)
    {
        $this->expected = $expected;
    }

    public function match($actual)
    {
        $this->actual = $actual;

        $value = substr(sprintf('%o', fileperms($this->actual)), -4); //Example: 100444
        $this->actualPermission = intval($value, 8);

        return $this->actualPermission === $this->expected;
    }

    /**
     * {@inheritdoc}
     */
    public function reportFailed(FailedMessage $message)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function reportNegativeFailed(FailedMessage $message)
    {
    }
}
