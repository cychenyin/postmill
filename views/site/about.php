<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Help';
$this->params ['breadcrumbs'] [] = $this->title;
?>
<style>
.ul {
	margin-left:20px;
}
.ui#li{
	margin-left:20px;
}
</style>
<div class="site-about">
	<!--  <h1><?= Html::encode($this->title) ?></h1> -->
	<div>
    	<b> Job Status：</b>
    	<ul class="ul">
    		<li>0, new, or stopped/deleted</li>
    		<li>1, running normally</li>
    		<li>2, suspend by the system</li>
    	</ul>
    	<b> Job Status Diagram：</b> <br />
        <img src="/images/job_status_diag.jpg" alt='job status diagram' style='margin-left:40px;' />

	</div>
	<div>
    	<b> Job Cron_str：</b>
    	<ul class="ul">
    		<li>* * * * * * *, 7节，扩展支持秒钟</li>
    		<li>* * * * * *, &nbsp; 6节，标准Crontab表达式，带年</li>
    		<li>* * * * *,  &nbsp;&nbsp;&nbsp; 5节，标准Crontab表达式</li>
    	</ul>
	</div>
	<div>
    	<b> Job Cmd：</b><br />
    	&nbsp;&nbsp;&nbsp;&nbsp;Shell命令行.<br />
    	&nbsp;&nbsp;&nbsp;&nbsp;<b>ATTENTION</b>：要求命令所依赖的资源<b>在目标服务器上存在</b>。
<!--     	<pre> -->
<!--     Shell命令行，要求所依赖的资源在目标服务器上存在。 -->
<!--     	</pre> -->
	</div>
