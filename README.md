# HylianShield Validator

The HylianShield validator is a validation package, built to create a
common validator interface.

Its current release is explicitly built with PHP7 in mind.
When compared to its predecessor, the current version of the
HylianShield validator package is stripped down to the bare essential
needs for validation.

## Installation

`composer require hylianshield/validator:^2.0.0`

## Configuration

For this package, there is no configuration to consider.

## Validator

A validator consists of at least the following two methods:

### getIdentifier

```php
public function getIdentifier(): string
```

This method is used to create a unique identifier for the validator.
It is of use when debugging behavior of validators or identifying 
validators that have blocked out certain validation subjects.

### validate

```php
public function validate($subject): bool
```

The validate method accepts a validation subject and returns whether the
subject is or is not valid.

## Validator Collection

Besides an interface for validators to implement, a validator collection
interface is exposed.

This collection itself implements an interface that extends the validator
interface. Therefore, a validator collection itself is a validator.

Besides the shared functionality of a validator, it has a method to add
a validator, as well as a method to remove a validator.

If the `validate` method is called on a collection, it will validate
against the validators inside the collection.

Depending on which of the following collections is used, the validation
result will differ:

| Collection          | Result                                                  |
|---------------------|---------------------------------------------------------|
| MatchAllCollection  | Returns true when all internal validators return true.  |
| MatchNoneCollection | Returns true when all internal validators return false. |
| MatchAnyCollection  | Returns true when any internal validator returns true.  |

Because a collection is a validator itself, it can accept another
collection as a registered validator.

**Note:** To not negatively impact performance, there is no test against
registering collections recursively.
Because of this, when a collection is poorly built, it may render
function nesting overflows.

Additionally, the collections keep nesting the formatting of identifiers.
Given that a `MatchAnyCollection` holds validators with identifiers *Foo*
and *Bar*, respectively, the identifier of the collection will be:

```
any(<Foo>, <Bar>)
```

If one would nest a level deeper, combined with `MatchAllCollection`,
one can get the following:

```
any(<Foo>, all(<Bar>, <Baz>))
```

This particular validator will pass if the *Foo* validator passes, if
both the *Bar* and *Baz* validators pass or if all three validators pass.

## NotValidator

When one wants to invert the validation of any given validator or
collection, one can wrap it around a `NotValidator`.

```php
/** ValidatorInterface $validator */
$notValidator = new NotValidator($validator);

$validator->validate('something'); // true
$notValidator->validate('something'); // false

$validator->validate('somethingElse'); // false
$notValidator->validate('somethingElse'); // true

echo $validator->getIdentifier(); // something
echo $notValidator->getIdentifier(); // not(<something>)
```
