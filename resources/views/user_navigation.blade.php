

 @auth

  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        
       <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
         
          <a class="link-secondary" href="/plan_meeting_view" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
    <!--     <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="/plan_meeting_view">
              <span data-feather="file-text"></span>
              Lists
            </a>
          </li>
         
          
          
        </ul>  -->
        
        <ul class="nav flex-column">
          
          
          
          <li class="nav-item">
          @if ($article_name != "assign_task")

            <a class="nav-link" href="/assign_task_view">
            @else
            <a class="nav-link active"  aria-current="page" href="/assign_task_view">
            @endif
              <span data-feather="file"></span>
            Work Assigned
            </a>
          </li>
        
          <li class="nav-item">
          @if ($article_name != "change_password")
            <a class="nav-link" href="/edit_password">
            @else
            <a class="nav-link active"  aria-current="page" href="/edit_password">
            @endif
              <span data-feather="layers"></span>
              Change Password
            </a>
          </li>
        </ul>

      </div>
    </nav>  @endauth