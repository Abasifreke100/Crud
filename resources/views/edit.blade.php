
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel"><strong>Edit Your Task</strong></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="update">

            <div class="modal-body">
                <div class="content-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="assignee" name="assignee" placeholder="Assignee" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="task" name="task" placeholder="Task" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="description" name="description" placeholder="Description" class="form-control" required></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>