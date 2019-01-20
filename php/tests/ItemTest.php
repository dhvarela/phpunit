<?php

use \PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item();

        $this->assertNotEmpty($item->getDescription());
    }

    /**
     * We can test a protected method extending a child class
     */
    public function testIDisAnInteger()
    {
        $item = new ItemChild();

        $this->assertIsInt($item->getID());
    }

    /**
     * To test private methods we need to use the Reflection technique
     *
     * @throws ReflectionException
     */
    public function testTokenIsAString()
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    /**
     * To test private methods with arguments we need to use the reflection technique with invokeArgs
     *
     * @throws ReflectionException
     */
    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
