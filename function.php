<?php
// Fungsi untuk menghitung modulus eksponensial
function mod_exp($base, $exp, $mod)
{
    $result = 1;
    while ($exp > 0) {
        if ($exp % 2 == 1) {
            $result = ($result * $base) % $mod;
        }
        $base = ($base * $base) % $mod;
        $exp = floor($exp / 2);
    }
    return $result;
}

// Fungsi untuk menghitung GCD (Greatest Common Divisor)
function gcd($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

// Fungsi untuk mencari modulo invers
function mod_inverse($e, $phi)
{
    $d = 0;
    $x1 = 0;
    $x2 = 1;
    $y1 = 1;
    $temp_phi = $phi;

    while ($e > 0) {
        $temp1 = floor($temp_phi / $e);
        $temp2 = $temp_phi - $temp1 * $e;
        $temp_phi = $e;
        $e = $temp2;

        $x = $x2 - $temp1 * $x1;
        $y = $d - $temp1 * $y1;

        $x2 = $x1;
        $x1 = $x;
        $d = $y1;
        $y1 = $y;
    }

    if ($temp_phi == 1) {
        return $d + $phi;
    }

    return null;
}

// Langkah 1: Key Generation
function generate_keys($p, $q)
{
    $n = $p * $q; // n = p * q
    $phi = ($p - 1) * ($q - 1); // φ(n) = (p-1)(q-1)

    // Pilih e (1 < e < φ(n)) dan coprime dengan φ(n)
    $e = 13;
    while ($e < $phi) {
        if (gcd($e, $phi) == 1) {
            break;
        }
        $e++;
    }

    // Hitung d (invers modulo e terhadap φ(n))
    $d = mod_inverse($e, $phi);

    return [
        'public' => ['e' => $e, 'n' => $n],
        'private' => ['d' => $d, 'n' => $n],
    ];
}
// Langkah 2: Enkripsi
function encrypt($plaintext, $public_key)
{
    $e = $public_key['e'];
    $n = $public_key['n'];

    $cipher = [];
    foreach (str_split($plaintext) as $char) {
        $cipher[] = mod_exp(ord($char), $e, $n);
    }
    return $cipher;
}

// Langkah 3: Dekripsi
function decrypt($ciphertext, $private_key)
{
    $d = $private_key['d'];
    $n = $private_key['n'];

    $plaintext = '';
    foreach ($ciphertext as $char) {
        $plaintext .= chr(mod_exp($char, $d, $n));
    }
    return $plaintext;
}

// Contoh penggunaan
$p = 71; // Bilangan prima pertama
$q = 67; // Bilangan prima kedua

// Generate keys
$keys = generate_keys($p, $q);
$public_key = $keys['public'];
$private_key = $keys['private'];

// echo "Public Key: " . json_encode($public_key) . "\n";
// echo "Private Key: " . json_encode($private_key) . "\n";

// Plaintext
// $plaintext = "SBGH80166JHY78";
// echo "Plaintext: " . $plaintext . "\n";

// Enkripsi
// $ciphertext = encrypt($plaintext, $public_key);
// echo "Ciphertext: " . json_encode($ciphertext) . "\n";

// Dekripsi
// $decrypted_text = decrypt($ciphertext, $private_key);
// echo "Decrypted Text: " . $decrypted_text . "\n";

// Base URL Function
function base_url($path = '')
{
    // Deteksi apakah server menggunakan HTTPS
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? "https" : "http";

    // Ambil nama host dan direktori proyek
    $host = $_SERVER['HTTP_HOST'];
    $scriptDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

    // Gabungkan menjadi base URL
    $baseUrl = $protocol . "://" . $host . $scriptDir;

    // Kembalikan base URL dengan tambahan path jika ada
    return $baseUrl . $path;
}
