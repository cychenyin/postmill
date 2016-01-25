#!/bin/env node

var sdc_init = require('statsd-client')  
var sdc = new sdc_init({ host: 'localhost', port:8125 });  

var end = +new Date + 24 * 3600 * 1000; // 1 day 
var i = 0;
while(+new Date < end ) {
	i++;	
	sdc.increment('test.backend.nodejs.x1', (+new Date) % 100 );  
	// sdc.increment('test.backend.nodejs.x1', 5);  
	if( i % 10 == 0) {
        	console.log(i);	
		console.log(+new Date);
	}
	sleep(100);
}
sdc.close(); 

function sleep(sleepTime) {
    for(var start = +new Date; +new Date - start <= sleepTime; ) { } 
}

