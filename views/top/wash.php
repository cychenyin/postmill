
<link rel="stylesheet" href="/css/metrics.css" type="text/css">

<div class="container" style="margin-bottom: 10px;">
	<ul class="breadcrumbordinary">
		<li><?=$title?></li>
    </ul>
</div>

<?php // if(is_array($list)){ ?>
<div id="category-grid" class="grid-view">
	<table class="table5">
		<thead class="h">
			<tr>
				<td class="first_td"></td>
				<td class='h'>module</td>
				<td class='h'>entry</td>
				<td></td>
			</tr>
		</thead>
		<?php $i=0; foreach ($list as $item ) { $i++; ?>
		<tr>
			<td class='first_td'><?=$i ?></td>
			<td class='d'><?=$item[0] ?></td>
			<td class='d'><a
				href='<?="/index.php?r=metrics/more&mod=". $item['mod'] . '&clz=' . $item['clz'] .'&type=2' ?>'>
					<?=$item[1]?>
				</a></td>
		</tr>
		<?php } // end of foreach ?>
	</table>
</div>
<?php // } // end of if ?>