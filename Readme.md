# マルチログインのサンプル
倉庫ユーザー用のサイト、代理店ユーザー用のサイトを一つにまとめる必要があったので

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

# 参考サイト
https://readouble.com/laravel/11.x/ja/passwords.html
https://implist.dev/entries/laravel-multiple-login
https://engineer-daily.com/laravel11-breeze-redirect-to/
https://reffect.co.jp/laravel/breeze_multi_auth	
https://zenn.dev/369code/articles/9b47ef21917c3a