<?php

use yii\helpers\Html;
use yii\db\Query;

?>
<style type="text/css">
	.wrapperpdf{font-size: 12px;}
	.title1{font-size: 14px; font-weight: bold;}
	.bold{font-weight: bold;}
	.text-center{text-align: center;}
	.text-left{text-align: left;}
	.text-right{text-align: right;}
	.col1{width: 150px;float: left;}
	.col2{width: 200px;float: left; border-bottom: 1px solid;}
	.col2a{width: 600px;float: left; border-bottom: 1px solid;}
	.col2b{width: 600px;float: left; border: 1px solid; border-top: none;}
	.col2c{width: 600px;float: left;}
	.col3{width: 197px;float: left; border-right: 1px solid;height: 15px;}
	.col3a{width:97;float:left;height: 15px;}
	.col4{width: 251px;float: left;}
	.mar-top20{margin-top: 20px;}
	.width49{width: 49%; float:left;}
	.width99{width: 99%; float:left;}
	.font10{font-size: 10px;}
	.font11{font-size: 11px;}
	.pull-left{float: left;}
	.pull-right{float: right;}
	.clear-both{clear: both;}
	.padding20{padding: 20px 0px !important;}

	img.thing{width: 272px;height: 104px;}
	p{font-size: 8px;text-align: justify;padding-left: 10px;}
	span{font-weight: normal;font-size: 10px;overflow: hidden;}

	div.garis{
		width : 378px;
		border : 2px solid #000;
		border-left: none;
		float:left;
	}

	div.garis-panjang{
		width : 100%;
		border : 2px solid #000;
		border-left: none;
		float:left;
	}

	.no-border{
		border:none !important;
		float:left;
		width : 378px;
	}
	.no-border-top{
		border-top: none !important;
	}
	.no-border-right{
		border-right: none !important;
	}

	.no-border-bottom{
		border-bottom: none !important;
	}

	.border-top{
		border-top:2px solid;
	}

	.border-bottom{
		border-bottom:4px solid;
	}

	.no-padding-margin{
		padding: 0px;
		margin: 0px;
	}

	@page {
     margin: 15px;
    }
