<!-- Content wrapper -->
<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5 class="text-uppercase">$PageTitle</h5>
                    <hr>
                </div>

                <!-- Button trigger modal -->
                <%-- <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid me-2 fa-plus"></i>Add Student / Athlete
                </button> --%>

                <p>View all players / athletes</p>

                <!-- Modal -->
                <%-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add an Athlete</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            $athleteRegistrationForm
                        </div>
                    </div>
                </div>
                </div> --%>
                <% include AlertBar %>

                <!-- table -->
                <table id="myTable" class="table hover table-responsive-sm table-sm" >
                    <thead>
                        <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Program</th>
                        <th>Class</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <% loop $Athletes %>
                            <tr>
                                <td>
                                <% if $Photo %>
                                    <img src="$Photo.URL" style="height:40px;" alt="" />
                                    <% else %>
                                    <img src="$resourceURL('app/images/img/avatar.png')" style="height:40px;" alt="" />
                                <% end_if %>
                                    
                                </td>
                                <td>$Name</td>
                                <td>$Program</td>
                                <td>$Class</td>
                                <td>
                                    <a href="dashboard/student-details/{$ID}" class="btn btn-sm btn-primary">
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

                <a href="{$BaseHref}dashboard/sports/" class="text-decoration-none">
                    <i class="fa-solid me-1 fa-arrow-left"></i>Go Back
                </a>
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>