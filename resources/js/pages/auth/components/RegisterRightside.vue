<template>
  <div class="login-rightside">
    <div class="back-icon text-left" @click="$router.back()">
      <svg
        width="26"
        height="26"
        viewBox="0 0 26 26"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M9.75033 23.8333H16.2503C21.667 23.8333 23.8337 21.6666 23.8337 16.25V9.74996C23.8337 4.33329 21.667 2.16663 16.2503 2.16663H9.75033C4.33366 2.16663 2.16699 4.33329 2.16699 9.74996V16.25C2.16699 21.6666 4.33366 23.8333 9.75033 23.8333Z"
          stroke="#292D32"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path
          d="M14.3651 16.8241L10.5518 12.9999L14.3651 9.17578"
          stroke="#292D32"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </div>
    <div class="title my-3">Register</div>
    <div class="error" v-if="error">
      Fail to Register! Please Try Again
    </div>
    <div class="signup-facebook">
      <button @click="continueWithFacebook()">
        <img src="/image/auth/facebook.svg" alt="" class="mr-1" />
        Register with Facebook
      </button>
    </div>
    <div class="signup-google">
      <button @click="continueWithGoogle()">
        <img src="/image/auth/google.svg" alt="" class="mr-1" />
        Register with Google
      </button>
    </div>

    <p id="text">or Register with Email</p>

    <div class="form d-flex">
      <div class="email-icon">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          aria-hidden="true"
          role="img"
          width="1.4em"
          height="1.4em"
          preserveAspectRatio="xMidYMid meet"
          viewBox="0 0 24 24"
        >
          <g
            fill="none"
            stroke="#292D32"
            stroke-width="1.7"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
          </g>
        </svg>
      </div>
      <div>
        <input type="text" v-model="name" placeholder="Your Name" />
      </div>
    </div>
    <small class="text-danger">{{ errors.name }}</small>

    <div class="form d-flex">
      <div class="email-icon">
        <svg
          width="21"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <div>
        <input type="email" v-model="email" placeholder="Email" />
      </div>
    </div>
    <small class="text-danger">{{ errors.email }}</small>
    <div class="form">
      <div class="passowrd-icon">
        <svg
          width="21"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M19.7901 14.93C17.7301 16.98 14.7801 17.61 12.1901 16.8L7.48015 21.5C7.14015 21.85 6.47015 22.06 5.99015 21.99L3.81015 21.69C3.09015 21.59 2.42015 20.91 2.31015 20.19L2.01015 18.01C1.94015 17.53 2.17015 16.86 2.50015 16.52L7.20015 11.82C6.40015 9.22001 7.02015 6.27001 9.08015 4.22001C12.0301 1.27001 16.8201 1.27001 19.7801 4.22001C22.7401 7.17001 22.7401 11.98 19.7901 14.93Z"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M6.89014 17.49L9.19014 19.79"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M14.5 11C15.3284 11 16 10.3284 16 9.5C16 8.67157 15.3284 8 14.5 8C13.6716 8 13 8.67157 13 9.5C13 10.3284 13.6716 11 14.5 11Z"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <div>
        <input type="password" v-model="password" placeholder="Password" />
      </div>
    </div>
    <small class="text-danger">{{ errors.password }}</small>
    <div class="form">
      <div class="passowrd-icon">
        <svg
          width="21"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M19.7901 14.93C17.7301 16.98 14.7801 17.61 12.1901 16.8L7.48015 21.5C7.14015 21.85 6.47015 22.06 5.99015 21.99L3.81015 21.69C3.09015 21.59 2.42015 20.91 2.31015 20.19L2.01015 18.01C1.94015 17.53 2.17015 16.86 2.50015 16.52L7.20015 11.82C6.40015 9.22001 7.02015 6.27001 9.08015 4.22001C12.0301 1.27001 16.8201 1.27001 19.7801 4.22001C22.7401 7.17001 22.7401 11.98 19.7901 14.93Z"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M6.89014 17.49L9.19014 19.79"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M14.5 11C15.3284 11 16 10.3284 16 9.5C16 8.67157 15.3284 8 14.5 8C13.6716 8 13 8.67157 13 9.5C13 10.3284 13.6716 11 14.5 11Z"
            stroke="#292D32"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <div>
        <input v-model="confirm" type="password" placeholder="Confrim" />
      </div>
    </div>
    <small class="text-danger">{{ errors.confirm }}</small>
    <div class="mt-4 mb-4">
      By clicking register, you're agreeing to our privacy and terms of service.
    </div>
    <button class="btn-signin text-bold" @click="registerWithEmail()">
      Register
    </button>
    <p class="mb-4 mt-3 text-center">
      Already have an account?
      <router-link to="/login" class="text-bold">
        Sign In
      </router-link>
    </p>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        errors: {},
        name: null,
        email: null,
        error: false,
        password: null,
        confirm: null,
        accept: false,
      }
    },
    methods: {
      /**
       * register with
       */
      async registerWithEmail() {
        this.errors = {}
        if (!this.name) {
          this.errors.name = 'Required Name'
          return false
        }
        if (!this.email) {
          this.errors.email = 'Required Email'
          return false
        }
        if (!this.password) {
          this.errors.password = 'Required Password'
          return false
        }
        if (this.password !== this.confirm) {
          this.errors.confirm = 'Password Do Not Match'
          return false
        }
        try {
          await firebase
            .auth()
            .createUserWithEmailAndPassword(this.email, this.password)
          const token = await firebase.auth().currentUser.getIdToken(true)
          if (token) {
            this.vueLogin('email', token)
          }
        } catch (err) {
          this.error = true
          console.log(err)
        }
      },
      /**
       * Google
       */
      async continueWithGoogle() {
        try {
          const provider = new firebase.auth.GoogleAuthProvider()
          await firebase.auth().signInWithPopup(provider)
          const token = await firebase.auth().currentUser.getIdToken(true)
          if (token) {
            this.vueLogin('google', token)
          }
        } catch (err) {
          this.error = true
          console.log(err)
        }
      },

      /**
       * facebok
       */
      async continueWithFacebook() {
        try {
          const provider = new firebase.auth.FacebookAuthProvider()
          provider.setCustomParameters({
            display: 'popup',
          })
          await firebase.auth().signInWithPopup(provider)
          const token = await firebase.auth().currentUser.getIdToken(true)
          if (token) {
            this.vueLogin('facebook', token)
          }
        } catch (err) {
          this.error = true
          console.log(err)
        }
      },

      /**
       * final login to backend
       */
      async vueLogin(type, token) {
        this.$auth.login({
          data: {
            token,
            type,
          },
          redirect: '/company/registration',
          staySignedIn: true,
          autoLogin: true,
        })
      },
    },
  }
