#!/bin/bash
PWD=`readlink -m $( type -p $0 )`
APP=`dirname $PWD`

LOGF="$APP/../app/logs/cronjob"
LOG="$LOGF/process_bill.log"
CMD="$APP/../app/console crm:loadbill --path=$APP/../ --env=prod"
php $CMD
