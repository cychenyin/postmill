#!/bin/bash

echo "test.statsd.b:1|c" | nc -u -w0 127.0.0.1 8125

#echo "test.carbon.b `ps aux | wc -l` `date +%s`" | nc  localhost 2003


