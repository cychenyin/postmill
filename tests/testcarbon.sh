#!/bin/bash


PORT=2003
SERVER=metric.server.com
#SERVER=192.168.64.5
i=0
while (( $i < 100 )) 
do
	i=$(($i+1))
	usleep 1000;
	echo "test.mac.sh `ps aux | wc -l` `date +%s`" | nc ${SERVER} ${PORT}
done

