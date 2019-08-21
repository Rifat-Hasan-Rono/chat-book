<template>
  <div id="friends" class="sidebar">
    <header>
      <span>{{friendListHeader}}</span>
      <ul class="list-inline">
        <li class="list-inline-item" v-if="friendListHeader == 'Receive Requests'">
          <a
            class="btn btn-light"
            @click="sentRequest()"
            data-toggle="tooltip"
            title="Send Request"
          >
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          </a>
        </li>
        <li class="list-inline-item" v-if="friendListHeader != 'Receive Requests'">
          <a
            class="btn btn-light"
            @click="getRequest()"
            data-toggle="tooltip"
            title="Receive Request"
          >
            <i class="fa fa-user-secret" aria-hidden="true"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn btn-light" data-toggle="tooltip" title="Add Friend">
            <i class="fa fa-external-link" aria-hidden="true"></i>
          </a>
        </li>
        <li class="list-inline-item d-lg-none d-sm-block">
          <a href="#" class="btn btn-light sidebar-close">
            <i class="ti-close"></i>
          </a>
        </li>
      </ul>
    </header>
    <form action="#">
      <input type="text" class="form-control" placeholder="Search chat" />
    </form>
    <div class="sidebar-body">
      <ul class="list-group list-group-flush" v-for="value in friendList" :key="value.index">
        <li class="list-group-item">
          <div>
            <figure class="avatar">
              <img src="dist/media/img/women_avatar5.jpg" class="rounded-circle" />
            </figure>
          </div>
          <div class="users-list-body">
            <h5>{{value.first_name}} {{value.last_name}}</h5>
            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
            <div class="users-list-action action-toggle">
              <div class="dropdown">
                <a data-toggle="dropdown" href="#">
                  <i class="ti-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a
                    @click="addFriend(value.id)"
                    v-if="friendListHeader == 'Find Friends'"
                    class="dropdown-item"
                  >Add Friend</a>
                  <a
                    @click="confirmFriend(value.id)"
                    v-if="friendListHeader == 'Receive Requests'"
                    class="dropdown-item"
                  >Confirm Friend</a>
                  <a
                    @click="cancelRequest(value.id)"
                    v-if="friendListHeader == 'Send Requests'"
                    class="dropdown-item"
                  >Cancel Request</a>
                  <a
                    @click="deleteRequest(value.id)"
                    v-if="friendListHeader == 'Receive Requests'"
                    class="dropdown-item"
                  >Delete</a>
                  <a
                    @click="friendProfile(value.id)"
                    data-navigation-target="contact-information"
                    class="dropdown-item"
                  >Profile</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>