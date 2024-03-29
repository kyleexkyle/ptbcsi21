<div class="modal fade" id="edit_bug_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Add Bug Report</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route_to('bug-report.update')}}" enctype="multipart/form-data" method="post" id="add_position">
                    @csrf
                    <input type="text" name="id" id="edit_id" hidden>
                    <div class="form-group">
                        <label for="edit_bug">Bug / Step</label>
                        <textarea class="form-control" id="edit_bug" name="bug" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_tester">Tester</label>
                        <select class="form-control" id="edit_tester" name="tester">
                            <option value="Mara">Mara</option>
                            <option value="Mariel">Mariel</option>
                            <option value="Kerr">Kerr</option>
                            <option value="John">John</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_urgency">Urgency</label>
                        <select class="form-control"  id="edit_urgency" name="urgency">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_date_reported">Date Reported</label>
                        <input type="date" id="edit_date_reported" class="form-control" name="date_reported"
                               value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control"  id="edit_status" name="status">
                            <option value="Pending">Pending</option>
                            <option value="Partial">Partial</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_reference">File</label>
                        <input type="file" id="edit_reference" name="reference" accept="image/*" class="form-control-file" />
                    </div>
                    <div class="modal-footer mt-5">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>