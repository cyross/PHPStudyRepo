<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
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

        require_once 'helper.php';

        function isExecutableFile(string $filename): bool
        {
            return !isHelperFile($filename) && !isIndexFile($filename);
        }

        $params = getParams($_GET);
        $param_path = $params['path'];
        $param_url_path = $params['url_path'];

        print("<h1>PHPプログラムランチャー</h1>");

        print("<h2><span>現在のディレクトリ:</span>{$param_path}</h2>");

        $dirs = new DirectoryIterator($param_path);
        foreach ($dirs as $path) {
            if ($path == '..' && $param_url_path != '/') {
                $next_path = getPath("{$param_path}");
                $url_pathes = explode('/', $param_url_path);
                if (count($url_pathes) != 0) {
                    array_pop($url_pathes);
                }
                $next_url_path = join('/', $url_pathes);
                if ($next_url_path == '') {
                    $next_url_path = '/';
                }
                $params = ['path' => $next_path, 'url_path' => $next_url_path];
                print(createLink('[D]', '', $params, '..'));
            } elseif ($path->isDot()) {
                continue;
            } elseif ($path->isDir()) {
                $dirname = $path->getFilename();
                $next_path = "{$param_path}/${dirname}";
                $next_url_path = concatPath($param_url_path, $dirname);
                $params = ['path' => $next_path, 'url_path' => $next_url_path];
                print(createLink('[D]', '', $params, $dirname));
            } elseif ($path->isFile() && isExecutableFile($path->getFilename())) {
                $filename = $path->getFilename();
                $params = ['path' => $param_path, 'url_path' => $param_url_path];
                $path = concatPath($param_url_path, $filename);
                print(createLink('[F]', "{$path}", $params, $filename));
            }
        }
        ?>
    </body>
</html>
