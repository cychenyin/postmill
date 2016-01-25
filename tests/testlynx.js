#!/bin/env node


var lynx = require('lynx');
var opt = {}; // opt.prefix = 'myPrefix';
var metrics = new lynx('localhost', 8125, opt); // StatsD IP & Port

metrics.gauge('test.backend.lynx.gauge', 300); // Send our first metric

metrics.increment('test.backend.lynx.inc', 1, 0.1);
      metrics.increment('test.backend.lynx.inc', 1, 0.1);
      metrics.decrement('test.backend.lynx.inc',1, 0.1);
//       metrics.count('test.backend.lynx.inc', 10, 0.1);
//      metrics.timing('test.backend.lynx.time', 500, 0.1);
//      metrics.gauge('test.backend.lynx.gauge.one', 100, 0.1);
//      metrics.set('test.back.lynx.set.one', 10, 0.1);

 // return;
var end = +new Date + 24 * 3600 * 1000; // 1 day 
var i = 0;
while(+new Date < end ) {
      i++;    
      //sdc.increment('test.backend.nodejs.x1', (+new Date) % 100 );  
      metrics.increment('test.backend.lynx.inc', 10, 0.1);
      //metrics.decrement('test.backend.lynx.inc',1, 0.1);
      //metrics.count('test.backend.lynx.inc', 10, 0.1);
      //metrics.timing('test.backend.lynx.time', 500, 0.1);
      //metrics.gauge('test.backend.lynx.gauge.one', 100, 0.1);
      //metrics.set('test.back.lynx.set.one', 10, 0.1);
      if( i % 10 == 0) {
              console.log(i); 
              console.log(+new Date);
      }
      sleep(100);
}

metrics.close();

function sleep(sleepTime) {
    for(var start = +new Date; +new Date - start <= sleepTime; ) { } 
}
