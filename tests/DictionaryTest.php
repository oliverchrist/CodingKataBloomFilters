<?php

require_once dirname(__FILE__) . '/../Dictionary.php';

/**
 * Test class for Dictionary.
 * Generated by PHPUnit on 2012-01-25 at 16:37:58.
 */
class DictionaryTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Dictionary
     */
    protected $object;
    protected $hashLength = 5;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Dictionary('../dictionary.txt', $this->hashLength);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    public function testHash(){
        $this->assertEquals(substr('acbd18db4c',0,  $this->hashLength), $this->object->createHash('foo'));
    }

    public function testDictionary() {
        $this->assertTrue($this->object->checkDictionary('werden'));
    }
    public function testDictionaryNegative() {
        $this->assertFalse($this->object->checkDictionary('Frankenstein'));
        $this->assertFalse($this->object->checkDictionary('Hase'));
        $this->assertFalse($this->object->checkDictionary('Framework'));
        $this->assertFalse($this->object->checkDictionary('Slackline'));
        $this->assertFalse($this->object->checkDictionary('Abendbrot'));
        $this->assertFalse($this->object->checkDictionary('Morgenrot'));
        $this->assertFalse($this->object->checkDictionary('Rotwein'));
    }
}

?>
