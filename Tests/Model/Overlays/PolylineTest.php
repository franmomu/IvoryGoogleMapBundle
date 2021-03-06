<?php

namespace Ivory\GoogleMapBundle\Tests\Model\Overlays;

use Ivory\GoogleMapBundle\Tests\Model\Assets\AbstractOptionsAssetTest;

use Ivory\GoogleMapBundle\Model\Overlays\Polyline;
use Ivory\GoogleMapBundle\Model\Base\Coordinate;

/**
 * Polyline test
 *
 * @author GeLo <geloen.eric@gmail.com>
 */
class PolylineTest extends AbstractOptionsAssetTest
{   
    /**
     * @override
     */
    protected function setUp()
    {
        self::$object = new Polyline();
    }
    
    /**
     * @override
     */
    public function testJavascriptVariable() 
    {
        $this->assertEquals(substr(self::$object->getJavascriptVariable(), 0, 9), 'polyline_');
    }
    
    /**
     * @override
     */
    public function testDefaultValues()
    {
        parent::testDefaultValues();
        
        $this->assertFalse(self::$object->hasCoordinates());
        $this->assertEquals(count(self::$object->getCoordinates()), 0);
    }
    
    /**
     * Checks the coordinates getter & setter
     */
    public function testCoordinates()
    {
        $coordinateTest = new Coordinate(1, 1, true);
        self::$object->addCoordinate($coordinateTest);
        $coordinates = self::$object->getCoordinates();
        $this->assertEquals($coordinates[0]->getLatitude(), 1);
        $this->assertEquals($coordinates[0]->getLongitude(), 1);
        $this->assertTrue($coordinates[0]->isNoWrap());
        
        self::$object->addCoordinate(2, 2, false);
        $coordinates = self::$object->getCoordinates();
        $this->assertEquals($coordinates[1]->getLatitude(), 2);
        $this->assertEquals($coordinates[1]->getLongitude(), 2);
        $this->assertFalse($coordinates[1]->isNoWrap());
        
        $coordinatesTest = array(
            new Coordinate(3, 3, true),
            new Coordinate(4, 4, false)
        );
        
        self::$object->setCoordinates($coordinatesTest);
        $coordinates = self::$object->getCoordinates();
        $this->assertEquals($coordinates[0]->getLatitude(), 3);
        $this->assertEquals($coordinates[0]->getLongitude(), 3);
        $this->assertTrue($coordinates[0]->isNoWrap());
        $this->assertEquals($coordinates[1]->getLatitude(), 4);
        $this->assertEquals($coordinates[1]->getLongitude(), 4);
        $this->assertFalse($coordinates[1]->isNoWrap());
        
        $this->setExpectedException('InvalidArgumentException');
        self::$object->addCoordinate('foo');
    }
}
