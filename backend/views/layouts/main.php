<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use common\widgets\Alert;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">
    
	<header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>K</b>TM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>KTM</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/ariandi.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            PT. ABC Doremi Test
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>New Quotation Offering</p>
                        </a>
                      </li><!-- end message -->
					  <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/ariandi.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            PT. ABC Doremi Test
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>New Quotation Offering</p>
                        </a>
                      </li><!-- end message -->
					  <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/ariandi.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            PT. ABC Doremi Test
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>New Quotation Offering</p>
                        </a>
                      </li><!-- end message -->
					  <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/ariandi.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            PT. ABC Doremi Test
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>New Quotation Offering</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">5</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 5 pending payment</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Pending Payment From PT. ABC Doremi Test Invoice : 0123/KTM-SE/OCT
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Pending Payment From PT. ABC Doremi Test Invoice : 0123/KTM-SE/OCT
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i>  Pending Payment From PT. ABC Doremi Test Invoice : 0123/KTM-SE/OCT
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i>  Pending Payment From PT. ABC Doremi Test Invoice : 0123/KTM-SE/OCT
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i>  Pending Payment From PT. ABC Doremi Test Invoice : 0123/KTM-SE/OCT
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<img src="dist/img/ariandi.jpg" class="user-image" alt="User Image">-->
                  <span class="hidden-xs"><?= Yii::$app->user->identity->FirstName.' '.Yii::$app->user->identity->LastName?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/ariandi.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?= Yii::$app->user->identity->FirstName.' '.Yii::$app->user->identity->LastName?> - Admin
                      <small>Member since Nov. 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
					  <?php echo Html::a('Sign out',['/site/logout'],['data-method' => 'post', 'class'=>'btn btn-default btn-flat']);?>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
	
	<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
		  <?php
		  $current = Url::current();
		  $request = Yii::$app->request;
		  $action = $request->get('action');
		  
		  $action == 'dasboard' ? $dasboard_a = 'active':$dasboard_a = '';
		  $action == 'masterdata' ? $dasboard_b = 'active':$dasboard_b = '';
      
      $actionid = Yii::$app->controller->module->id.'-'.Yii::$app->controller->id.'--'.Yii::$app->controller->action->id;

      //echo Yii::$app->controller->module->id;

		  $current == '/kuantum/backend/web/index.php?r=site%2Findex' ? $dasboard_aa = 'active':$dasboard_aa = '';
		  $current == '/kuantum/backend/web/index.php?r=masterdata%2Fuser%2Findex' ? $dasboard_b = 'active':$dasboard_b = '';
		  $current == '/kuantum/backend/web/index.php?r=masterdata%2Fcompany%2Findex' ? $dasboard_c = 'active':$dasboard_c = '';
		  $current == '/kuantum/backend/web/index.php?r=masterdata%2Fcompanyinfo%2Findex' ? $dasboard_d = 'active':$dasboard_d = '';
		  $current == '/kuantum/backend/web/index.php?r=masterdata%2Fquotation%2Findex' ? $dasboard_e = 'active':$dasboard_e = '';

      $actionid == 'masterdata-costing--index' ? $md_a = 'active':$md_a = '';

      $actionid == 'seaexport-quotation--index' ? $dasboard_e = 'active':$dasboard_e = '';
      $actionid == 'seaexport-quotation--detailq' ? $dasboard_f = 'active':$dasboard_f = '';
      $actionid == 'seaexport-quotationdetail--index' ? $dasboard_g = 'active':$dasboard_g = '';
      $actionid == 'seaexport-shippinginstruction--index' ? $dasboard_h = 'active':$dasboard_h = '';
      $actionid == 'seaexport-billlanding--index' ? $dasboard_h1 = 'active':$dasboard_h1 = '';
      $actionid == 'seaexport-billlandingdetail--index' ? $dasboard_h2 = 'active':$dasboard_h2 = '';
      $actionid == 'seaexport-billlandingdetail--detailq' ? $dasboard_h3 = 'active':$dasboard_h3 = '';
	    $actionid == 'port--index' ? $dasboard_d1 = 'active':$dasboard_d1 = '';

      $actionid == 'seaexport-jobsheet--index' ? $dasboard_i1 = 'active':$dasboard_i1 = '';
      $actionid == 'seaexport-jobsheetdet--index' ? $dasboard_i2 = 'active':$dasboard_i2 = '';
      $actionid == 'seaexport-jobsheetdet--detailq' ? $dasboard_i3 = 'active':$dasboard_i3 = '';

      $actionid == 'seaexport-invoice--index' ? $dasboard_j1 = 'active':$dasboard_j1 = '';

      $actionid == 'seaexport-debitnote--index' ? $dasboard_k1 = 'active':$dasboard_k1 = '';

      $actionid == 'seaexport-creditnote--index' ? $dasboard_l1 = 'active':$dasboard_l1 = '';



      $actionid == 'seaimport-quotation--index' ? $dasboard_m = 'active':$dasboard_m = '';
      $actionid == 'seaimport-quotationdetail--detailq' ? $dasboard_n = 'active':$dasboard_n = '';
      $actionid == 'seaimport-quotationdetail--index' ? $dasboard_o = 'active':$dasboard_o = '';
      $actionid == 'seaimport-shippinginstruction--index' ? $dasboard_p = 'active':$dasboard_p = '';
      $actionid == 'seaimport-billlanding--index' ? $dasboard_q1 = 'active':$dasboard_q1 = '';
      $actionid == 'seaimport-billlandingdetail--index' ? $dasboard_q2 = 'active':$dasboard_q2 = '';
      $actionid == 'seaimport-billlandingdetail--detailq' ? $dasboard_q3 = 'active':$dasboard_q3 = '';

      $actionid == 'seaimport-jobsheet--index' ? $dasboard_r1 = 'active':$dasboard_r1 = '';
      $actionid == 'seaimport-jobsheetdet--index' ? $dasboard_r2 = 'active':$dasboard_r2 = '';
      $actionid == 'seaimport-jobsheetdet--detailq' ? $dasboard_r3 = 'active':$dasboard_r3 = '';

      $actionid == 'seaimport-invoice--index' ? $dasboard_s1 = 'active':$dasboard_s1 = '';

      $actionid == 'seaimport-debitnote--index' ? $dasboard_t1 = 'active':$dasboard_t1 = '';

      $actionid == 'seaimport-creditnote--index' ? $dasboard_u1 = 'active':$dasboard_u1 = '';

      $actionid == 'report-invoice--index' ? $report_a = 'active':$report_a = '';
      $actionid == 'report-payment--index' ? $report_b = 'active':$report_b = '';
      $actionid == 'report-billlandingdetail--index' ? $report_c = 'active':$report_c = '';
      $actionid == 'report-invoicedetail--index' ? $report_d = 'active':$report_d = '';
      $actionid == 'report-paymentdet--index' ? $report_e = 'active':$report_e = '';

      $actionid == 'airexport-quotation--index' ? $air_a = 'active':$air_a = '';
      $actionid == 'airexport-quotationdetail--detailq' ? $air_b = 'active':$air_b = '';
      $actionid == 'airexport-quotationdetail--index' ? $air_c = 'active':$air_c = '';
      $actionid == 'airexport-shippinginstruction--index' ? $air_d = 'active':$air_d = '';
      $actionid == 'airexport-billlanding--index' ? $air_e = 'active':$air_e = '';
	  $actionid == 'airexport-billlandingdetail--index' ? $dasboard_q21 = 'active':$dasboard_q21 = '';
	  $actionid == 'airexport-jobsheet--index' ? $dasboard_r21 = 'active':$dasboard_r21 = '';
	  $actionid == 'airexport-jobsheetdet--index' ? $dasboard_r22 = 'active':$dasboard_r22 = '';
	  $actionid == 'airexport-invoice--index' ? $dasboard_s21 = 'active':$dasboard_s21= '';	
	  $actionid == 'airexport-debitnote--index' ? $dasboard_t21 = 'active':$dasboard_t21= '';	
	  $actionid == 'airexport-creditnote--index' ? $dasboard_u21 = 'active':$dasboard_u21= '';	
	  
	  $actionid == 'airimport-quotation--index' ? $air_a22 = 'active':$air_a22 = '';
	  $actionid == 'airimport-quotationdetail--detailq' ? $air_b22 = 'active':$air_b22 = '';
	  $actionid == 'airimport-billlanding--index' ? $air_e22 = 'active':$air_e22 = '';
	  $actionid == 'airimport-billlandingdetail--index' ? $dasboard_q22 = 'active':$dasboard_q22 = '';
	  $actionid == 'airimport-jobsheet--index' ? $dasboard_r31 = 'active':$dasboard_r31 = '';
	  $actionid == 'airimport-jobsheetdet--index' ? $dasboard_r32 = 'active':$dasboard_r32 = '';
	  $actionid == 'airimport-invoice--index' ? $dasboard_s31 = 'active':$dasboard_s31= '';	
	  $actionid == 'airimport-debitnote--index' ? $dasboard_t31 = 'active':$dasboard_t31= '';	
	  $actionid == 'airimport-creditnote--index' ? $dasboard_u31 = 'active':$dasboard_u31= '';	
	  	  
		  ?>
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?=$dasboard_a.$dasboard_aa?> treeview">
			  <?php echo Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>',['/site/',],['data' => ['method' => 'get','params' => ['action' => 'dasboard']]]);?>
            </li>
            
            <li class="<?=$dasboard_b.$dasboard_c.$dasboard_d.$dasboard_d1.$md_a?> treeview">
			  <?php echo Html::a('<i class="fa fa-table"></i> <span>Master Data</span><i class="fa fa-angle-left pull-right"></i>',['#',]);?>
              
              <ul class="treeview-menu">
				<li class="<?=$dasboard_b?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Person',['/masterdata/user/',]);?></li>
				<li class="<?=$dasboard_c?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Company',['/masterdata/company/',]);?></li>
				<li class="<?=$dasboard_d?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Company Info',['/masterdata/companyinfo/',]);?></li>
				<li class="<?=$dasboard_d1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Port',['/masterdata/port/',]);?></li>
        <li class="<?=$md_a?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Costing',['/masterdata/costing/',]);?></li>
              </ul>
            </li>
			
			<li class="<?=$dasboard_e.$dasboard_f.$dasboard_g.$dasboard_h.$dasboard_h1.$dasboard_h2.$dasboard_h3.$dasboard_i1.$dasboard_i2.$dasboard_i3.$dasboard_j1.$dasboard_k1.$dasboard_l1?> treeview">
			  <?php echo Html::a('<i class="fa fa-anchor"></i> <span>Sea Export</span><i class="fa fa-angle-left pull-right"></i>',['#',]);?>
              
              <ul class="treeview-menu">
        				<li class="<?=$dasboard_e?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation',['/seaexport/quotation/',]);?></li>
        				<li class="<?=$dasboard_f.$dasboard_g?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation Detail',['/seaexport/quotation/',]);?></li>
                <li class="<?=$dasboard_h?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Shipping Instruction',['/seaexport/shippinginstruction/',]);?></li>
                <li class="<?=$dasboard_h1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Bill of Landing',['/seaexport/billlanding/',]);?></li>
                <li class="<?=$dasboard_h2.$dasboard_h3?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Bill of Landing Detail',['/seaexport/billlanding/',]);?></li>
                <li class="<?=$dasboard_i1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet',['/seaexport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_i2.$dasboard_i3?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet Detail',['/seaexport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_j1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Invoice',['/seaexport/invoice/',]);?></li>
                <li class="<?=$dasboard_k1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Debit Note',['/seaexport/debitnote/',]);?></li>
                <li class="<?=$dasboard_l1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Credit Note',['/seaexport/creditnote/',]);?></li>
              </ul>
            </li>

            <li class="<?=$dasboard_m.$dasboard_n.$dasboard_o.$dasboard_q1.$dasboard_q2.$dasboard_q3.$dasboard_r1.$dasboard_r2.$dasboard_r3.$dasboard_s1.$dasboard_t1.$dasboard_u1?> treeview">
        <?php echo Html::a('<i class="fa fa-anchor"></i> <span>Sea Import</span><i class="fa fa-angle-left pull-right"></i>',['#',]);?>
              
              <ul class="treeview-menu">
                <li class="<?=$dasboard_m?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation',['/seaimport/quotation/',]);?></li>
                <li class="<?=$dasboard_n.$dasboard_o?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation Detail',['/seaimport/quotation/',]);?></li>
                <li class="<?=$dasboard_q1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Bill of Landing',['/seaimport/billlanding/',]);?></li>
                <li class="<?=$dasboard_q2.$dasboard_q3?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Bill of Landing Detail',['/seaimport/billlanding/',]);?></li>
                <li class="<?=$dasboard_r1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet',['/seaimport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_r2.$dasboard_r3?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet Detail',['/seaimport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_s1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Invoice',['/seaimport/invoice/',]);?></li>
                <li class="<?=$dasboard_t1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Debit Note',['/seaimport/debitnote/',]);?></li>
                <li class="<?=$dasboard_u1?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Credit Note',['/seaimport/creditnote/',]);?></li>
              </ul>
            </li>

            <li class="<?=$air_a.$air_b.$air_c.$air_d.$air_e.$dasboard_q21.$dasboard_r21.$dasboard_r22.$dasboard_s21.$dasboard_t21.$dasboard_u21?> treeview">
        <?php echo Html::a('<i class="fa fa-plane"></i> <span>Air Export</span><i class="fa fa-angle-left pull-right"></i>',['#',]);?>
              
              <ul class="treeview-menu">
                <li class="<?=$air_a?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation',['/airexport/quotation/',]);?></li>
                <li class="<?=$air_b.$air_c?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation Detail',['/airexport/quotation/',]);?></li>
                <li class="<?=$air_d?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Shipping Instruction',['/airexport/shippinginstruction/',]);?></li>
                <li class="<?=$air_e?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> H A W B',['/airexport/billlanding/',]);?></li>
                <li class="<?=$dasboard_q21?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> H A W B Detail',['/airexport/billlanding/',]);?></li>
                <li class="<?=$dasboard_r21?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet',['/airexport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_r22?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet Detail',['/airexport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_s21?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Invoice',['/airexport/invoice/',]);?></li>
                <li class="<?=$dasboard_t21?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Debit Note',['/airexport/debitnote/',]);?></li>
                <li class="<?=$dasboard_u21?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Credit Note',['/airexport/creditnote/',]);?></li>
              </ul>
            </li>

			
		<li class="<?=$air_a22.$air_b22.$air_d.$air_e22.$dasboard_q22.$dasboard_r31.$dasboard_r32.$dasboard_s31.$dasboard_t31.$dasboard_u31?> treeview">
        <?php echo Html::a('<i class="fa fa-plane"></i> <span>Air Import</span><i class="fa fa-angle-left pull-right"></i>',['#',]);?>
              
              <ul class="treeview-menu">
                <li class="<?=$air_a22?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation',['/airimport/quotation/',]);?></li>
                <li class="<?=$air_b22?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Quotation Detail',['/airimport/quotation/',]);?></li>
                <li class="<?=$air_e22?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> H A W B',['/airimport/billlanding/',]);?></li>
                <li class="<?=$dasboard_q22?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> H A W B Detail',['/airimport/billlanding/',]);?></li>
                <li class="<?=$dasboard_r31?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet',['/airimport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_r32?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Jobs Sheet Detail',['/airimport/jobsheet/',]);?></li>
                <li class="<?=$dasboard_s31?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Invoice',['/airimport/invoice/',]);?></li>
                <li class="<?=$dasboard_t31?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Debit Note',['/airimport/debitnote/',]);?></li>
                <li class="<?=$dasboard_u31?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Credit Note',['/airimport/creditnote/',]);?></li>
              </ul>
            </li>

			
			
			
            <li class="<?=$report_a.$report_b.$report_c.$report_d.$report_e?> treeview">
        <?php echo Html::a('<i class="fa fa-anchor"></i> <span>Report</span><i class="fa fa-angle-left pull-right"></i>',['#',]);?>
              
              <ul class="treeview-menu">
                <li class="<?=$report_a?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Invoice Report',['/report/invoice/',]);?></li>
                <li class="<?=$report_b?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Payment Report',['/report/payment/',]);?></li>
                <li class="<?=$report_c?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Container Report',['/report/billlandingdetail/',]);?></li>
                <li class="<?=$report_d?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Invoice Detail Report',['/report/invoicedetail/',]);?></li>
                <li class="<?=$report_e?>"><?php echo Html::a('<i class="fa fa-circle-o"></i> Payment Detail Report',['/report/paymentdet/',]);?></li>
              </ul>
            </li>
			
            
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <?= $content ?>
		</section>
    </div>
	
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
		  <b>Version</b> 2.3.0
		</div>
		<strong>Copyright &copy; 2015-2016 <a href="http://kuantumavia.com">KUANTUM AVIA TRANSINDO</a>.</strong> All rights reserved.
	</footer>
	
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->	
</div>

<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
