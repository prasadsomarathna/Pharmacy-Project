<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <script language="javascript" type="text/javascript">


    </script>
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main System</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MANAGE</li>
        
        <li><a href="neworder.php"><i class="fa fa-plus"></i> <span>New Order</span></a></li>
        <li><a href="cancelorder.php"><i class="fa fa-remove"></i> <span>Cancel Order</span></a></li>
          <li><a href="AddPackDetails.php"><i class="fa fa-save"></i> <span>Add Pack Details</span></a></li>
          <li><a href="PackDetailsUpdate.php"><i class="fa fa-cloud-upload"></i> <span>Update Pack Details</span></a></li>
        <li class="header">Customer Registration</li>
        <li><a href="customer_registration.php"><i class="fa fa-address-book-o"></i> <span>Register</span></a></li>



          <li class="treeview">
              <a href="#">
                  <i class="fa fa-file-excel-o"></i>
                  <span>Reports</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="https://docs.google.com/spreadsheets/d/172d9N_TkK_jj-MYLmNlJam6Uf3BKgUHwRxuZMpso8Oc/edit#gid=0" target="_blank"><i class="fa fa-area-chart"></i> <span>Billing Summary</span></a></li>


                  <li><a href="https://docs.google.com/spreadsheets/d/1VAN7MLeQ81JmvQSJzZBE9_yrrTPAzuJbvZ4GMb6EDOI/edit#gid=0" target="_blank"><i class="fa fa-asterisk"></i> <span>Billing Details</span></a></li>
              </ul>
          </li>


      </ul>
    </section>
    <!-- /.sidebar -->

  </aside>