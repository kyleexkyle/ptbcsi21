<div class="modal fade" id="edit_late_penalty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Late Penalty</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route_to('late-penalty.update')}}" method="post" id="edit_late_penalty">
                    @csrf
                    <input type="text" id="edit_id" name="id" hidden>
                    <div class="table-responsive">
                        <table class="late-penalty-table table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>From (h:m)</th>
                                <th>To (h:m)</th>
                                <th>Equivalent (h:m)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="flex">
                                        <input type="text" id="edit_from_h" name="from_h" class="late-h w-50">
                                        <span class="pl-2 pr-2">:</span>
                                        <input type="text" id="edit_from_m" name="from_m" class="late-h w-50">
                                    </div>
                                </td>
                                <td>
                                    <div class="flex">
                                        <input type="text" id="edit_to_h" name="to_h" class="late-h w-50">
                                        <span class="pl-2 pr-2">:</span>
                                        <input type="text" id="edit_to_m" name="to_m" class="late-h w-50">
                                    </div>
                                </td>
                                <td>
                                    <div class="flex">
                                        <input type="text" id="edit_equivalent_h" name="equivalent_h" class="late-h w-50">
                                        <span class="pl-2 pr-2">:</span>
                                        <input type="text" id="edit_equivalent_m" name="equivalent_m" class="late-h w-50">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer mt-2">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
