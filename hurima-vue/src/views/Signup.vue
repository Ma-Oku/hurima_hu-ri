<template>
  <v-app>
  <v-card width="400px" class="mx-auto mt-5">
    <v-card-title>
      <h1 class="display-1">新規登録</h1>
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
        <v-text-field 
          v-bind:type="showPassword ? 'text' : 'password'" 
          prepend-icon="mdi-lock" 
          v-bind:append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" 
          label="確認用パスワード"
          v-model="password2"
          @click:append="showPassword = !showPassword" />
        <v-text-field
          prepend-icon="mdi-card-account-details"
          label="ユーザーネーム"
          v-model="model.name" />
        <v-card-actions>
          <v-btn class="info" @click="signup">
            登録
          </v-btn>
        </v-card-actions>
      </v-form>
    </v-card-text>
  </v-card>
</v-app>
</template>

<script>
export default {
  name: 'Signup',
  data() {
    return{
      showPassword : false,
      password2: '',
      model: {
        email: "",
        password: "",
        name: ""
      }
    }
  },
  methods: {
    signup() {
      if (this.model.password === this.password2) {
        this.axios
        .post(this.db + '/api/register',this.model)
        .then(response => {
          if (response.data) {
            alert('確認メールを送信しました。')
            this.$router.push('/')
          }
          }).catch(() => {
          alert('失敗')
          })
      } else {
        alert('入力内容を確認してくだい')
      }
      }
    }
  }
</script>