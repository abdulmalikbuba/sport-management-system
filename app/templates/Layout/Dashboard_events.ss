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
                <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid me-2 fa-plus"></i>Add Events
                </button>

                <p>View all upcoming and previous events.</p>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add an Event</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        $eventForm
                    </div>
                    <%-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --%>
                    </div>
                </div>
                </div>
                <% include AlertBar %>
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
                        <% loop $Events %>
                            <tr>
                                <td>$Title</td>
                                <td>$Date.Nice</td>
                                <td>$Venue</td>
                                <td>
                                    <a href="dashboard/event-detailpage/{$ID}" class="btn btn-sm btn-primary">
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
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>