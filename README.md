expect-filesystem
====================================

[![Build Status](https://travis-ci.org/expectation-php/expect-filesystem.svg?branch=master)](https://travis-ci.org/expectation-php/expect-filesystem)
[![HHVM Status](http://hhvm.h4cc.de/badge/expect/expect-filesystem.svg)](http://hhvm.h4cc.de/package/expect/expect-filesystem)
[![Coverage Status](https://coveralls.io/repos/expectation-php/expect-filesystem/badge.svg?branch=master)](https://coveralls.io/r/expectation-php/expect-filesystem?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/expectation-php/expect-filesystem/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/expectation-php/expect-filesystem/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/551feb9a971f78433900033c/badge.svg?style=flat)](https://www.versioneye.com/user/projects/551feb9a971f78433900033c)

Basic usage
------------------------------------

Create a configuration file of **expect**.  
The format of the file is [toml](https://github.com/toml-lang/toml).

```toml
packages = [
  "expect\\filesystem\\FileSystem"
]
```

Load the configuration file that you created.

```php
use expect\Expect;
use expect\configurator\FileConfigurator;

$configurator = new FileConfigurator(__DIR__ . '/.expect.toml');
Expect::configure($configurator);

Expect::that('log.txt')->toBeExists(); //pass
Expect::that('not_found_log.txt')->toBeExists(); //failed
```

All of matcher
------------------------------------

### toBeExists

```php
Expect::that($file)->toBeExists();
```

### toBeReadable

```php
Expect::that($file)->toBeReadable();
```

### toBeWritable

```php
Expect::that($file)->toBeWritable();
```

### toBeExecutable

```php
Expect::that($file)->toBeExecutable();
```

### toBeDirectory

```php
Expect::that($file)->toBeDirectory();
```

### toBeFile

```php
Expect::that($file)->toBeFile();
```

### toBeMode

```php
Expect::that($file)->toBeMode(644);
```
