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

    printH1('文字列の暗黙的な数値変換');

    $v1 = '150';
    $v2 = '0A10';
    printVALUE($v1, $v2, $v1+$v2);
    
    $v2 = '3A10';
    printVALUE($v1, $v2, $v1 + $v2);

    $v2 = '0b111';
    printVALUE($v1, $v2, $v1 + $v2);

    $v2 = bindec('0b111');
    printVALUE($v1, $v2, $v1 + $v2);

    printH1('制御構文やろうぜ');

    printH2('while[1]');

    $i = 10;
    do {
        printBR($i);
        $i--;
    } while ($i > 0);

    printH2('while[2]');

    $i = 10;

    do {
        $i--;
        printBR($i);
    } while ($i > 0);

    printH2('while[3]');

    $i = 10;
    while ($i > 0) {
        printBR($i);
        $i--;
    };

    printH2('while[4]');

    $i = 10;

    while ($i > 0) {
        $i--;
        printBR($i);
    };

    printH2('while[5]');

    $i = 0;

    do {
        $i--;
        printBR($i);
    } while ($i > 0);

    printBR('do-whileでは1回ループは回る');

    printH2('while[6]');

    $i = 0;

    while ($i > 0) {
        $i--;
        printBR($i);
    };

    printBR('whileでは回らずに回避');

    printH1('変数の参照渡し');

    $array = ['a', 'b', 'c', 'd', 'e', 'f'];

    printBR(join(',', $array));

    foreach ($array as &$element) {
        $element = $element . '1';
    }

    printBR(join(',', $array));

    printH1('break 2');

    for ($i=0; $i<10; $i++) {
        for ($j=0; $j<10; $j++) {
            print(($i+1)*($j+1));
            if ($j == 5) {
                break 2;
            }
        }
    }

    printBR('ネスト数を指定して break / continue すると、指定数の上位ネストに戻る');
    printBR('今回の場合は j と i のネストを抜けたため、ループが終了した');

    printH2('switchブロックでの break 2');

    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $k = ($i + 1) * ($j + 1); 
            switch ($i) {
            case 0 :
                $k = 'hello';
                break;
            case 5 :
                continue 2;
            case 9 :
                break 2;
            }
            printBR("i:${i} j:{$j} k:{$k}");
        }
    }

    printBR('switch内では break も continue も同じ処理');
    printBR('ただし、戻る先がfor等の場合、挙動がそれぞれに適応したものになる');
    printBR('continue 2 のときは 一番外の $i のループに戻る。ループは継続');
    printBR('break 2 のときは 一番外の $i のループに戻るが、ループは終了');

    print($return_link);
    ?>
</body>

</html>