</style>
<?php //print_r($model);?>
<div style="margin:0 auto;width:760px; margin-top:20px;" class="wrapperpdf">

	<div class="text-center">
		<?=$model->jobs_name;?>
	</div>

	<div class="text-center mar-top20">
		JOB SHEET FORM-EXPORT
	</div>

	<div class="mar-top20">
		<div class="width49">
			<div class="col1">
				DATE
			</div>
			<div class="col2">
				: <?=$model->date?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				JOB SHEET NO.
			</div>
			<div class="col2">
				: <?=$model->jobs_no?>
			</div>
		</div>
	</div>

	<div class="mar-top20 bold">
	SEA / AIR EXPORT SHIPMENT - AS PER SHIPPER'S SHIPPING INSTRUCTION
	</div>

	<div>
		<div class="width49">
			<div class="col1">
				SHIPPER
			</div>
			<div class="col2">
				: <?=$model->shippercompany->companyname?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				DATE RCVD
			</div>
			<div class="col2">
				: <?=$model->date_rcvd?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				CONSIGNEE
			</div>
			<div class="col2">
				: <?=$model->consigneecompany->companyname?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				PIC
			</div>
			<div class="col2">
				: <?=$model->picuser->FirstName." ".$model->picuser->LastName?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				COMMODITY
			</div>
			<div class="col2">
				: <?=$model->commodity?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				TELP / FAX
			</div>
			<div class="col2">
				: <?=$model->telp_fax?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				PO# / STY#
			</div>
			<div class="col2">
				: <?=$model->po_sty?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				GROSS WEIGHT
			</div>
			<div class="col2">
				: <?=$model->gross_w?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				CTNS / QTY
			</div>
			<div class="col2">
				: <?=$model->ctn_qty?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				VOL WEIGHT
			</div>
			<div class="col2">
				: <?=$model->vol_w?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				DIENSIONS
			</div>
			<div class="col2">
				: <?=$model->dimensions?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				MEASUREMENT
			</div>
			<div class="col2">
				: <?=$model->measurement?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2">
				&nbsp;
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				OVERSEAS AGENT
			</div>
			<div class="col2">
				: <?=$model->overseas_agent?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				DEST
			</div>
			<div class="col2">
				: <?=$model->destination?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				HANDLING
			</div>
			<div class="col2">
				: <?=$model->handling?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				FREIGHT
			</div>
			<div class="col2">
				: <?=$model->freight?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>
	</div>

	<div class="mar-top20 border-bottom"></div>

	<div class="mar-top20">
		
		<div class="width49">
			<div class="col1">
				<strong>BOKKING DETAILS</strong>
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				<strong>TRANSPORT / TRAFIC</strong>
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				MBL / MAWB NO.
			</div>
			<div class="col2">
				: <?=$model->mbl?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				PICK UP/SELF DELIVERY
			</div>
			<div class="col2">
				: <?=$model->pickup?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				HBL / HAWB NO.
			</div>
			<div class="col2">
				: <?=$model->hbl?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				ADDRESS
			</div>
			<div class="col2">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				FLT / VST / DT.
			</div>
			<div class="col2">
				: <?=$model->fl?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2">
				&nbsp;
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				REMARKS
			</div>
			<div class="col2">
				: <?=$model->remarks?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				DELIVERY
			</div>
			<div class="col2">
				: <?=$model->delivery?>
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2">
				&nbsp;
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				HANDLING BY
			</div>
			<div class="col2" style="border-bottom:none;">
				: <?=$model->handling_by;?>
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>

		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>
		<div class="width49">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2" style="border-bottom:none;">
				&nbsp;
			</div>
		</div>

		<div class="width99">
			<div class="col1">
				REMARKS
			</div>
			<div class="col2a">
				: <?=$model->remarks2?>
			</div>
		</div>

		<div class="width99">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2a">
				&nbsp;
			</div>
		</div>

		<div class="width99">
			<div class="col1">
				&nbsp;
			</div>
			<div class="col2a">
				&nbsp;
			</div>
		</div>

		<div class="width99 mar-top20">
			<div class="col1">
				COSTING
			</div>
			<div class="col2b text-center" style="border-top:1px solid;">
				SALES TERM: ROUTINE ORDER / FREE HAND
			</div>

			<div class="col1">
				&nbsp;
			</div>
			<div class="col2b text-center">
				<div class="col3">COST</div>
				<div class="col3">(A)BILL SHIPPER</div>
				<div class="col3" style="border-right:none;">(B)BILL-AGENT</div>
			</div>

			<!--LOOPING-->
			<?php
			foreach ($modeldet as $md) { 
				$exbillcost = explode(' / ', $md->bill_cost);
				$exbillship = explode(' / ', $md->bill_shipper);
				$exbillagen = explode(' / ', $md->bil_agent);
			?>
				<div class="col1" style="height:15px;">
					<?php if(strlen($md->costing) >= 18){echo substr($md->costing, 0, 18).'..';}
							else {echo $md->costing;}
								?>
				</div>

				<div class="col2b text-center">
					<div class="col3">
						<?php $exbillcost[2] = intval($exbillcost[2]);?>
						<div class="col3a font10" style="border-right:1px solid;">&nbsp;<?=$exbillcost[1];?></div>
						<div class="col3a font10">&nbsp;<?php $exbillcost[2] == '0' ? print '' : print number_format($exbillcost[2], 2);?></div>
					</div>
					<div class="col3">
						<div class="col3a font10" style="border-right:1px solid;">
							<?php if($exbillship[1] !== '0'){echo $exbillship[1];}?>
						</div>
						<div class="col3a font10">&nbsp;
							<?php $exbillship[2] = intval($exbillship[2]);?>
							<?php $exbillship[2] == '0' ? print '' : print number_format($exbillship[2], 2); ?>
						</div>
					</div>
					<div class="col3" style="border-right:none;">
						<?php $exbillagen[2] = intval($exbillagen[2]);?>
						<div class="col3a font10" style="border-right:1px solid;"><?=$exbillagen[1]?></div>
						<div class="col3a font10"><?php $exbillagen[2] == '0' ? print '' : print number_format($exbillagen[2])?></div>
					</div>
				</div>
			<?php } ?>

			<!--END LOOPING-->
		</div>

		<?php 
		$totusd = explode(' / ',$model->tot_usd);
              $totnetusd = (double)$totusd[1] - (double)$totusd[0];
		?>

		<div class="width99 mar-top20">
			<div class="col1">
				TOTAL EXPENSES
			</div>
				
			<div class="col2c text-center">
				<div class="col3" style="border-right:none;">
					<?php $totusd[0] = intval($totusd[0]);?>
					<div class="col3a font10" style="border-right:1px solid;"><?=number_format($totusd[0],2)?></div>
					<div class="col3a font10"><?=number_format($model->tot_expenses,2)?></div>
				</div>
				<div class="col3" style="border-right:none;">
					&nbsp;
				</div>
				<div class="col3" style="border-right:none;">
					&nbsp;
				</div>
			</div>

			<div class="col1">
				TOTAL BILLING
			</div>
				
			<div class="col2c text-center">
				<div class="col3" style="border-right:none;">
					<div class="col3a font10" style="border-right:1px solid;"><?=number_format($totusd[1],2)?></div>
					<div class="col3a font10"><?=number_format($model->tot_bill,2)?></div>
				</div>
				<div class="col3" style="border-right:none;">
					&nbsp;
				</div>
				<div class="col3" style="border-right:none;">
					&nbsp;
				</div>
			</div>

			<div class="col1">
				TOTAL PROFIT
			</div>
				
			<div class="col2c text-center">
				<div class="col3" style="border-right:none;">
					<div class="col3a font10" style="border-right:1px solid;"><?=number_format($totnetusd,2)?></div>
					<div class="col3a font10"><?=number_format($model->tot_profit,2)?></div>
				</div>
				<div class="col3" style="border-right:none;">
					&nbsp;
				</div>
				<div class="col3" style="border-right:none;">
					&nbsp;
				</div>
			</div>

			<div class="col1">
				NET PROFIT
			</div>
				
			<div class="col2c text-center">
				&nbsp;
			</div>
		</div>

		<div class="mar-top20 border-bottom"></div>

		<div>
			<div class="col4">Prepared By<br /><br /><br /><?=$model->prepain_by;?></div>
			<div class="col4">&nbsp;</div>
			<div class="col4" style="border-right:none;">Approve By<br /><br /><br /><?=$model->approve_by;?></div>
		</div>

	</div>

</div>