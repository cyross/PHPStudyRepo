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

    printH1('MySQLでデータベース操作');

    /**
     * DBに接続
     * 
     * @param string $dbname   データベース名
     * @param string $hostname ホスト名
     * @param string $username ユーザ名
     * @param string $password パスワード
     * @param string $charset  文字コード
     * 
     * @return PDO 接続したDBの情報、失敗したときはnull
     */
    function connectDB(string $dbname, string $hostname, string $username, string $password, string $charset = 'utf8'): PDO
    {
        $dsn = "mysql:dbname={$dbname}; host={$hostname}; charset={$charset}";
        try {
            $db = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            print("Error! : {$e->getMessage()}");
            return null;
        }
        return $db;
    }

    $db = connectDB('tekitou5', 'mysql', 'root', 'root');

    $select = $db->prepare('select ch.name as chname, al.name as alname, cl.name as clname, ch.hp, ch.mp from chara as ch, alignment as al, class as cl where ch.alignment_id=al.id and ch.class_id=cl.id');
    $select->execute();

    if ($select->rowCount() == 0) {
        printBR("該当する行はありませんでした");
    } else {
    ?>
        <table border=1>
            <tr>
                <th>名前</th><th>職業</th><th>属性</th><th>HP</th><th>MP</th>
            </tr>
            <?php
            $select->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($select as $row) {
            ?>
                <tr>
                    <td> <?php echo e($row['chname']) ?></td>
                    <td> <?php echo e($row['clname']) ?></td>
                    <td> <?php echo e($row['alname']) ?></td>
                    <td> <?php echo e($row['hp']) ?></td>
                    <td> <?php echo e($row['mp']) ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    }

    // DBの切断(おまじない程度)
    $db = null;

    print($return_link);
    ?>
</body>

</html>