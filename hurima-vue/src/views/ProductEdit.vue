<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <div v-else>
      <v-container style="width: 90%">

       <v-row class="grey lighten-2">
        <v-col>
          商品編集
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          商品名
        </v-col>
        <v-col>
          <v-text-field
            v-model="product_name"
            label="商品名">
          </v-text-field>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          価格
        </v-col>
        <v-col>
          <v-text-field
            v-model="product_price"
            label="価格">
          </v-text-field>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          商品説明
        </v-col>
        <v-col>
          <v-text-field
            v-model="product_explanation"
            label="商品名">
          </v-text-field>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          カテゴリ−
        </v-col>
        <v-col>
          <v-select
            v-model="category"
            :items='this.categorys'
            label="カテゴリー">
          </v-select>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          発送元地域
        </v-col>
        <v-col>
          <v-select
            v-model="region_shipping"
            :items='this.region_shippings'
            label="発送元地域">
          </v-select>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          発送までの日数
        </v-col>
        <v-col>
          <v-select
            v-model="send_time"
            :items='send_times'
            label="発送までの日数">
          </v-select>
        </v-col>
      </v-row>

      <v-row>
        <v-btn
          color="red"
          dark
          @click.stop="change = true"
        >
          変更する
        </v-btn>
        <v-btn
          color="red"
          dark
          @click.stop="dele = true"
        >
          削除する
        </v-btn>
      </v-row>

      <!-- 編集ダイアログ-->
      <v-row justify="center">
        <v-dialog
          v-model="change"
          max-width="290"
        >
          <v-card>
            <v-card-title class="headline">商品の変更を確定しますか？</v-card-title>

            <v-card-actions>
              <v-spacer></v-spacer>

              <v-btn
                color="green darken-1"
                text
                @click="change = false"
              >
                キャンセル
              </v-btn>

              <v-btn
                color="red"
                text
                @click="productedit"
              >
                編集を確定
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>

      <!-- 削除ダイアログ-->
      <v-row justify="center">
        <v-dialog
          v-model="dele"
          max-width="290"
        >
          <v-card>
            <v-card-title class="headline">本当に商品を削除しますか？</v-card-title>

            <v-card-actions>
              <v-spacer></v-spacer>

              <v-btn
                color="green darken-1"
                text
                @click="dele = false"
              >
                キャンセル
              </v-btn>

              <v-btn
                color="red"
                text
                @click="productdelete"
              >
                削除を確定
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>


      </v-container>
    </div>
    <Footer/>
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Loading from '@/components/Loading.vue'

export default {
  name: 'ProductEdit',
  data() {
    return{
      loading: true,
      change: false,
      dele: false,
      product: [],
      product_name: '',
      product_price: '',
      product_explanation: '',
      category: '',
      region_shipping: '',
      send_times: ['1〜2日以内','3〜5日以内','6〜7日以内'],
      send_time: ''
    }
  },
  components: {
    Header,
    Footer,
    Loading
  },
  async created() {
    await this.axios.get(this.db + '/api/product/' + this.$route.params.id)
    .then(res => (this.product = res.data))
    if(this.product.sales_status === 1) {
      alert('販売済みの商品は編集できません。')
      await this.$router.push('/account')
    }
    this.product_name = this.product.product_name
    this.product_price = this.product.product_price
    this.product_explanation = this.product.product_explanation
    this.category = this.product.category
    this.region_shipping = this.product.region_shipping
    this.send_time = this.product.send_time
    this.loading = false
  },
  methods: {
    productedit(){
      const JWT = 'Bearer '+localStorage.getItem('token')
      this.axios.patch(this.db + '/api/product/' + this.$route.params.id, {
        product_name: this.product_name,
        product_price: this.product_price,
        send_time: this.send_time,
        category: this.category,
        product_explanation: this.product_explanation,
        region_shipping: this.region_shipping
      },
      {
        headers: {
          'Authorization': JWT
        }
      })
      .then(() => {
        alert('変更しました。')
        this.$router.push('/account')
      })
      .catch(() => {
        this.$router.push('/error')
      })
    },
    productdelete(){
      const JWT = 'Bearer '+localStorage.getItem('token')
      this.axios.delete(this.db + '/api/product/' + this.$route.params.id, {
        headers: {
          'Authorization': JWT
        }
      })
      .then(() => {
        alert('削除しました。')
        this.$router.push('/account')
      })
      .catch(() => {
        this.$router.push('/error')
      })
    }
  }
}
</script>