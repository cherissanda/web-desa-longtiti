<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function indonesian_date($date) {
    $months = array(
        0 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    $parts = explode('-', $date); // Assumes date is in YYYY-MM-DD format
    $year = $parts[0];
    $month = (int)$parts[1]; // Convert month to integer
    $day = $parts[2];

    return $day . ' ' . $months[$month - 1] . ' ' . $year; // Adjusted index for months array
}
?>
