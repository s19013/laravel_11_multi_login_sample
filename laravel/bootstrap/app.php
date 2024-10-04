<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SessionCookieSwitcher;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // ここに各時点でデフォルトミドルウェアグループを適応させるのを忘れないように
            Route::middleware('web')
                ->prefix('warehouse')
                ->name('warehouse.')
                ->group(base_path('routes/warehouse/web.php'));

            Route::middleware('web')
                ->prefix('agency')
                ->name('agency.')
                ->group(base_path('routes/agency/web.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // セッション切り替えを有効化
        $middleware->append(SessionCookieSwitcher::class);

        $middleware->redirectUsersTo(function ($request) {
            // 倉庫系のurlでログイン済みの場合、未ログインユーザーのみアクセスできるページにアクセスしようとすると弾く
            if ($request->is('warehouse*')) {
                return route('warehouse.dashboard');
            }

            if ($request->is('agency*')) {
                return route('agency.dashboard');
            }

            // それ以外のページは取り出すルートへ
            return redirect('/');
        });
        $middleware->redirectGuestsTo(function ($request) {
            // 倉庫系のurlで認証が必要な場合,倉庫ユーザーログイン画面へ飛ばす
            if ($request->is('warehouse*')) {
                return route('warehouse.login');
            }

            if ($request->is('agency*')) {
                return route('agency.login');
            }

            // それ以外のページは取り出すルートへ
            return redirect('/');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
