<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                </div>

                <%-- <p>View ...</p> --%>
                <% with Event %>
                <div class="card card-wrapper mt-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Information</h5>
                            <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-event/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a>
                        </div>
                        
                        <div class="col-5">
                            <li><span class="text-secondary fw-medium">Event Title</span></li>
                            <h6>$Title</h6>
                        </div>
                        <div class="col-5">
                            <li><span class="text-secondary fw-medium">Event Venue</span></li>
                            <h6>$Venue</h6>
                        </div>
                        <div class="col-5">
                            <li><span class="text-secondary fw-medium">Event Date</span></li>
                            <h6>$Date.Nice</h6>
                        </div>
                        <div class="col-5">
                            <li><span class="text-secondary fw-medium">Description</span></li>
                            <h6>$Description</h6>
                        </div>
                                
                    </div> 
                </div>
                <a href="{$BaseHref}dashboard/events/" class="text-decoration-none">
                    <i class="fa-solid me-1 fa-arrow-left"></i>Go Back
                </a>
                <% end_with %>
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>