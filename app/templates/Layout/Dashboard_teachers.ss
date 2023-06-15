<!-- Content wrapper -->
<div class="col-lg-9 page-content">
    <div class="card">
        <div class="card-body">
            <div class="page-wrapper">

                <div class="page-title">
                    <h5>$PageTitle</h5>
                    <hr>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid me-2 fa-plus"></i>Add Teachers
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- table -->
                <table id="myTable" class="table hover table-responsive-sm table-sm" >
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="$resourceURL('app/images/img/1.png')" style="height:40px;" alt="" /></td>
                            <td>Mr John Doe</td>
                            <td>Active</td>
                            <td>
                                <a href="dashboard/edit-product/{$EncodedID}" class="btn btn-sm btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="dashboard/delete-product/{$EncodedID}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash "></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="$resourceURL('app/images/img/7.png')" style="height:40px;" alt="" /></td>
                            <td>Mr Agyiri Kwabena</td>
                            <td>Active</td>
                            <td>
                                <a href="dashboard/edit-product/{$EncodedID}" class="btn btn-sm btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="dashboard/delete-product/{$EncodedID}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash "></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="$resourceURL('app/images/img/6.png')" style="height:40px;" alt="" /></td>
                            <td>Mrs Ivy Payne</td>
                            <td>Active</td>
                            <td>
                                <a href="dashboard/edit-product/{$EncodedID}" class="btn btn-sm btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="dashboard/delete-product/{$EncodedID}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash "></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer p-1  text-center">
            <p>Copyright @ 2023</p>
        </div>
    </div>
</div>