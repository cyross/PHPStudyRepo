# LaradockでPHPを勉強しよう！　なプロジェクト

## 動かし方

### リポジトリをクローンしてカレントディレクトリを移動

```bash
git clone https://github.com/cyross/PHPStudyRepo.git PHPStudyRepo
cd PHPStudyRepo
```

### Laradockを入れる

```bash
git submodule add https://github.com/Laradock/laradock.git
```

### `.env`ファイルを組み込む

```bash
cp ./env.sample ./laradock/.env
```

※ 当方の環境では既に8080番ポートが使われているため、9090番に変更している

### コンテナ作成

```bash
cd laradock
docker-compose up nginx mysql redis phpmyadmin beanstalkd
```

### ブラウザで表示

```text
http://localhost/index.php # nginx上で動くページ
http://localhost:9090 # phpMyAdmin
```

## 補足

1. `/index.php` は、各phpファイルを実行するランチャとなっております。
1. helper.php は、各phpファイルを実行するための必要な関数群のため、直接実行できないようにしています。
