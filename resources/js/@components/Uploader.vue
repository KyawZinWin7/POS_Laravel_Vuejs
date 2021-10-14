<template>
  <div>
    <div style="height: auto;">
      <van-field name="uploader">
        <template #input>
          <van-uploader
            v-model="imageUploader"
            @delete="sendImage"
            :after-read="sendImage"
            :max-count="count"
            accept="image/*"
            class="image-uploader m-auto"
            :preview-full-image="true"
            :preview-options="{ closeable: true }"
          />
        </template>
      </van-field>
    </div>
    <div class="d-flex">
      <small
        v-if="count === 'multi' ? errors.images : errors.image || errors.logo"
        class="text-danger mx-auto"
      >
        {{ count === 'multi' ? errors.images : errors.image || errors.logo }}
      </small>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['errors', 'count', 'uploader'],
    data() {
      return {
        imageUploader: this.uploader,
      }
    },
    methods: {
      sendImage() {
        this.$emit('image', this.imageUploader)
      },
    },
  }
</script>
