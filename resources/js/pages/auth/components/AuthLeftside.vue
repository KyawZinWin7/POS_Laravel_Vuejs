<template>
  <b-carousel
    id="carousel-1"
    v-model="slide"
    :interval="3000"
    controls
    indicators
    background="#ababab"
    style="text-shadow: 1px 1px 2px #333;"
    @sliding-start="onSlideStart"
    @sliding-end="onSlideEnd"
  >
    <!-- Slide 1 -->
    <b-carousel-slide img-src="/image/auth/register/register-image1.png">
      <div class="slide-one-text">
        <div class="company" @click="goHome()">
          <div class="logo">
            <svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="18" cy="18" r="18" fill="white" />
              <g clip-path="url(#clip0)">
                <path
                  d="M23.0466 18.1148C23.9161 17.6889 24.6579 17.0248 25.1926 16.1935C25.7371 15.3315 26.0177 14.3178 25.9973 13.2863C25.9973 11.8714 25.4179 10.6371 24.2591 9.58334C23.1465 8.54694 21.7013 7.98201 20.2085 7.99992H12V16.0678H20.2085C21.0045 16.1083 21.7911 15.8736 22.4457 15.4004C23.009 14.9563 23.2934 14.233 23.2934 13.2333C23.2941 12.8679 23.2127 12.5074 23.0558 12.1806C22.8988 11.8538 22.6706 11.5697 22.3893 11.3511C21.7723 10.8348 20.9999 10.5618 20.2085 10.5803H14.7066V14.7497H13.3654V9.31804H20.2085C21.3451 9.3094 22.4455 9.73461 23.3014 10.5133C24.1956 11.3064 24.6427 12.2373 24.6427 13.3059C24.6427 14.6222 24.2135 15.6461 23.3551 16.3778C22.4589 17.1061 21.3446 17.4819 20.2085 17.439H12V30.9999C12.3475 31.012 12.6854 30.8799 12.9394 30.6328C13.1934 30.3856 13.3428 30.0436 13.3547 29.6818V18.7543H20.2085C20.4767 18.7543 20.6645 18.7543 20.7906 18.7375C22.0567 18.8399 23.0162 19.2356 23.6689 19.9244C23.9769 20.2282 24.2223 20.5941 24.3901 20.9998C24.558 21.4055 24.6448 21.8424 24.6453 22.2842C24.6453 23.6023 24.2161 24.6262 23.3577 25.356C22.4627 26.09 21.3472 26.4708 20.2085 26.4312H16.0613V25.1215H20.2085C20.9982 25.1606 21.7801 24.943 22.4457 24.4987C23.009 24.0826 23.2934 23.4068 23.2934 22.4685C23.2934 20.7929 22.2651 19.9551 20.2085 19.9551H14.7066V29.8577C15.0541 29.8698 15.392 29.7377 15.646 29.4906C15.9001 29.2434 16.0494 28.9014 16.0613 28.5396V27.7549H20.2085C21.7037 27.7946 23.1614 27.2643 24.3073 26.2636C25.4376 25.2695 26.0018 23.943 26 22.2842C26 20.1878 25.0155 18.798 23.0466 18.1148ZM16.0613 11.9096H20.2085C20.6478 11.8908 21.0818 12.0148 21.4505 12.2643C21.605 12.3712 21.7309 12.5172 21.8163 12.6887C21.9017 12.8601 21.9438 13.0514 21.9387 13.2445C21.9387 14.2554 21.3619 14.7609 20.2085 14.7609H16.0613V11.9096ZM16.0613 21.29H20.2085C20.6494 21.2664 21.0897 21.3476 21.4961 21.5274C21.7912 21.6865 21.9387 22.0049 21.9387 22.4796C21.9387 23.3696 21.3619 23.8145 20.2085 23.8145H16.0613V21.29Z"
                  fill="black"
                />
              </g>
              <defs>
                <clipPath id="clip0">
                  <rect
                    width="14"
                    height="23"
                    fill="white"
                    transform="translate(12 8)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="name">
            Bilions POS
          </div>
        </div>
        <div class="content">
          <h4>No Installation Required</h4>
          <p>
            Just create an account and start build your porducts and sell!
          </p>
        </div>
      </div>
    </b-carousel-slide>
    <!-- Slide 2 -->
    <b-carousel-slide img-src="/image/auth/register/register-image2.png">
      <div class="slide-one-text text-black">
        <div class="company" @click="goHome()">
          <div class="logo">
            <svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="18" cy="18" r="18" fill="black" />
              <g clip-path="url(#clip0)">
                <path
                  d="M23.0466 18.1148C23.9161 17.689 24.6579 17.0248 25.1926 16.1935C25.7371 15.3315 26.0177 14.3179 25.9973 13.2864C25.9973 11.8715 25.4179 10.6371 24.2591 9.58337C23.1465 8.54697 21.7013 7.98204 20.2085 7.99996H12V16.0678H20.2085C21.0045 16.1083 21.7911 15.8736 22.4457 15.4004C23.009 14.9564 23.2934 14.2331 23.2934 13.2333C23.2941 12.8679 23.2127 12.5074 23.0558 12.1806C22.8988 11.8538 22.6706 11.5697 22.3893 11.3511C21.7723 10.8348 20.9999 10.5619 20.2085 10.5803H14.7066V14.7497H13.3654V9.31807H20.2085C21.3451 9.30943 22.4455 9.73464 23.3014 10.5133C24.1956 11.3064 24.6427 12.2373 24.6427 13.3059C24.6427 14.6222 24.2135 15.6461 23.3551 16.3778C22.4589 17.1062 21.3446 17.4819 20.2085 17.439H12V31C12.3475 31.012 12.6854 30.8799 12.9394 30.6328C13.1934 30.3856 13.3428 30.0436 13.3547 29.6818V18.7543H20.2085C20.4767 18.7543 20.6645 18.7543 20.7906 18.7376C22.0567 18.84 23.0162 19.2356 23.6689 19.9244C23.9769 20.2283 24.2223 20.5941 24.3901 20.9998C24.558 21.4055 24.6448 21.8425 24.6453 22.2842C24.6453 23.6023 24.2161 24.6263 23.3577 25.3561C22.4627 26.09 21.3472 26.4709 20.2085 26.4312H16.0613V25.1215H20.2085C20.9982 25.1607 21.7801 24.943 22.4457 24.4987C23.009 24.0826 23.2934 23.4068 23.2934 22.4685C23.2934 20.7929 22.2651 19.9552 20.2085 19.9552H14.7066V29.8578C15.0541 29.8698 15.392 29.7378 15.646 29.4906C15.9001 29.2434 16.0494 28.9014 16.0613 28.5397V27.7549H20.2085C21.7037 27.7946 23.1614 27.2643 24.3073 26.2637C25.4376 25.2695 26.0018 23.943 26 22.2842C26 20.1879 25.0155 18.7981 23.0466 18.1148ZM16.0613 11.9096H20.2085C20.6478 11.8908 21.0818 12.0148 21.4505 12.2643C21.605 12.3712 21.7309 12.5172 21.8163 12.6887C21.9017 12.8602 21.9438 13.0514 21.9387 13.2445C21.9387 14.2554 21.3619 14.7609 20.2085 14.7609H16.0613V11.9096ZM16.0613 21.29H20.2085C20.6494 21.2664 21.0897 21.3476 21.4961 21.5274C21.7912 21.6866 21.9387 22.0049 21.9387 22.4797C21.9387 23.3696 21.3619 23.8145 20.2085 23.8145H16.0613V21.29Z"
                  fill="white"
                />
              </g>
              <defs>
                <clipPath id="clip0">
                  <rect
                    width="14"
                    height="23"
                    fill="white"
                    transform="translate(12 8)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="name text-black">
            Bilions POS
          </div>
        </div>
        <div class="content text-black">
          <h4 class="text-black">A flexible & affordable Point of sale</h4>
          <p class="text-black">
            Bilions POS can help you get your business up and running as quickly
            as possible.
          </p>
        </div>
      </div>
    </b-carousel-slide>
    <!-- Slide 3 -->
    <b-carousel-slide img-src="/image/auth/register/register-image3.png">
      <div class="slide-one-text text-black">
        <div class="company" @click="goHome()">
          <div class="logo">
            <svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <circle cx="18" cy="18" r="18" fill="black" />
              <g clip-path="url(#clip0)">
                <path
                  d="M23.0466 18.1148C23.9161 17.689 24.6579 17.0248 25.1926 16.1935C25.7371 15.3315 26.0177 14.3179 25.9973 13.2864C25.9973 11.8715 25.4179 10.6371 24.2591 9.58337C23.1465 8.54697 21.7013 7.98204 20.2085 7.99996H12V16.0678H20.2085C21.0045 16.1083 21.7911 15.8736 22.4457 15.4004C23.009 14.9564 23.2934 14.2331 23.2934 13.2333C23.2941 12.8679 23.2127 12.5074 23.0558 12.1806C22.8988 11.8538 22.6706 11.5697 22.3893 11.3511C21.7723 10.8348 20.9999 10.5619 20.2085 10.5803H14.7066V14.7497H13.3654V9.31807H20.2085C21.3451 9.30943 22.4455 9.73464 23.3014 10.5133C24.1956 11.3064 24.6427 12.2373 24.6427 13.3059C24.6427 14.6222 24.2135 15.6461 23.3551 16.3778C22.4589 17.1062 21.3446 17.4819 20.2085 17.439H12V31C12.3475 31.012 12.6854 30.8799 12.9394 30.6328C13.1934 30.3856 13.3428 30.0436 13.3547 29.6818V18.7543H20.2085C20.4767 18.7543 20.6645 18.7543 20.7906 18.7376C22.0567 18.84 23.0162 19.2356 23.6689 19.9244C23.9769 20.2283 24.2223 20.5941 24.3901 20.9998C24.558 21.4055 24.6448 21.8425 24.6453 22.2842C24.6453 23.6023 24.2161 24.6263 23.3577 25.3561C22.4627 26.09 21.3472 26.4709 20.2085 26.4312H16.0613V25.1215H20.2085C20.9982 25.1607 21.7801 24.943 22.4457 24.4987C23.009 24.0826 23.2934 23.4068 23.2934 22.4685C23.2934 20.7929 22.2651 19.9552 20.2085 19.9552H14.7066V29.8578C15.0541 29.8698 15.392 29.7378 15.646 29.4906C15.9001 29.2434 16.0494 28.9014 16.0613 28.5397V27.7549H20.2085C21.7037 27.7946 23.1614 27.2643 24.3073 26.2637C25.4376 25.2695 26.0018 23.943 26 22.2842C26 20.1879 25.0155 18.7981 23.0466 18.1148ZM16.0613 11.9096H20.2085C20.6478 11.8908 21.0818 12.0148 21.4505 12.2643C21.605 12.3712 21.7309 12.5172 21.8163 12.6887C21.9017 12.8602 21.9438 13.0514 21.9387 13.2445C21.9387 14.2554 21.3619 14.7609 20.2085 14.7609H16.0613V11.9096ZM16.0613 21.29H20.2085C20.6494 21.2664 21.0897 21.3476 21.4961 21.5274C21.7912 21.6866 21.9387 22.0049 21.9387 22.4797C21.9387 23.3696 21.3619 23.8145 20.2085 23.8145H16.0613V21.29Z"
                  fill="white"
                />
              </g>
              <defs>
                <clipPath id="clip0">
                  <rect
                    width="14"
                    height="23"
                    fill="white"
                    transform="translate(12 8)"
                  />
                </clipPath>
              </defs>
            </svg>
          </div>
          <div class="name text-black">
            Bilions POS
          </div>
        </div>
        <div class="content text-black">
          <h4 class="text-black">All in one retail platform</h4>
          <p class="text-black">
            Retail POS on anytime, anywhere.
          </p>
        </div>
      </div>
    </b-carousel-slide>
  </b-carousel>
