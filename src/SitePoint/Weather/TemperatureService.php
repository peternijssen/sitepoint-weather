<?php

namespace SitePoint\Weather;

class TemperatureService
{
    /**
     * @var WeatherServiceInterace $weatherService Holds the weather service
     */
    private $weatherService;

    /**
     * Constructor.
     *
     * @param WeatherServiceInterface $weatherService
     */
    public function __construct(WeatherServiceInterface $weatherService) {
        $this->weatherService = $weatherService;
    }

    /**
     * Get current temperature in Fahrenheit
     *
     * @return float
     */
    public function getTempFahrenheit() {
        return ($this->weatherService->getTempCelsius() * 1.8000) + 32;
    }

    /**
     * Get average temperature of the night
     *
     * @return float
     */
    public function getAvgNightTemp() {
        $nightHours = array(0, 1, 2, 3, 4, 5, 6);
        $totalTemperature = 0;

        foreach($nightHours as $hour) {
            $totalTemperature += $this->weatherService->getTempByHour($hour);
        }

        return round($totalTemperature / count($nightHours), 2);
    }
}
