<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../images/user.png" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo ucfirst($username); ?></p>
                  <p class="designation">Administrator</p>
                </div>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
           <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Facility</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="a_facility.php">Add Facility</a></li>
                  <li class="nav-item"> <a class="nav-link" href="m_facility.php">Manage Facility</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <span class="menu-title">Room Category</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="a_category.php">Add Category</a></li>
                  <li class="nav-item"> <a class="nav-link" href="m_category.php">Manage Category</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">New Room</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="a_room.php">Add Room</a></li>
                  <li class="nav-item"> <a class="nav-link" href="m_room.php">Manage Room</a></li>
                </ul>
              </div>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="reservation.php">
                <span class="menu-title">Reservation</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <span class="menu-title">Booking</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="a_booking.php">All Booking</a></li>
                  <li class="nav-item"> <a class="nav-link" href="n_reservation.php">Reservations</a></li>
                  <li class="nav-item"> <a class="nav-link" href="n_booking.php">New Booking</a></li>
                  <li class="nav-item"> <a class="nav-link" href="v_checkin.php">View Checked In</a></li>
                  <li class="nav-item"> <a class="nav-link" href="v_checkout.php">View Check Out</a></li>
                </ul>
              </div>
            </li>
                        <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
                <span class="menu-title">Report</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="d_report.php">Daily</a></li>
               <li class="nav-item"> <a class="nav-link" href="w_report.php">Weekly</a></li>

                  <li class="nav-item"> <a class="nav-link" href="m_report.php">Monthly</a></li>
                  <li class="nav-item"> <a class="nav-link" href="y_report.php">Yearly</a></li>
                </ul>
              </div>
            </li>

            
             
            
            
           
          </ul>
        </nav>