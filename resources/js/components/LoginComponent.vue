<template>
  <div class="form-wrapper">
    <!-- logo -->
    <div class="logo">
      <svg
        version="1.1"
        id="Capa_1"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px"
        y="0px"
        width="50.004px"
        height="50.003px"
        viewBox="0 0 33.004 33.003"
        style="enable-background:new 0 0 33.004 33.003;"
        xml:space="preserve"
      >
        <g>
          <path
            d="M4.393,4.788c-5.857,5.857-5.858,15.354,0,21.213c4.875,4.875,12.271,5.688,17.994,2.447l10.617,4.161l-4.857-9.998
                    c3.133-5.697,2.289-12.996-2.539-17.824C19.748-1.072,10.25-1.07,4.393,4.788z M25.317,22.149l0.261,0.512l1.092,2.142l0.006,0.01
                    l1.717,3.536l-3.748-1.47l-0.037-0.015l-2.352-0.883l-0.582-0.219c-4.773,3.076-11.221,2.526-15.394-1.646
                    C1.469,19.305,1.469,11.481,6.277,6.672c4.81-4.809,12.634-4.809,17.443,0.001C27.919,10.872,28.451,17.368,25.317,22.149z"
          />
          <g>
            <circle cx="9.835" cy="16.043" r="1.833" />
            <circle cx="15.502" cy="16.043" r="1.833" />
            <circle cx="21.168" cy="16.043" r="1.833" />
          </g>
        </g>
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
        <g />
      </svg>
    </div>
    <!-- ./ logo -->

    <h5>Sign in</h5>

    <!-- form -->
    <form @submit.prevent="login">
      <div class="form-group input-group-lg">
        <input
          id="email"
          type="email"
          class="form-control"
          placeholder="Email"
          v-model="email"
          required
          autofocus
        />
      </div>
      <div class="form-group input-group-lg">
        <input
          id="password"
          type="password"
          class="form-control"
          placeholder="Password"
          v-model="password"
          required
        />
      </div>
      <div class="form-group d-flex justify-content-between">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" checked id="customCheck1" />
          <label class="custom-control-label" for="customCheck1">Remember me</label>
        </div>
        <router-link :to="{name: 'reset'}">Reset password</router-link>
      </div>
      <button class="btn btn-primary btn-lg btn-block">Sign in</button>
      <hr />
      <p class="text-muted">Login with your social media account.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-facebook">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-twitter">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-dribbble">
            <i class="fa fa-dribbble"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-linkedin">
            <i class="fa fa-linkedin"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-google">
            <i class="fa fa-google"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-behance">
            <i class="fa fa-behance"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="btn btn-floating btn-instagram">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
      </ul>
      <hr />
      <p class="text-muted">Don't have an account?</p>
      <router-link :to="{name: 'register'}" class="btn btn-outline-light btn-sm">Register now!</router-link>
    </form>
    <!-- ./ form -->
  </div>
</template>

<script>
import { STATUS_CODES } from "http";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login() {
      $(".invalid-feedback").remove();
      Swal.showLoading();
      axios
        .post("/api/auth/login", {
          email: this.email,
          password: this.password
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
            localStorage.setItem("access_token", response.data.access_token);
            this.$router.push("/home");
            Swal.hideLoading();
            Toast.fire({
              type: "success",
              title: "Signed in successfully"
            });
          }
        })
        .catch(error => {
          if (error.response.status == 401) {
            Swal.hideLoading();
            Toast.fire({
              type: "error",
              title: "Email or Password does not match"
            });
          }
        });
    }
  }
};
</script>
