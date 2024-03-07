----------
Question 1 :
La fonction foo() prend un tableau d'intervalles comme paramètre, et les fusionne afin d'obtenir la plus grande intervalle possible si ces intervalles se chevauchent.
Par exemple, dans le contexte des horaires des employés d'une boutique, cela permettrait de déterminer l'intervalle pendant lequel il y aura toujours des employés prêts à accueillir les clients.

Question 2
<?php

function foo($array)
{
    // Trier les intervalles par ordre croissant
    usort($array, function ($a, $b) {
        return $a[0] - $b[0];
    });

    $merged = [$array[0]];

    // Parcourir chaque intervalle
    foreach ($array as $interval) {
        $lastMerged = &$merged[count($merged) - 1];

        if ($interval[0] <= $lastMerged[1]) {
            $lastMerged[1] = max($lastMerged[1], $interval[1]);
        } else {
            $merged[] = $interval;
        }
    }
    return $merged;
}

$test1 = [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]];
$result = foo($test1);
// print_r($result);


foreach ($result as $interval) {
    echo "[" . $interval[0] . ", " . $interval[1] . "]";
}

?>


-Question 3
J'ai implémenté cette fonction en 1h