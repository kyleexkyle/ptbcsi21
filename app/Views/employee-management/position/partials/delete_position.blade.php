<div class="modal fade" id="delete_position" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Position</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete this position?</div>
            <div class="modal-footer">
                <form action="{{route_to('position.delete')}}" method="post" id="delete_position">
                   @csrf
                    <input type="text" name="id" id="delete_id" value="" hidden>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-danger" type="submit" value="Delete"/>
                </form>
            </div>
        </div>
    </div>
</div>