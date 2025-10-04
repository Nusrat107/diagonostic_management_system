     <div class="main-wrapper">
 <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
						 <li>
                            <a href="{{url('/admin/doctor')}}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>        
                             <li>
                            <a href="{{url('/admin/patient')}}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="{{url('/admin/appointment')}}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="{{url('/admin/doctorshedule')}}"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                         <li class="active">
                            <a href="{{url('/admin/depertment')}}"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                        </li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-user"></i> <span> Employees </span></a>
							<ul style="display: none;">
								<li><a href="{{url('/admin/employe')}}">Employees List</a></li>
								<li><a href="{{url('/admin/leave')}}">Leaves</a></li>
								<li><a href="{{url('/admin/holiday')}}">Holidays</a></li>
							</ul>
						</li>
                       
                        <li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{url('/admin/invoice')}}">Invoices</a></li>
								<li><a href="{{url('/admin/payment')}}">Payments</a></li>
								<li><a href="{{url('/admin/expense')}}">Expenses</a></li>
								<li><a href="{{url('/admin/taxes')}}">Taxes</a></li>
								<li><a href="{{url('/admin/provident')}}">Provident Fund</a></li>
							</ul>
						</li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{URL('/admin/sallary')}}"> Employee Salary </a></li>
                            </ul>
                         </li>
                    
                    <li>
                            <a href="{{url('/admin/chat')}}"><i class="fa fa-comments"></i> <span>Chat</span></a>
                        </li>
							
					<li class="submenu">
                            <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{url('/admin/voice-call')}}">Voice Call</a></li>
                                <li><a href="{{url('/admin/vedio-call')}}">Video Call</a></li>
                        
                            </ul>
                        </li>	
					
                    </ul>
                </div>
            </div>
        </div>
        