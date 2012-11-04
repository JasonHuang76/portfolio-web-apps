<script>
  $(document).ready(function(){
    $('#nav_dashboard').addClass('active');
  });
</script>

<div id="content">
  <div class="contentTop">
    <span class="pageTitle"><span class="icon-screen"></span>Dashboard</span>
    <ul class="quickStats">
        <li>
            <a href="" class="blueImg"><img src="<?php echo Helpers::path() ?>/images/icons/quickstats/plus.png" alt="" /></a>
            <div class="floatR"><strong class="blue">5489</strong><span>visits</span></div>
        </li>
        <li>
            <a href="" class="redImg"><img src="<?php echo Helpers::path() ?>/images/icons/quickstats/user.png" alt="" /></a>
            <div class="floatR"><strong class="blue">4658</strong><span>users</span></div>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
            <ul id="breadcrumbs" class="breadcrumbs">
                <li class="current"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        
        <div class="breadLinks">
            <ul>
                <li><a href="#" title=""><i class="icos-list"></i><span>Orders</span> <strong>(+58)</strong></a></li>
                <li><a href="#" title=""><i class="icos-check"></i><span>Tasks</span> <strong>(+12)</strong></a></li>
                <li class="has">
                    <a title="">
                        <i class="icos-money3"></i>
                        <span>Invoices</span>
                        <span><img src="<?php echo Helpers::path() ?>/images/elements/control/hasddArrow.png" alt="" /></span>
                    </a>
                    <ul>
                        <li><a href="#" title=""><span class="icos-add"></span>New invoice</a></li>
                        <li><a href="#" title=""><span class="icos-archive"></span>History</a></li>
                        <li><a href="#" title=""><span class="icos-printer"></span>Print invoices</a></li>
                    </ul>
                </li>
            </ul>
             <div class="clear"></div>
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">
      <ul class="middleNavR">
          <li><a href="#" class="tipN" original-title="Add a page"><img src="<?php echo Helpers::path() ?>/images/icons/middlenav/create.png" alt=""></a></li>
          <li><a href="#" class="tipN" original-title="Upload files"><img src="<?php echo Helpers::path() ?>/images/icons/middlenav/upload.png" alt=""></a></li>
          <li><a href="#" class="tipN" original-title="Add a post"><img src="<?php echo Helpers::path() ?>/images/icons/middlenav/add.png" alt=""></a></li>
      </ul>
    </div>
</div>