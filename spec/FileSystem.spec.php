<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\FileSystem;
use Prophecy\Argument;
use Prophecy\Prophet;

describe('FileSystem', function () {
    describe('#registerTo', function () {
        beforeEach(function () {
            $this->prophet = new Prophet();

            $registry = $this->prophet->prophesize('expect\MatcherRegistry');
            $registry->register(Argument::type('expect\package\MatcherClass'))
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
