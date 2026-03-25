
         var sidebarOpen = false;
         var sidebar = document.getElementById("sidebar");

         function openSidebar() {
             if (!sidebarOpen) {
                 sidebar.classList.add("sidebar-responsive");
                 sidebarOpen = true;
             }
         }

    //close sidebar on mobile view 

     function closeSidebar() {
      if (sidebarOpen == true) {
          sidebar.classList.remove("sidebar-responsive");
          sidebarOpen = false;
      }
     }
