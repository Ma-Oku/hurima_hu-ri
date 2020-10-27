<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <template v-else>
      <v-container>
        <v-row>
          <v-col cols=12 sm=7>
            <v-img
            max-height="400px"
            contain
            :src='this.dbfile'
            >
            </v-img>
          </v-col>
          <v-col cols=12 sm=5>
            <v-sheet
                color="grey lighten-5"
                elevation="1"
                max-height="auto"
                max-width="auto"
            >
              <v-container>
                <v-row class="title">
                  <v-col>
                    商品詳細
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    商品タイトル
                  </v-col>
                  <v-col>
                    {{ product.product_name }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    価格
                  </v-col>
                  <v-col>
                    {{ product.product_price }}円
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    カテゴリー
                  </v-col>
                  <v-col>
                    {{ product.category }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    発送地域
                  </v-col>
                  <v-col>
                    {{ product.region_shipping }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    発送までの日数
                  </v-col>
                  <v-col>
                    {{ product.send_time }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    出品者情報
                  </v-col>
                  <v-col :to="`/user/` + user_id">
                    {{ username }}
                  </v-col>
                </v-row>
              </v-container>
            </v-sheet>
          </v-col>
        </v-row>
        <v-row
        justify="center"
        v-if="product.sales_status === 0"
        >
          <v-btn
            v-if="product.user_id === user_id"
            color="red"
            dark
            :to="`/product/edit/` + product.id"
          >
            編集画面へ
          </v-btn>
        </v-row>
      </v-container>

      <v-container style="width: 90%">
        <v-row
          justify="center"
          v-if="product.sales_status === 0"
        >
          <v-btn
            v-if="product.user_id !== user_id"
            block
            color="red"
            elevation="5"
            large
            x-large
            @click="order"
          >
            商品の購入確認画面へ
          </v-btn>
        </v-row>
        <v-row
            justify="center"
            v-else
            class="red--text font-weight-bold display-1"
        >
          売り切れ
        </v-row>
      </v-container>

      <v-container style="width: 90%">
        <v-sheet
          color="grey lighten-5"
          elevation="1"
          max-height="auto"
          max-width="auto"
        >
        <v-row justify="center" class="title">
          商品説明
        </v-row>
        <v-row justify="center" class="subtitle-1">
          {{ product.product_explanation }}
        </v-row>
        </v-sheet>
      </v-container>

      <v-container style="width: 90%">
        <v-row justify="center" class="title">
          商品へのコメント
        </v-row>

        <v-sheet
            v-if="product.product_comments.length"
            color="grey lighten-1"
            class="rounded-xl"
            elevation="1"
            max-height="auto"
            max-width="auto"
        >
          <v-container style="width: 95%">
        <v-row
          v-for="(products, item) in product.product_comments "
          :key="item"
        >
          <v-col cols=2 sm=5 v-if="products.user.id !== product.user_id">
          <v-spacer></v-spacer>
          </v-col>
          <v-col cols=10 sm=7>
          <v-sheet
              color="grey lighten-5"
              class="rounded-xl"
              elevation="1"
              max-height="auto"
              max-width="auto"
          >
            <v-container>
                <v-row v-if="products.user.id !== product.user_id">
                  <v-col>
                  {{ products.user.name }}さん
                  </v-col>
                </v-row>
                <v-row v-if="products.user.id === product.user_id">
                  <v-col>
                  出品者
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                  {{ products.product_comment }}
                  </v-col>
                </v-row>
              <v-row>
                <v-col>
                  {{ products.created_at | moment }}
                </v-col>
              </v-row>
            </v-container>
          </v-sheet>
          </v-col>
          <v-col cols=2 sm=5 v-if="products.user.id === product.user_id">
            <v-spacer></v-spacer>
          </v-col>
        </v-row>
          </v-container>
        </v-sheet>

        <v-row v-if="product.sales_status !== 1">
          <v-col>
            <v-text-field
              v-model="message"
              label="商品へのコメント">
              商品へのコメント
            </v-text-field>
          </v-col>
          <v-col>
            <v-btn @click="savemessage">
              送信
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
  name: 'Product',
  data() {
    return{
      loading: true,
      product: [],
      dbfile: '',
      username: '',
      user_id: '',
      message: ''
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
    })
    .then(res => {
      this.user_id = res.data.data.id})
    .catch(() => {
      localStorage.removeItem('token')
    })
    await this.axios.get(this.db + '/api/product/' + this.$route.params.id)
    .then(res => {this.product = res.data
      this.dbfile = this.db + '/' + this.product.product_file
      this.username = this.product.user.name
      this.loading = false
    }).catch(() => {
        this.$router.push('/error')
      })
  },
  methods: {
    async order(){
      if (this.user_id){
        await this.$router.push(`/order/registra/` + this.product.id)
      } else {
        alert('ログインしてください')
      }
    },
    async savemessage() {
      const JWT = 'Bearer '+localStorage.getItem('token')
      await this.axios.post(this.db + '/api/product/comment', {
        product_id: this.$route.params.id,
        product_comment: this.message
      },
      {
        headers: {
          'Authorization': JWT 
        }
      })
      alert('送信完了')
      window.location.reload()
    }
  }
}
</script>

<style scoped>
.subtitle-1 {
  white-space:pre-line; word-wrap: break-word;
}
</style>
