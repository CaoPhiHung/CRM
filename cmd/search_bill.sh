#!/bin/bash
PWD=`readlink -m $( type -p $0 )`
APP=`dirname $PWD`

LOGF="$APP/../app/logs/cronjob"
LOG="$LOGF/search_bill.log"
CMD="$APP/../app/console crm:searchbill --env=prod"
php $CMD
