<?php

use yii\helpers\Html;
use yii\db\Query;

?>
<style type="text/css">
	.wrapperpdf{font-size: 12px;}
	.title1{font-size: 18px;}
	.t2{margin-top: 15px; font-size: 11px;}
	.model{font-weight: bold;}
	.txt-15{width: 50px;}
	.txt-25{width: 250px;}
	.no-bottom-border{border-bottom-color: #fff; border-top:0pt;}
	.w60{width:60%;}
	table{width:100%;}
	img .thing{height: 10%;}
	th.img{text-align: right;}
	th,td{padding-left: 3px;}

	@page {
     margin: 0px;
    }
</style>
<?php //print_r($model->topic['id']);?>
<div style="margin:0 auto;width:690px; margin-top:20px;" class="wrapperpdf">
	<table>
		<tr>
				<th class="title1">Shipping Instruction</th>
				<th class="img"><?= Html::img('dist/img/logo.png', ['alt'=>'some', 'class'=>'thing']);?> </th>
		</tr>
	</table>

	<div style="clear:both;"></div>

	<table class="t2">
		<tr>
				<td width="110">NO REF</td>
				<td width="10"></td>
				<td class="model"  width="220"><?=$model->no_ref?></td>
				<td width="110">BOOKING NUMBER</td>
				<td width="0"></td>
				<td class="model" width="250"><?=$model->booking_number?></td>
		</tr>
		<tr>
				<td>DATE</td>
				<td width="10"></td>
				<td class="model"><?=$model->date?></td>
				<td>DEPO</td>
				<td width="10"></td>
				<td class="model txt-15"><?=$model->depo?></td>
		</tr>
		<tr>
				<td></td>
				<td width="10"></td>
				<td class="model"></td>
				<td>STACKING</td>
				<td width="10"></td>
				<td class="model"><?=$model->stucking?></td>
		</tr>
	</table>

	<table class="t2" border="1">
		<tr>
				<td width="100">TO</td>
				<td width="10">:</td>
				<td class="model" width="220"><?=$model->topicuser->FirstName.' '.$model->topicuser->LastName?></td>
				<td width="100">FROM</td>
				<td width="10">:</td>
				<td class="model"><?=$model->frompicuser->FirstName.' '.$model->frompicuser->LastName?></td>
		</tr>
		<tr>
				<td>TELP/FAX</td>
				<td>:</td>
				<td class="model"><?=$model->telp_fax?></td>
				<td class=""></td>
				<td></td>
				<td class="model"></td>
		</tr>
		<tr>
				<td>ATTN</td>
				<td>:</td>
				<td class="model"><?=$model->attnuser->FirstName.' '.$model->attnuser->LastName?></td>
				<td class="">EMAIL</td>
				<td>:</td>
				<td class="model"><?=$model->email?></td>
		</tr>
	</table>

	<p class="t2">
		WE HERBY AUTHORIZE YOU TO ARRANGE SPACE EQUIPMENT FOR OUR CARGO AS FOLLOWS.
	</p>

	<table class="t2" border="1">
		<tr>
				<td width="150" class="no-bottom-border">SHIPPER</td>
				<td style="border:1pt solid black;">:</td>
				<td class="model no-bottom-border">
					<div class="w60">
						<?=$model->shippercompany->companyname.'<br />'.$model->shippercompany->deliveryaddress?><br />
						TELP : <?=$model->shippercompany->phone?>, FAX : <?=$model->shippercompany->fax?>
					</div>
				</td>
		</tr>
		<tr>
				<td class="no-bottom-border" style="border-top:0pt;">CONSIGNEE</td>
				<td>:</td>
				<td class="model no-bottom-border">
					<div class="w60">
						<?=$model->consigneecompany->companyname.'<br />'.$model->consigneecompany->deliveryaddress?><br />
						TELP : <?=$model->consigneecompany->phone?>, FAX : <?=$model->consigneecompany->fax?>
					</div>
				</td>
		</tr>
		<tr>
				<td class="no-bottom-border">NOTIFY PARTY</td>
				<td>:</td>
				<td class="model no-bottom-border">
					<div class="w60">
						<?php 
						echo $model->notifypartycompany->companyname == 'SAME AS CONSIGNEE' ? 'SAME AS CONSIGNEE' : $model->notifypartycompany->companyname.'<br />'.$model->notifypartycompany->deliveryaddress.'<br />TELP : '.$model->notifypartycompany->phone.', FAX : '.$model->notifypartycompany->fax?>
					</div>
				</td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">VESSEL</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->vessel?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">CONNECTING VESSEL</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->connecting_vessel?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">PORT OF LOADING</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->port_of_loading?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">ETD POL</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->etd_jkt?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">ETA TRANSHIPMENT</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->eta_pus?></td>
		</tr>
		<tr>
				<td class="no-bottom-border">VIA / TRANSIT</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->via_transit?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">ETD TRANSHIPMENT</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->etd_pus?></td>
				
		</tr>

		<tr>
				<td class="no-bottom-border">ETA POD</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->eta_pod?></td>
				
		</tr>

		<tr>
				<td class="no-bottom-border">QUANTITY</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->quantity?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">FREIGHT TERM</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->freight_term?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">STUFFING</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->stuffing?></td>
				
		</tr>
		<tr>
				<td  class="no-bottom-border">GW/NW/CBM</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->gw_nw_cbm?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">DESCRIPTION GOOD</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->description_good?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">CONT & SEAL NO</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->cont_seal_no?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">SHIPPING MARK</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->shipping_mark?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">DESTINATION</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->destination?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">RATE</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->rate?></td>
				
		</tr>
		<tr>
				<td style="border-top:0px;">NOTE</td>
				<td>:</td>
				<td class="model" style="border-top:0px;"><?=$model->note?></td>
				
		</tr>
		<tr>
				<td class="no-bottom-border">PEB NO</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->peb_no?></td>
				
		</tr>

		<tr>
				<td class="no-bottom-border">TGL</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->tgl?></td>
				
		</tr>

		<tr>
				<td class="no-bottom-border">KPBC</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->kpbc?></td>
				
		</tr>

		<tr>
				<td class="no-bottom-border">HS CODE</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->hs_code?></td>
				
		</tr>

		<tr>
				<td class="no-bottom-border">BL/NO</td>
				<td>:</td>
				<td class="model no-bottom-border"><?=$model->bl_no?></td>
				
		</tr>
	</table>

	<p class="t2">
		SPECIAL INSTRUCTION PLEASE EMAIL TO <?=$model->email?>.<br />
		THANKS FOR YOUR KIND ATTENTION
	</p>

	<p class="t2">
		BEST REGARDS.<br />
		<?=$model->frompicuser->FirstName.' '.$model->frompicuser->LastName;?>
	</p>
</div>