</script>

<style scoped>
  a {
    text-decoration: none;
    color: black;
  }
  .login-rightside {
    padding: 0px 70px;
    margin-top: 100px;
    font-family: Roboto;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .company {
    padding: 10px 0;
    display: flex;
    align-items: center;
    width: 100%;
    display: none;
  }
  .logo {
    width: 30px;
    height: 30px;
    background: #000000;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .logo img {
    height: 100%;
    width: 100%;
    padding: 6px;
  }
  .name {
    margin-left: 5px;
    font-size: 18px;
    font-family: Ovo;
    font-style: normal;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0em;
  }

  .back-icon {
    padding: 0 0 10px 0;
  }
  .back-icon img {
    width: 30px;
    height: 30px;
    cursor: pointer;
  }
  .title {
    font-size: 18px;
    font-style: normal;
    font-weight: 700;
    line-height: 33px;
    letter-spacing: 0em;
    width: 100%;
    margin-bottom: 5px;
  }
  .signup-facebook,
  .signup-google {
    width: 100%;
  }
  .signup-facebook button,
  .signup-google button {
    padding: 8px;
    margin: 3px;
    height: 50px;
    width: 100%;
    background: #ffffff;
    border: 1px solid #efefef;
    border-radius: 10px;
  }

  #text {
    position: relative;
    margin-top: 20px;
    margin-bottom: 20px;
    color: #cdcbcb;
    text-align: center;
  }
  #text::before {
    content: '';
    position: absolute;
    border-top: 2px solid #e0e0e0;
    width: 30%;
    height: 1px;
    top: 10px;
    left: 0px;
  }
  #text::after {
    content: '';
    position: absolute;
    border-top: 2px solid #e0e0e0;
    width: 30%;
    height: 1px;
    top: 10px;
    right: 0px;
  }

  .form {
    display: flex;
    align-items: center;
    background: #ffffff;
    border: 1px solid #efefef;
    box-sizing: border-box;
    border-radius: 10px;
    width: 100%;
    padding-left: 10px;
    margin: 3px;
  }
  .email-icon img,
  .passowrd-icon img {
    height: 20px;
    width: 20px;
    margin-right: 3px;
  }
  .form input {
    padding: 2px 3px 3px 10px;
    width: 90%;
    border: none;
    height: 50px;
  }
  .forgot-password {
    text-align: right;
    margin-top: 10px;
    width: 100%;
  }
  .btn-signin {
    padding: 15px;
    margin: 3px 3px 8px 3px;
    width: 100%;
    background: #000000;
    border: 1px solid #efefef;
    border-radius: 10px;
    color: #ffffff;
  }
  @media (max-width: 767px) {
    .company {
      display: flex;
    }
  }
  .error {
    margin-bottom: 13px;
    height: 40px;
    display: flex;
    align-items: center;
    color: red;
    border: 1px solid red;
    border-radius: 8px;
    padding: 0px 15px;
    background: #ff000014;
    font-weight: bold;
  }
</style>
