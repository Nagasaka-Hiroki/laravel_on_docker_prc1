#!/bin/bash
#最終目標は.env
filename=$(dirname $(readlink -f $0))"/.env"

#すでに存在する場合は終了する。
if [ -e "$filename" ] && [ ! -d "$filename" ]; then
    echo ".env file already exsists!"
    exit 0
fi

#ファイルの内容を記述する。
env_vals=\
$(cat << EOL
#グループ名を定義する。
GROUP_NAME=general_user
#ユーザー名を定義する。
USER_NAME=user01
#ユーザーIDとグループIDをホストOSのIDと同じにする。
USER_ID=$(id -u)
GROUP_ID=$(id -g)
#作業ディレクトリを設定する。
WORK_DIR=/home/user01/prj
#プロジェクトのディレクトリパス
PRJ_PATH=./prj
EOL
)

#.envファイルを生成する。
echo "$env_vals" > $filename