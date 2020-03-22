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

/**
 * フルパス取得
 * 
 * @param string $pathname （相対）パス名
 * 
 * @return string フルパス名
 */
function getPath($pathname)
{
    $path = realpath($pathname);
    return dirname($path);
}

/**
 * HTTPリクエストパラメータ解析
 * 
 * @param array $data HTTPリクエストパラメータ
 * 
 * @return array 整形したパラメータリスト
 */
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

/**
 * ファイル名がヘルパーファイルかどうかを返す
 * 
 * @param string $filename ファイル名
 * 
 * @return bool ファイル名がヘルパーファイルのときは true
 */
function isHelperFile(string $filename): bool
{
    return $filename == HELPER_FILENAME;
}

/**
 * ファイル名がインデックスファイルかどうかを返す
 * 
 * @param string $filename ファイル名
 * 
 * @return bool ファイル名がインデックスファイルのときは true
 */
function isIndexFile(string $filename): bool
{
    return $filename == INDEX_FILENAME;
}

/**
 * パス名を結合する
 * 
 * @param string $base_path 結合元パス名
 * @param string $add_path  結合するパス名
 * 
 * @return string 結合したパス名
 */
function concatPath(string $base_path, string $add_path): string
{
    return  $base_path == '/' ? "/{$add_path}" : "{$base_path}/{$add_path}";
}

/**
 * Aタグブロックを作成
 * 
 * @param string $prefix 前置き
 * @param string $path   URL
 * @param array  $params GETパラメータリスト
 * @param string $inner  Aタグ内の文字列
 * 
 * @return string リンクタグ
 */
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

/**
 * データを p タグで囲んで出力する
 * 
 * @param var $data 表示対象データ
 * 
 * @return null
 */
function printRR($data)
{
    print("<p>");
    print_r($data);
    print("</p>");
    return null; // 戻り値がない        
}

/**
 * 各文字列の後ろに <br> タグをつけて出力
 * 
 * @param array ...$strs 表示対象データのリスト（可変）
 * 
 * @return null
 */
function printBR(...$strs)
{
    $str = implode('<br>', $strs);
    print("<p><strong>{$str}</strong></p>");
    return null;
}

/**
 * 指定のタグで囲んで出力
 * 
 * @param string $str 囲みたい文字列
 * @param string $tag タグ名
 * 
 * @return null
 */
function printTAG($str, $tag)
{
    print("<{$tag}>{$str}</{$tag}>");
    return null;
}

/**
 * とりあえず指定の書式で出力
 * "(v1,v2)=v3" という書式で出力
 * 最後に <br> で囲む
 * 
 * @param var $v1 値1
 * @param var $v2 値2
 * @param var $v3 値3
 * 
 * @return null
 */
function printVALUE($v1, $v2, $v3)
{
    printBR("({$v1},{$v2})={$v3}");
    return null;
}

/**
 * H1 タグで囲んで出力
 * 
 * @param string $str 囲みたい文字列
 * 
 * @return null
 */
function printH1($str)
{
    printTAG($str, 'H1');
    return null;
}

/**
 * H2 タグで囲んで出力
 * 
 * @param string $str 囲みたい文字列
 * 
 * @return null
 */
function printH2($str)
{
    printTAG($str, 'H2');
    return null;
}
?>
