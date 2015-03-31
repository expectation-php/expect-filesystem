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

final class ToBeReadable implements ReportableMatcher
{
    /**
     * @var string
     */
    private $actual;

    public function match($actual)
    {
        $this->actual = $actual;
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
