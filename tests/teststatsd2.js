#!/bin/env node

var StatsD = require('node-statsd');
var client = new StatsD('127.0.0.1', 8125);
// var client = new StatsD();

client.increment('test.backend.js.b', 1, 0.25);
client.increment('test.backend.js.b', 1, 0.25);


client.socket.on('error', function(error) {
  return console.error("Error in socket: ", error);
});


//var end = +new Date + 24 * 3600 * 1000; // 1 day 
//var i = 0;
//while(+new Date < end ) {
//	i++;	
//	sdc.increment('test.backend.nodejs.x1', (+new Date) % 100 );  
//	// sdc.increment('test.backend.nodejs.x1', 5);  
//	if( i % 10 == 0) {
//        	console.log(i);	
//		console.log(+new Date);
//	}
//	sleep(100);
//}
//sdc.close(); 
//
//function sleep(sleepTime) {
//    for(var start = +new Date; +new Date - start <= sleepTime; ) { } 
//}
//
