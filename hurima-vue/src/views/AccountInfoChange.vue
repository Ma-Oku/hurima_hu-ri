<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <template v-else>
      <v-container style="width: 90%">
        <v-row class="grey lighten-2">
          <v-col>
            登録住所変更
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
                v-model="real_name"
                label="名前"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
                v-model="postal_code"
                label="郵便番号"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
                v-model="address"
                label="住所"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-text-field
                v-model="phone_number"
                label="電話番号"></v-text-field>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-btn
                dark
                color="red"
                @click="infosave"
            >
              住所を保存する
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </template>
    <Footer/>
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Loading from '@/components/Loading.vue'

export default {
  name: 'AccounInfoChange',
  data() {
    return{
      loading: true,
      user: [],
      real_name: '',
      postal_code: '',
      address: '',
      phone_number: ''
    }
  },
  components: {
    Header,
    Footer,
    Loading
  },
  async created() {
    const JWT = 'Bearer '+localStorage.getItem('token')
    await this.axios.get(this.db + '/api/me', {
      headers: {
        'Authorization': JWT
      }
    }).then(resuser => { this.user = resuser.data })
    this.real_name = this.user.data.real_name
    this.postal_code = this.user.data.postal_code
    this.address = this.user.data.address
    this.phone_number = this.user.data.phone_number
    this.loading = false
  },
  methods: {
    async infosave() {
      const JWT = 'Bearer ' + localStorage.getItem('token')
      await this.axios.patch(this.db + '/api/user/profile',
          {
            real_name: this.real_name,
            address: this.address,
            postal_code: this.postal_code,
            phone_number: this.phone_number
          },
          {
            headers: {
              'Authorization': JWT
            }
          })
      alert('成功')
      await this.$router.push('/account')
    }
  }
}
</script>
