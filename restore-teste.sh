#!/usr/bin/env bash

clear;

if [ -z $MYSQL_PWD  ]; then
  echo " >> Enviroment variable MYSQL_PWD not defined."
  echo " >> To create it: export MYSQL_PWD=mysql_password"
  exit 1
fi

OUTPUT="backup-manual.sql"

#generate dump ignoring audit tables
mysqldump --verbose --host=localhost --user=villabistro --ignore-table=villabistro.audits --ignore-table=villabistro.audit_deltas villabistro > $OUTPUT

#append create table for audit tables
mysqldump --verbose --host=localhost --user=villabistro --no-data villabistro audits audit_deltas >> $OUTPUT

echo "Restoring Data..."

mysql --host=localhost --user=villabistro teste < $OUTPUT

echo "Done!"

echo "Updating Acl Objects..."
/home/gustavocesar147/www/teste/app/Console/cake AclExtras.AclExtras aco_sync
echo "Done!"