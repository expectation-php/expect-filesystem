<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeFile;

describe('ToBeFile', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeFile();
            $this->tempFile = $this->makeFile();
            $this->tempDirectory = $this->makeDirectory();
        });
        context('when match', function () {
            it('return true', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            it('return false', function () {
                $result = $this->matcher->match($this->tempDirectory->getPath());
                Assertion::false($result);
            });
        });
    });
});
