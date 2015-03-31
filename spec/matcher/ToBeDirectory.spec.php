<?php

use Assert\Assertion;
use expect\FailedMessage;
use expect\filesystem\matcher\ToBeDirectory;

describe('ToBeDirectory', function() {
    describe('#match', function () {
        beforeEach(function () {
            $this->matcher = new ToBeDirectory();
            $this->tempFile = $this->makeFile();
            $this->tempDirectory = $this->makeDirectory();
        });
        context('when match', function () {
            it('return true', function () {
                $result = $this->matcher->match($this->tempDirectory->getPath());
                Assertion::true($result);
            });
        });
        context('when unmatch', function () {
            it('return false', function () {
                $result = $this->matcher->match($this->tempFile->getPath());
                Assertion::false($result);
            });
        });
    });
});
