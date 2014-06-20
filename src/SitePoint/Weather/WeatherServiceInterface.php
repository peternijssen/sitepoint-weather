<?php

namespace SitePoint\Weather;

interface WeatherServiceInterface
{
    /**
     * Return the Celsius temperature
     *
     * @return float
     */
    public function getTempCelsius();

    /**
     * Return the Celsius temperature by hour
     *
     * @param $hour
     * @return float
     */
    public function getTempByHour($hour);
}
