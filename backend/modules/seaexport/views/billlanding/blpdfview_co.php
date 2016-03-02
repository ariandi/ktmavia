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

	.head3{width:100%;height:76.6px;border-bottom: 0px solid;}

	.head3-1{width: 380px;float:left;}
	.head3-1-l1{height: 37.8px;float:left;border-right: 1px solid;width: 188px;font-size: 8px;border-bottom:1px solid;}
	.head3-1-l2{height: 37.8px;float:left;border-right: 1px solid;width: 189px;font-size: 8px;border-bottom:1px solid;}

	.head3-2{width: 378px;float:left;}
	.head3-2-l{width: 100%;float:left;height:37.8px;border-bottom: 1px solid;}
	.head3-3-l{width: 50%;float:left;height:37.8px;border-bottom: 1px solid;border-right: 1px solid;}
	.head3-3-r{width: 49%;float:left;height:37.8px;border-bottom: 1px solid;}

	.head4{width:100%;height:361px;border-bottom: 1px solid;}

	.head4-1{width:19%;border-right: 1px solid;float: left;height:361px;padding-left: 20px;}
	.head4-1-2{width:5%;border-right: 1px solid;float: left;height:361px;padding-left: 10px;}
	.head4-2{width:38%;border-right: 1px solid;float: left;height:361px;}
	.head4-3{width:19%;border-right: 1px solid;float: left;height:361px;}
	.head4-4{width:9%;float: left;height:361px;}

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
	</div>

	<div class="head2">
		<div class="head2-1">
			<div class="head2-1-l">
				<br /><br />
				<?=$model->shippercompany->companyname;?><br />
				<?=$model->shippercompany->deliveryaddress;?><br />
				<?='Telp '.$model->shippercompany->phone;?>, <?='Fax '.$model->shippercompany->fax;?>
			</div>

			<div class="head2-1-l border-top">
				<br /><br />
				<?=$model->consigneecompany->companyname;?><br />
				<?=$model->consigneecompany->deliveryaddress;?><br />
				<?='Telp '.$model->consigneecompany->phone;?>, <?='Fax '.$model->consigneecompany->fax;?>
			</div>

			<div class="head2-1-l border-top">
				<br /><br />
				<?php if($model->notifypartycompany->companyid === $model->consigneecompany->companyid ){
				echo "Same As Consignee";
				}
				else{
					echo $model->notifypartycompany->companyname."<br />";
					echo $model->notifypartycompany->deliveryaddress."<br />";
					echo 'Telp '.$model->notifypartycompany->phone.' , Fax '.$model->notifypartycompany->fax;
				}?>
			</div>
		</div>

		<div class="head2-1-r">
			<div class="head2-1-r-1-l">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->bl_number?>
			</div>
			<div class="head2-1-r-1-r">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->number_of_original;?>
			</div>
			<div class="head2-1-r-2">
				<br />
				&nbsp;
			</div>
			<div class="head2-1-r-3">
				<br />
				&nbsp;
			</div>
			<div class="head2-1-r-4">
				<br />
				<?=$model->deliveryagentcompany->companyname?><br />
				<?=$model->deliveryagentcompany->deliveryaddress?><br />
				<?='Telp '.$model->deliveryagentcompany->phone;?>, <?='Fax '.$model->deliveryagentcompany->fax;?>
			</div>
		</div>
	</div>

	<div class="head3">
		<div class="head3-1">
			<div class="head3-1-l1">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->place_of_receipt?>
			</div>
			<div class="head3-1-l2">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->port_of_loading?>				
			</div>

			<div class="head3-1-l1">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->ocean_vessel?>
			</div>
			<div class="head3-1-l2">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->port_of_discharge?>
			</div>
		</div>

		<div class="head3-2">
			<div class="head3-2-l">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->initial_carriage?>
			</div>
			<div class="head3-3-l">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->place_of_delivery?>
			</div>
			<div class="head3-3-r">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->payable_at?>
			</div>
		</div>
	</div>

	<div class="head4">
		<div class="head4-1">
			<br />
			<br />
			<br />
			<?php foreach ($modeldet as $modeldet) {
				echo $modeldet->container_seal_no.'<br />';
				$desc_goods[] = $modeldet;
			}?>
		</div>

		<div class="head4-1-2">
			<br />
			<br />
			<br />
			<?=$model->shipping->quantity;?>
		</div>

		<div class="head4-2">
			<br />
			<br />
			<br />
			<?php 
				$i = 1;
				$getfirst = '';
				foreach ($desc_goods as $desc_goods) {
				if($i == 1){
					echo $desc_goods->kind_of_package_desc_goods.'<br /><br />';
					$getfirst_w = $desc_goods->weight;
				}
				$i = $i+1;
			}?>
		</div>

		<div class="head4-3">
			<br />
			<br />
			<br />
			<?php $ex = explode(" / ", $getfirst_w);?>
			GW : <br /><?=$ex[0];?><br />
			<br />
			NW : <br /><?=$ex[1];?><br />
		</div>

		<div class="head4-4">
			<br />
			<br />
			<br />
			<?=$ex[2];?>
		</div>
	</div>

	<div class="head5">
		<div class="head5-1">
			<br /><br /><br />
			&nbsp;&nbsp;&nbsp;<?=$model->freight_charges?>
		</div>
		<div class="head5-2">
			<br /><br /><br /><br />
			&nbsp;&nbsp;&nbsp;<?=$model->freight_term?>
		</div>
		<div class="head5-3">
			<br /><br /><br /><br />
			&nbsp;&nbsp;&nbsp;<?=$model->collect?>
		</div>
		<div >
			&nbsp;
			<br /><br />
		</div>
	</div>

</div>