<?php if (0) { ?>
<div>
<span class="glyphicon glyphicon-asterisk"></span>
<span class="glyphicon glyphicon-plus"></span>
<span class="glyphicon glyphicon-euro"></span>
<span class="glyphicon glyphicon-eur"></span>
<span class="glyphicon glyphicon-minus"></span>
<span class="glyphicon glyphicon-cloud"></span>
<span class="glyphicon glyphicon-envelope"></span>
<span class="glyphicon glyphicon-pencil"></span>
<span class="glyphicon glyphicon-glass"></span>
<span class="glyphicon glyphicon-music"></span>
<span class="glyphicon glyphicon-search"></span>
<span class="glyphicon glyphicon-heart"></span>
<span class="glyphicon glyphicon-star"></span>
<span class="glyphicon glyphicon-star-empty"></span>
<span class="glyphicon glyphicon-user"></span>
<span class="glyphicon glyphicon-film"></span>
<span class="glyphicon glyphicon-th-large"></span>
<span class="glyphicon glyphicon-th"></span>
<span class="glyphicon glyphicon-th-list"></span>
<span class="glyphicon glyphicon-ok"></span>
<span class="glyphicon glyphicon-remove"></span>
<span class="glyphicon glyphicon-zoom-in"></span>
<span class="glyphicon glyphicon-zoom-out"></span>
<span class="glyphicon glyphicon-off"></span>
<span class="glyphicon glyphicon-signal"></span>
<span class="glyphicon glyphicon-cog"></span>
<span class="glyphicon glyphicon-trash"></span>
<span class="glyphicon glyphicon-home"></span>
<span class="glyphicon glyphicon-file"></span>
<span class="glyphicon glyphicon-time"></span>
<span class="glyphicon glyphicon-road"></span>
<span class="glyphicon glyphicon-download-alt"></span>
<span class="glyphicon glyphicon-download"></span>
<span class="glyphicon glyphicon-upload"></span>
<span class="glyphicon glyphicon-inbox"></span>
<span class="glyphicon glyphicon-play-circle"></span>
<span class="glyphicon glyphicon-repeat"></span>
<span class="glyphicon glyphicon-refresh"></span>
<span class="glyphicon glyphicon-list-alt"></span>
<span class="glyphicon glyphicon-lock"></span>
<span class="glyphicon glyphicon-flag"></span>
<span class="glyphicon glyphicon-headphones"></span>
<span class="glyphicon glyphicon-volume-off"></span>
<span class="glyphicon glyphicon-volume-down"></span>
<span class="glyphicon glyphicon-volume-up"></span>
<span class="glyphicon glyphicon-qrcode"></span>
<span class="glyphicon glyphicon-barcode"></span>
<span class="glyphicon glyphicon-tag"></span>
<span class="glyphicon glyphicon-tags"></span>
<span class="glyphicon glyphicon-book"></span>
<span class="glyphicon glyphicon-bookmark"></span>
<span class="glyphicon glyphicon-print"></span>
<span class="glyphicon glyphicon-camera"></span>
<span class="glyphicon glyphicon-font"></span>
<span class="glyphicon glyphicon-bold"></span>
<span class="glyphicon glyphicon-italic"></span>
<span class="glyphicon glyphicon-text-height"></span>
<span class="glyphicon glyphicon-text-width"></span>
<span class="glyphicon glyphicon-align-left"></span>
<span class="glyphicon glyphicon-align-center"></span>
<span class="glyphicon glyphicon-align-right"></span>
<span class="glyphicon glyphicon-align-justify"></span>
<span class="glyphicon glyphicon-list"></span>
<span class="glyphicon glyphicon-indent-left"></span>
<span class="glyphicon glyphicon-indent-right"></span>
<span class="glyphicon glyphicon-facetime-video"></span>
<span class="glyphicon glyphicon-picture"></span>
<span class="glyphicon glyphicon-map-marker"></span>
<span class="glyphicon glyphicon-adjust"></span>
<span class="glyphicon glyphicon-tint"></span>
<span class="glyphicon glyphicon-edit"></span>
<span class="glyphicon glyphicon-share"></span>
<span class="glyphicon glyphicon-check"></span>
<span class="glyphicon glyphicon-move"></span>
<span class="glyphicon glyphicon-step-backward"></span>
<span class="glyphicon glyphicon-fast-backward"></span>
<span class="glyphicon glyphicon-backward"></span>
<span class="glyphicon glyphicon-play"></span>
<span class="glyphicon glyphicon-pause"></span>
<span class="glyphicon glyphicon-stop"></span>
<span class="glyphicon glyphicon-forward"></span>
<span class="glyphicon glyphicon-fast-forward"></span>
<span class="glyphicon glyphicon-step-forward"></span>
<span class="glyphicon glyphicon-eject"></span>
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="glyphicon glyphicon-plus-sign"></span>
<span class="glyphicon glyphicon-minus-sign"></span>
<span class="glyphicon glyphicon-remove-sign"></span>
<span class="glyphicon glyphicon-ok-sign"></span>
<span class="glyphicon glyphicon-question-sign"></span>
<span class="glyphicon glyphicon-info-sign"></span>
<span class="glyphicon glyphicon-screenshot"></span>
<span class="glyphicon glyphicon-remove-circle"></span>
<span class="glyphicon glyphicon-ok-circle"></span>
<span class="glyphicon glyphicon-ban-circle"></span>
<span class="glyphicon glyphicon-arrow-left"></span>
<span class="glyphicon glyphicon-arrow-right"></span>
<span class="glyphicon glyphicon-arrow-up"></span>
<span class="glyphicon glyphicon-arrow-down"></span>
<span class="glyphicon glyphicon-share-alt"></span>
<span class="glyphicon glyphicon-resize-full"></span>
<span class="glyphicon glyphicon-resize-small"></span>
<span class="glyphicon glyphicon-exclamation-sign"></span>
<span class="glyphicon glyphicon-gift"></span>
<span class="glyphicon glyphicon-leaf"></span>
<span class="glyphicon glyphicon-fire"></span>
<span class="glyphicon glyphicon-eye-open"></span>
<span class="glyphicon glyphicon-eye-close"></span>
<span class="glyphicon glyphicon-warning-sign"></span>
<span class="glyphicon glyphicon-plane"></span>
<span class="glyphicon glyphicon-calendar"></span>
<span class="glyphicon glyphicon-random"></span>
<span class="glyphicon glyphicon-comment"></span>
<span class="glyphicon glyphicon-magnet"></span>
<span class="glyphicon glyphicon-chevron-up"></span>
<span class="glyphicon glyphicon-chevron-down"></span>
<span class="glyphicon glyphicon-retweet"></span>
<span class="glyphicon glyphicon-shopping-cart"></span>
<span class="glyphicon glyphicon-folder-close"></span>
<span class="glyphicon glyphicon-folder-open"></span>
<span class="glyphicon glyphicon-resize-vertical"></span>
<span class="glyphicon glyphicon-resize-horizontal"></span>
<span class="glyphicon glyphicon-hdd"></span>
<span class="glyphicon glyphicon-bullhorn"></span>
<span class="glyphicon glyphicon-bell"></span>
<span class="glyphicon glyphicon-certificate"></span>
<span class="glyphicon glyphicon-thumbs-up"></span>
<span class="glyphicon glyphicon-thumbs-down"></span>
<span class="glyphicon glyphicon-hand-right"></span>
<span class="glyphicon glyphicon-hand-left"></span>
<span class="glyphicon glyphicon-hand-up"></span>
<span class="glyphicon glyphicon-hand-down"></span>
<span class="glyphicon glyphicon-circle-arrow-right"></span>
<span class="glyphicon glyphicon-circle-arrow-left"></span>
<span class="glyphicon glyphicon-circle-arrow-up"></span>
<span class="glyphicon glyphicon-circle-arrow-down"></span>
<span class="glyphicon glyphicon-globe"></span>
<span class="glyphicon glyphicon-wrench"></span>
<span class="glyphicon glyphicon-tasks"></span>
<span class="glyphicon glyphicon-filter"></span>
<span class="glyphicon glyphicon-briefcase"></span>
<span class="glyphicon glyphicon-fullscreen"></span>
<span class="glyphicon glyphicon-dashboard"></span>
<span class="glyphicon glyphicon-paperclip"></span>
<span class="glyphicon glyphicon-heart-empty"></span>
<span class="glyphicon glyphicon-link"></span>
<span class="glyphicon glyphicon-phone"></span>
<span class="glyphicon glyphicon-pushpin"></span>
<span class="glyphicon glyphicon-usd"></span>
<span class="glyphicon glyphicon-gbp"></span>
<span class="glyphicon glyphicon-sort"></span>
<span class="glyphicon glyphicon-sort-by-alphabet"></span>
<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
<span class="glyphicon glyphicon-sort-by-order"></span>
<span class="glyphicon glyphicon-sort-by-order-alt"></span>
<span class="glyphicon glyphicon-sort-by-attributes"></span>
<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
<span class="glyphicon glyphicon-unchecked"></span>
<span class="glyphicon glyphicon-expand"></span>
<span class="glyphicon glyphicon-collapse-down"></span>
<span class="glyphicon glyphicon-collapse-up"></span>
<span class="glyphicon glyphicon-log-in"></span>
<span class="glyphicon glyphicon-flash"></span>
<span class="glyphicon glyphicon-log-out"></span>
<span class="glyphicon glyphicon-new-window"></span>
<span class="glyphicon glyphicon-record"></span>
<span class="glyphicon glyphicon-save"></span>
<span class="glyphicon glyphicon-open"></span>
<span class="glyphicon glyphicon-saved"></span>
<span class="glyphicon glyphicon-import"></span>
<span class="glyphicon glyphicon-export"></span>
<span class="glyphicon glyphicon-send"></span>
<span class="glyphicon glyphicon-floppy-disk"></span>
<span class="glyphicon glyphicon-floppy-saved"></span>
<span class="glyphicon glyphicon-floppy-remove"></span>
<span class="glyphicon glyphicon-floppy-save"></span>
<span class="glyphicon glyphicon-floppy-open"></span>
<span class="glyphicon glyphicon-credit-card"></span>
<span class="glyphicon glyphicon-transfer"></span>
<span class="glyphicon glyphicon-cutlery"></span>
<span class="glyphicon glyphicon-header"></span>
<span class="glyphicon glyphicon-compressed"></span>
<span class="glyphicon glyphicon-earphone"></span>
<span class="glyphicon glyphicon-phone-alt"></span>
<span class="glyphicon glyphicon-tower"></span>
<span class="glyphicon glyphicon-stats"></span>
<span class="glyphicon glyphicon-sd-video"></span>
<span class="glyphicon glyphicon-hd-video"></span>
<span class="glyphicon glyphicon-subtitles"></span>
<span class="glyphicon glyphicon-sound-stereo"></span>
<span class="glyphicon glyphicon-sound-dolby"></span>
<span class="glyphicon glyphicon-sound-5-1"></span>
<span class="glyphicon glyphicon-sound-6-1"></span>
<span class="glyphicon glyphicon-sound-7-1"></span>
<span class="glyphicon glyphicon-copyright-mark"></span>
<span class="glyphicon glyphicon-registration-mark"></span>
<span class="glyphicon glyphicon-cloud-download"></span>
<span class="glyphicon glyphicon-cloud-upload"></span>
<span class="glyphicon glyphicon-tree-conifer"></span>
<span class="glyphicon glyphicon-tree-deciduous"></span>
<span class="glyphicon glyphicon-cd"></span>
<span class="glyphicon glyphicon-save-file"></span>
<span class="glyphicon glyphicon-open-file"></span>
<span class="glyphicon glyphicon-level-up"></span>
<span class="glyphicon glyphicon-copy"></span>
<span class="glyphicon glyphicon-paste"></span>
<span class="glyphicon glyphicon-alert"></span>
<span class="glyphicon glyphicon-equalizer"></span>
<span class="glyphicon glyphicon-king"></span>
<span class="glyphicon glyphicon-queen"></span>
<span class="glyphicon glyphicon-pawn"></span>
<span class="glyphicon glyphicon-bishop"></span>
<span class="glyphicon glyphicon-knight"></span>
<span class="glyphicon glyphicon-baby-formula"></span>
<span class="glyphicon glyphicon-tent"></span>
<span class="glyphicon glyphicon-blackboard"></span>
<span class="glyphicon glyphicon-bed"></span>
<span class="glyphicon glyphicon-apple"></span>
<span class="glyphicon glyphicon-erase"></span>
<span class="glyphicon glyphicon-hourglass"></span>
<span class="glyphicon glyphicon-lamp"></span>
<span class="glyphicon glyphicon-duplicate"></span>
<span class="glyphicon glyphicon-piggy-bank"></span>
<span class="glyphicon glyphicon-scissors"></span>
<span class="glyphicon glyphicon-bitcoin"></span>
<span class="glyphicon glyphicon-btc"></span>
<span class="glyphicon glyphicon-xbt"></span>
<span class="glyphicon glyphicon-yen"></span>
<span class="glyphicon glyphicon-jpy"></span>
<span class="glyphicon glyphicon-ruble"></span>
<span class="glyphicon glyphicon-rub"></span>
<span class="glyphicon glyphicon-scale"></span>
<span class="glyphicon glyphicon-ice-lolly"></span>
<span class="glyphicon glyphicon-ice-lolly-tasted"></span>
<span class="glyphicon glyphicon-education"></span>
<span class="glyphicon glyphicon-option-horizontal"></span>
<span class="glyphicon glyphicon-option-vertical"></span>
<span class="glyphicon glyphicon-menu-hamburger"></span>
<span class="glyphicon glyphicon-modal-window"></span>
<span class="glyphicon glyphicon-oil"></span>
<span class="glyphicon glyphicon-grain"></span>
<span class="glyphicon glyphicon-sunglasses"></span>
<span class="glyphicon glyphicon-text-size"></span>
<span class="glyphicon glyphicon-text-color"></span>
<span class="glyphicon glyphicon-text-background"></span>
<span class="glyphicon glyphicon-object-align-top"></span>
<span class="glyphicon glyphicon-object-align-bottom"></span>
<span class="glyphicon glyphicon-object-align-horizontal"></span>
<span class="glyphicon glyphicon-object-align-left"></span>
<span class="glyphicon glyphicon-object-align-vertical"></span>
<span class="glyphicon glyphicon-object-align-right"></span>
<span class="glyphicon glyphicon-triangle-right"></span>
<span class="glyphicon glyphicon-triangle-left"></span>
<span class="glyphicon glyphicon-triangle-bottom"></span>
<span class="glyphicon glyphicon-triangle-top"></span>
<span class="glyphicon glyphicon-console"></span>
<span class="glyphicon glyphicon-superscript"></span>
<span class="glyphicon glyphicon-subscript"></span>
<span class="glyphicon glyphicon-menu-left"></span>
<span class="glyphicon glyphicon-menu-right"></span>
<span class="glyphicon glyphicon-menu-down"></span>
<span class="glyphicon glyphicon-menu-up"></span>
</div>
<?php } ?>
	<div style="margin: 20px 00px; font: 20px solid; posotion:relative; align:bottom;">
		联系人： <a href="<?=Yii::$app->params["adminEmail"] ?>"><?=Yii::$app->params["adminEmail"] ?></a>
	</div>

</div>
