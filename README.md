# LaradockでPHPを勉強しよう！　なプロジェクト

## 動かし方

0. リポジトリをクローンしてカレントディレクトリを移動

```
git clone https://github.com/cyross/PHPStudyRepo.git PHPStudyRepo
cd PHPStudyRepo
```

1. Laradockを入れる

```
git submodule add https://github.com/Laradock/laradock.git
```

2. `.env`ファイルを組み込む

```
cp ./env.sample ./laradock/.env
```

※ 当方の環境では既に8080番ポートが使われているため、9090番に変更している

3. コンテナ作成

```
cd laradock
docker-compose up nginx mysql redis phpmyadmin beanstalkd
```

4. ブラウザで表示

```
http://localhost/index.php # nginx上で動くページ
http://localhost:9090 # phpMyAdmin
```