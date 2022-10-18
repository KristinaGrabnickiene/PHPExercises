<?php

declare(strict_types = 1);

//pagrindinis failas logikai apskaiciuoti yra APP
//funcija paiimti failo dir
function getTransactionFiles(string $dirPath): array
{
    $files = [];

    //ieskoma ar yra failas, kuri galima skaityti
    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        //gauname faila, nurodant dirPath 
        $files[] = $dirPath . $file;
    }

    return $files;
}

//funkcija failo skaitymui, transactionHandler - jei duomenys butu kitu formatu ir kitos vietos
function getTransactions(string $fileName, ?callable $transactionHandler = null): array
{
    if (! file_exists($fileName)) {
        trigger_error('File "' . $fileName . '" does not exist.', E_USER_ERROR);
    }

    $file = fopen($fileName, 'r');
    
    //praleisti pirma eilute
    fgetcsv($file);

    $transactions = [];

    //irasoma kiekviena eilute i array
    while (($transaction = fgetcsv($file)) !== false) {
        if ($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    return $transactions;
}

//sutvarkomi duomenys be $ ir 
function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount,
    ];
}

//atliekami skaiciavimai netTotal, totalIncome, totalExpense ir sudedami i array
function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}
