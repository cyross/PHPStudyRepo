# LaradockでPHPを勉強しよう！　なプロジェクト

## 動かし方

1. リポジトリをクローンしてカレントディレクトリを移動

```bash
git clone https://github.com/cyross/PHPStudyRepo.git PHPStudyRepo
cd PHPStudyRepo
```

1. Laradockを入れる

```bash
git submodule add https://github.com/Laradock/laradock.git
```

1. `.env`ファイルを組み込む

```bash
cp ./env.sample ./laradock/.env
```

※ 当方の環境では既に8080番ポートが使われているため、9090番に変更している

1. コンテナ作成

```bash
cd laradock
docker-compose up nginx mysql redis phpmyadmin beanstalkd
```

1. ブラウザで表示

```text
http://localhost/index.php # nginx上で動くページ
http://localhost:9090 # phpMyAdmin
```
