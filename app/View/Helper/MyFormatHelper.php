<?php

App::uses('Helper', 'View');

class MyFormatHelper extends AppHelper {

    public function format_show($number, $decimals=3) {

        if (!$number) {

            if (!$decimals) {
                return "0,000";
            }
            
            return "0,00";
        }

        return number_format($number, $decimals, ',', '.');
    }

}
