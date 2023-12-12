<div class="col-lg-3 sidebar">
    <div class="card">
    <% if $isUserAdmin %>
        <div class="list-group">
            <a href="{$Top.BaseHref}dashboard/" class="list-group-item list-group-item-action" aria-current="true">
                <i class="fa-solid me-2 fa-house-user"></i>Dashboard
            </a>
            <a href="{$Top.BaseHref}dashboard/teachers/" class="list-group-item list-group-item-action">
                <i class="fa-sharp fa-solid me-2 fa-person-chalkboard"></i>Teachers
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
            <a href="{$TopBaseURL}Security/logout" class="list-group-item list-group-item-action">
                <i class="fa-solid me-2 fa-right-to-bracket fa-rotate-180"></i>Logout
            </a>
        </div>
    <% end_if %>

    <% if $isUserMember %>
        <div class="list-group">
            <a href="{$Top.BaseHref}dashboard/" class="list-group-item list-group-item-action" aria-current="true">
                <i class="fa-solid me-2 fa-house-user"></i>Dashboard
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
            <a href="{$Top.BaseHref}dashboard/profile" class="list-group-item list-group-item-action">
                <i class="fa-solid me-2 fa-user"></i>My Profile
            </a>
            <a href="{$TopBaseURL}Security/logout" class="list-group-item list-group-item-action">
                <i class="fa-solid me-2 fa-right-to-bracket fa-rotate-180"></i>Logout
            </a>
        </div>
    <% end_if %>
    </div>
</div>