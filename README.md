# 簡易SFA（PHP + MySQL + Docker）

このリポジトリは、Docker 上で動作する簡易 SFA 環境です。  
顧客の一覧表示、追加、編集、削除（CRUD）が可能です。

## 構成

- PHP 8.2 + Apache
- MySQL 8.0  
- Docker Compose で一括起動可能

## 起動手順

1. プロジェクトディレクトリに移動

cd simple-sfa-php


2. Docker イメージをビルド＆コンテナ起動

docker-compose up -d --build


3. コンテナの状態確認

docker ps


php-app と mysql-db が Up になっていれば OK

ブラウザでの操作

以下の URL にアクセス

http://localhost:8080/


顧客一覧ページが表示されます

「新規顧客追加」で顧客を追加

「編集」「削除」で既存顧客を管理可能

顧客一覧ページが表示されます

「新規顧客追加」で顧客を追加

「編集」「削除」で既存顧客を管理可能

MySQL 接続情報

ホスト: db

データベース: sfa

ユーザー: user

パスワード: pass

MySQL に入る方法
docker exec -it simple-sfa-php-db-1 bash
mysql -u user -p sfa

初期データ

ID:1	名前:山田太郎	メールアドレス:taro@example.com

ID:2	名前:鈴木花子	メールアドレス:hanako@example.com

## 注意事項

Docker がインストール済みであること

WSL 2 が有効になっていること（Windows 利用時）

8080 ポートが既に使われていないこと

MySQL 初期パスワードは pass です

開発・改修方法

app/ フォルダ内に PHP ファイルを配置

db/init.sql にテーブル定義や初期データを追加可能

コンテナを再ビルドして反映

docker-compose down
docker-compose up -d --build


新しい PHP 拡張が必要な場合は Dockerfile を編集して追記し、再ビルドしてください。
