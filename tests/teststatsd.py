#!/usr/bin/env python


import statsd
import os
import sys
import time
import math
import random

c=statsd.client.StatsClient(host='metric.server.com',port=8125)
#c=statsd.client.StatsClient(host='192.168.64.5',port=8125)

i = 0
while i < 10:
    # time.sleep(1)
    c.incr("dev.pandora.x1", random.choice(range(100)))
    i=i+1
    print i
	


print "done"