</template>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null,
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      },
      goHome() {
        window.location.href = '/'
      },
    },
  }
</script>

<style scoped>
  /* slide one */
  .slide-one-text .company {
    padding: 50px 0 0 20px;
    display: flex;
    align-items: center;
    text-shadow: none;
  }
  .slide-one-text .logo {
    width: 30px;
    height: 30px;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    text-shadow: none;
  }
  .slide-one-text .logo img {
    height: 100%;
    width: 100%;
    padding: 6px;
  }
  .slide-one-text .name {
    margin-left: 5px;
    font-size: 18px;
    font-family: Ovo;
    font-style: normal;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0em;
    text-shadow: none;
  }
  .slide-one-text .content {
    margin-top: 20px;
    padding: 15px 10px 0 20px;
    color: #ffffff;
    text-align: left;
    text-shadow: none;
  }
  .slide-one-text .content h4 {
    font-family: Roboto;
    font-weight: 700px;
    font-size: 18px;
    letter-spacing: 0em;
    margin: 0;
    text-shadow: none;
  }
  .slide-one-text .content p {
    width: 70%;
    font-family: Roboto;
    font-weight: 400;
    font-size: 16px;
    text-shadow: none;
  }
  .text-black {
    color: black;
  }
</style>

<style>
  .login-main .carousel {
    height: 100%;
  }
  .carousel-item {
    background: #f3f3f3 !important;
  }
  .login-main .carousel-item .img-fluid {
    width: 100% !important;
    height: 100vh !important;
    object-fit: cover !important;
  }
</style>
