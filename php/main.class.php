<?php

class ParseData {

    public $input;

    public function __construct($input) {
        $this->input = $input;
    }

    public function generateData() {
        $result = "";
        $inString = $this->input;
        $data = explode("!", $inString);
        $find = ['T1', 'T2', 'T3', 'LF', 'LD', 'BT', 'WG', 'WR', 'NS', 'LI', ':'];
        $rep = ['Lufttemperatur 1', 'Lufttemperatur 2', 'Lufttemperatur 3', 'Luftfeuchtigkeit', 'Luftdruck', 'Bodentemperatur', 'Windgeschwindigkeit', 'Windrichtung', 'Niederschlagsmenge', 'Licht', ': '];
        foreach ($data as $key => $value) {
            $result = $result . " " . str_replace($find, $rep, $value) . "|";
        }
        $result = explode("|", $result);
        $result = array_values($result);
        $result = $this->convertData($result);
        return $result;
    }

    public function getValue() {
        $find = ['T1', 'T2', 'T3', 'LF', 'LD', 'BT', 'WG', 'WR', 'NS', 'LI', ':'];
        $x = str_replace($find, "", $this->input);
        $data = explode("!", $x);
        return $data;
    }

    public function convertData($data) {
        $data = $data;
        $temp = $data[0];           // -30°C - +50°C
        $druck = $data[4];          // 960-1060 hPa
        $niederschlag = $data[8];   // 0-200 Liter
        $licht = $data[9];          // 0-1000 Lux
        $wertung = "";
        if ($druck > 1000) {
            if ($licht > 700) {
                if ($niederschlag == 0) {
                    $wertung = "sun";
                } else {
                    $wertung = "sun-rain";
                }
            } elseif ($licht > 100) {
                if ($niederschlag == 0) {
                    $wertung = "cloudy";
                } else {
                    $wertung = "cloudy-rain";
                }
            }
        } elseif ($druck < 1000) {
            if ($niederschlag == 0) {
                $wertung = "fog";
            } elseif ($niederschlag < 50) {
                $wertung = "rainy";
            } else {
                $wertung = "storm";
            }
        }
        switch ($wertung) {
            case 'sun':
                $output = "Die Sonne scheint";
                $imgPath = "sunny.png";
                break;
            case 'sun-rain':
                $output = "Die Sonne scheint und es regnet";
                $imgPath = "rain.png";
                break;
            case 'cloudy':
                $output = "Es ist bewölkt";
                $imgPath = "clouds.png";
                break;
            case 'cloudy-rain':
                $output = "Es ist bewölkt und es regnet";
                $imgPath = "rain.png";
                break;
            case 'fog':
                $output = "Es ist neblig";
                $imgPath = "fog.png";
                break;
            case 'storm':
                $output = "Es gewittert";
                $imgPath = "thunderstorms.png";
                break;
            default:
                $output = "Es ist ein Fehler aufgetreten";
                $imgPath = "error.png";
                break;
        }

        $temp = $this->getValue();
        $temp = round(($temp[0] + $temp[1] + $temp[2]) / 3, 2);
        $result = ['wetter' => $output, 'imgPath' => $imgPath, 'temp' => $temp, 'data' => $data];
        return $result;
    }

}
?>