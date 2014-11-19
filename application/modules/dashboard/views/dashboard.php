<!DOCTYPE html>
<html>
    <head>
      <?php $this->load->view('user/head');?>  
    </head>
    <body class="public">
        <?php $this->load->view('user/top');?>
        <!-- content -->
            <div class="heading">
                <div class="row">
                    <h1><img src="assets/images/icons/branch-icon.png" /> Dashboard (September)</h1>
                </div>
            </div>

            <section class="row tmargin5">

                <div class="col-xs-9 charts">

                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                        <li class="active"><a href="#dashboard" role="tab" data-toggle="tab">Dashboard</a></li>
                       <!-- <li><a href="#health-monitor" role="tab" data-toggle="tab">Health Monitor</a></li> -->
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="dashboard">
                            <h2>Sales vs Quota</h2>
                            <div class="chartwrap">
                                <h3>Today</h3>
                                <p class="label">Sales</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                      60%
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <p class="label">Quota</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                      80%
                                    </div>
                                </div>

                                <h3>This Week</h3>
                                <p class="label">Sales</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                      60%
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <p class="label">Quota</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                      80%
                                    </div>
                                </div>

                                <h3>This Month</h3>
                                <p class="label">Sales</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                      60%
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <p class="label">Quota</p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                      80%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="health-monitor">

                        </div>
                    </div>

                </div>

                <div class="col-xs-3">
                        <div class="recent">
                            <h2>RECENT ACTIVITIES</h2>

                            <div class="activity">
                                <p><img src="<?php echo base_url('assets/images/icons/closed-icon.png'); ?>" /> Admin admin has just <strong>closed today.</strong></p>
                                <div class="clear"></div>
                                <p class="rightcol time">3 minutes ago</p>
                            </div>
                            <div class="activity">
                                <p><img src="<?php echo base_url('assets/images/icons/void-icon.png'); ?>" /> Envirotest Inc. - Meycauayan B sent a request for void.</p>
                                <div class="clear"></div>
                                <p class="rightcol time">5 minutes ago</p>
                            </div>
                            <div class="activity">
                                <p><img src="<?php echo base_url('assets/images/icons/sales-icon.png'); ?>" /> Envirotest Inc. - Meycauayan B earns P180.00 sales.</p>
                                <div class="clear"></div>
                                <p class="rightcol time">5 minutes ago</p>
                            </div>
                        </div>
                </div>

            </section>
        <!--/ content -->

        <script>
          $(function () {
            $('#myTab a:first').tab('show') // Select first tab
          })
        </script>


        
        <?php $this->load->view('user/bottom');?>
    </body>
</html>
