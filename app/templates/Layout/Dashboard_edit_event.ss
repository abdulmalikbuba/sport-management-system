<!-- Content wrapper -->
<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5 class="text-uppercase">$PageTitle</h5>
                    <hr>
                </div>


                <% include AlertBar %>

                <% with $EditEvent %>
                   <form action="{$BaseHref}dashboard/doEditEvent" method="post" class="row g-3">
                        
                        <input type="hidden" name="ID" value="$ID">
                        <div class="col-7">
                            <label for="inputEmail4" class="form-label">Title</label>
                            <input type="text" value="$Title" class="form-control" name="Title" id="inputEmail4">
                        </div>
                        <div class="col-7">
                            <label for="inputEmail4" class="form-label">Date</label>
                            <input type="date" value="$Date" class="form-control" name="Date" id="inputEmail4">
                        </div>

                        <div class="col-7">
                            <label for="inputEmail4" class="form-label">Venue</label>
                            <input type="text" value="$Venue" class="form-control" name="Venue" id="inputEmail4">
                        </div>
                        
                        <div class="col-7">
                            <button type="submit" name="action_doEditEvent" class="btn btn-success">Update</button>
                        </div>
                    </form>
                <% end_with %>

                <a href="{$BaseHref}dashboard/events/" class="text-decoration-none">
                    <i class="fa-solid me-1 mt-3 fa-arrow-left"></i>Go Back
                </a>
               
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>