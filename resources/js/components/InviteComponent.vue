<template>
  <!-- add friends modal -->
  <div
    class="modal fade"
    id="addFriends"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="ti-user"></i> Add Friends
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-info">Send invitations to friends.</div>
          <form>
            <div class="form-group">
              <label for="emails" class="col-form-label">Email addresses</label>
              <input type="text" class="form-control" id="emails" />
            </div>
            <div class="form-group">
              <label for="message" class="col-form-label">Invitation message</label>
              <textarea class="form-control" id="message"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ./ add friends modal -->
</template>
<script>
export default {
  mounted() {
    // console.log("Component mounted.");
  },
  methods: {}
};
</script>