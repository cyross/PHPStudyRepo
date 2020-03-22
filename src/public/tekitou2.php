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

    printBR("通常配列と連想配列の混在", "PHPの配列は1種類のみ（インデックスとして許容できる型が複数あるという認識)");
    $array = ['りんご' => 'ゴリラ', 2 => '砂糖', 'おもち' => '醤油', 'バナナ'];
    printRR($array);
    $array[] = '柿';
    printRR($array);

    // 配列のインデックス検証
    printBR("インデックスの値がプラスとマイナスの混在時[1]");
    $array = ['りんご', 'ゴリラ', -10=>'ラッパ', 'パンダ'];
    printRR($array);

    printBR("インデックスの値がプラスとマイナスの混在時[2]");
    $array = [-10 => 'ラッパ', 'パンダ'];
    printRR($array);

    printBR("インデックスの値がプラスとマイナスの混在時[3]");
    $array = [-10 => 'ラッパ', 'パンダ', -20 => 'ダイヤ', 'ヤモリ'];
    printRR($array);

    printBR("インデックスの値がプラスとマイナスの混在時[4-1]後で追加[1]");
    $array = [-10 => 'ラッパ', 'パンダ'];
    $array[] = 'ダイヤ';
    printRR($array);

    print($return_link);
    ?>
</body>

</html>