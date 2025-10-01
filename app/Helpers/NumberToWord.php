<?php

namespace App\Helpers;

class NumberToWord
{
    private static $words = [
        '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
        'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen',
        'Eighteen', 'Nineteen'
    ];

    private static $tens = [
        '', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
    ];

    public static function convert($number)
    {
        // Ensure number is integer
        $number = (int) $number;

        if ($number == 0) return 'Zero';
        if ($number < 20) return self::$words[$number];
        if ($number < 100) {
            return self::$tens[intval($number / 10)] . ' ' . self::$words[$number % 10];
        }
        if ($number < 1000) {
            return self::$words[intval($number / 100)] . ' Hundred ' . self::convert($number % 100);
        }
        if ($number < 1000000) {
            return self::convert(intval($number / 1000)) . ' Thousand ' . self::convert($number % 1000);
        }
        return self::convert(intval($number / 1000000)) . ' Million ' . self::convert($number % 1000000);
    }
}

