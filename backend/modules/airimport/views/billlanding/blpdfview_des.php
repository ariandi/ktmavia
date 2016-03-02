<?php

use yii\helpers\Html;
use yii\db\Query;

?>
<style type="text/css">
	body{margin: 0px;padding: 0px;}
	.wrapperpdf{font-size: 10px;width: 100%;}
	
	.border-top{border-top: 1px solid;}
	.no-padding-margin{padding: 0px;margin: 0px;}
	.head1{height: 73px;}
	.head1 .img{width: 100px; height: 60px;}
	.head1 .d-img{width: 150px; float: left;}
	.head1 .htext1{font-size: 20px;font-weight: bold;float: left; width: 300px;margin-left: 20px;margin-top: 10px;}
	.head1 .htext2{font-size: 16px;font-weight: bold;float: left; width: 200px;margin-left: 10px;margin-top: 3px;}

	.head2{width:100%;height: 285px;border: 1px solid;border-left: none;border-right: none;}
	
	.head2-1{width: 49%;float: left;}
	.head2-1-l{height: 94.5px;float:left;border-right: 1px solid;padding: 0px 20px;width: 100%;}
	.head2-1-r{width:49%;float:left;border-bottom: 0px solid;}
	.head2-1-r-1{height: 37.8px;}
	.head2-1-r-1-l{width: 200px;float: left;border-right: 1px solid;height: 37.8px;border-bottom: 1px solid;}
	.head2-1-r-1-r{width: 168px;float: left;height: 37.8px;padding: 0px 5px;border-bottom: 1px solid;}
	.head2-1-r-2{width: 368px;float: left;height: 37.8px;padding: 0px 5px;border-bottom: 1px solid;}
	.head2-1-r-3{width: 368px;float: left;height: 114.5px;padding: 0px 5px;border-bottom: 1px solid;}
	.head2-1-r-4{width: 368px;float: left;height: 94.5px;padding: 0px 5px;margin-left: 20px;}

	.head3{width:100%;height:37.8px;border-bottom: 1px solid;border-top: 1px solid;}

	.head3-1{width: 500px;float:left;}
	.head3-1-l1{height: 37.8px;float:left;width: 250px;font-size: 8px;}
	.head3-1-l2{height: 37.8px;float:left;width: 250px;font-size: 8px;}

	.head3-2{width: 220px;float:left;}
	.head3-2-l{width: 50%;float:left;height:37.8px;}
	.head3-3-l{width: 50%;float:left;height:37.8px;border-bottom: 1px solid;border-right: 1px solid;}
	.head3-3-r{width: 49%;float:left;height:37.8px;border-bottom: 1px solid;}

	.head4{width:100%;height:361px;}

	.head4-1{width:19%;float: left;height:361px;padding-left: 20px;}
	.head4-1-2{width:5%;float: left;height:361px;padding-left: 10px;}
	.head4-2{width:50%;float: left;height:361px;margin-left: 35px;}
	.head4-3{width:2%;float: left;height:361px;}
	.head4-4{width:2%;float: left;height:361px;}

	.head5{width:100%;height:164px;border-bottom: 1px solid;}

	.head5-1{width:18%;border-right: 1px solid;float: left;height:164px;}
	.head5-2{width:15%;border-right: 1px solid;float: left;height:164px;}
	.head5-3{width:15%;border-right: 1px solid;float: left;height:164px;}
	.head5-4{width:9%;float: left;height:164px;}

	.head6{width:100%;height:80px;}
	.head6 .head6-sub{width:408px;float: left;height:160px;}

	.head6 .ttc{width:80px;border-right: 1px solid;float: left;height:80px;border-bottom: 1px solid;}
	.head6 .exrate{width:110px;border-right: 1px solid;float: left;height:80px;border-bottom: 1px solid;}
	.head6 .prepaid-at{width:215px;border-right: 1px solid;float: left;height:80px;}
	.head6 .prepaid-at-atas{width:215px;height:40px;border-bottom: 1px solid;}
	.head6 .prepaid-at-bawah{width:215px;height:39px;border-bottom: 1px solid;}
	.head6 .bacaan{border-right: 1px solid;float: left;height:80px;}
	.head6 .payable-at{width:180px;border-right: 1px solid;float: left;height:80px;}
	.head6 .payable-at-atas{width:180px;height:40px;border-bottom: 1px solid;}
	.head6 .payable-at-bawah{width:180px;height:39px;border-bottom: 1px solid;}
	.head6 .shippedondate{border-right: 0px solid;float: left;height:80px;}
	.head6 .place_date{float: left;height:180px;}
	.head6 .place_date-atas{height:40px;border-bottom: 1px solid;}
	.head6 .place_date-bawah{height:120px;border-bottom: 1px solid;}

	.footer{width:100%;height:180px;}

	.footer .bacaan{width:220px;border-right: 1px solid;float: left;height:80px;border-bottom: 1px solid;}
	@page{
		margin:0px;
		margin-left:20px;
		padding:0px;
	}

</style>
<?php //print_r($model->topic['id']);?>
<div class="wrapperpdf">
	<!-- Buat Paling atas-->
	<div class="head1">
		&nbsp;
		<div class="d-img">
			<?= Html::img('dist/img/logo.png', ['alt'=>'some', 'class'=>'img']);?>
		</div>
		<div class="htext1">
			Kuantum Avia Transindo<br />
			<div style="font-size:11px;font-weight:normal;">A join Service Agreement</div>
		</div>
		<div class="htext2">Attachment</div>
	</div>

	<div class="head3">
		<div class="head3-1">
			<div class="head3-1-l1">
				&nbsp;&nbsp;&nbsp;&nbsp;M.V. <?=$model->ocean_vessel?>
				<br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;container and seal number
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				quantity
			</div>
			<div class="head3-1-l2">
				&nbsp;&nbsp;&nbsp;&nbsp;B/L NO. <?=$model->bl_number?>
				<br /><br />
				Description of Goods				
			</div>
		</div>

		<div class="head3-2">
			<div class="head3-2-l">
				&nbsp;&nbsp;&nbsp;&nbsp;Attach List Page : 1/1
			</div>
		</div>
	</div>

	<div class="head4">
		<div class="head4-1">
			<br />
			<br />
			<br />
			<?php 
			$i = 1;
			foreach ($modeldet as $modeldet) {
				if($i !== 1){
					echo $modeldet->container_seal_no.'<br />';
				}

				$i = $i+1;
				$desc_goods[] = $modeldet;
			}?>
		</div>

		<div class="head4-1-2">
			<br />
			<br />
			<br />
			<?php 
				if(isset($model->shipping)){
						$model->shipping->quantity;
			}
			?>
		</div>

		<div class="head4-2">
			<br />
			<br />
			<br />
			<?php 
				$i = 1;
				foreach ($desc_goods as $desc_goods) {
				if($i !== 1){
					echo $desc_goods->kind_of_package_desc_goods.'<br /><br />';
				}
				$i = $i+1;
			}?>
		</div>

		<div class="head4-3">
			&nbsp;
		</div>

		<div class="head4-4">
			&nbsp;
		</div>
	</div>

</div>