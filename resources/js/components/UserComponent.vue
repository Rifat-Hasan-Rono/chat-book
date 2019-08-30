<template>
  <div
    class="modal fade"
    id="editProfileModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="ti-pencil"></i> Profile Edit
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="ti-close"></i>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                style="cursor: pointer;"
                data-toggle="tab"
                @click="tabChange('personal')"
                role="tab"
                aria-controls="personal"
                aria-selected="true"
              >Personal</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                style="cursor: pointer;"
                data-toggle="tab"
                @click="tabChange('about')"
                role="tab"
                aria-controls="about"
                aria-selected="false"
              >About</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                style="cursor: pointer;"
                data-toggle="tab"
                @click="tabChange('social-links')"
                role="tab"
                aria-controls="social-links"
                aria-selected="false"
              >Social Links</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                style="cursor: pointer;"
                data-toggle="tab"
                @click="tabChange('media')"
                role="tab"
                aria-controls="social-links"
                aria-selected="false"
              >Media</a>
            </li>
          </ul>
          <div class="tab-content" v-if="userProfile">
            <div
              class="tab-pane"
              :class="{ 'show active' : tab == 'personal'}"
              id="personal"
              role="tabpanel"
            >
              <form>
                <div class="form-group">
                  <label for="first_name" class="col-form-label">First Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ti-user"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      v-model="userProfile.first_name"
                      id="first_name"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label for="last_name" class="col-form-label">Last Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ti-user"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      v-model="userProfile.last_name"
                      id="last_name"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Avatar</label>
                  <div class="d-flex align-items-center">
                    <div>
                      <figure class="avatar mr-3 item-rtl">
                        <img
                          v-if="userProfile.picture"
                          v-bind:src="'public/user-media/' + userProfile.id+ '/' + userProfile.picture"
                          class="rounded-circle"
                        />
                        <span
                          v-else
                          class="avatar-title bg-info rounded-circle"
                        >{{userProfile.first_name.charAt(0)}}{{userProfile.last_name.charAt(0)}}</span>
                      </figure>
                    </div>
                    <div class="custom-file">
                      <input
                        type="file"
                        class="custom-file-input"
                        @change="uploadPicture(this)"
                        id="customFile"
                      />
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="city" class="col-form-label">City</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ti-map-alt"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="City, Country"
                      v-model="userProfile.city"
                      id="city"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobile" class="col-form-label">Mobile</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ti-mobile"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      id="mobile"
                      v-model="userProfile.mobile"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <label for="website" class="col-form-label">Website</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="ti-link"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Website"
                      id="website"
                      v-model="userProfile.social.website"
                    />
                  </div>
                </div>
              </form>
            </div>
            <div
              class="tab-pane"
              :class="{ 'show active' : tab == 'about'}"
              id="about"
              role="tabpanel"
            >
              <form>
                <div class="form-group">
                  <label for="about-text" class="col-form-label">Write a few words that describe you</label>
                  <textarea class="form-control" id="about-text" v-model="userProfile.social.about"></textarea>
                </div>
                <div class="custom-control custom-checkbox">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    v-model="userProfile.type"
                    :checked="userProfile.type == 1"
                    id="type"
                  />
                  <label class="custom-control-label" for="type">Make account private</label>
                </div>
              </form>
            </div>
            <div
              class="tab-pane"
              :class="{ 'show active' : tab == 'social-links'}"
              id="social-links"
              role="tabpanel"
            >
              <form>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-facebook">
                        <i class="ti-facebook"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.facebook"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-twitter">
                        <i class="ti-twitter"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.twitter"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-instagram">
                        <i class="ti-instagram"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.instagram"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-linkedin">
                        <i class="ti-linkedin"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.linkedin"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dribbble">
                        <i class="ti-dribbble"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.dribbble"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-youtube">
                        <i class="ti-youtube"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.youtube"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-google">
                        <i class="ti-google"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.google"
                    />
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-whatsapp">
                        <i class="fa fa-whatsapp"></i>
                      </span>
                    </div>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="userProfile.social.whatsapp"
                    />
                  </div>
                </div>
              </form>
            </div>
            <div
              class="tab-pane"
              :class="{ 'show active' : tab == 'media'}"
              id="media"
              role="tabpanel"
            >
              <vue-dropzone
                ref="myVueDropzone"
                :useCustomSlot="true"
                id="dropzone"
                :options="dropzoneOptions"
                @vdropzone-complete="afterComplete"
              ></vue-dropzone>
              <br />
              <h6>Media</h6>
              <div class="files">
                <ul class="list-inline" id="mediaList">
                  <li
                    class="list-inline-item"
                    v-for="(value, index) in JSON.parse(userProfile.social.media)"
                    :key="value.index"
                    :id="'list_'+index"
                  >
                    <figure
                      class="avatar avatar-lg"
                      style="position: relative;text-align: center;color: white;"
                    >
                      <a v-bind:href="'public/user-media/' + userProfile.id+ '/' + value">
                        <img v-bind:src="'public/user-media/' + userProfile.id+ '/' + value" />
                      </a>
                      <span style="top:0;right: 10;position:  absolute;left: 50px;color: red;">
                        <a @click="removeFile(value,index)">
                          <i
                            class="fa fa-times"
                            aria-hidden="true"
                            style="text-shadow: 0 0 3px #000;"
                          ></i>
                        </a>
                      </span>
                    </figure>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" @click="updateProfile()" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
  props: ["userProfile", "tab"],
  name: "app",
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
      dropzoneOptions: {
        url: "/api/auth/store-media",
        headers: {
          Authorization: "Bearer" + localStorage.getItem("access_token")
        },
        maxFilesize: 12,
        renameFile: function(file) {
          var time = new Date().getTime();
          return time + file.name;
        },
        thumbnailWidth: 100, // px
        thumbnailHeight: 100,
        addRemoveLinks: true
      }
    };
  },
  mounted() {
    // console.log("Component mounted.");
  },
  methods: {
    /* Change profile tab */
    tabChange(name) {
      this.$emit("update:tab", name);
    },

    /* Update user profile */
    updateProfile() {
      $(".invalid-feedback").remove();
      axios
        .post("/api/auth/update-profile", {
          token: localStorage.getItem("access_token"),
          data: this.userProfile
        })
        .then(response => {
          if (response.data.errors) {
            $.each(response.data.errors, function(key, value) {
              $("#" + key)
                .closest(".form-group")
                .removeClass("has-success")
                .addClass("has-danger");
              $("#" + key).after(
                '<span id="' +
                  key +
                  '_span" class="invalid-feedback" style="display:block;" role="alert"><strong>' +
                  value +
                  "</strong></span>"
              );
            });
          } else {
            Toast.fire({
              type: response.data.type,
              title: response.data.title
            });
            console.log(response.data);
          }
        })
        .catch(error => {
          console.log(error);
        });
    },

    /* Upload profile picture */
    uploadPicture(elem) {
      var file = event.target.files[0];
      if (file.type.match(/image.*/)) {
        var reader = new FileReader();
        reader.onload = function(readerEvent) {
          var image = new Image();
          image.onload = function(imageEvent) {
            var canvas = document.createElement("canvas"),
              max_size_width = 500,
              max_size_height = 250,
              width = image.width,
              height = image.height;

            if (width > height) {
              if (width > max_size_width) {
                height *= max_size_width / width;
                width = max_size_width;
              }
            } else {
              if (height > max_size_height) {
                width *= max_size_height / height;
                height = max_size_height;
              }
            }
            canvas.width = width;
            canvas.height = height;
            canvas.getContext("2d").drawImage(image, 0, 0, width, height);
            var dataUrl = canvas.toDataURL("image/jpeg");
            $("#pictureFile").attr("src", dataUrl);
            axios
              .post("/api/auth/update-profile", {
                token: localStorage.getItem("access_token"),
                picture: dataUrl
              })
              .then(response => {
                Toast.fire({
                  type: response.data.type,
                  title: response.data.title
                });
              });
          };
          image.src = readerEvent.target.result;
        };
        reader.readAsDataURL(file);
      } else {
        alert("Image type is not supported");
        $(elem).val("");
      }
    },

    afterComplete(file) {
      console.log(file.upload);

      // var count = $("#gallery-card li").length + 1;
      // var image =
      //   '<li class="list-inline-item" id="list_' +
      //   count +
      //   '">' +
      //   '<figure class="avatar avatar-lg" style="position: relative;text-align: center;color: white;">' +
      //   '<a href="public/user-media/' +
      //   this.userProfile.id +
      //   "/" +
      //   file.upload.filename +
      //   '"><img src="public/user-media/' +
      //   this.userProfile.id +
      //   "/" +
      //   file.upload.filename +
      //   '" /></a><span style="top:0;right: 10;position:  absolute;left: 50px;color: red;">' +
      //   '<a v-on:click="removeFile(' +
      //   file.upload.filename +
      //   "," +
      //   count +
      //   ')"><i class="fa fa-times"aria-hidden="true"style="text-shadow: 0 0 3px #000;"></i></a></span>' +
      //   "</figure>" +
      //   "</a></li>";
      // $("#mediaList").append(image);
    },

    removeFile(value, index) {
      axios
        .post("/api/auth/remove-media", {
          token: localStorage.getItem("access_token"),
          file: value
        })
        .then(response => {
          Toast.fire({
            type: response.data.type,
            title: response.data.title
          });
          $("#list_" + index).remove();
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>