<style>

.h {
	font:bold;
}
.table5{
	text-align:center; 
	border:1px solid #cccccc; 
	border-radius :3px; 
	background-color:#FFFFFF; 
	width:100%;
} 
.table5 td{border-bottom:1px dashed #cccccc;} 
.table5 .last td{border-bottom:0;} 

td, .d, .first_td {
	text-align:center;
	background-color:white;
	spacing:0px;
	padding:5px;
}

.first_td {
	width:150px;
	overflow:hidden;	
	position:relative;
	text-align:right;
}

.i, .big_i {
	border:0px solid lightgrey;
	width:400px;
	height:250px;
}

.mid_i {
	width:600px;
	height:375px;
}
.big_i {
	width:1000px;
	height:750px;
}
.f_i {
	width:100%;
}

</style>

<div class="container" style="margin-bottom: 10px;">
	<ul class="breadcrumb">
		<li><a href='/index.php?r=metrics/index' xtimer='' xcount='' > Pandora </a></li>
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
				<td class="first_td"></td>
				<td class='h'>计时</td>
				<td class='h'>计数</td>
				<td></td>
			</tr>
		</thead>
		<?php foreach ($list as $item ) { ?>
		<tr >
			<td class='first_td'><?=$item['clz'] ?></td>
			<td class="d">
				<a href='<?="/index.php?r=metrics/more&mod=". $item['mod'] . '&clz=' . $item['clz'] .'&type=2' ?>'>
					<img class='i' src='<?=$item['timer'] ?>' alt='<?=$item['alt'] ?>' />
				</a>
			</td>
			<td class="d">
				<a href='<?="/index.php?r=metrics/more&mod=". $item['mod'] . '&clz=' . $item['clz'] . '&type=1'?>'>
					<img class='i' src='<?=$item['count'] ?>' alt='<?=$item['alt'] ?>' />
				</a>
			</td>
		</tr>
		<?php } // end of foreach ?>
	</table>
</div>
<?php // } // end of if ?>
