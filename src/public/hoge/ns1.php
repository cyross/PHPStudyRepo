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
    require_once '../helper.php';
    require_once 'ns2.php';

    use cyross\main as cy; // use でエイリアスを作成

    $_params = getParams($_GET);
    $return_link = createLink('', '', $_params, '戻る');

    print($return_link);

    printH2('名前空間指定して実行');
    printBR(cy\hoge(5));

    printH2('無名関数の use');
    $u = 10;

    $func1 = function ($a, $b, &$u): int {
        return $u + $a * $b;
    };

    $func2 = function ($a, $b) use (&$u): int {
        return $u + $a * $b;
    };

    printBR($func1(1, 2, $u));
    printBR($func2(1, 2));

    $u = 20;

    printBR($func1(1, 2, $u));
    printBR($func2(1, 2));

    printBR('所感では、いつも使う変数を関数内で使うとき、わざわざその変数名を指定する必要がないことがメリットしか考えられない');

    print($return_link);
    ?>
</body>

</html>