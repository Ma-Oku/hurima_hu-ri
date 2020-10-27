<template>
  <v-card
  >
    <v-app-bar
      app
      color="pink lighten-2"
      dark
      elevate-on-scroll
      height="100px"
    >
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

      <v-toolbar-title v-if="$route.path === '/'"
          style="cursor: pointer" @click="reload">フーリ</v-toolbar-title>
      <v-toolbar-title v-else
          style="cursor: pointer" @click="$router.push('/')">フーリ</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-text-field
        v-model="searchtext"
        label="商品名検索"
        @keyup.enter="search"
        @keypress="setCanMessageSubmit"
      >
      </v-text-field>

      <v-btn 
        icon
        @click="search"
      >
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <template v-if="!$vuetify.breakpoint.xs && !load">
        <v-spacer></v-spacer>
      </template>

      <template v-if="!$vuetify.breakpoint.xs && load">
        <v-spacer></v-spacer>

        <v-spacer v-if="name">
          <h5>ログイン中：{{ name }}</h5>
        <v-btn
          outlined
          @click="logout">ログアウト</v-btn>
        </v-spacer>

        <div v-else>
        <v-btn
          outlined
          to="/signup">新規登録</v-btn>
        <v-btn
          outlined
          to="/login">ログイン</v-btn>
        </div>
      </template>
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      fixed
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item
            to="/"
          >
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title>ホーム</v-list-item-title>
          </v-list-item>

          <v-list-item
            to="/newproduct"
          >
            <v-list-item-icon>
              <v-icon>mdi-new-box</v-icon>
            </v-list-item-icon>
            <v-list-item-title>新着商品</v-list-item-title>
          </v-list-item>

          <v-list-item
            to="/product/registra"
          >
            <v-list-item-icon>
              <v-icon>mdi-publish</v-icon>
            </v-list-item-icon>
            <v-list-item-title>新規出品</v-list-item-title>
          </v-list-item>

          <v-list-item
            to="/order/list"
          >
            <v-list-item-icon>
              <v-icon>mdi-history</v-icon>
            </v-list-item-icon>
            <v-list-item-title>取引詳細</v-list-item-title>
          </v-list-item>

          <v-list-item
            to="/account"
          >
            <v-list-item-icon>
              <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
            <v-list-item-title>アカウント情報</v-list-item-title>
          </v-list-item>

          <v-list-item
            to="/contact"
          >
            <v-list-item-icon>
              <v-icon>mdi-account-tie-voice</v-icon>
            </v-list-item-icon>
            <v-list-item-title>お問い合わせ</v-list-item-title>
          </v-list-item>

        </v-list-item-group>
      </v-list>

      <template v-slot:append v-if="load">
        <div class="pa-2" v-if="name">
          <h5>ログイン中：{{ name }}</h5>
          <v-btn
            block
            color="grey"
            @click="logout">ログアウト</v-btn>
        </div>

        <div class="pa-2" v-else>
          <v-btn
            block
            color="grey"
            to="/signup">新規登録</v-btn>
          <v-btn
            block
            color="grey"
            to="/login">ログイン</v-btn>
        </div>
      </template>
    </v-navigation-drawer>
  </v-card>
</template>

<script>
  export default {
    data() {
      return{
        drawer: false,
        load: false,
        name: '',
        cart: [],
        cartitems: [],
        searchtext: '',
        canMessageSubmit: false
      }
    },
    async created() {
      if(this.$route.query.search){
        this.searchtext = this.$route.query.search
      }
      if (localStorage.getItem('token')){
      const JWT = 'Bearer '+localStorage.getItem('token')
      await this.axios.get(this.db + '/api/me', {
        headers: {
          'Authorization': JWT
        }
      })
      .then(res => (
        this.name = res.data.data.name))
      .catch(() => {
        localStorage.removeItem('token')
      })
      }
      this.load = true
    },
    methods: {
      logout() {
        localStorage.removeItem('token')
        window.location.reload()
      },
      setCanMessageSubmit() {
        this.canMessageSubmit = true
      },
      async search() {
        if (!this.canMessageSubmit) {
          return
        }
          await this.$router.push('/product/list?search=' + this.searchtext + '&category=全て' +
              '&quantity=10')
      },
      reload() {
        window.location.reload()
      }
    },
    watch: {
    }
  }
</script>
