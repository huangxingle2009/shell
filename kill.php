#!/bin/bash

NAME=$1
echo $NAME

# check name
if [ -z "${NAME}" ]; then
    echo 'please input name'
    exit 0
fi

ID=`ps -ef | grep "$NAME" | grep -v "$0" | grep -v "grep" | awk '{print $2}'`
echo $ID
echo "---------------"
for id in $ID
do
    read -p " kill ${id} are you sure? [y/n]: " confirm
    if [ "y" = "${confirm}" ]; then
        # kill -9 $id
        echo "killed $id"
    else
        printf "${color_yellow}cancelled${color_reset}\n"
    fi
done
echo "---------------"
