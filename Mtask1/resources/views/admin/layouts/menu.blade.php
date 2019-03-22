<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('design/adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{admin()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
       
        
        <li class=" treeview {{active_menu('admin')[0]}}">
          <a href="{{aurl('')}}">
            <i class="fa fa-home"></i> <span>{{trans('admin.dashboard')}}</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          
        </li>

        <li class=" treeview {{active_menu('admin')[0]}}">
          <a href="{{aurl('setting')}}">
            <i class="fa fa-cog"></i> <span>{{trans('admin.settings')}}</span>
            <span class="pull-right-container">
              
            </span>
          </a>
         
        </li>
        <li class=" treeview {{active_menu('categories')[0]}}">
          <a href="{{aurl('category/create')}}">
            <i class="fa fa-list"></i> <span>{{trans('admin.categories')}}</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu"style="{{active_menu('categories')[1]}}">
            <li class=""><a href="{{aurl('category')}}"><i class="fa fa-eye"></i>{{trans('admin.show_cat')}}</a></li>
            <li class=""><a href="{{aurl('category/create')}}"> <i class="fa fa-plus"></i>{{trans('admin.add_cat')}}</a></li>
          </ul>
        </li>
       
        <li class=" treeview {{active_menu('news')[0]}}">
          <a href="{{aurl('news/create')}}">
            <i class="fa fa-newspaper"></i> <span>{{trans('admin.news')}}</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu"style="{{active_menu('news')[1]}}">
            <li class=""><a href="{{aurl('news')}}"><i class="fa fa-eye"></i>{{trans('admin.show_news')}}</a></li>
            <li class=""><a href="{{aurl('news/create')}}"> <i class="fa fa-plus"></i>{{trans('admin.add_news')}}</a></li>
          </ul>
        </li>
        <li class=" treeview {{active_menu('admin')[0]}}">
          <a href="{{{url('admin/logout')}}}}">
            <i class="fa fa-sign-out"></i> <span>{{trans('admin.logout')}}</span>
            
          </a>
          
        </li>

       
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>