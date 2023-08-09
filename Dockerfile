#ディストリビューションはdebian系を選択する。
FROM php:8.2.8-bullseye

#シェルをbashにする。
SHELL ["/bin/bash","-c"]

#docker compose file経由で.envファイルの変数を参照する。
ARG GROUP_ID
ARG GROUP_NAME
ARG USER_ID
ARG USER_NAME
#一般ユーザを追加する。
RUN groupadd -g ${GROUP_ID} ${GROUP_NAME} \
 && useradd -m -s /bin/bash -u ${USER_ID} -g ${GROUP_ID} ${USER_NAME}

#必要なツールを追加する。
RUN apt-get update && apt-get upgrade -y \
 && apt-get install -y sqlite3 libsqlite3-dev

#ユーザを切り替える。
USER ${USER_NAME}
#作業ディレクトリをホームに設定する。
WORKDIR ${WORK_DIR}

CMD ["/bin/bash"]