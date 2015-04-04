<?php

use cloak\peridot\CloakPlugin;
use Evenement\EventEmitterInterface;
use holyshared\peridot\temporary\TemporaryPlugin;
use Peridot\Reporter\Dot\DotReporterPlugin;

return function (EventEmitterInterface $emitter) {
    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }
    (new DotReporterPlugin($emitter));
    TemporaryPlugin::create()->registerTo($emitter);
};
