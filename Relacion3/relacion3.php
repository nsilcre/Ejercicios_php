<?php
// Librería Relación III - Funciones comunes de los ejercicios 1, 2 y 3

// Ejercicio 1: número primo
function esPrimo(int $num): bool {
    if ($num <= 1) return false;
    if ($num === 2) return true;
    if ($num % 2 === 0) return false;

    $limite = (int) sqrt($num);
    for ($i = 3; $i <= $limite; $i += 2) {
        if ($num % $i === 0) return false;
    }
    return true;
}

// Ejercicio 2: factorial iterativo
function factorialIterativo(int $n): int {
    if ($n < 0) {
        throw new InvalidArgumentException('El factorial solo está definido para n >= 0');
    }
    $res = 1;
    for ($i = 2; $i <= $n; $i++) {
        $res *= $i;
    }
    return $res;
}

// Ejercicio 2: factorial recursivo
function factorialRecursivo(int $n): int {
    if ($n < 0) {
        throw new InvalidArgumentException('El factorial solo está definido para n >= 0');
    }
    if ($n === 0 || $n === 1) return 1;
    return $n * factorialRecursivo($n - 1);
}

// Ejercicio 3: MCD por restas (iterativo)
function mcdRestaIter(int $a, int $b): int {
    $a = abs($a);
    $b = abs($b);
    if ($a === 0) return $b;
    if ($b === 0) return $a;

    while ($a !== $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

// Ejercicio 3: MCD por restas (recursivo)
function mcdRestaRec(int $a, int $b): int {
    $a = abs($a);
    $b = abs($b);
    if ($a === 0) return $b;
    if ($b === 0) return $a;
    if ($a === $b) return $a;
    if ($a > $b) {
        return mcdRestaRec($a - $b, $b);
    }
    return mcdRestaRec($a, $b - $a);
}

// Ejercicio 3: MCD por módulo (iterativo)
function mcdModuloIter(int $a, int $b): int {
    $a = abs($a);
    $b = abs($b);
    if ($a === 0) return $b;
    if ($b === 0) return $a;

    while ($b !== 0) {
        $r = $a % $b;
        $a = $b;
        $b = $r;
    }
    return $a;
}

// Ejercicio 3: MCD por módulo (recursivo)
function mcdModuloRec(int $a, int $b): int {
    $a = abs($a);
    $b = abs($b);
    if ($b === 0) return $a;
    return mcdModuloRec($b, $a % $b);
}
