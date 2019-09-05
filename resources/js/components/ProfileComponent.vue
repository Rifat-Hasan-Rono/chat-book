<template>
  <!-- about -->
  <div class="sidebar-group" id="right-sidebar">
    <div id="contact-information" class="sidebar" :class="{ 'active' : friendProfile != ''}">
      <header>
        <span>About</span>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a @click="$emit('update:friendProfile', '')" class="btn btn-light sidebar-close">
              <i class="ti-close"></i>
            </a>
          </li>
        </ul>
      </header>
      <div class="sidebar-body" v-if="friendProfile">
        <div class="pl-4 pr-4 text-center">
          <figure
            class="avatar avatar-xl mb-4"
            :class="[checkOnline(friendProfile.id) ? 'avatar-state-success' : 'avatar-state-warning']"
          >
            <a
              v-if="friendProfile.picture"
              v-bind:href="'public/user-media/' + friendProfile.id+ '/' + friendProfile.picture"
              data-lightbox="image-1"
              data-title="Profile Picture"
            >
              <img
                v-bind:src="'public/user-media/' + friendProfile.id+ '/' + friendProfile.picture"
                class="rounded-circle"
              />
            </a>
            <span
              v-else
              class="avatar-title bg-info rounded-circle"
            >{{friendProfile.first_name.charAt(0)}}{{friendProfile.last_name.charAt(0)}}</span>
          </figure>
          <h5 class="text-primary">{{friendProfile.first_name}} {{friendProfile.last_name}}</h5>
          <p class="text-muted" v-if="checkOnline(friendProfile.id)">Status: Online</p>
          <p class="text-muted" v-else>Last seen: {{friendProfile.last_seen | date}}</p>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <h6>About</h6>
          <p class="text-muted">{{friendProfile.social.about}}</p>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <h6>Mobile</h6>
          <p class="text-muted">{{friendProfile.mobile}}</p>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <h6>Media</h6>
          <div class="files">
            <ul class="list-inline">
              <li
                class="list-inline-item"
                v-for="value in JSON.parse(friendProfile.social.media)"
                :key="value.index"
              >
                <a
                  v-bind:href="'public/user-media/' + friendProfile.id+ '/' + value"
                  data-lightbox="image-1"
                  data-title="Media"
                >
                  <figure class="avatar avatar-lg">
                    <img v-bind:src="'public/user-media/' + friendProfile.id+ '/' + value" />
                  </figure>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <h6>City</h6>
          <p class="text-muted">{{friendProfile.city}}</p>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <h6>Website</h6>
          <p>
            <a :href="'http://'+friendProfile.social.website">{{friendProfile.social.website}}</a>
          </p>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <h6>Social Links</h6>
          <ul class="list-inline social-links">
            <li class="list-inline-item" v-if="friendProfile.social.facebook">
              <a
                :href="'http://'+friendProfile.social.facebook"
                class="btn btn-sm btn-floating btn-facebook"
              >
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.twitter">
              <a
                :href="'http://'+friendProfile.social.twitter"
                class="btn btn-sm btn-floating btn-twitter"
              >
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.dribbble">
              <a
                :href="'http://'+friendProfile.social.dribbble"
                class="btn btn-sm btn-floating btn-dribbble"
              >
                <i class="fa fa-dribbble"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.whatsapp">
              <a
                :href="'http://'+friendProfile.social.whatsapp"
                class="btn btn-sm btn-floating btn-whatsapp"
              >
                <i class="fa fa-whatsapp"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.linkedin">
              <a
                :href="'http://'+friendProfile.social.linkedin"
                class="btn btn-sm btn-floating btn-linkedin"
              >
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.google">
              <a
                :href="'http://'+friendProfile.social.google"
                class="btn btn-sm btn-floating btn-google"
              >
                <i class="fa fa-google"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.youtube">
              <a
                :href="'http://'+friendProfile.social.youtube"
                class="btn btn-sm btn-floating btn-youtube"
              >
                <i class="fa fa-youtube"></i>
              </a>
            </li>
            <li class="list-inline-item" v-if="friendProfile.social.instagram">
              <a
                :href="'http://'+friendProfile.social.instagram"
                class="btn btn-sm btn-floating btn-instagram"
              >
                <i class="fa fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
        <hr />
        <div class="pl-4 pr-4">
          <div class="form-group">
            <div class="form-item custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch11" />
              <label class="custom-control-label" for="customSwitch11">Block</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-item custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" checked id="customSwitch12" />
              <label class="custom-control-label" for="customSwitch12">Mute</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-item custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch13" />
              <label class="custom-control-label" for="customSwitch13">Get notification</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ./ about -->
</template>
<script>
export default {
  props: ["friendProfile", "checkOnline"],
  mounted() {},
  methods: {}
};
</script>