#!/usr/bin/env bash
appDir=/data/wwwroot/default/workman/webroot
pidFile=/dev/shm/master.pid

Usage()
{
    echo "eg:   ./service start";
    echo "      start | stop | restart | reload";
}

case "$1" in
     start)
        echo "start server..."
        cd $appDir
        /usr/local/php/bin/php $appDir/main.php socket_http
        ;;
     stop)
        echo "stop server..."
        kill -15 `cat $pidFile`
        ;;
     restart)
        echo "stop server..."
        kill -15 `cat $pidFile`
        echo "wait until the server shutdown..."
        sleep 3
        echo "start server..."
        cd $appDir
        /usr/local/php/bin/php $appDir/main.php socket_http
        ;;
     reload)
        echo "reload server..."
        kill -USR1 `cat $pidFile`
        ;;
esac
