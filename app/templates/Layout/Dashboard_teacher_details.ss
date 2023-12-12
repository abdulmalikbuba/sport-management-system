<div class="col-lg-9 page-content mb-4">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                </div>
                
                <% with $TeacherDetails %>
                    <div class="detail mt-3">
                        <div class="card card-wrapper">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="image">
                                    <% if $ProfilePhoto %>
                                        <img src="$ProfilePhoto.URL" style="height:150px;border-radius:10px;" alt="" />
                                        <% else %>
                                        <img src="$resourceURL('app/images/img/avatar.png')" style="height:150px;" alt="" />
                                    <% end_if %>
                                    </div>
                                    <div class="ms-5 content">
                                        <h4>$FirstName $Surname</h4>
                                        <h6 class="text-secondary fw-medium">$Sports.Title Coach</h6>
                                        <p class="text-body-secondary">$Program</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-wrapper mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Teacher's Information</h5>
                                    <%-- <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-student/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a> --%>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10">
                                        <div class="row">
                                        <% if $FirstName %>
                                        <div class="col-4">
                                            <span class="text-secondary fw-medium">Full Name</span>
                                            <h6>$FirstName $Surname</h6>
                                        </div>
                                        <% end_if %>
                                        <% if $Email %>
                                        <div class="col-4">
                                            <span class="text-secondary fw-medium">Email Address</span>
                                            <h6>$Email</h6>
                                        </div>
                                        <% end_if %>
                                        <% if $DateOfBirth %>
                                        <div class="col-4">
                                            <span class="text-secondary fw-medium">Date of Birth</span>
                                            <h6>$DateOfBirth.Nice</h6>
                                        </div>
                                        <% end_if %>
                                        
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <%-- <div class="card card-wrapper mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">School Information</h5>
                                    <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-student/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10">
                                        <div class="row">
                                        <div class="col-5">
                                            <span class="text-secondary fw-medium">Program</span>
                                            <h6>$Program</h6>
                                        </div>
                                        <div class="col-5">
                                            <span class="text-secondary fw-medium">Class</span>
                                            <h6>$Class</h6>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --%>


                        <div class="card card-wrapper mt-3 mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">Contact Information</h5>
                                    <%-- <a class="btn btn-sm btn-outline-secondary rounded-4 px-3" href="dashboard/edit-student/{$ID}" role="button">Edit<i class="fa-solid ms-2 fa-pencil"></i></a> --%>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10">
                                        <div class="row">
                                        <% if $Address %>
                                        <div class="col-5">
                                            <span class="text-secondary fw-medium">Address</span>
                                            <h6>$Address</h6>
                                        </div>
                                        <% end_if %>
                                        <% if $Telephonenumber %>
                                        <div class="col-5">
                                            <span class="text-secondary fw-medium">Phone</span>
                                            <h6>$Telephonenumber</h6>
                                        </div>
                                        <% end_if %>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{$BaseHref}dashboard/teachers/" class="text-decoration-none">
                            <i class="fa-solid me-1 mt-4 fa-arrow-left"></i>Go Back
                        </a>
                    </div>
                <% end_with %>
                
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>