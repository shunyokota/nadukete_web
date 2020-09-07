git pullした後、カレントディレクトリをプロジェクトのルートパスにして、  
1.`docker-compose build`を実行。Dockerイメージが作成される。  
2.`docker-compose up -d`で起動  
3.`docker-compose exec db "mysql -uroot -proot -e'CREATE SCHEMA IF NOT EXISTS nadukete_development DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;'"`でDBスキーマを作成  
4.`docker-compose exec app bash`を実行するとPHP環境にログイン状態になる  
5.`composer install`でPHPライブラリーのインストール  
6.`php artisan migrate:refresh --seed`でテーブル作成  
7.`http://127.0.0.1:8000/`にアクセス。うまくいくとページが開く  



環境構築メモ
sudo yum install epel-release
rpm -ivh http://ftp.riken.jp/Linux/remi/enterprise/remi-release-7.rpm
https://mnivore.com/blogs/archives/44
上記を参考にphp74をインストール
yum -y install --enablerepo=remi,remi-php74 php-fpm
yum -y install --enablerepo=remi,remi-php74 php-mbstring php-xml php-xmlrpc php-gd php-pdo php-pecl-mcrypt php-mysqlnd php-pecl-mysql
curl -sS https://downloads.mariadb.com/MariaDB/mariadb_repo_setup | sudo bash
yum install MariaDB-server MariaDB-client
yum install nginx -y

composer install
