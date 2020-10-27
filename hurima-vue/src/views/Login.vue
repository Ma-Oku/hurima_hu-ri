<template>
  <v-app>
  <v-card width="400px" class="mx-auto mt-5">
    <v-card-title>
      <h1 class="display-1">ログイン</h1>
    </v-card-title>
    <v-card-text>
      <v-form>
        <v-text-field 
          prepend-icon="mdi-email"
          label="メールアドレス"
          v-model="model.email" />
        <v-text-field 
          v-bind:type="showPassword ? 'text' : 'password'" 
          prepend-icon="mdi-lock" 
          v-bind:append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" 
          label="パスワード"
          v-model="model.password"
          @click:append="showPassword = !showPassword" />
        <v-card-actions>
          <v-btn class="info" @click="login">
            ログイン
          </v-btn>
          <v-btn class="info" to="/signup">
            新規登録
          </v-btn>
        </v-card-actions>
      </v-form>
    </v-card-text>
  </v-card>
    <v-container>
      <v-row justify="center">
    <v-btn class="info" @click="test">
      testでログイン
    </v-btn>
      </v-row>
      <v-row justify="center">
    <v-btn class="info" @click="test1">
      test1でログイン
    </v-btn>
      </v-row>
    </v-container>
</v-app>
</template>

<script>
export default {
  name: 'Login',
  data() {
    return{
      showPassword : false,
      model: {
        email: "",
        password: ""
      }
    }
  },
  methods: {
    async login() {
        this.axios
        .post(this.db + '/api/login',this.model)
        .then(response => {
          if (response.data) {
            localStorage.setItem('token',response.data.data.token)
            }
            this.$router.push('/')}
          ).catch(() => {
            alert('ログインに失敗しました')
          })
        },
    test() {
      this.axios
        .post(this.db + '/api/login', {email: "test@test.com",
        password:"test0000"})
        .then(response => {
          if (response.data) {
            localStorage.setItem('token',response.data.data.token)
          }
          this.$router.push('/')}
        ).catch(() => {
        alert('ログインに失敗しました')
      })
    },
    test1() {
      this.axios
        .post(this.db + '/api/login', {email: "test1@test.com",
          password:"test0000"})
        .then(response => {
          if (response.data) {
            localStorage.setItem('token',response.data.data.token)
          }
          this.$router.push('/')}
        ).catch(() => {
        alert('ログインに失敗しました')
      })
    }
    }
  }
</script>