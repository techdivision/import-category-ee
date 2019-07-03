# Version 15.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-ee 11.* and techdivision/import-category 14.*

# Version 14.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-ee 10.* and techdivision/import-category 13.*

# Version 13.0.0

## Bugfixes

* Fixed multi bunch import issue

## Features

* Switch to latest techdivision/import-ee 9.0.* and techdivision/import-category 12.0.*

# Version 12.0.0

## Bugfixes

* Fixed multi bunch import issue

## Features

* Switch to latest techdivision/import-category 11.0.*

# Version 11.0.0

## Bugfixes

* Fixed techdivision/import#147

## Features

* Switch to latest techdivision/import-category 10.0.*

# Version 10.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-category 9.0.* and techdivision/import-ee 7.0.* version as dependency

# Version 9.0.1

## Bugfixes

* Update default configuration files with listeners

## Features

* None

# Version 9.0.0

## Bugfixes

* None

## Features

* Add composite observers to minimize configuration complexity
* Replace DI specific ActionInterfaces with generic ActionInterface in EeCategoryBunchProcessor
* Switch to latest techdivision/import-category 8.0.* and techdivision/import-ee 6.0.* version as dependency

# Version 8.0.0

## Bugfixes

* Fixed techdivision/import-category #55
* Fixed techdivision/import-category #56

## Features

* None

# Version 7.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import 6.0.* version as dependency

# Version 6.0.0

## Bugfixes

* Add missing paramter for EeCategoryBunchProcessor::__construct() method

## Features

* None

# Version 5.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import 6.0.* version as dependency

# Version 4.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-category + techdivision/import-ee 4.0.* version as dependency

# Version 3.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-category ~3.0 version as dependency

# Version 2.0.0

## Bugfixes

* None

## Features

* Switch to techdivision/import version ~2.0

# Version 1.0.0

## Bugfixes

* None

## Features

* Move PHPUnit test from tests to tests/unit folder for integration test compatibility reasons

# Version 1.0.0-beta20

## Bugfixes

* None

## Features

* Add missing interfaces for actions and repositories
* Replace class type hints for EeCategoryBunchProcessor with interfaces

# Version 1.0.0-beta19

## Bugfixes

* None

## Features

* Configure DI to passe event emitter to subjects constructor

# Version 1.0.0-beta18

## Bugfixes

* None

## Features

* Refactored DI + switch to new SqlStatementRepositories instead of SqlStatements

# Version 1.0.0-beta17

## Bugfixes

* None

## Features

* Update configuration files for refactored URL rewrite functionality

# Version 1.0.0-beta16

## Bugfixes

* None

## Features

* Update configuration files for refactored file upload functionality

# Version 1.0.0-beta15

## Bugfixes

* None

## Features

* Refactor attribute import functionality

# Version 1.0.0-beta14

## Bugfixes

* None

## Features

* Remove system-name from default configuration

# Version 1.0.0-beta13

## Features

* None

## Bugfixes

* Fixed invalid URL rewrite creation

# Version 1.0.0-beta12

## Bugfixes

* Fixed invalid path generation when updating more than two times

## Features

* None

# Version 1.0.0-beta11

## Bugfixes

* None

## Features

* Add custom system logger to default configuration

# Version 1.0.0-beta10

## Bugfixes

* None

## Features

* Replace array with system loggers with a collection

# Version 1.0.0-beta9

## Bugfixes

* None

## Features

* Refactor to optimize DI integration

# Version 1.0.0-beta8

## Bugfixes

* None

## Features

* Switch to new plugin + subject factory implementations

# Version 1.0.0-beta7

## Bugfixes

* None

## Features

* Update Symfony DI ID for application

# Version 1.0.0-beta6

## Bugfixes

* None

## Features

* Use Robo for Travis-CI build process 
* Refactoring for new ConnectionInterface + SqlStatementsInterface

# Version 1.0.0-beta5

## Bugfixes

* None

## Features

* Remove archive directory from default configuration file

# Version 1.0.0-beta4

## Bugfixes

* None

## Features

* Refactoring Symfony DI integration

# Version 1.0.0-beta3

## Bugfixes

* None

## Features

* Update constructor of EeCategoryBunchProcessor with EavAttributeOptionValueRepository

# Version 1.0.0-beta2

## Bugfixes

* None

## Features

* Update default configuration file

# Version 1.0.0-beta1

## Bugfixes

* None

## Features

* Integrate Symfony DI functionality

# Version 1.0.0-alpha8

## Bugfixes

* Fixed invalid constructor of EeCategoryBunchProcessor

## Features

* None

# Version 1.0.0-alpha7

## Bugfixes

* None

## Features

* Refactoring for DI integration

# Version 1.0.0-alpha6

## Bugfixes

* Add missing type hint for EeChildrenCountPlugin::getPrimaryKey() method

## Features

* None

# Version 1.0.0-alpha5

## Bugfixes

* None

## Features

* Add functionality for URL rewrite add-update operation

# Version 1.0.0-alpha4

## Bugfixes

* None

## Features

* Refactoring to create Magento 2 conform category URL rewrites

# Version 1.0.0-alpha3

## Bugfixes

* None

## Features

* Implementation of EE category import functionality

# Version 1.0.0-alpha2

## Bugfixes

* Fixed invald PSR-4 namespace in composer.json

## Features

* None

# Version 1.0.0-alpha1

## Bugfixes

* None

## Features

* Initial Release