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
    print("今日のラッキーナンバーは{$hash['b']}ですよ<br>")
    ?>
</body>
</html>
