<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    /**
     * 子ディレクトリでも動作するのか検証するためのファイル
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

    $_params = getParams($_GET);
    $return_link = createLink('', '', $_params, '戻る');

    print($return_link);

    printBR('戻れるかな？');

    print($return_link);
    ?>
</body>

</html>
