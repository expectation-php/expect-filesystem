<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\FileSystem;
use expect\MatcherRegistry;
use expect\package\MatcherClass;
use Prophecy\Argument;
use Prophecy\Prophet;

describe(FileSystem::class, function () {
    describe('#registerTo', function () {
        beforeEach(function () {
            $this->prophet = new Prophet();

            $registry = $this->prophet->prophesize(MatcherRegistry::class);
            $registry->register(Argument::type(MatcherClass::class))
                ->shouldBeCalled();

            $this->registry = $registry->reveal();
            $this->fileSystem = new FileSystem();
        });
        it('register file system package', function () {
            $this->fileSystem->registerTo($this->registry);
            $this->prophet->checkPredictions();
        });
    });
});
