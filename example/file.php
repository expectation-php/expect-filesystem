<?php

namespace expect\example;

require_once __DIR__ . "/../vendor/autoload.php";

use expect\configurator\FileConfigurator;
use expect\Expect;

$configurator = new FileConfigurator(__DIR__ . '/.expect.toml');
Expect::configure($configurator);

Expect::that(__DIR__ . '/.expect.toml')->toBeExists(); //pass
