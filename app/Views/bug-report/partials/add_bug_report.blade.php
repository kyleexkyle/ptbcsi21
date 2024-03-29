<div class="modal fade" id="add_bug_report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="{{route_to('bug-report.create')}}" enctype="multipart/form-data" method="post" id="add_position">
                    @csrf
                    <div class="form-group">
                        <label for="bug">Bug / Step</label>
                        <textarea class="form-control" id="bug" name="bug" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tester">Tester</label>
                        <select class="form-control"  id="tester" name="tester">
                            <option value="Mara">Mara</option>
                            <option value="Mariel">Mariel</option>
                            <option value="Kerr">Kerr</option>
                            <option value="John">John</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="urgency">Urgency</label>
                        <select class="form-control"  id="urgency" name="urgency">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_reported">Date Reported</label>
                        <input type="date" id="date_reported" class="form-control" name="date_reported"
                               value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Pending">Pending</option>
                            <option value="Partial">Partial</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reference">File</label>
                        <input type="file" id="reference" name="reference" accept="image/*" class="form-control-file" />
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