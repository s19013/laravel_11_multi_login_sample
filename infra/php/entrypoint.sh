#!/bin/bash

# 初回実行フラグファイルのパス
INIT_FLAG="/laravel/.init_done"

# フラグファイルが存在しない場合にのみ初期化処理を実行
if [ ! -f "$INIT_FLAG" ];then
    echo "Running initial setup..."
    bash /laravel/init.sh
    # 初回実行後にフラグファイルを作成
    touch "$INIT_FLAG"
else
    echo "Initial setup already completed."
fi

# npm run dev をバックグラウンドで実行
npm run dev &

# serve.sh を実行
bash /laravel/serve.sh
