<?php

namespace App\Service;

class ColorGenerator
{
    public function generateBackground(array $colors): string
    {
        $red = [];
        $green = [];
        $blue = [];
        foreach ($colors as $color) {
            $red[] = hexdec(substr($color, 1, 2));
            $green[] = hexdec(substr($color, 3, 2));
            $blue[] = hexdec(substr($color, 5, 2));
        }
        $newRed = dechex(intval(array_sum($red) / count($red)));
        $newGreen = dechex(intval(array_sum($green) / count($green)));
        $newBlue = dechex(intval(array_sum($blue) / count($blue)));
        $newRed = $this->isLowerThanTen($newRed);
        $newGreen = $this->isLowerThanTen($newGreen);
        $newBlue = $this->isLowerThanTen($newBlue);
        return '#' . $newRed . $newGreen . $newBlue;
    }

    public function invertColor(string $color): string
    {
        $red = 255 - hexdec(substr($color, 1, 2));
        $green = 255 - hexdec(substr($color, 3, 2));
        $blue = 255 - hexdec(substr($color, 5, 2));
        $newRed = $this->isLowerThanTen(dechex($red));
        $newGreen = $this->isLowerThanTen(dechex($green));
        $newBlue = $this->isLowerThanTen(dechex($blue));
        return '#' . $newRed . $newGreen . $newBlue;
    }

    /**
     * adding "0" before $color if $color equal 0
     *
     * @param string $color
     * @return string
     */
    private function isLowerThanTen(string $color): string
    {
        if (strlen($color) < 2) {
            return '0' . $color;
        }
        return $color;
    }
}
