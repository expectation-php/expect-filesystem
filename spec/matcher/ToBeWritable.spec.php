<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeWritable;

describe('ToBeWritable', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeWritable();
        });
        context('when match', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0222);
            });
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            beforeEach(function () {
                $this->tempFile = $this->makeFile(0444); //Read only
            });
            it('return false', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::false($result);
            });
        });
    });
});
