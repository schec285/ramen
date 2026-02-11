#!/bin/sh
set -e

# node_modules が無ければインストール
if [ ! -d node_modules ]; then
    npm install
fi

exec "$@"