# Version 22.0.0

## Bugfixes

* Fixed techdivision/import-category#69
* Fixed techdivision/import-category#68
* Fixed techdivision/import-category#62
* Fixed #PAC-264: PDOException: SQLSTATE[23000] : Integrity constraint violation: 1062 Duplicate entry xxx.html-0 for key 'URL_REWRITE_REQUEST_PATH_STORE_ID
* Fixed #PAC-265: Also use url_path when generate unique url_key for categories
* Fixed issue when root category has to be created

## Features

* Add `"include_in_menu": null` to `etc/configuration/default-values.json`
* Remove stack trace of exception for missing media directories > log a simple debug message instead
* Add functionality to clear URL rewrites when categories have been deleted
* Add #PAC-326: Cross-entity import of URLs (rewrites + redirects)  
* Add #PAC-57: Deleting dedicated attribute values via import by setting a configurable value

# Version 21.0.3

## Bugfixes

* Fixed invalid behaviour of #PAC-307: Add fallback for URL key to value of default store view when initial import has been done without store view rows

## Features

* None

# Version 21.0.2

## Bugfixes

* None

## Features

* Add #PAC-307: Functionality to control automatic update of URL rewrites when product or category name changes

# Version 21.0.1

## Bugfixes

* Fixed techdivision/import-category#64

## Features

* None

# Version 21.0.0

## Bugfixes

* None

## Features

* Add #PAC-47: Add entity merger implementation to allow fine grained entity merging

# Version 20.0.1

## Bugfixes

* None

## Features

* Add optional clean-up-empty-columns array to configuration of add-update operation

# Version 20.0.0

## Bugfixes

* None

## Features

* Add #PAC-47
* Switch to latest techdivision/import-category 19.*

# Version 19.0.2

## Bugfixes

* None

## Features

* Add default configuration for media + images file dirctory

# Version 19.0.1

## Bugfixes

* None

## Features

* Make composer dependencies more generic

# Version 19.0.0

## Bugfixes

* Replace Zend/Filter with new Laminas/Filter library

## Features

* Add techdivision/import-cli-simple#244

# Version 18.0.3

## Bugfixes

* Fixed invalid configuration for children count plugin
* Switch to latest techdivision/import-ee 15.* and techdivision/import-category 18.*

## Features

* None

# Version 18.0.2

## Bugfixes

* None

## Features

* Extract dev autoloading

# Version 18.0.1

## Bugfixes

* None

## Features

* Activate URL rewrite clean-up functionality by default

# Version 18.0.0

## Bugfixes

* None

## Features

* Add techdivision/import#146
* Add techdivision/import-cli-simple#216
* Remove unnecessary identifiers from configuration
* Switch to latest techdivision/import-ee 14.* and techdivision/import-category 17.*

# Version 17.0.2

## Bugfixes

* Change artefact prefix for category URL rewrites from url-rewrite to category-url-rewrite to avoid conflicts with product import

## Features

* None

# Version 17.0.1

## Bugfixes

* Fixed techdivision/import-category-ee#34

## Features

* None

# Version 17.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-ee 13.* and techdivision/import-category 16.*

# Version 16.0.0

## Bugfixes

* None

## Features

* Switch to latest techdivision/import-ee 12.* and techdivision/import-category 15.*

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