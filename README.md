# rogainig_manager
rogaining system

ローカル環境の構築

1.Homebrewのインストール
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install.sh)"


2.PHPのインストール
brew install php@7.4


3.Composerのインストール
$ brew install composer

4.Laravelのインストール
$ composer create-project "laravel/laravel=8.*" rogaining


5.サーバ起動
$ php artisan serve

5.ローカル環境で確認
http://localhost:8000/welcome


6.mysqlのインストール
brew install mysql

7.mysqlの起動
mysql.server start --skip-grant-tables

8.rootユーザーでログイン
mysql -uroot


9.DB確認
show databases;

10.DB作る
create database rogaining_system;


11.パスワードの設定
FLUSH PRIVILEGES;
ALTER USER 'root'@'localhost' IDENTIFIED BY 'secret';

12.sqlを抜ける
exit;

13.リスタート
mysql.server restart


14 .envを編集
DB_DATABASE=rogaining_system
DB_USERNAME=root
DB_PASSWORD=secret


15.migrate
$ php artisan config:cache
$ php artisan migrate




laravel　参考サイト
導入手順

https://techacademy.jp/magazine/11521
