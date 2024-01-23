<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
        </button>
      </div>
      <div class="modal-body d-flex">
        <p id="deleteModelContent"></p>
</div>
<div class="modal-footer">
        <form method="post" id="deleteForm" action="">
          @csrf
          <button type="submit" class="btn btn-outline-primary">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function showDeleteModal(type, id){
    var modalContent = type == 'task'? 'Are you sure you want to delete this task?' : 'Are you sure you want to delete this comment?';

    var formAction = type == 'task' ? "{{ route('delete', ['task_id' => ':id']) }}" : "{{ route('delete', ['comment_id' => ':id']) }}";

    formAction = formAction.replace('%3Aid', id);

    document.getElementById('deleteModelContent').innerText = modalContent;
    document.getElementById('deleteForm').action = formAction;

    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
  }
</script>