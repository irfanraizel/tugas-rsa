<?php

function gcd($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function findCoprime($phi)
{
    for ($e = 2; $e < $phi; $e++) {
        if (gcd($e, $phi) == 1) {
            return $e; // Bilangan coprime pertama
        }
    }
    return null; // Jika tidak ada coprime
}

$p = 71;
$q = 67;

// Hitung n dan phi(n)
$n = $p * $q;
$phi = ($p - 1) * ($q - 1);

echo "n = $n\n";
echo "phi(n) = $phi\n";

// Cari bilangan coprime (e)
$e = findCoprime($phi);
if ($e !== null) {
    echo "Coprime e = $e\n";
} else {
    echo "Tidak ditemukan bilangan coprime.\n";
}
