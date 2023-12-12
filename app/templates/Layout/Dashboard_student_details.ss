<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                </div>
                <a href="{$BaseHref}dashboard/students/" class="text-decoration-none">
                    <i class="fa-solid me-1 fa-arrow-left"></i>Back
                </a>
                <% with $AthleteDetails %>
                    <div class="detail mt-3">
                        <div class="card card-wrapper">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="image">
                                    <% if $Photo %>
                                        <img src="$Photo.URL" style="height:150px;border-radius:10px;" alt="" />
                                        <% else %>
                                        <img src="$resourceURL('app/images/img/avatar.png')" style="height:150px;" alt="" />
                                    <% end_if %>
                                    </div>
                                    <div class="ms-5 content">
                                        <h4>$Name</h4>
                                        <h6 class="text-secondary fw-medium">$Sports.Title</h6>
                                        <p class="text-body-secondary">$Program</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-wrapper mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Athlete's Information</h5>
                                    <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-student/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10">
                                        <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Full Name</span>
                                            <h6>$Name</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Email Address</span>
                                            <h6>$EmailAddress</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Date of Birth</span>
                                            <h6>$DateOfBirth.Nice</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Age</span>
                                            <h6>$Age</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Height</span>
                                            <h6>$Height</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Weight</span>
                                            <h6>$Weight</h6>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-wrapper mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">School Information</h5>
                                    <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-student/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10">
                                        <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <span class="text-secondary fw-medium">Program</span>
                                            <h6>$Program</h6>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <span class="text-secondary fw-medium">Class</span>
                                            <h6>$Class</h6>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <span class="text-secondary fw-medium">House</span>
                                            <h6>$House</h6>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card card-wrapper mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Contact Information</h5>
                                    <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-student/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10">
                                        <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Address</span>
                                            <h6>$Address</h6>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <span class="text-secondary fw-medium">Phone</span>
                                            <h6>$TelephoneNumber</h6>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <% end_with %>
                
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>