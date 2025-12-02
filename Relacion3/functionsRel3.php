<?php
// Librería de funciones para Relación III - Ejercicio 11 y siguientes

// Intercambia los valores de dos variables (por referencia)
function swap(mixed &$n1, mixed &$n2): void {
    $tmp = $n1;
    $n1 = $n2;
    $n2 = $tmp;
}

// Invierte el orden de los elementos de un array usando swap
function invertirArray(array &$arr): void {
    $i = 0;
    $j = count($arr) - 1;
    while ($i < $j) {
        swap($arr[$i], $arr[$j]);
        $i++;
        $j--;
    }
}

// Ordenación burbuja de un array (strings o números) in-place
function burbuja(array &$arr): void {
    $n = count($arr);
    if ($n < 2) return;
    $cambio = true;
    while ($cambio) {
        $cambio = false;
        for ($i = 0; $i < $n - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                swap($arr[$i], $arr[$i + 1]);
                $cambio = true;
            }
        }
        $n--;
    }
}
