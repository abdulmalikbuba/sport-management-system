<!-- Content wrapper -->
<% if $isUserAdmin %>
<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                    <% with $CurrentUser %>
                    <h6>Welcome $FirstName $Surname!</h6>
                    <% end_with %>
                </div>

                <div class="row pt-2">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="{$BaseHref}dashboard/students/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-success">
                            <div class="card-body">
                                <i class="fa-sharp fa-solid fa-xl me-1 fa-users"></i>
                                Students
                                <br>
                                <h4 class="fw-bold">$TotalStudents</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="{$BaseHref}dashboard/teachers/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-primary">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-person-chalkboard"></i>
                                Teachers
                                <br>
                                <h4 class="fw-bold">$TotalTeachers</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="{$BaseHref}dashboard/events/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-secondary">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-film"></i>
                                Events
                                <br>
                                <h4 class="fw-bold">$TotalEvents</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="{$BaseHref}dashboard/sports/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-warning">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-volleyball"></i>
                                Sports
                                <br>
                                <h4 class="fw-bold">$TotalSports</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <%-- <div class="col-lg-3 col-md-3 col-sm-12">
                        <a href="{$BaseHref}dashboard/#" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-info">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-award"></i>
                                Awards
                                <br>
                            </div>
                        </div>
                        </a>
                    </div> --%>
                    
                </div>

                <div class="row pt-4">
                    <h5>Upcoming Events</h5>
                    <% if $UpcomingEvents %>
                        <p>View upcoming events.</p>
                        <table id="myTable" class="table hover table-responsive-sm table-sm" >
                        <thead>
                            <tr>
                            <th>Event Title</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <% loop $UpcomingEvents.Sort(Created,DESC) %>
                                <tr>
                                    <td>$Title</td>
                                    <td>$Date.Nice</td>
                                    <td>$Venue</td>
                                    <td>
                                        <a href="dashboard/event_detailpage/{$ID}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="dashboard/edit-event/{$ID}" class="btn btn-sm btn-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="dashboard/delete-event/{$ID}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash "></i>
                                        </a>
                                    </td>
                                </tr>
                            <% end_loop %>
                        </tbody>
                    </table>
                    <% else %>
                        <%-- <p>No upcoming events available at the moment.</p> --%>
                        <div class="container">
                            <div class="alert alert-primary my-3" role="alert">
                                No upcoming events available at the moment!!
                            </div>
                        </div>
                    <% end_if %>
                    <!-- table -->
                    
                </div>
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>
<% end_if %>

<% if $isUserMember %>
<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                    <% with $CurrentUser %>
                    <h6>Welcome $FirstName $Surname!</h6>
                    <% end_with %>
                </div>

                <div class="row pt-2">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{$BaseHref}dashboard/students/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-success">
                            <div class="card-body">
                                <i class="fa-sharp fa-solid fa-xl me-1 fa-users"></i>
                                Students
                                <br>
                                <h4 class="fw-bold">$TotalStudents</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{$BaseHref}dashboard/events/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-secondary">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-film"></i>
                                Events
                                <br>
                                <h4 class="fw-bold">$TotalEvents</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{$BaseHref}dashboard/sports/" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-warning">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-volleyball"></i>
                                Sports
                                <br>
                                <h4 class="fw-bold">$TotalSports</h4>
                            </div>
                        </div>
                        </a>
                    </div>
                    <%-- <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="{$BaseHref}dashboard/#" class="text-decoration-none">
                        <div class="card card-wrapper mb-2 border-info">
                            <div class="card-body">
                                <i class="fa-solid fa-xl me-1 fa-award"></i>
                                Awards
                                <br>
                            </div>
                        </div>
                        </a>
                    </div> --%>
                    
                </div>

                <div class="row pt-4">
                    <h5>Upcoming Events</h5>

                    <% if $UpcomingEvents %>
                        <p>View upcoming events.</p>
                    <% else %>
                        <p>No upcoming events available at the moment.</p>
                    <% end_if %>


                    <!-- table -->
                    <table id="myTable" class="table hover table-responsive-sm table-sm" >
                        <thead>
                            <tr>
                            <th>Event Title</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <% loop $UpcomingEvents %>
                                <tr>
                                    <td>$Title</td>
                                    <td>$Date.Nice</td>
                                    <td>$Venue</td>
                                    <td>
                                        <a href="dashboard/event-detailpage/{$ID}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="dashboard/edit-student/{$ID}" class="btn btn-sm btn-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="dashboard/delete-student/{$ID}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash "></i>
                                        </a>
                                    </td>
                                </tr>
                            <% end_loop %>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>
<% end_if %>