<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <template v-else>
      <v-container style="width: 90%">
        <v-row class="grey lighten-2">
          <v-col>
            購入予定商品
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            商品名:{{ product.product_name }}
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            価格:{{ product.product_price }}円
          </v-col>
        </v-row>
      </v-container>

      <v-container style="width: 90%">
        <v-row class="grey lighten-2">
          <v-col>
            発送先住所
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

      <v-container style="width: 90%">
        <v-row>
          <v-col>
            <v-btn
              dark
              color="red"
              @click.stop="dialog = true"
            >
              注文確定する
            </v-btn>
          </v-col>
        </v-row>

        <!-- ダイアログ-->
        <v-row justify="center">
          <v-dialog
            v-model="dialog"
            max-width="290"
          >
            <v-card>
              <v-card-title class="headline">注文を確定しますか？</v-card-title>

              <v-card-text>
                確定した注文の変更はできません。
              </v-card-text>

              <v-container style="width: 90%">
                <v-row class="grey lighten-2">
                  <v-col>
                    購入予定商品
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    商品名：{{ product.product_name }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    価格：{{ product.product_price }}円
                  </v-col>
                </v-row>
              </v-container>

              <v-container style="width: 90%">
                <v-row class="grey lighten-2">
                  <v-col>
                    購入者情報
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    名前：{{ real_name }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    郵便番号：{{ postal_code }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    住所：{{ address }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    電話番号：{{ phone_number }}
                  </v-col>
                </v-row>
              </v-container>

              <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn
                  color="green darken-1"
                  text
                  @click="dialog = false"
                >
                  キャンセル
                </v-btn>

                <v-btn
                  color="red"
                  text
                  @click="ordersave"
                >
                  注文を確定
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
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
  name: 'OrderRegistra',
  data() {
    return{
      loading: true,
      dialog: false,
      user: [],
      product: [],
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
    await this.axios.get(this.db + '/api/product/' + this.$route.params.id)
    .then(resproduct => { this.product = resproduct.data })
    this.loading = false
  },
  methods: {
    async infosave() {
      const JWT = 'Bearer '+localStorage.getItem('token')
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
    },
    async ordersave() {
      const JWT = 'Bearer '+localStorage.getItem('token')
      await this.axios.post(this.db + '/api/order', {
        product_id: this.product.id
      },
      {
        headers: {
          'Authorization': JWT 
        }
      })
      alert('注文完了')
      await this.$router.push('/order/list')
    }
  }
}
</script>