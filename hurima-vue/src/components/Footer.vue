<template>
    <v-card
      color="pink lighten-2"
      class="white--text text-center"
    >
      <v-card-text>
        <v-btn
          v-for="icon in icons"
          :key="icon"
          class="mx-4 white--text"
          icon
        >
          <v-icon size="24px">{{ icon }}</v-icon>
        </v-btn>
      </v-card-text>

      <v-card-text class="white--text pt-0">
        各種SNSあります。新情報を発信しています。
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="white--text">
        since 2020 — <strong>Hu-ri</strong>
      </v-card-text>
    </v-card>
</template>

<script>
  export default {
    data() {
      return{
        icons: [
          'mdi-facebook',
          'mdi-twitter',
          'mdi-linkedin',
          'mdi-instagram',
        ],
      }
    },
  }
</script>