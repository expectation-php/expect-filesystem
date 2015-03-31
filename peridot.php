<?php

use cloak\peridot\CloakPlugin;
use Evenement\EventEmitterInterface;
use Peridot\Reporter\Dot\DotReporterPlugin;
use holyshared\peridot\temporary\TemporaryPlugin;

return function (EventEmitterInterface $emitter) {
    if (defined('HHVM_VERSION') === false) {
        CloakPlugin::create('.cloak.toml')->registerTo($emitter);
    }
    (new DotReporterPlugin($emitter));
    TemporaryPlugin::create()->registerTo($emitter);
};
