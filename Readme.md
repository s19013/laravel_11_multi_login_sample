# マルチログインのサンプル
倉庫ユーザー用のサイト、代理店ユーザー用のサイトを一つにまとめる必要があったので

# dockerを起動する前に
./infra/mysqlの `.env.example`を `.env`としてコピー  
./infra/phpmyadminの  `.env.example`を`.env`としてコピー  

# dockerを起動したら
その前に裏でnpm installなどが動いているはずなので、3分ほど待つ  
appコンテナ内で,`npm run dev &`,`bash serve.sh`を実行  


# 雑な手順
1. 各ユーザー用のテーブルとモデルを用意
1. config/auth.phpの設定
	* guard
	* providers
	* password
1. app.phpにカスタムルーティングを設定しよう
1. app.phpに非ログインユーザー、ログインユーザーのアクセス制限を設定しよう
1. カスタムルーティングの認証系のルートにガードをつけよう
1. ログインリクエストフォームを用意しよう
1. ログイン、新規登録コントローラーを編集しようう
1. bladeを用意しよう
1. 倉庫ユーザー用、代理店ユーザー用のセッションを切り替えるミドルウェアを作ろう
1. パスワードリセットの準備をしよう
	* 'Illuminate\Auth\Notifications\ResetPassword' を継承したクラスを作ろう
	* resetUrl()をオーバーライドしてrouteを変更しよう
	* モデルの'sendPasswordResetNotification'をオーバーライドしよう
	* Password::sendResetLink, Password::resetにbrokerを追加しよう

# 仕様
倉庫ユーザー、代理店ユーザーそれぞれテーブルを作っている  

## アクセス制限
倉庫ページにアクセスするときは、倉庫ユーザーテーブルにデータがあるかを確認、なければ弾く  
代理店ページにアクセスするときはは代理店ページテーブルにデータがあるかを確認、なければ弾く    

## セッション
倉庫ページにアクセスするときは倉庫セッション  
代理店ページにアクセスするときは代理店セッションを使う

多分分けなくても問題ないかもだけど、倉庫、代理店両方アクセスできるユーザーが片方ログアウトすると両方ログアウトされてしまう。

# 参考サイト
* https://readouble.com/laravel/11.x/ja/passwords.html
* https://implist.dev/entries/laravel-multiple-login
* https://engineer-daily.com/laravel11-breeze-redirect-to/
* https://reffect.co.jp/laravel/breeze_multi_auth	
* https://zenn.dev/369code/articles/9b47ef21917c3a
