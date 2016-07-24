<?php
namespace HylianShield\Tests\Validator\Collection;

use HylianShield\Validator\Collection\AbstractValidatorCollection;
use HylianShield\Validator\Collection\MatchAllCollection;

class MatchAllCollectionTest extends AbstractValidatorCollectionTest
{
    /**
     * @return AbstractValidatorCollection
     */
    protected function createCollection(): AbstractValidatorCollection
    {
        return new MatchAllCollection();
    }

    /**
     * Test the validate method.
     *
     * @param AbstractValidatorCollection $collection
     *
     * @return void
     * @dataProvider collectionProvider
     */
    public function testValidate(AbstractValidatorCollection $collection)
    {
        $this->assertInstanceOf(MatchAllCollection::class, $collection);
        $this->assertFalse($collection->validate(static::VALIDATION_SUBJECT));

        $collection->addValidator(
            $this->createValidatorMock('Foo')
        );

        $collection->addValidator(
            $this->createValidatorMock('Bar')
        );

        $this->assertFalse($collection->validate('Foo'));
        $this->assertFalse($collection->validate('Bar'));
    }
}
