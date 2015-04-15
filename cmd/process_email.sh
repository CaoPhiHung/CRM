#!/bin/bash
PWD=`readlink -m $( type -p $0 )`
APP=`dirname $PWD`

LOGF="$APP/../app/logs/cronjob"
LOG="$LOGF/email_sms.log"
CMD="$APP/../app/console channel:cron --path=$APP/../ --env=prod"
php $CMD