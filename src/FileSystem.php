<?php

/**
 * This file is part of expect-filesystem package.
 *
 * (c) Noritaka Horio <holy.shared.design@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace expect\filesystem;

use expect\MatcherRegistry;
use expect\MatcherPackage;
use expect\PackageRegistrar;

class FileSystem implements PackageRegistrar
{
    public function registerTo(MatcherRegistry $registry)
    {
        $package = MatcherPackage::fromPackageFile(__DIR__ . '/../composer.json');
        $package->registerTo($registry);
    }
}
