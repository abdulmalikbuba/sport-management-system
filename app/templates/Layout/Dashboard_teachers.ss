<!-- Content wrapper -->
<% if $isUserAdmin %>
<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid me-2 fa-plus"></i>Add Teachers / Coaches
                </button>

                <p>View all coaches.</p>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Teacher / Coach</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                $addTeacherForm
                            </div>
                        </div>
                    </div>
                </div>

                <% include AlertBar %>

                <!-- table -->
                <table id="myTable" class="table hover table-responsive-sm table-sm" >
                    <thead>
                        <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Sports</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <% loop $Teachers %>
                        <tr>
                            <td>
                            <% if $ProfilePhoto %>
                                <img src="$ProfilePhoto.URL" style="height:40px;" alt="" />
                                <% else %>
                                <img src="$resourceURL('app/images/img/1.png')" style="height:40px;" alt="" />
                            <% end_if %>
                            </td>
                            <td>$FirstName $Surname</td>
                            <td>$Sports.Title</td>
                            <td>
                                <a href="dashboard/teacher-details/{$ID}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="dashboard/delete_teacher/{$ID}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash "></i>
                                </a>
                            </td>
                        </tr>
                    <% end_loop %>
                        
                    </tbody>
                </table>
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
                    <h5>Error Page</h5>
                    <hr>
                </div>

                <h3 class="text-danger">Sorry!!!<br>You do not have access to view this page</h3>
                
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>
<% end_if %>