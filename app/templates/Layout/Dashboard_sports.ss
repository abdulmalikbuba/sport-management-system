<!-- Content wrapper -->
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
                    <i class="fa-solid me-2 fa-plus"></i>Add Sports
                </button>
                
                <p>View all sporting events or activities.</p>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sports / Athletics</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            $addSportsForm
                        </div>
                    </div>
                </div>
                </div>

                <% include AlertBar %>

                <!-- table -->
                <table id="myTable" class="table hover text-center table-responsive-sm table-sm" >
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Players</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <% loop Sports %>
                        <tr>
                            <td>$ID</td>
                            <td>$Title</td>
                            <td>$Athletes.count</td>
                            <td>
                                <a href="dashboard/sports-detailpage/{$ID}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <%-- <a href="dashboard/edit-product/{$ID}" class="btn btn-sm btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </a> --%>
                                <a href="dashboard/delete-sport/{$ID}" class="btn btn-sm btn-danger">
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