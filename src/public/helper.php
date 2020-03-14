<?php
/**
 * ヘルパ関数用ファイル
 * 
 * PHP Version >= 7.0
 * 
 * @category Example
 * @package  Cyross
 * @author   Cyross <cyross@sample.com>
 * @license  MIT License
 * @link     https://cyross.com
 */

// この部分はDockerコンテナ内の話なのでバレても特に問題ないっす
const INDEX_FILENAME = 'index.php';
const HELPER_FILENAME = 'helper.php';
const CHECK_PARAMS = ['path', 'url_path'];
const INITIAL_VALUES = ['path' => '/var/www/public', 'url_path' => '/'];
const BASE_URL = 'http://localhost';

function getPath($pathname)
{
    $path = realpath($pathname);
    return dirname($path);
}

// HTTPリクエストパラメータ解析
function getParams($data): array
{
    $result = [];
    foreach (CHECK_PARAMS as $param_key) {
        $param_value = null;
        if (key_exists($param_key, $data)) {
            $param_value = $data[$param_key];
        } else {
            $param_value = INITIAL_VALUES[$param_key];
        }
        $result[$param_key] = $param_value;
    }
    return $result;
}

// ヘルパーファイル名かどうかを返す
function isHelperFile(string $filename): bool
{
    return $filename == HELPER_FILENAME;
}

// インデックスファイル名かどうかを返す
function isIndexFile(string $filename): bool
{
    return $filename == INDEX_FILENAME;
}

// URLのパスが / のみのときと其れ以外のときでは合わせ方が違うため
function concatPath(string $base_path, string $add_path): string
{
    return  $base_path == '/' ? "/{$add_path}" : "{$base_path}/{$add_path}";
}

// リンク作成
function createLink($prefix, $path, $params, $inner): string
{
    $param_array = [];
    foreach ($params as $key => $value) {
        $param_array[] = "{$key}={$value}";
    }
    $param_line = "";
    if (count($param_array) != 0) {
        $param_line = '?' . implode('&', $param_array);
    }
    $base_url = BASE_URL;
    $link = "<a href=\"{$base_url}{$path}{$param_line}\">{$inner}</a>";
    return "<p><span class=\"\">{$prefix}</span>{$link}</p>";
}

// いちいち print("<br>") 入れるの面倒
function printRR($data)
{
    print("<p>");
    print_r($data);
    print("</p>");
    return null; // 戻り値がない        
}

function printBR(...$strs)
{
    $str = implode('<br>', $strs);
    print("<p><strong>{$str}</strong></p>");
    return null;
}
?>
