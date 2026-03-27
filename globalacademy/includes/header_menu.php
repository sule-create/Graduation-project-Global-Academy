
        <!-- Header -->
        <header class="header">

            <div class="menu-icon" style="cursor: pointer;" onclick="openSidebar()">
                <span class="material-icons-sharp">menu</span>
            </div>

            <div class="header-left">
                <span><i class='bx bx-calendar'></i> <span id="datetime" style="font-weight:500;"></span></span>
            </div>

            <div class="header-right">

                <div class="btn-group" style="margin-top: -5px; ">
                    <span type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                        <?php
                            echo '<img src="' . $userphoto . '" style="width: 30px;height:30px; border-radius: 50%;" id="headerPic">';
                        ?>
                    </span>
                    <ul class="dropdown-menu profileDropD dropdown-menu-end">
                        <li style="padding: 10px;">
                            <span > 
                                <?php
                                    echo '<img src="' . $userphoto . '" style="width: 30px;height:30px; border-radius: 50%;" id="headerPic">';
                                ?>
                                <span style="font-size: 14px; font-weight: 500;"><?php echo $firstname.' '.$lastname; ?></span>
                            </span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="../profile/"><i class='bx bxs-user'></i> Profile</a>
                        </li>
                        <li><a class="dropdown-item" style="color: #ff0000;" href="../../controller/session/logout.php" id="logoutbtn"><i class='bx bx-log-out-circle bx-rotate-90' ></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!--End Header -->


        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand" align="center">
                    <img src="../../assets/images/website_images/Global.png" style="width: 50%;" alt="GA">
                </div>
                <div class="close-icon" style="cursor: pointer;" onclick="closeSidebar()">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <ul class="sidebar-List">
                <li class="sidebar-list-item">
                    <a href="<?php echo $defaultUrl.'/'.$user_type.'/home'; ?>">
                        <i class='fas fa-tachometer-alt' style="margin-right: 10px;"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php

                    if($user_type == 'hod')
                    {
                        echo '<li class="sidebar-list-item">
                                <a href="'.$defaultUrl.$user_type.'/instructors">
                                    <i class=\'fas fa-chalkboard-teacher\' style="margin-right: 10px;"></i>
                                    <span class="links_name">Instructor</span>
                                </a>
                            </li>';
                    }
                    else{

                    }

                    if($user_type == 'hod')
                    {
                        echo '<li class="sidebar-list-item">
                                <a href="'.$defaultUrl.$user_type.'/students">
                                    <i class=\'fas fa-user-graduate\' style="margin-right: 10px;"></i>
                                    <span class="links_name">Student</span>
                                </a>
                            </li>';
                    }
                    elseif($user_type == 'instructor'){
                        echo '<li class="sidebar-list-item">
                                <a href="'.$defaultUrl.$user_type.'/students">
                                    <i class=\'fas fa-user-graduate\' style="margin-right: 10px;"></i>
                                    <span class="links_name">My Student</span>
                                </a>
                            </li>';
                    }
                    else{

                    }


                    if($user_type == 'hod' || $user_type == 'instructor')
                    {
                        echo '<li class="sidebar-list-item">
                                <a href="'.$defaultUrl.$user_type.'//courses">
                                    <i class=\'fas fa-book\' style="margin-right: 10px;"></i>
                                    <span class="links_name">Courses</span>
                                </a>
                            </li>';
                    }
                    else{
                        echo '<li class="sidebar-list-item">
                                <a href="'.$defaultUrl.$user_type.'//courses">
                                    <i class=\'fas fa-book\' style="margin-right: 10px;"></i>
                                    <span class="links_name">My Courses</span>
                                </a>
                            </li>';
                    }

                ?>
                
                <li class="sidebar-list-item">
                    <a href="<?php echo $defaultUrl.$user_type;?>/course-schedule">
                        <i class="fas fa-calendar-alt" style="margin-right: 10px;"></i>
                        <span class="links_name">Course Schedule</span>
                    </a>
                </li>
            </ul>
        </aside>

        <script>

            $(document).ready(function() {
                // Function to update the current date and time
                function updateDateTime() {
                    var now = new Date();
                    var date = now.toDateString();
                    var time = now.toLocaleTimeString();
                    $('#datetime').html(date + ' ' + time);
                }

                // Initial call to display current date and time
                updateDateTime();

                // Call the function every second to update the time
                setInterval(updateDateTime, 1000);
            });
        </script>