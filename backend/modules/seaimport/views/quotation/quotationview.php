<?php

use yii\helpers\Html;
use yii\db\Query;

?>
<style type="text/css">
	.title1{
		font-size: 16px;
	}
	.tabel2 {
		margin-top: 10px;
	}
	.tabel2 td {
		padding-left: 5px;
	}
	.tabel2 td {
		padding-left: 20px;
	}
	.table3{
		margin-left: 30px;
		margin-top: 10px;
	}
	.table3 tr th,td{
		text-align: left;
		font-size: 13px;
	}
	.table3-hr{
		margin: 0px;
	}
	.w10{
		width: 10px;
	}
	.w20{
		width: 20%;
		font-size: 12px;
		font-weight: 500;
	}
	.w30{
		width: 30%;
		font-weight: bolder;
	}
	.w35{
		width: 35%;
		font-size: 12px;
		font-weight: 500;
	}
	.w50{
		width: 50%;
	}
	.contenq{
		font-size: 12px;
		font-weight: 500;
	}
	.contenq p{
		margin-top: -10px;
		padding-left: 10px;
	}
	.contenq hr{
		border: 2px solid #ccc;
   		margin-top: 10px;
	}

	.contenq3{
		font-size: 13px;
		font-weight: 500;
	}
	.contenq3 p{
		margin-top: 10px;
		padding-left: 10px;
		font-size: 12px;
	}
	img{
		height: 10%;
	}
	th.img{
		text-align: right;
	}
	@page {
     margin: 0px;
    }
    .uppercase{
    	text-transform: uppercase !important;
    }
</style>
<?php //print_r($model->topic['id']);?>
<br />
<br />
<div style="margin:0 auto;width:690px; margin-top:20px;">
	<table class="" width="100%">
		<thead>
			<tr>
				<th class="title1">&nbsp;</th>
				<th class="img"><?= Html::img('dist/img/logo.png', ['alt'=>'some', 'class'=>'thing']);?> </th>
			</tr>
			<tr>
				<th colspan="2">
					<table class="tabel2" width="100%" border="1">
						<tr >
							<td class="w20 uppercase">To</td>
							<td class="w30 uppercase"><?=$model->topic['FirstName'].' '.$model->topic['LastName'];?></td>
							<td class="w20 uppercase">From</td>
							<td class="w30 uppercase"><?=$model->frompic['FirstName'].' '.$model->frompic['LastName'];?></td>
						</tr>
						<tr >
							<td class="w20 uppercase">Company</td>
							<td class="w30 uppercase"><?=$model->company['companyname']?></td>
							<td class="w20 uppercase">Date</td>
							<td class="w30 uppercase"><?=$model->quotationdate?></td>
						</tr>
						<tr >
							<td class="w20 uppercase">Phone Number</td>
							<td class="w30 uppercase"><?=$model->company['phone']?></td>
							<td class="w20 uppercase">Fax Number</td>
							<td class="w30 uppercase"><?=$model->company['fax']?></td>
						</tr>
						<tr>
							<td class="w20 uppercase">Title</td>
							<td class="w30 uppercase"><?=$model->quotationtitle?></td>
							<td class="w20 uppercase">Page</td>
							<td class="w30 uppercase">1</td>
						</tr>
					</table>
				</th>
			</tr>
		</thead>
			<tr>
				<td colspan="2" class="contenq">
					<hr />
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
						RE : <span style="font-weight:bold;" class="uppercase"> Quotation Import Rate FCL</span>
					</p>
					<br /><br />
					<p>
					Dear Sir & Madam,
					</p>
					<br />
					<p>
					We would like to inform you our best rate to support your import as you can read as follow : 
					</p>
				</td>
			</tr>

			<tr>
				<td colspan="2" class="contenq2">
					<table class="table3" width="70%" border="0">
						<tr >
							<td class="w35 uppercase">Port of Loading</td>
							<td style="width:10px;">:</td>
							<td><strong style="font-size:12px;"><?=$model->portofloading;?></strong></td>
						</tr>
						
						<tr >
							<td class="w35 uppercase">Freight of Payment</td>
							<td style="width:10px;">:</td>
							<td><strong style="font-size:12px;"><?=$model->freightageofpayment?></strong></td>
						</tr>
						<tr >
							<td class="w35 uppercase">Commodity</td>
							<td>:</td>
							<td><strong style="font-size:12px;"><?=$model->commodity?></strong></td>
						</tr>
						<tr >
							<td class="w35 uppercase">Term of Shipment</td>
							<td style="width:10px;">:</td>
							<td><strong style="font-size:12px;"><?=$model->termofshipment?></strong></td>
						</tr>
						
					</table>
				</td>
			</tr>

			<tr>
				<td colspan="2" class="contenq3">
					<table class="table3" width="70%" border="0">
						<tr>
							<th class="uppercase">Destination</th>
							<th>20ft</th>
							<th>40ft</th>
							<th>40hc</th>
						</tr>
						<tr>
							<td colspan="4"><hr class="table3-hr" /></td>
						</tr>
						<?php 
					foreach ($quotationdetail as $qd) {?>
						<tr >
							<td class="w35"><?=$qd->cost;?></td>
							<td><?=number_format($qd->twentyft);?></td>
							<td><?=number_format($qd->fourtyft);?></td>
							<td><?=number_format($qd->fourtyhc);?></td>
						</tr>
					<?php }?>

					</table>
					
				</td>
			</tr>
			
			<tr>
				<td colspan="2" class="contenq3">
					<table class="table3" width="70%" border="0">
						<tr >
							<th colspan="3"><strong style="text-decoration:underline;" class="uppercase">Local Charge Jakarta</strong></th>
						</tr>
						<?php 
					foreach ($local as $l) {?>
						<tr >
							<td class="w35"><?=$l->cost;?></td>
							<td style="width:10px;">:</td>
							<td><?='IDR '.number_format($l->local_cost).'/Set';?></td>
						</tr>
					<?php }?>
						<tr >
							<td colspan="3">
								<?php 
									$date=date_create($model->validdate);
									//echo date_format($date,"Y/m/d H:i:s");
								?>
								Note : the rate subject to change with or without prior notice.<br />
								***Validity until end of <?=date_format($date,"d M Y")?>.<br />
								***The above rate excluding cover of insurance.<br />
								***Term of Payment : <?=$model->termofpayment?>
							</td>
						</tr>
					</table>
					
				</td>
			</tr>

			<tr>
				<td colspan="2" class="contenq3">
					<p>
					We wish all above rate can be acceptable and wait your fully support with booking confirmation.
					if you have any inquiry please do not hesitate to contact me.
					</p>
				</td>
			</tr>

			<tr>
				<td>
					<br />
					Best regards
					<br />
					<br />
					<br />
					<br />
					<strong style="text-decoration:underline;"><?=$model->frompic['FirstName'].' '.$model->frompic['LastName'];?></strong><br />
					<br /><br />
				</td>
				<td style="vertical-align: text-top;text-align:center;">
						<br /><br />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Approvals,
				</td>
			</tr>

			<tr>
				<td colspan="2" class="contenq" align="center">
					<hr />
					<div style="margin-top:-12px;width:100%;text-align:center;">
						<?php echo $company->companyname;?><br />
						<?php echo $company->deliveryaddress;?><br />
						PHONE : <?php echo $company->phone;?>, FAX : <?php echo $company->fax;?>
					</div>
				</td>
			</tr>
		
	</table>
</div>