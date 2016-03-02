<?php

use yii\helpers\Html;
use yii\db\Query;

?>
<style type="text/css">
	body{margin: 0px;padding: 0px;}
	.wrapperpdf{font-size: 10px;width: 100%;}
	
	.border-top{border-top: 1px solid;}
	.border-right{border-right: 1px solid;}
	.border-bottom{border-bottom: 1px solid;}
	.no-padding-margin{padding: 0px;margin: 0px;}
	.head1{height: 30px;}

	.head2{width:100%;height: 285px;border: 1px solid;border-left: none;border-right: none;}
	
	.head2-1{width: 49%;float: left;}
	.head2-1-l{height: 94.5px;float:left;border-right: 1px solid;padding: 0px 0px 0px 20px;width: 100%;}
	.head2-1-l-a{float:left;height:37.8px;border-bottom: 0px solid;margin: 5px 0px 0px -20px;}
	.head2-1-l-a1{float:left;border-right: 1px solid;width: 44.5%;height:37.8px;padding: 0px 0px 0px 20px;}
	.head2-1-l-a2{float:left;height:37.8px;padding: 0px 0px 0px 20px;}
	.head2-1-r{width:49%;float:left;border-bottom: 0px solid;}
	.head2-1-r-1{height: 37.8px;}
	.head2-1-r-1-l{width: 400px;float: left;border-right: 0px solid;height: 95.5px;border-bottom: 1px solid;padding-left:70px;}
	.head2-1-r-1-r{width: 168px;float: left;height: 37.8px;padding: 0px 5px;border-bottom: 1px solid;}
	.head2-1-r-2{width: 368px;float: left;height: 94.5px;padding: 0px 5px;border-bottom: 1px solid;}
	.head2-1-r-3{width: 368px;float: left;height: 94.5px;padding: 0px 5px;border-bottom: 0px solid;}
	.head2-1-r-4{width: 368px;float: left;height: 94.5px;padding: 0px 5px;margin-left: 20px;}

	.head3{width:100%;height:76.6px;border-bottom: 0px solid;}

	.head3-1{width: 380px;float:left;}
	.head3-1-l1{height: 37.8px;float:left;border-right: 1px solid;width: 173px;font-size: 8px;border-bottom:1px solid;}
	.head3-1-l2{height: 37.8px;float:left;border-right: 1px solid;width: 189px;font-size: 8px;border-bottom:1px solid;}
	.head3-1-l3{height: 37.8px;float:left;border-right: 1px solid;width: 378px;font-size: 8px;border-bottom:1px solid;}

	.head3-1-l1a{height: 37.8px;float:left;border-right: 1px solid;width: 40px;font-size: 8px;border-bottom:1px solid;}

	.head3-2{width: 378px;float:left;}
	.head3-2-l{width: 100%;float:left;height:37.8px;border-bottom: 1px solid;}
	.head3-2-l1{width: 33.3%;float:left;height:37.8px;border-right: 1px solid;}
	.head3-2-l2{float:left;height:37.8px;}

	.head3-2-l1a{width: 155px;float:left;height:37.8px;border-right: 1px solid;}

	.head3-3-l{width: 173px;float:left;height:37.8px;border-bottom: 1px solid;border-right: 1px solid;}
	.head3-3-la{width: 25px;float:left;height:37.8px;border-bottom: 1px solid;border-right: 1px solid;}

	.head3-3-r{width: 49%;float:left;height:37.8px;border-bottom: 1px solid;}

	.head3-3{float:left;padding-left: 20px;height: 80px;}

	.head4{width:100%;height:320px;border-bottom: 1px solid;}

	.head4-0{width:20px;border-right: 1px solid;float: left;height:320px;padding-left: 10px;}
	.head4-0a{width:90px;border-right: 1px solid;float: left;height:320px;padding-left: 5px;}
	.head4-0b{width:19px;border-right: 1px solid;float: left;height:320px;padding-left: 2px;}
	.head4-0c{width:115px;border-right: 1px solid;float: left;height:320px;padding-left: 2px;}
	.head4-1{width:175px;border-right: 0px solid;float: left;height:320px;padding-left: 20px;}
	.head4-1-2{border-right: 1px solid;float: left;height:320px;padding-left: 10px;}
	.head4-2{border-right: 1px solid;float: left;height:320px;}
	.head4-3{border-right: 1px solid;float: left;height:320px;}
	.head4-4{float: left;height:320px;}

	.head5{width:100%;height:164px;border-bottom: 0px solid;}

	.head5-1{width:33%;border-right: 1px solid;float: left;height:29px;}
	.head5-3{width:65%;border-right: 0px solid;float: left;height:29px;}
	.head5-4{width:65%;float: left;height:164px;}

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
				<div>
					<br />
					<?=$model->deliveryagentcompany->companyname?><br />
					<?=$model->deliveryagentcompany->deliveryaddress?><br />
					<?='Telp '.$model->deliveryagentcompany->phone;?>, <?='Fax '.$model->deliveryagentcompany->fax;?>
				</div>
				<div class="head2-1-l-a border-top">
					<div class="head2-1-l-a1">
						<br />
						<?=$model->agent_iata_code;?>
					</div>
					<div class="head2-1-l-a2">
						<br />
						<?=$model->account_no;?>
					</div>
				</div>
			</div>
		</div>

		<div class="head2-1-r">
			<div class="head2-1-r-1-l">
				<br />
				<?=$model->ocean_vessel?>
			</div>
			<div class="head2-1-r-2">
				<br />
				&nbsp;
			</div>
			<div class="head2-1-r-3">
				<br />
				<?php if($model->notifypartycompany->companyid === $model->consigneecompany->companyid ){
					echo $model->notifypartycompany->companyname."<br />";
					echo $model->notifypartycompany->deliveryaddress."<br />";
					echo 'Telp '.$model->notifypartycompany->phone.' , Fax '.$model->notifypartycompany->fax;
				}
				else{
					echo $model->notifypartycompany->companyname."<br />";
					echo $model->notifypartycompany->deliveryaddress."<br />";
					echo 'Telp '.$model->notifypartycompany->phone.' , Fax '.$model->notifypartycompany->fax;
				}?>
			</div>
			
		</div>
	</div>

	<div class="head3">
		<div class="head3-1">
			<div class="head3-1-l3">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;
				<?=$model->port_of_loading?>
			</div>

			<div class="head3-1-l1a">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->to_code?>
			</div>
			<div class="head3-1-l1">
				<br>
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->by_first_carrier?>
			</div>
			<div class="head3-1-l1a">
				<br>
				&nbsp;<?=$model->to_carrier_1?>
			</div>
			<div class="head3-1-l1a">
				<br>
				&nbsp;<?=$model->by_carrier_1?>
			</div>
			<div class="head3-1-l1a">
				<br>
				&nbsp;<?=$model->to_carrier_2?>
			</div>
			<div class="head3-1-l1a">
				<br>
				&nbsp;<?=$model->by_carrier_2?>
			</div>
			
		</div>

		<div class="head3-2">
			<div class="head3-2-l">
				<div class="head3-2-l1a">
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->shipping->booking_number?>
				</div>
				<div class="head3-2-l1">
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp;bbb
				</div>
				<div class="head3-2-l2">
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp;ccc
				</div>
			</div>
			<div class="head3-3-la">
				<br />
				&nbsp;<?=$model->currency?>
			</div>

			<div class="head3-3-la">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;
			</div>

			<div class="head3-3-la">
				<br />
				&nbsp;<?=$model->wt_val_ppd?>
			</div>

			<div class="head3-3-la">
				<br />
				&nbsp;<?=$model->wt_val_coll?>
			</div>

			<div class="head3-3-la">
				<br />
				&nbsp;<?=$model->other_ppd?>
			</div>
			<div class="head3-3-la">
				<br />
				&nbsp;<?=$model->other_coll?>
			</div>

			<div class="head3-2-l1 border-bottom">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->declared_val_carriege?>
			</div>
			<div class="head3-2-l2 border-bottom">
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;<?=$model->declared_val_cust?>
			</div>
		</div>

		<div class="border-bottom border-right" style="width:48.9%;float:left;">
			<div class="head2-1-l-a1">
				<br />
				<?=$model->port_of_discharge;?>
			</div>
			<div class="head2-1-l-a2">
				<div style="float:left;width:48.5%;height:37.5px;" class="border-right">
					<br />
					<?=$model->requested_flight_date_1?>
				</div>
				<div style="float:left;">
					<br />
					&nbsp;&nbsp;&nbsp;&nbsp;
					<?=$model->requested_flight_date_2;?>
				</div>
			</div>
		</div>

		<div class="border-bottom" style="width:48.9%;float:left;">
			<div class="head2-1-l-a1">
				<br />
				NIL
			</div>
			<div class="head2-1-l-a2">
				<br />
				&nbsp;
			</div>
		</div>

		<div class="head3-3 border-bottom">
			<br /><br />
			<?=$model->holding_info;?>
		</div>
	</div>

	<div class="head4">
		<div class="head4-0">
			<br />
			<br />
			<br />
			<br />
			<?php 
			$i = 1;
			foreach ($modeldet as $nomor) {
				echo $i;
				$i++;
			}?>
		</div>

		<div class="head4-0a">
			<br />
			<br />
			<br />
			<br />
			<div style="text-align:right">
				<?php 
				foreach ($modeldet as $gw) {
					$pecah = explode(" / ", $gw->weight);
					isset($pecah[0]) ? $arr = explode(' ', $pecah[0]) : '';
					echo isset($arr[0]) ? $arr[0] : '';
				}?>
			</div>
		</div>

		<div class="head4-0b">
			<br />
			<br />
			<br />
			<br />
			<div>
				<?php 
				foreach ($modeldet as $in) {
					$pecah2 = explode(" / ", $in->weight);
					isset($pecah2[0]) ? $arr = explode(' ', $pecah2[0]) : '';
					echo isset($arr[1]) ? $arr[1] : '';
				}?>
			</div>
		</div>

		<div class="head4-0b">
			<br />
			<br />
			<br />
			<br />
			<div>
				<?php 
				foreach ($modeldet as $in) {
					$pecah2 = explode(" / ", $in->weight);
					isset($pecah2[1]) ? $arr = explode(' ', $pecah2[1]) : '';
					echo isset($arr[1]) ? $arr[1] : '';
				}?>
			</div>
		</div>

		<div class="head4-0a">
			<br />
			<br />
			<br />
			<br />
			<div style="text-align:right">
				<?php 
				foreach ($modeldet as $gw) {
					$pecah = explode(" / ", $gw->weight);
					isset($pecah[1]) ? $arr = explode(' ', $pecah[1]) : '';
					echo isset($arr[0]) ? $arr[0] : '';
				}?>
			</div>
		</div>

		<div class="head4-0a">
			<br />
			<br />
			<br />
			<br />
			<div style="text-align:right">
				<?php 
				foreach ($modeldet as $gw) {
					$pecah = explode(" / ", $gw->weight);
					isset($pecah[2]) ? $arr = explode(' ', $pecah[2]) : '';
					echo isset($arr[0]) ? $arr[0] : '';
				}?>
			</div>
		</div>

		<div class="head4-0a">
			<br />
			<br />
			<br />
			<br />
			<div style="text-align:right">
				<?php 
				foreach ($modeldet as $gw) {
					$pecah = explode(" / ", $gw->weight);
					isset($pecah[3]) ? $arr = explode(' ', $pecah[3]) : '';
					echo isset($arr[0]) ? $arr[0] : '';
				}?>
			</div>
		</div>

		<div class="head4-0c">
			<br />
			<br />
			<br />
			<br />
			<div style="text-align:right">
				<?php 
				foreach ($modeldet as $t) {
					echo $t->total_container;
				}?>
			</div>
		</div>

		<div class="head4-1">
			<br />
			<br />
			<br />
			<br />
			<?php foreach ($modeldet as $modeldet) {
				echo $modeldet->kind_of_package_desc_goods.'<br />';
			}?>
		</div>
	</div>

	<div class="head5">
		<div>
			<div class="head5-1">
				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					<?=$model->weigth_charge_prepaid;?>
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					<?=$model->weigth_charge_collect;?>
				</div>
			</div>
			<div class="head5-3">
				<div style="height:28px;padding-left:10px;" class="border-bottom">
					<br />
					<?=$model->oth_charger;?>
				</div>
			</div>
		</div>

		<div>
			<div class="head5-1">
				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					<?=$model->valuation_charge_prepaid;?>
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					<?=$model->valuation_charge_collect;?>
				</div>
			</div>
			<div class="head5-3">
				<div style="height:28px;padding-left:10px;" class="border-bottom">
					<br />
					<?=$model->cartage;?>
				</div>
			</div>
		</div>

		<div>
			<div class="head5-1">
				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					<?=$model->tax_prepaid;?>
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					<?=$model->tax_collect;?>
				</div>

				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					<?=$model->tot_agent_prepaid;?>
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					<?=$model->tot_agent_collect;?>
				</div>

				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					<?=$model->tot_carrier_prepaid;?>
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					<?=$model->tot_carrier_collect;?>
				</div>

				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					&nbsp;
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					&nbsp;
				</div>
			</div>
			<div class="head5-3">
				<div style="height:28px;padding-left:10px;" class="border-bottom">
					<br />
					<?=$model->doc_stamp_fee;?>
				</div>

				<div style="height:84px;text-align:center;" class="border-bottom">
					<br /><br /><br />
					<?=$model->agent_certified;?>
				</div>
			</div>
		</div>

		<div>
			<div class="head5-1">
				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					<?=$model->tot_prepaid;?>
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					<?=$model->tot_collect;?>
				</div>
			</div>
			<div class="head5-3">
				<div style="height:28px;padding-left:10px;text-align:center" class="border-bottom">
					<br />
					<?=$model->bl_place?>, 
					<?php 
						$date = date_create($model->bl_date);
						echo date_format($date,"F, d Y");
						//$date = new DateTime('2000-01-01');
						//echo $date->format('Y-m-d H:i:s');
					?>
				</div>
			</div>
		</div>

		<div>
			<div class="head5-1">
				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					&nbsp;
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					&nbsp;
				</div>
			</div>
			<div class="head5-3">
				<div style="height:28px;padding-left:10px;text-align:center" class="border-bottom">
					<br />
					&nbsp;
				</div>
			</div>
		</div>

		<div>
			<div class="head5-1">
				<div style="width:49%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-right border-bottom">
					<br />
					&nbsp;
				</div>
					
				<div style="width:48%;height:28px;padding-right:3px;text-align:right;float:left;" class="border-bottom">
					<br />
					&nbsp;
				</div>
			</div>
			<div class="head5-3">
				<div style="height:28px;padding-left:10px;text-align:center;width:200px;" class="border-bottom border-right">
					<br />
					&nbsp;
				</div>
			</div>
		</div>
	</div>

	ORIGINAL <?=$model->number_of_original;?> (FOR SHIPPER)

</div>