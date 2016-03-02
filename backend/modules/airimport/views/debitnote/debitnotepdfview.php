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
	.colhead1{width:300px; float: left;}
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
    .uppercase{
    	text-transform: uppercase !important;
    }
</style>
<?php //print_r($model);?>
<div style="margin:0 auto;width:760px; margin-top:20px;" class="wrapperpdf">

	<div class="head-atas">
		<div class="colhead1">
			<?= Html::img('dist/img/logo.png', ['alt'=>'some', 'class'=>'thing']);?>
		</div>
		<div>
			<h1>PT. KUANTUM ASIA TRANSINDO</h1>
			<h2 style="padding-top:-20px;">International Freight Forwader</h2>
			<h5 style="padding-top:-15px;">SENAYAN TRADE CENTER (STC). Lt.2 NO 31 & 34</h5>
			<h5 style="padding-top:-15px;">Jl. ASIA AFRICA, PINTU IX, GELORA SENAYAN</h5>
			<h5 style="padding-top:-15px;">JAKARTA PUSAT 10270 - INDONESIA</h5>
			<h5 style="padding-top:-15px;">TLP. +62 21 5793 1727 - FAX. +62 21 5793 1658</h5>
		</div>
	</div>

	<div style="border:2px solid;text-align:center;border-bottom:none;">
		<h1>DEBIT NOTE</h1>
	</div>

	<div style="border:2px solid;padding:10px;border-bottom:none;">
		<div style="width:175px;float:left;" class="uppercase">TO :</div>
		<div>
			<?=$model->tocompany->companyname?><br />
			<?=$model->tocompany->deliveryaddress?><br />
			<?='Tel : '.$model->tocompany->phone.', Fax : '.$model->tocompany->fax?>
		</div> 
	</div>

	<div style="border:2px solid;border-bottom:none;">
		<div style="width:450px;float:left;border-right:2px solid;padding:10px;">
			<div>
				<div class="uppercase" style="width:150px;float:left;">Invoice No</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:200px;float:left;"><?=$model->invoice_no?></div>
			</div>
			<div>
				<div class="uppercase" style="width:150px;float:left;">Date</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:200px;float:left;"><?=$model->invoice_date?></div>	
			</div>
			<div>
				<div class="uppercase" style="width:150px;float:left;">M / HBL NO</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:200px;float:left;"><?=$model->jobsheetinfo->hbl?></div>
			</div>
			<div>
				<div class="uppercase" style="width:150px;float:left;">POL / POD</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:250px;float:left;"><?=$model->jobsheetinfo->billlanding->place_of_receipt.' / '.$model->jobsheetinfo->destination?></div>
			</div>
			<div>
				<div class="uppercase" style="width:150px;float:left;">VESSEL / FLIGHT NAME</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:200px;float:left;"><?=$model->jobsheetinfo->billlanding->ocean_vessel?></div>
			</div>
			<div>
				<div class="uppercase" style="width:150px;float:left;">COMMODITY</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:200px;float:left;"><?=$model->jobsheetinfo->commodity?></div>
			</div>
			<div>
				<div class="uppercase" style="width:150px;float:left;">DUE DATE / TERM</div>
				<div style="width:25px;float:left;"> : </div>
				<div style="width:200px;float:left;"><?=$model->due_date?></div>
			</div>
		</div> 
		<div style="width:200px;padding:10px;margin-left:10px;">
			<div style="margin-left:10px;">OUR ACCOUNT</div>
			<div><br /></div>
			<div style="margin-left:10px;" class="uppercase">A/N : Kuantum Avia Transindo</div>
			<div style="margin-left:10px;" class="uppercase">Bank BCA / CAB Senayan City</div>
			<div style="margin-left:10px;" class="uppercase">A/C IDR : 5005 233 779</div>
			<div style="margin-left:10px;" class="uppercase">A/C USD : 5005 233 027</div>
		</div> 
	</div>

	<div style="border:2px solid;border-bottom:none;">
		<div style="float:left;padding:10px">
			&nbsp;
		</div>
	</div>

	<div style="border:2px solid;border-bottom:none;">
		<div style="width:30px;float:left;padding:5px;border-right:2px solid;">
			NO
		</div>
		<div style="width:400px;float:left;padding:5px;border-right:2px solid;" class="uppercase">
			Description
		</div>
		<div style="width:150px;float:left;padding:5px;border-right:2px solid;">
			IDR
		</div>
		<div style="float:left;padding:5px">
			USD
		</div>
	</div>

	<div style="border:2px solid;border-bottom:none;">
		
		<?php 
		$i = 1;
		foreach ($modeldet as $md) {?>
		
		<div style="width:30px;float:left;padding:5px;border-right:2px solid;">
			<?=$i?>
		</div>
		<div style="width:400px;float:left;padding:5px;border-right:2px solid;">
			<?=$md->costing?>
		</div>
		<div style="width:150px;float:left;padding:5px;border-right:2px solid;">
			&nbsp;
		</div>
		<div style="float:left;padding:5px">
			<?=number_format($md->amount,2)?>
		</div>

		<?php $i++; }?>

		<div style="width:30px;float:left;padding:5px;border-right:2px solid;border-top:2px solid;">
			&nbsp;
		</div>
		<div style="width:400px;float:left;padding:5px;border-right:2px solid;text-align:center;border-top:2px solid;">
			TOTAL
		</div>
		<div style="width:150px;float:left;padding:5px;border-right:2px solid;border-top:2px solid;">
			&nbsp;
		</div>
		<div style="float:left;padding:5px;border-top:2px solid;">
			<?=number_format($model->tot_amount,2)?>
		</div>
	</div>

	<div style="border:2px solid;">
		
		<div style="padding:5px;">
			<?=$terbilang?> USD ONLY
		</div>

	</div>

	<div style="margin-top:20px;">
		
		<div  class="uppercase">
			PAYMENT BY CHEQUE / DRAFF ETC IS NOT CONSIDERED VALID BEFORE IT IS CASHED<br />
			OR CLEARED BY OUR BANK AND PAYMENT BY TRANSFER IS CONSIDERED VALID AFTER IT IS RECEIVED BY OUR BANK.
			<br />
			<br />
			<?='JAKARTA, '.date('d F Y')?>
			<br />
			<br />
			<br />
			<br />
			<br />
			<?=$model->sign?>
		</div>

	</div>

</div>