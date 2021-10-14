<template>
  <div>
    <!--  -->
    <svg
      v-if="name == 'box'"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M3.16998 7.43994L12 12.5499L20.77 7.46994"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M12 21.61V12.54"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M9.93001 2.48004L4.59001 5.44004C3.38001 6.11004 2.39001 7.79004 2.39001 9.17004V14.82C2.39001 16.2 3.38001 17.88 4.59001 18.55L9.93001 21.52C11.07 22.15 12.94 22.15 14.08 21.52L19.42 18.55C20.63 17.88 21.62 16.2 21.62 14.82V9.17004C21.62 7.79004 20.63 6.11004 19.42 5.44004L14.08 2.47004C12.93 1.84004 11.07 1.84004 9.93001 2.48004Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <!--  -->
    <svg
      v-if="name == 'diamond'"
      width="24"
      height="21"
      viewBox="0 0 24 21"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M11.9999 20.4546L1.09082 7.9091L5.45446 1.36365H18.5454L22.909 7.9091L11.9999 20.4546Z"
        fill="#54C2FF"
      />
      <path
        d="M4.36328 7.90906L11.9996 19.9091L7.38811 7.90906H4.36328Z"
        fill="url(#paint0_linear)"
      />
      <path
        d="M12.0004 17.7272V7.90906H7.63672L12.0004 17.7272Z"
        fill="url(#paint1_linear)"
      />
      <path
        d="M12 19.9091L19.6364 7.90906H16.6116L12 19.9091Z"
        fill="url(#paint2_linear)"
      />
      <path
        d="M12 7.90906V17.7272L16.3636 7.90906H12Z"
        fill="url(#paint3_linear)"
      />
      <path d="M12 2.45447V7.90901H16.3636L12 2.45447Z" fill="#1BB9FD" />
      <path
        d="M11.9939 7.90901L12.0004 2.45447L7.63672 7.90901H11.9939Z"
        fill="#1BB9FD"
      />
      <path
        d="M18.9138 0.272705H5.08641C4.82176 0.272705 4.5751 0.405597 4.43124 0.626307L0.126514 7.20369C-0.0654243 7.49667 -0.0364965 7.88097 0.196487 8.14248L11.4145 20.7381C11.563 20.9048 11.7761 21 12.0001 21C12.2241 21 12.4371 20.9044 12.5857 20.7381L23.8037 8.14248C24.0367 7.88097 24.0652 7.49667 23.8736 7.20369L19.5689 0.625918C19.4247 0.405597 19.178 0.272705 18.9138 0.272705ZM22.0313 7.23866H17.1769L18.8692 2.40714L22.0313 7.23866ZM12.0001 19.0505L11.9778 19.0256L7.94867 8.0158H16.0687L12.0517 18.9926L12.0001 19.0505ZM8.14881 7.23866L12.0091 1.85031L15.8693 7.23866H8.14881ZM12.9516 1.827H18.2449L16.5065 6.78947L12.9516 1.827ZM7.51085 6.78947L5.77285 1.827H11.0658L7.51085 6.78947ZM7.11681 8.0158L10.5658 17.4399L2.17216 8.0158H7.11681ZM16.9009 8.0158H21.828L13.464 17.4068L16.9009 8.0158ZM5.14231 2.39004L6.84043 7.23866H1.96888L5.14231 2.39004Z"
        fill="url(#paint4_linear)"
      />
      <defs>
        <linearGradient
          id="paint0_linear"
          x1="7.63601"
          y1="7.90906"
          x2="7.63601"
          y2="16.6363"
          gradientUnits="userSpaceOnUse"
        >
          <stop stop-color="#1BCCFD" />
          <stop offset="1" stop-color="#0032E1" />
        </linearGradient>
        <linearGradient
          id="paint1_linear"
          x1="9.81854"
          y1="7.90906"
          x2="9.81854"
          y2="17.7272"
          gradientUnits="userSpaceOnUse"
        >
          <stop stop-color="#1BCCFD" />
          <stop offset="1" stop-color="#0032E1" />
        </linearGradient>
        <linearGradient
          id="paint2_linear"
          x1="16.3636"
          y1="7.90906"
          x2="16.3636"
          y2="16.6363"
          gradientUnits="userSpaceOnUse"
        >
          <stop stop-color="#1BCCFD" />
          <stop offset="1" stop-color="#0032E1" />
        </linearGradient>
        <linearGradient
          id="paint3_linear"
          x1="14.1818"
          y1="7.90906"
          x2="14.1818"
          y2="17.7272"
          gradientUnits="userSpaceOnUse"
        >
          <stop stop-color="#1BCCFD" />
          <stop offset="1" stop-color="#0032E1" />
        </linearGradient>
        <linearGradient
          id="paint4_linear"
          x1="12"
          y1="0.272705"
          x2="12"
          y2="21"
          gradientUnits="userSpaceOnUse"
        >
          <stop stop-color="#17D5FF" />
          <stop offset="1" stop-color="#7800C1" />
        </linearGradient>
      </defs>
    </svg>
    <!--  -->
    <svg
      v-if="name == 'invoice'"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M22 6V8.42C22 10 21 11 19.42 11H16V4.01C16 2.9 16.91 2 18.02 2C19.11 2.01 20.11 2.45 20.83 3.17C21.55 3.9 22 4.9 22 6Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-miterlimit="10"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M2 7V21C2 21.83 2.93998 22.3 3.59998 21.8L5.31 20.52C5.71 20.22 6.27 20.26 6.63 20.62L8.28998 22.29C8.67998 22.68 9.32002 22.68 9.71002 22.29L11.39 20.61C11.74 20.26 12.3 20.22 12.69 20.52L14.4 21.8C15.06 22.29 16 21.82 16 21V4C16 2.9 16.9 2 18 2H7H6C3 2 2 3.79 2 6V7Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-miterlimit="10"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M6 9H12"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M6.75 13H11.25"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <!--  -->
    <svg
      v-if="name == 'dashboard'"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M22 8.52V3.98C22 2.57 21.36 2 19.77 2H15.73C14.14 2 13.5 2.57 13.5 3.98V8.51C13.5 9.93 14.14 10.49 15.73 10.49H19.77C21.36 10.5 22 9.93 22 8.52Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M22 19.77V15.73C22 14.14 21.36 13.5 19.77 13.5H15.73C14.14 13.5 13.5 14.14 13.5 15.73V19.77C13.5 21.36 14.14 22 15.73 22H19.77C21.36 22 22 21.36 22 19.77Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M10.5 19.77V15.73C10.5 14.14 9.86 13.5 8.27 13.5H4.23C2.64 13.5 2 14.14 2 15.73V19.77C2 21.36 2.64 22 4.23 22H8.27C9.86 22 10.5 21.36 10.5 19.77Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <!--  -->
    <svg
      v-if="name == 'pos'"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M9.02 2.84004L3.63 7.04004C2.73 7.74004 2 9.23004 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.29004 21.19 7.74004 20.2 7.05004L14.02 2.72004C12.62 1.74004 10.37 1.79004 9.02 2.84004Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M12 17.99V14.99"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <!--  -->
    <svg
      v-if="name == 'setting'"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-miterlimit="10"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
      <path
        d="M2 12.8801V11.1201C2 10.0801 2.85 9.22006 3.9 9.22006C5.71 9.22006 6.45 7.94006 5.54 6.37006C5.02 5.47006 5.33 4.30006 6.24 3.78006L7.97 2.79006C8.76 2.32006 9.78 2.60006 10.25 3.39006L10.36 3.58006C11.26 5.15006 12.74 5.15006 13.65 3.58006L13.76 3.39006C14.23 2.60006 15.25 2.32006 16.04 2.79006L17.77 3.78006C18.68 4.30006 18.99 5.47006 18.47 6.37006C17.56 7.94006 18.3 9.22006 20.11 9.22006C21.15 9.22006 22.01 10.0701 22.01 11.1201V12.8801C22.01 13.9201 21.16 14.7801 20.11 14.7801C18.3 14.7801 17.56 16.0601 18.47 17.6301C18.99 18.5401 18.68 19.7001 17.77 20.2201L16.04 21.2101C15.25 21.6801 14.23 21.4001 13.76 20.6101L13.65 20.4201C12.75 18.8501 11.27 18.8501 10.36 20.4201L10.25 20.6101C9.78 21.4001 8.76 21.6801 7.97 21.2101L6.24 20.2201C5.33 19.7001 5.02 18.5301 5.54 17.6301C6.45 16.0601 5.71 14.7801 3.9 14.7801C2.85 14.7801 2 13.9201 2 12.8801Z"
        :stroke="$store.state.theme"
        stroke-width="1.5"
        stroke-miterlimit="10"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
  </div>
</template>

<script>
  export default {
    props: ['name'],
    data() {
      return {}
    },
  }
</script>
