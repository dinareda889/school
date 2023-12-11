  <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar nav-compact flex-column nav-flats" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item" >
            <a href="<?=site_url('Dashboard')?>" class="nav-link <?=$this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? "active" : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
            </a>
          </li>
            
  

    
      <li class="nav-item has-treeview  <?=$this->uri->segment(1) == 'Activity'  ?
    "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(1) == 'Activity'  ?
        "active " : '' ?> ">
        <i class="nav-icon fas fa-handshake"></i>
        <p>Activity<i class="fas fa-angle-left right"></i>
		    <span class="badge badge-warning right"></span>
		</p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
            <a href="<?=site_url('Activity/calls')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Activity' && $this->uri->segment(2) == 'calls' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Calls</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=site_url('Activity/mettings')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Activity'  && $this->uri->segment(2) == 'mettings' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Metting</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="<?=site_url('Activity/activity_list')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Activity'  && $this->uri->segment(2) == 'activity_list' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>List Activity</p>
            </a>
        </li>
      
    </ul>
</li> 
 
 

 
 
   <li class="nav-item has-treeview  <?=$this->uri->segment(1) == 'Tasks'  ?
    "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(1) == 'Tasks'  ?
        "active " : '' ?> ">
        <i class="nav-icon fas fa-tasks"></i>
        <p>Tasks<i class="fas fa-angle-left right"></i>
		    <span class="badge badge-warning right"></span>
		</p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
            <a href="<?=site_url('Tasks')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Tasks' && $this->uri->segment(2) == ''   ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>My Tasks</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=site_url('Tasks/tasksdone')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Tasks'  && $this->uri->segment(2) == 'tasksdone' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Done Tasks</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="<?=site_url('Tasks/tasksdoing')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Tasks'  && $this->uri->segment(2) == 'tasksdoing' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Doing Tasks</p>
            </a>
        </li>
      
    </ul>
</li>   

    
    
         <li class="nav-item">
                <a href="<?=site_url('Brokers')?>" class="nav-link  <?=$this->uri->segment(1) == 'Brokers' ? "active" : '' ?> ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Brokers  <span class="badge badge-success right"><?=$this->fungsi->count_brokers(); ?></span>
                    </p>
                </a>
            </li>
    

         <li class="nav-item has-treeview  <?=$this->uri->segment(1) == 'Owners'  ?
    "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(1) == 'Owners'  ?
        "active " : '' ?> ">
  
        <i class="nav-icon fas fa-user-tie"></i>
        <p>Owner Management<i class="fas fa-angle-left right"></i>
		    <span class="badge badge-danger right"><?=$this->fungsi->count_owners(); ?></span>
		</p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
            <a href="<?=site_url('Owners')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Owners' && $this->uri->segment(2) == '' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Owner </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=site_url('Owners/manage')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Owners'  && $this->uri->segment(2) == 'manage' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Owner Management </p>
            </a>
        </li>
        
           <li class="nav-item">
            <a href="<?=site_url('Owners/search')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Owners'  && $this->uri->segment(2) == 'search' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>	Search Owner </p>
            </a>
        </li>
        
              <li class="nav-item">
            <a href="<?=site_url('Owners/ownerproperty')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Owners'  && $this->uri->segment(2) == 'ownerproperty' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>	Property Owners </p>
            </a>
        </li> 
       
 
        

    </ul>
</li> 
 
       
            
  <li class="nav-item has-treeview  <?=$this->uri->segment(1) == 'Property'  ?
    "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(1) == 'Property'  ?
        "active " : '' ?> ">
        <i class="nav-icon fas fa-building"></i>
        <p>Property<i class="fas fa-angle-left right"></i>
		    <span class="badge badge-warning right"><?=$this->fungsi->count_all_propery(); ?></span>
		</p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
            <a href="<?=site_url('Property')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Property' && $this->uri->segment(2) == '' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Property</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=site_url('Property/manage')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Property'  && $this->uri->segment(2) == 'manage' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Property</p>
            </a>
        </li>
    </ul>
