<link rel="stylesheet" href="/css/metrics.css" type="text/css">

<div class="container" style="margin-bottom: 10px;">
	<ul class="breadcrumbordinary">
		<li><?=$title?></li>
<?php foreach ($crumbs as $c ) { ?>
		<li><a href='<?=$c['url'] ?>' xtimer='' xcount=''> <?=$c['name'] ?> </a></li> 
<?php } // end of foreach ?>
	</ul>
</div>


<div class="table5 grid-view">
	<table class="table5">
		<?php foreach ($list as $k => $item ) { ?>
		<tr>
			<td class='first_td'><?=$k ?></td>
			<td class="d">
			     <img class='mid_i' src='<?=$item['timer'] ?>' alt='<?=$item['alt'] ?>' />
			</td>
		</tr>
		<?php } // end of foreach ?>
	</table>
</div>
