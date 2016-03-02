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
	.head2-1-r{width:49%;float:left;border-bottom: 1px solid;}
	.head2-1-r-1{height: 37.8px;}
	.head2-1-r-1-l{width: 53%;float: left;border-right: 1px solid;height: 37.8px;}
	.head2-1-r-1-r{	width: 44%;float: left;height: 37.8px;padding: 0px 5px;margin-left: 25px;}

	.head3{width:100%;height:94.5px;border-bottom: 1px solid;}

	.head3-1{width: 52.9%;float:left;}
	.head3-1-l1{height: 37.8px;float:left;border-right: 1px solid;padding: 0px 20px;width: 147.5px;font-size: 8px;border-bottom:1px solid;}
	.head3-1-l2{height: 37.8px;float:left;border-right: 1px solid;padding: 0px 20px;width: 150px;font-size: 8px;border-bottom:1px solid;}

	.head3-2{width: 47%;float:left;}
	.head3-2-l{width: 100%;float:left;height:94.5px;}

	.head4{width:100%;height:301px;border-bottom: 1px solid;}

	.head4-1{width:28%;border-right: 1px solid;float: left;height:301px;padding-left: 20px;}
	.head4-2{width:38%;border-right: 1px solid;float: left;height:301px;}
	.head4-3{width:19%;border-right: 1px solid;float: left;height:301px;}
	.head4-4{width:9%;float: left;height:301px;}

	.head5{width:100%;height:144px;border-bottom: 1px solid;}

	.head5-1{width:28%;border-right: 1px solid;float: left;height:144px;}
	.head5-2{width:38%;border-right: 1px solid;float: left;height:144px;}
	.head5-3{width:19%;border-right: 1px solid;float: left;height:144px;}
	.head5-4{width:9%;float: left;height:144px;}

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
				<?php echo $model->notifypartycompany->companyname == 'SAME AS CONSIGNEE' ? 'SAME AS CONSIGNEE' : $model->notifypartycompany->companyname.'<br />'.$model->notifypartycompany->deliveryaddress.'<br />TELP : '.$model->notifypartycompany->phone.', FAX : '.$model->notifypartycompany->fax?>
			</div>
		</div>

		<div class="head2-1-r">
			<div class="head2-1-r-1-l">
				&nbsp;
			</div>
			<div class="head2-1-r-1-r">
				<br />
				<?=$model->bl_number?>
			</div>
		</div>
	</div>

	<div class="head3">
		<div class="head3-1">
			<div class="head3-1-l1">
				<br>
				<?=$model->initial_carriage?>
			</div>
			<div class="head3-1-l2">
				<br>
				<?=$model->place_of_receipt?>
			</div>

			<div class="head3-1-l1">
				<br>
				<?=$model->ocean_vessel?>
			</div>
			<div class="head3-1-l2">
				<br>
				<?=$model->port_of_loading?>
			</div>

			<div class="head3-1-l1" style="border-bottom:none;">
				<br>
				<?=$model->port_of_discharge?>
			</div>
			<div class="head3-1-l2" style="border-bottom:none;">
				<br>
				<?=$model->place_of_delivery?>
			</div>
		</div>

		<div class="head3-2">
			<div class="head3-2-l">
				<br />
				<?=$model->deliveryagentcompany->companyname?><br />
				<?=$model->deliveryagentcompany->deliveryaddress?><br />
				<?='Telp '.$model->deliveryagentcompany->phone;?>, <?='Fax '.$model->deliveryagentcompany->fax;?>
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
			<br /><br />
			<?=$model->freight_charges?>
		</div>
		<div class="head5-2">
			<br /><br />
			<?=$model->revenue_tons?>
			<br /><br />
			<?=$model->rate?>
		</div>
		<div class="head5-3">
			<br /><br />
			<?=$model->freight_term?>
		</div>
		<div >
			&nbsp;
			<br /><br />
			<?=$model->collect?>
		</div>
	</div>

	<div class="head6">
		<div class="head6-sub">
			<div class="ttc">
				&nbsp;
			</div>
			<div class="exrate">
				<br /><br /><br />
				Rp <?=number_format($model->exchange_rate,2)?>
			</div>
			<div class="prepaid-at">
				<div class="prepaid-at-atas">
					<br /><br />
					&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->prepaid_at?>
				</div>
				<div class="prepaid-at-bawah">
					<br />
					&nbsp;
				</div>
			</div>
			<div class="bacaan">
			</div>
		</div>
		
		<div class="payable-at">
			<div class="head6-sub2">
				<div class="payable-at-atas">
					<br /><br />
					&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->payable_at?>
				</div>
				<div class="payable-at-bawah">
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->number_of_original;?>
				</div>
				<div class="shippedondate">
					<br /><br />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
					$d=strtotime($model->bl_date);
					echo date("F d, Y", $d);
					?>
					<br /><br /><br />
					&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->ocean_vessel?>
				</div>
			</div>
		</div>
		<div class="place_date">
			<div class="place_date-atas">
				<br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;
				<?=$model->bl_place?>, 
				<?php				
				echo date("F d, Y", $d);
				?>
			</div>
			<div class="place_date-bawah">
				<br /><br /><br /><br /><br /><br /><br /><br />
				&nbsp;&nbsp;&nbsp;&nbsp;
				PT. QUANTUM AVIA TRANSINDO
			</div>
		</div>
	</div>

</div>