</li> 

  <li class="nav-item has-treeview  <?=$this->uri->segment(1) == 'Submitproperty'  ?
    "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(1) == 'Submitproperty'  ?
        "active " : '' ?> ">
  
        <i class="nav-icon fas fa-list-ol"></i>
        <p>Submit Property<i class="fas fa-angle-left right"></i>
		    <span class="badge badge-primary right"><?=$this->fungsi->count_submit_propery(); ?></span>
		</p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
            <a href="<?=site_url('Submitproperty')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Submitproperty' && $this->uri->segment(2) == '' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Open Submit Property </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=site_url('Submitproperty')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Submitproperty'  && $this->uri->segment(2) == 'manage' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Closed Submit Property </p>
            </a>
        </li>
    </ul>
</li> 

            


<li class="nav-item has-treeview  <?=$this->uri->segment(1) == 'Expense' || $this->uri->segment(1) == 'bills' || $this->uri->segment(2) == 'sarf_bills' ?
    "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(1) == 'Expense' || $this->uri->segment(1) == 'bills' || $this->uri->segment(2) == 'sarf_bills'?
    
        "active " : '' ?> ">
        <i class="fas fa-money-bill"></i>

        <p>Expenses<i class="fas fa-angle-left right"></i></p>
    </a>
    <ul class="nav nav-treeview">

     <!--<li class="nav-item">
            <a href="<?=site_url('Expense/bnod')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Expense' && $this->uri->segment(2) == 'bnod' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Bnod Setting</p>
            </a>
        </li>-->


        <li class="nav-item">
            <a href="<?=site_url('Expense/bills')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Expense' && $this->uri->segment(2) == 'bills' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Bills</p>
            </a>
        </li>
    
    <!--
       <li class="nav-item">
            <a href="<?=site_url('Report/sarf_bills')?>"
               class="nav-link <?=$this->uri->segment(1) == 'Report' && $this->uri->segment(2) == 'sarf_bills' ?  "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>All Expense Pills</p>
            </a>
        </li>-->
    
    </ul>
</li>





<li class="nav-item has-treeview  <?=$this->uri->segment(2) == 'Category' ||   $this->uri->segment(2) == 'News' ||   $this->uri->segment(1) == 'Articles'  ||   $this->uri->segment(1) == 'Banners'   ?
                                     "menu-open " : '' ?> ">
    <a href="#" class="nav-link <?=$this->uri->segment(2) == 'Category' ||   $this->uri->segment(2) == 'News' ||   $this->uri->segment(1) == 'Articles' ||   $this->uri->segment(1) == 'Banners'   ?
        "active " : '' ?> ">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>
   News And Articles
    <i class="fas fa-angle-left right"></i>
    <span class="badge badge-success right"> 4</span>
  </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?=site_url('news/Category')?>" class="nav-link <?=$this->uri->segment(2) == 'Category' ? "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Category News</p>
            </a>
        </li>
    
 
       <li class="nav-item">
            <a href="<?=site_url('news/News')?>" class="nav-link <?=$this->uri->segment(2) == 'News' ? "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>News</p>
            </a>
        </li>  
    
    
        <li class="nav-item">
            <a href="<?=site_url('Articles')?>" class="nav-link <?=$this->uri->segment(1) == 'Articles' ? "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Articles</p>
            </a>
        </li>  
 

        <li class="nav-item">
            <a href="<?=site_url('Banners')?>" class="nav-link <?=$this->uri->segment(1) == 'Banners' ? "active" : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Banners</p>
            </a>
        </li>  


    </ul>
</li>




<!--
<li class="nav-header">Settings</li>
<li class="nav-item">
    <a href="<?=site_url('User')?>" class="nav-link  <?=$this->uri->segment(1) == 'User' ? "active" : '' ?> ">
          <i class="fas fa-users"></i>
        <p>
        Users/Employees  <span class="badge badge-warning right"><?=$this->fungsi->count_users(); ?></span>
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?=site_url('Config_company')?>" class="nav-link  <?=$this->uri->segment(1) == 'Config_company' ? "active" : '' ?> ">
          <i class="fa fa-cog fa-fw"></i>
        <p>
        Configration 
        </p>
    </a>
</li>-->
        </ul>
      </nav>