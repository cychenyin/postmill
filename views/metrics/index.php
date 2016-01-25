<style>
.m {
	text-align:center;
	margin-bottom: 10px;
}
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

.first_div {
	margin-left:20px;
}

.s {
	background : #00FF00
	width:100px;
}
.l {

}
.button {
    display: inline-block;
    position: relative;
    margin: 10px;
    padding: 0 20px;
    text-align: center;
    text-decoration: none;
    font: bold 12px/25px Arial, sans-serif;

    text-shadow: 1px 1px 1px rgba(255,255,255, .22);

    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;

    -webkit-box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    -moz-box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);
    box-shadow: 1px 1px 1px rgba(0,0,0, .29), inset 1px 1px 1px rgba(255,255,255, .44);

    -webkit-transition: all 0.15s ease;
    -moz-transition: all 0.15s ease;
    -o-transition: all 0.15s ease;
    -ms-transition: all 0.15s ease;
    transition: all 0.15s ease;
}
/* Green Color */

.green {
    color: #3e5706;

    background: #a5cd4e; /* Old browsers */
    background: -moz-linear-gradient(top,  #a5cd4e 0%, #6b8f1a 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a5cd4e), color-stop(100%,#6b8f1a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* IE10+ */
    background: linear-gradient(top,  #a5cd4e 0%,#6b8f1a 100%); /* W3C */
}

/* Blue Color */

.blue {
    color: #19667d;

    background: #70c9e3; /* Old browsers */
    background: -moz-linear-gradient(top,  #70c9e3 0%, #39a0be 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#70c9e3), color-stop(100%,#39a0be)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #70c9e3 0%,#39a0be 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #70c9e3 0%,#39a0be 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #70c9e3 0%,#39a0be 100%); /* IE10+ */
    background: linear-gradient(top,  #70c9e3 0%,#39a0be 100%); /* W3C */
}

/* Gray Color */

.grey {
    color: #515151;

    background: #d3d3d3; /* Old browsers */
    background: -moz-linear-gradient(top,  #d3d3d3 0%, #8a8a8a 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d3d3d3), color-stop(100%,#8a8a8a)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* IE10+ */
    background: linear-gradient(top,  #d3d3d3 0%,#8a8a8a 100%); /* W3C */
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

<div id="mod-grid" class="grid-view first_div">
<?php foreach ($mods as $m => $n ) { ?>
	<span class="s"><a class='button grey' href='/index.php?r=metrics/index&mod=<?=$m ?>' xtimer='' xcount='' ><?=$m ?></a>
		<a href='/index.php?r=metrics/mod&mod=<?=$m ?>' alt='点击进入具体接口'>(<?=$n ?>)</a>&nbsp;&nbsp;
	</span>
<?php } // end of foreach ?>
</div>
<div style="height:30px;">
</div>
<div id="mod-fusion" class="grid-view table5">
	<div class='m'><?=$mod ?>相关接口的<b>计时</b>趋势
		<a href='/index.php?r=metrics/mod&mod=<?=$mod ?>' >
			<img class='f_i' src='<?=$data['timer'] ?>' alt='计时' />
		</a>
	</div>

	<div class='m'><?=$mod ?>相关接口的<b>计数</b>趋势
		<a href='/index.php?r=metrics/mod&mod=<?=$mod ?>' >
			<img class='f_i' src='<?=$data['count'] ?>' alt='计数' />
		</a>
	</div>
</div>
