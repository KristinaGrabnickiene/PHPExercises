<?php

declare(strict_types=1);

//papildomas Helpers failas jame nepagrindines funcijos o tik papildancios koda
//papildoma funcija prideti - ir $ zenkla prie duomenu, kad atvaizduoti pabaigoje
function formatDollarAmount(float $amount): string
{
    $isNegative = $amount < 0;

    return ($isNegative ? '-' : '') . '$' . number_format(abs($amount), 2);
}

//pakeiciamas datos formatavimas
function formatDate(string $date): string
{
    return date('M j, Y', strtotime($date));
}
