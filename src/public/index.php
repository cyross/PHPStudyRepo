<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        const INITIAL_PATH = '/var/www/public';

        function getPath($pathname) {
            $path = realpath($pathname);
            return dirname($path);
        }
        /**
         * とりあえず最初に実行するファイル
         * 
         * PHP Version >= 7.0
         * 
         * @category Example
         * @package  Cyross
         * @author   Cyross <cyross@sample.com>
         * @license  MIT License
         * @link     https://cyross.com
         */
        $param_path = $_GET['path'];
        if ($param_path == null) {
            $param_path = INITIAL_PATH;
        }
        print("<h1>PHPプログラムランチャー</h1>");
        print("<p><span class=\"\">CURRENT DIR={$param_path}</span></p>");
        $dirs = new DirectoryIterator($param_path);
        foreach ($dirs as $path) {
            if ($path == '..' && $param_path != INITIAL_PATH) {
                $next_path = getPath($param_path . $path);
            } elseif ($path->isDot()) {
                continue;
            } elseif ($path->isDir()) {
                $dirname = $path->getFilename();
                print("<p><span class=\"\">[D]</span><a href=\"http://localhost?path={$dirname}\">{$dirname}</a></p>");
            } elseif ($path->isFile()) {
                $filename = $path->getFilename();
                $dirname = getPath($filename);
                print("<p><span class=\"\">[F]</span><a href=\"http://localhost/${filename}?path={$dirname}\">{$filename}</a></p>");
            }
        }
        ?>
    </body>
</html>
