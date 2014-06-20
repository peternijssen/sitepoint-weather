<?php

namespace SitePoint\Weather\Tests;

use SitePoint\Weather\TemperatureService;

class TemperatureServiceTest extends \PHPUnit_Framework_TestCase
{

    public function testGetTempFahrenheit() {
        $weatherServiceMock = \Mockery::mock('SitePoint\Weather\WeatherServiceInterface');
        $weatherServiceMock->shouldReceive('getTempCelsius')->once()->andReturn(25);

        $temperatureService = new TemperatureService($weatherServiceMock);
        $this->assertEquals(77, $temperatureService->getTempFahrenheit());
    }

    public function testGetAvgNightTemp() {
        $weatherServiceMock = \Mockery::mock('SitePoint\Weather\WeatherServiceInterface');
        $weatherServiceMock->shouldReceive('getTempByHour')
            ->times(7)
            ->with(\Mockery::anyOf(0, 1, 2, 3, 4, 5, 6))
            ->andReturn(14, 13, 12, 11, 12, 12, 13);

        $temperatureService = new TemperatureService($weatherServiceMock);
        $this->assertEquals(12.43, $temperatureService->getAvgNightTemp());
    }
}
 