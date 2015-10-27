# v0.9.0

- Fixed code complexity issues in `Range` and `Url\Network` validator.
- Removed all instances of `@codeCoverageIgnoreStart` and patched unit tests accordingly.
- Introduced `ProtocolDefinition` to specify network protocol definitions
- Introduced `InstructionSet` to convert protocol definitions into rules and parsers
- Added `CustomProtocol` network validator

# v0.8.3

- Fixed multi-byte length checks

# v0.8.2

- Restored code coverage to 100%
- Split off interpolation of violation into `InterpolatableInterface` and `InterpolatableIndicationAbstract`
- Added unit tests to cover validator context entities
- Fixed unit test for validator abstract; added test for deprecated method calls when deprecated errors are suppressed

# v0.8.1

- Patched the Base64 validator

# v0.8.0

- Added an interface for validators
- Deprecated method type on Validator in favor of getType
- Added context to validations, which are used to enrich the messages of 
validators.
- Added support for PHP 5.6 through Travis CI
- Fixed code style issues
- Removed number tests using octet literals, as PHP does not interpret them 
as expected.

# v0.7.0

- Added Email validator
- Fixed typo in validator abstract

# v0.6.1

- Merged in hotfix from parent project: Validator\Financial\Bic updated for ISO 9362.
- Update `make composer` to install composer without the need of `curl`
- Improved documentation

# v0.6.0

- Split off the validator as a separate project
- Removed custom autoloader in favor of Composer
- Removed sluggish benchmarking suite

# v0.5.0

- Validator\Encoding\Base64

# v0.4.0

- Validator\OneOf\Many

# v0.3.0

- Added benchmarking suite and initial benchmarks
- Improved performance of the Range validator
- Conditionally improved performance of the String\Subset validator

# v0.2.2

- Fix the numeric array validator unit test
- Improve performance of Range validators

# v0.2.1

Fix the Numeric array validator

# v0.2.0

Version 0.2.0 adds some new validators.

- Validator\CoreArray\Numeric
- Validator\OneOf
- Validator\String\Subset (abstract)
- Validator\String\Utf8\Mes1
- Validator\String\Utf8\Mes2
- Validator\String\Utf8\Mes3A
- Validator\String\Utf8\WordCharacter

# v0.1.1

Version 0.1.1 fixes behavior for the mutable ranges. Before, `0` was the default value
for range boundaries and therefore ignored when doing a length check.
This has been changed to `NULL` and henceforth constructors using 0 as a value will no
longer spawn results beyond that boundary.

## Bugfixes
- Change default value `$minLength` and `$maxLength` of mutable range constructors from
  `0` to `NULL`.

# v0.1.0

Initial release
