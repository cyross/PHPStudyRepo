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
    $_dir_path = $_GET['path'];

    print("<p><a href=\"http://localhost?path={$_dir_path}\">戻る</a></p>");

    $x = 'title';
    $title = '世界';
    print('[可変変数の確認]<br>');
    print("こんばんわ、{${$x}}<br>");

    // 定数を直接変数展開できなさそう
    const X = 100;
    $x = X;
    print "元気{$x}パーセント！<br>";

    // 配列の動作確認
    $arr = ['X1', 'X2', 'Y3', 'Y4', 'Z5', 'Z6'];
    print_r($arr);
    print('<br>');

    // 今度は連想配列
    $hash = ['a'=>1, 'b'=>2, 'c'=>3];
    print_r($hash);
    print('<br>');
    print("今日のラッキーナンバーは{$hash['b']}ですよ<br>");

    // 「独習PHP第3版」練習問題2.5.2より
    $data = [1 => 2, 3 => 5, 5 => 10, 8 => 12];
    $data[] = 20;
    print("{$data[9]}<br>");

    // 数値変換
    $v = var_dump((int) 10.5);
    print("{$v}<br>");
    $v = var_dump(bindec('0b1101'));
    print("${v}<br>");

    // 浮動小数点計算
    $f = floor((0.1 + 0.7) * 10.0);
    print("あれ、結果が{$f}になってるぞ<br>");
    $f = floor(bcadd(0.1, 0.7, 1) * 10.0);
    print("よし、bcaddで結果が{$f}になった<br>");

    print("<p><a href=\"http://localhost?path={$_dir_path}\">戻る</a></p>");
    ?>
</body>
</html>
