#!/bin/bash
PWD=`readlink -m $( type -p $0 )`
APP=`dirname $PWD`

SEARCH_BILL=search_bill
PROCESS_BILL=process_bill
PROCESS_MAIL=process_email

# Allow run as root in daemon
sudo chmod +x $APP/$SEARCH_BILL.sh
sudo chmod +x $APP/$PROCESS_BILL.sh
sudo chmod +x $APP/$PROCESS_MAIL.sh

LOGF="$APP/../app/logs/cronjob"
SERVICE="$APP/../app/logs/service"

# RESET LOGGER
sudo mkdir -p $LOGF
sudo rm -rf $LOGF/*
sudo rm -rf $SERVICE/*

pkill node
node $APP/service/app.js
