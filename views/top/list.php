
<link rel="stylesheet" href="/css/metrics.css" type="text/css">
<div class="container" style="margin-bottom: 10px;">
	<ul class="breadcrumbordinary">
	   <li><?=$title?></li>
<?php foreach ($crumbs as $c ) { ?>
		<li><a href='<?=$c['url'] ?>' xtimer='' xcount='' > <?=$c['name'] ?> </a></li> 
<?php } // end of foreach ?>
	</ul>
</div>

<?php // if(is_array($list)){ ?>
<div id="category-grid" class="grid-view">
	<table class="table5" >
		<thead class="h">
			<tr>
				<td class="h first_td_50">Top</td>
				<td class='h d'>metric</td>
				<td class='h first_td_100'>
<?php
    if(is_array($list) && count($list) > 0) {
        $type = $list[0]['type'];
        switch ($type) {
            case 'count':
                echo 'mean_10 qps';
                break;
            case 'timer':
                echo 'mean_10 ms';
                break;
            case 'error':
                echo 'mean_10 qps';
                break;
            default:
                break;
        }
    }
?>
				</td>
				<td class='h'>计时</td>
				<td class='h'>计数</td>
			</tr>
		</thead>
		<?php $i=0; foreach ($list as $item ) { $i++; ?>
		<tr >
			<td class='first_td_50'><?=$i ?></td>
			<td class='d'><?=$item['mod'] . '.' . $item['serial'] ?></td>
			<td class='first_td_100'><?=$item['mean'] ?></td>
			<td class="d">
				<a href='<?="/index.php?r=metrics/more&mod=". $item['mod'] . '&clz=' . $item['serial'] .'&type=2' ?>'>
					<img class='small_i' src='<?=$item['timer'] ?>' alt='<?=$item['alt'] ?>' />
				</a>
			</td>
			<td class="d">
				<a href='<?="/index.php?r=metrics/more&mod=". $item['mod'] . '&clz=' . $item['serial'] . '&type=1'?>'>
					<img class='small_i' src='<?=$item['count'] ?>' alt='<?=$item['alt'] ?>' />
				</a>
			</td>
		</tr>
		<?php } // end of foreach ?>
	</table>
</div>
<?php // } // end of if ?>