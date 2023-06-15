<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><% if $MetaTitle %> $MetaTitle | <% else_if $PageTitle %> $PageTitle | <% else %> $Title | <% end_if %> $SiteConfig.Title</title>
    <% base_tag %>
    $MetaTags(false)
</head>
  <body>

    <% include DashboardNavbar %>
    
      <div class="offcanvas offcanvas-start offcanvas-sm" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          
            <div class="list-group">
                <a href="{$Top.BaseHref}dashboard/" class="list-group-item list-group-item-action" aria-current="true">
                    <i class="fa-solid me-2 fa-house-user"></i>Dashboard
                </a>
                <a href="{$Top.BaseHref}dashboard/teachers/" class="list-group-item list-group-item-action">
                    <i class="fa-sharp fa-solid me-2 fa-users"></i>Teachers
                </a>
                <a href="{$Top.BaseHref}dashboard/students/" class="list-group-item list-group-item-action">
                    <i class="fa-sharp fa-solid me-2 fa-users"></i>Students
                </a>
                <a href="{$Top.BaseHref}dashboard/sports" class="list-group-item list-group-item-action">
                    <i class="fa-solid me-2 fa-volleyball"></i>Sports
                </a>
                <a href="{$Top.BaseHref}dashboard/events" class="list-group-item list-group-item-action">
                    <i class="fa-solid me-2 fa-film"></i>Events
                </a>
                <a href="{$TopBaseURL}Security/logout?BackURL=home" class="list-group-item list-group-item-action">
                    <i class="fa-solid me-2 fa-right-to-bracket fa-rotate-180"></i>logout
                </a>
              </div>
        </div>
      </div>

    <div class="container mt-3">
        <div class="row">
            <% include DashboardSidebar %>
    
            $Layout
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>