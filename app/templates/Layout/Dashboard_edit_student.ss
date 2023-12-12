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
                <div class="pt-2">
               <h6>Edit Athlete's Profile</h6>
                               <% include AlertBar %>

                <% with $EditAthlete %>
                   <form action="{$BaseHref}dashboard/doUpdate" method="post" class="row g-3">
                        
                        <input type="hidden" name="ID" value="$ID">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Name</label>
                            <input type="text" value="$Name" class="form-control" name="Name" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Date Of Birth</label>
                            <input type="date" value="$DateOfBirth" class="form-control" name="DateOfBirth" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email Address</label>
                            <input type="email" value="$EmailAddress" class="form-control" name="EmailAddress" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Gender</label>
                            <select id="inputState" name="Gender" class="form-select">
                            <% if $Gender %>
                                <option value="$Gender" name="Gender" selected>--$Gender--</option>
                            <% end_if %>
                                <option value="Male" name="Gender">Male</option>
                                <option value="Female" name="Gender">Female</option>
                                <option value="Other" name="Gender">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Class</label>
                            <input type="text" value="$Class" class="form-control" name="Class" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                           <label for="inputState" class="form-label">Program</label>
                            <select id="inputState" name="Program" class="form-select">
                            <% if $Program %>
                                <option value="$Program" name="Program" selected>$Program</option>
                            <% end_if %>
                                <option value="Business" name="Program">Business</option>
                                <option value="Agriculture" name="Program">Agriculture</option>
                                <option value="Home Economics" name="Program">Home Economics</option>
                                <option value="Visual Arts" name="Program">Visual Arts</option>
                                <option value="General Arts" name="Program">General Arts</option>
                                <option value="General Science" name="Program">General Science</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                           <label for="inputState" class="form-label">House</label>
                            <select id="inputState" name="House" class="form-select">
                            <% if $House %>
                                <option value="$House" name="House" selected>$House</option>
                            <% end_if %>
                                <option value="1" name="House">1</option>
                                <option value="2" name="House">2</option>
                                <option value="3" name="House">3</option>
                                <option value="4" name="House">4</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Telephone Number</label>
                            <input type="text" value="$TelephoneNumber" class="form-control" name="TelephoneNumber" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Sport</label>
                            <select id="inputState"  name="SportsID" class="form-select">
                                <%-- <% loop $Top.Sports %>
                                <option value="$ID" name="SportsID" <% if $SportsID==$ID %> selected<% end_if %>>$Title</option>
                                <% end_loop %> --%>
                                <% loop $Sports %>
                                <option value="$ID" <% if $Athlete.Sports().byID($ID) %>selected<% end_if %>>$Title</option>
                                <% end_loop %>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Height</label>
                            <input type="text" value="$Height" class="form-control" name="Height" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Weight</label>
                            <input type="text" value="$Weight" class="form-control" name="Weight" id="inputEmail4">
                        </div>

                        <div class="col-md-6">
                            <label for="formFile" class="form-label">Profile Photo</label>
                            <input class="form-control" name="PhotoID"  value="$PhotoID" type="file" id="formFile">
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" name="action_doUpdate" class="btn btn-success">Update</button>
                        </div>
                    </form>
                <% end_with %>

                </div>
            </div>
        </div>
        <% include DashboardFooter %>
    </div>
</div>