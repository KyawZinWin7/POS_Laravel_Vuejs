<template>
  <div class="company-profile-two pb-5">
    <div class="profile-two-box p-4">
      <p>Step 2 of 3</p>
      <h4>Your Business Profile setup is almost done</h4>
      <p style="width: 70%;">
        Upload your Company logo and choose the theme color you like.
      </p>
      <div class="image-container">
        <div class="preview-image mt-4" v-show="image">
          <img :src="image" alt="" class="logo-image" />
          <i class="fal fa-times" @click="removeImage"></i>
        </div>

        <label for="upload" class="upload-image-container" v-show="!image">
          <div class="upload-image">
            <input type="file" id="upload" @change="uploadImage" />
            <img src="/image/businessprofile/arrow-up.svg" alt="" />
            <p>Upload Logo</p>
          </div>
        </label>
      </div>
      <div class="line"></div>
      <!-- ==== preview mini card ==== -->
      <PreviewSvg :color="companyData.color" />

      <div class="d-flex justify-content-start mt-3 mb-2">
        <verte
          v-model="companyData.color"
          display="widget"
          id="just-recent-color"
          :colorHistory.sync="list"
        ></verte>

        <ColorPicker @color="getColor" />
      </div>

      <b-form-checkbox v-model="selected" @change="useLogoColor" inline>
        <p>Use logo color</p>
      </b-form-checkbox>

      <div class="buttons-group d-flex justify-content-between">
        <button class="d-flex back" @click="backStep">
          <img
            class="my-auto"
            src="/image/businessprofile/arrow-left.svg"
            alt=""
          />
          <p class="my-auto back-text">Back</p>
        </button>
        <div class="d-flex">
          <p class="my-auto skip" @click="skipStep">Skip</p>
          <button class="ml-3 next" @click="nextStep">
            Next
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import ColorThief from 'colorthief'

  export default {
    data() {
      return {
        image: '',
        companyData: {
          logo: '',
          color: this.$store.state.theme,
        },
        selected: false,
        list: [
          'hsl(260, 93%, 71%)',
          'hsl(171, 66%, 61%)',
          'hsl(43, 100%, 83%)',
          'hsl(213, 95%, 75%)',
          'hsl(301, 75%, 75%)',
          'hsl(240, 14%, 14%)',
        ],
      }
    },
    methods: {
      useLogoColor() {
        if (this.selected === true) {
          this.companyData.color = 'hsl(0, 0%, 0%)'
        }
      },
      removeImage() {
        this.image = null
      },
      uploadImage(e) {
        var self = this
        const file = e.target.files[0]
        const reader = new FileReader()
        reader.onloadend = () => {
          this.companyData.logo = reader.result
          this.image = reader.result
          const container = document.querySelector('.image-container')
          let img = container.querySelector('.logo-image')
          img.addEventListener('load', function() {
            self.getColorFromImage(img)
          })
        }
        reader.readAsDataURL(file)
      },
      getColorFromImage(img) {
        const colorThief = new ColorThief()
        let [r, g, b] = colorThief.getColor(img)
        let colors = colorThief.getPalette(img)
        console.log(colors)
        this.companyData.color = `rgb(${r}, ${g}, ${b})`
        this.list = colors.map(([x, y, z]) => {
          return `rgb(${x}, ${y}, ${z})`
        })
      },
      getColor(value) {
        this.companyData.color = value
      },
      nextStep() {
        this.$emit('step', 'three')
        this.$emit('data', this.companyData)
      },
      backStep() {
        this.$emit('step', 'one')
      },
      skipStep() {
        this.$emit('step', 'three')
      },
    },
    watch: {
      'companyData.color': function() {
        document.documentElement.style.setProperty(
          '--theme',
          this.companyData.color,
        )
        this.$store.commit('setTheme', this.companyData.color)
      },
    },
  }
</script>

<style>
  .upload-image-container {
    cursor: pointer;
  }
  .back-text:hover {
    text-decoration: underline;
  }
  .skip {
    cursor: pointer;
  }
  .skip:hover {
    text-decoration-line: underline;
  }
  .buttons-group {
    width: 90%;
    justify-content: space-between;
    margin-top: 10px;
  }
  .buttons-group .back {
    background: #ffffff;
    border: none;
  }
  .buttons-group .back img {
    width: 20px;
    height: 20px;
    margin-left: -4px;
  }
  .buttons-group .next {
    background: var(--theme);
    border-radius: 9px;
    color: #ffffff;
    width: 80px;
    height: 40px;
    border: none;
  }
  .next:hover {
    background: white;
    border: 2px solid var(--theme);
    color: var(--theme);
    font-weight: bold;
  }
  .option-create-button {
    border-radius: 10px;
    width: 200px;
    background-color: black;
    color: white;
  }
  .color-picker-modal-button {
    margin-left: 3px;
    border: 1px solid #e8e8e8;
    height: 30px;
    border-radius: 50%;
    width: 30px;
    margin-top: 3px;
    background-color: #e8e8e8;
    cursor: pointer;
  }
  .company-profile-two {
    background: #e4e4e4;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .profile-two-box {
    width: 450px;
    height: 600px;
    background: #ffffff;
    border-radius: 10px;
    margin: 40px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
  }
  .profile-two-box h4 {
    font-size: 19px;
    font-style: normal;
    font-weight: 700;
    line-height: 23px;
    letter-spacing: 0em;
    max-width: 400px;
  }
  .profile-two-box h5 {
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 19px;
    letter-spacing: 0em;
    max-width: 300px;
  }

  .upload-image {
    width: 150px;
    height: 150px;
    margin: 10px 0 0 0;
    background: #ffffff;
    border: 2px solid #dedede;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }
  .upload-image:hover {
    border: 2px solid var(--theme);
  }
  .preview-image {
    width: 150px;
    height: 150px;
    margin: 10px 0 0 0;
    position: relative;
    border-radius: 10px;
  }
  .preview-image img {
    width: 150px;
    height: 150px;
    border-radius: 10px;
  }
  .preview-image i {
    position: absolute;
    right: 5px;
    top: 10px;
    background: black;
    color: white;
    width: 20px;
    height: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    cursor: pointer;
  }
  .upload-image input {
    display: none;
  }
  .upload-image p {
    margin: 0;
  }
  .profile-two-box .line {
    margin: 20px auto;
    width: 350px;
    border: 1px solid #f3f3f3;
  }
  @media (max-width: 375px) {
    .profile-one-box,
    .profile-two-box {
      width: 340px;
      height: 450px;
    }
  }
</style>
