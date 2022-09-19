#!/bin/bash
EXPECTED_ARGS=3
E_BADARGS=65
MYSQL='which mysql'

Q1="CREATW DATABASE IF NOT EXISTS $1;"
Q2="GRANT USAGE ON *.* TO $2@localhost IDENTIFIED BY '$3';"
Q3="GRANT ALL PRIVILEGES ON $1.* TO $2@localhost;"
Q4="FLUSH PRIVILEGES;"

if [ $# -ne EXPECTED_ARGS ]
then 
	echo "Usage: $0 dbname dbuser dbpassword"
	exit $E_BADARGS
fi

$MYSQL -uroot -p -e "$SQL"

