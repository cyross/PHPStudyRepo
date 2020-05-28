<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    /**
     * 色々試してみる
     * 
     * PHP Version >= 7.0
     * 
     * @category Example
     * @package  Cyross
     * @author   Cyross <cyross@sample.com>
     * @license  MIT License
     * @link     https://cyross.com
     */
    require_once 'helper.php';

    $_params = getParams($_GET);
    $return_link = createLink('', '', $_params, '戻る');

    print($return_link);

    printH1('可変関数');

    /**
     * 単に足すだけ
     * 
     * @param int $v1 値1
     * @param int $v2 値2
     * 
     * @return int 結果
     */
    function op1($v1, $v2): int
    {
        return $v1 + $v2;
    }

    /**
     * 単に引くだけ
     * 
     * @param int $v1 値1
     * @param int $v2 値2
     * 
     * @return int 結果
     */
    function op2($v1, $v2): int
    {
        return $v1 - $v2;
    }

    /**
     * 単にかけるだけ
     * 
     * @param int $v1 値1
     * @param int $v2 値2
     * 
     * @return int 結果
     */
    function op3($v1, $v2): int
    {
        return $v1 * $v2;
    }

    for ($i = 1; $i < 4; $i++) {
        printBR(('op' . $i)(5, 2)); // 式でも可能
    }

    printH1('無名関数(クロージャ)');

    /**
     * 内部で関数実行して結果を表示
     * 
     * @param int      $i  値1
     * @param callable $v2 値2
     * 
     * @return null 
     */
    function opCl1(int $i, callable $v2)
    {
        for ($j = 3; $j > 0; $j--) {
            printBR($v2($i, $j));
        }
    }

    $func = function (int $a, int $b): int {
        return $a * $b;
    };

    opCl1(100, $func);

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

    /**
     * 1,2,3...と返すジェネレータ
     * 
     * @return int 1を起点とした値
     */
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
