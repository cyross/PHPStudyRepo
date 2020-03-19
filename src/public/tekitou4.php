<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    /**
     * 色々試してみる
     * PHP Version >= 7.0
     */
    require_once 'helper.php';

    function printVALUE($v1, $v2, $v3)
    {
        printBR("({$v1},{$v2})={$v3}");
        return null;
    }

    function printH1($str)
    {
        printTAG($str, 'H1');
        return null;
    }

    function printH2($str)
    {
        printTAG($str, 'H2');
        return null;
    }

    $_params = getParams($_GET);
    $return_link = createLink('', '', $_params, '戻る');

    print($return_link);

    printH1('可変関数');

    function op1($v1, $v2): int
    {
        return $v1 + $v2;
    }

    function op2($v1, $v2): int
    {
        return $v1 - $v2;
    }

    function op3($v1, $v2): int
    {
        return $v1 * $v2;
    }

    for ($i = 1; $i < 4; $i++) {
        printBR(('op' . $i)(5, 2)); // 式でも可能
    }

    printH1('無名関数(クロージャ)');

    function opCl1(int $i, callable $v2) {
        for ($j = 3; $j > 0; $j--) {
            printBR($v2($i, $j));
        }
    }

    opCl1 (100, 
        function(int $a, int $b): int {
            return $a * $b;
        }
    );

    printH2('useを使用');

    $x = 200;

    opCl1(
        100,
        function (int $a, int $b) use ($x): int {
            return $x + $a * $b;
        }
    );

    printH2('useで参照渡し使用');

    $x = 200;
    $r = 0;

    opCl1(
        100,
        function (int $a, int $b) use ($x, &$r): int {
            $r += $a * $b;
            return $x + $r;
        }
    );

    printH1('ジェネレータ');

    function gen1()
    {
        $v = 1;
        while (true) {
            yield $v;
            $v++;
        }
        return 0; // PHP7以降でできるようになった
    }

    foreach (['a', 'b', 'c', 'd', 'e'] as $c) {
        foreach (gen1() as $value) {
            printBR($c . $value);
            if ($value % 5 == 0) {
                break;
            }
        }
    }


    print($return_link);
    ?>
</body>

</html>