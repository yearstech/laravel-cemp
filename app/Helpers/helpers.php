<?php

if (!function_exists('pp')) {
    function pp($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}
if (!function_exists('ppd')) {
    function ppd($arr)
    {
        pp($arr);
        die();
    }
}
// get month name with year by month and year
function getBillingMonth($month, $year)
{
    return date('M Y', strtotime("{$year}-{$month}-01"));
}
function getDecodedFilters($filters)
{
    $filters =  json_decode(base64_decode($filters), true);
    if (!is_array($filters)) {
        $filters = [];
    }
    return $filters;
}
function numberToWord($num)
{
    if ($num == 0) return 'Zero';

    $word = '';
    $units = [
        10000000 => 'Crore',
        100000 => 'Lakh',
        1000 => 'Thousand',
        100 => 'Hundred'
    ];

    foreach ($units as $value => $unit) {
        if (intval($num / $value) != 0) {
            $word .= getBaseNumberToWord(intval($num / $value)) . ' ' . $unit . ' ';
            $num %= $value;
        }
    }

    if ($num != 0) {
        $word .= getBaseNumberToWord($num);
    }

    return ucwords(trim($word));
}

function getBaseNumberToWord($num)
{
    if ($num < 0) return $num;
    $basicNumbers = [
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety'
    ];

    if ($num <= 20) {
        return $basicNumbers[$num];
    } elseif ($num < 100) {
        return $basicNumbers[floor($num / 10) * 10] . ' ' . $basicNumbers[$num % 10];
    }
    return '';
}

// check settings with required keys
function validateElectricBillSettings(array $settingsArray)
{
    $requiredKeys = ['electric_bill_party', 'electric_bill_account', 'electric_bill_purpose'];

    foreach ($requiredKeys as $key) {
        if (!isset($settingsArray[$key])) {
            return $key;
        }
    }
    return true;
}

// comma separated number
function csn($number)
{
    if (empty($number)) {
        return $number;
    }
    // Check if the number is negative
    $isNegative = $number < 0;

    // Convert the number to absolute value for processing
    $number = abs($number);

    // Split the integer and decimal parts
    $parts = explode('.', (string)$number);
    $integerPart = $parts[0];
    $decimalPart = isset($parts[1]) ? $parts[1] : '';

    // Format the integer part in the Indian numbering system
    $lastThreeDigits = substr($integerPart, -3);
    $remainingDigits = substr($integerPart, 0, -3);

    if ($remainingDigits != '') {
        $remainingDigits = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $remainingDigits);
        $integerPart = $remainingDigits . ',' . $lastThreeDigits;
    }

    // Reattach the decimal part, if present
    $formattedNumber = $integerPart;
    if ($decimalPart !== '') {
        $formattedNumber .= '.' . $decimalPart;
    }

    // Add the negative sign back if the number was negative
    return $isNegative ? '-' . $formattedNumber : $formattedNumber;
}

// Helper function to ensure a value is treated as an array
if (!function_exists('normalizeToArray')) {
    function normalizeToArray($value)
    {
        return is_array($value) ? $value : [$value];
    };
}
