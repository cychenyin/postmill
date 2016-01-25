<link rel="stylesheet" href="/css/metrics.css" type="text/css">

<div class="container" style="margin-bottom: 10px;">
	<ul class="breadcrumbordinary">
	   <li><?=$title?></li>
<?php foreach ($crumbs as $c ) { ?>
		<li><a href='<?=$c['url'] ?>' > <?=$c['name'] ?> </a></li> 
<?php } // end of foreach ?>
	</ul>
</div>

<div class="table5 grid-view">
<table class="table5"><tr><td>
<?php foreach ($list as $item ) { ?>
    <span  class='m' >
        <div class='m_title'><?=$item[1] ?></div>
        <div class='m_content'>
    		<a href='/index.php?r=failure/more&type=<?=$item[2] ?>' >
    			<img class='s_i' src='<?=$item[0] ?>' alt='<?=$item[1] ?>' />	
    		</a>
    	</div>
	</span>
<?php } // end of foreach ?>
</td></tr></table>
</div>
