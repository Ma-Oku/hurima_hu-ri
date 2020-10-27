<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <template v-else>
      <v-container style="width: 90%">
        <v-row class="grey lighten-2">
          <v-col>
            注文詳細
          </v-col>
        </v-row>
        <v-row>
          <v-tabs
            fixed-tabs
            background-color="grey lighten-2"
            white
            v-model="tabs"
          >
            <v-tab>
              購入者取引
            </v-tab>
            <v-tab>
              販売者取引
            </v-tab>
          </v-tabs>
        </v-row>
        <v-tabs-items v-model="tabs">
          <v-tab-item>
            <v-row v-if="buy.length">
              <v-col cols=3 sm=4>
                <v-spacer>
                </v-spacer>
              </v-col>
              <v-col cols=4 sm=4>
                商品名
              </v-col>
              <v-col cols=5 sm=4>
                取引状況
              </v-col>
            </v-row>
            <div
              v-for="(buy, item) in buy"
              :key="item">
              <router-link :to=" `/order/` + buy.id ">
                <v-row>
                  <v-col cols=3 sm=4>
                    <v-img
                      height="50px"
                      width="50px"
                      :src="db + `/` + buy.product.product_file"
                    ></v-img>
                  </v-col>
                  <v-col cols=4 sm=4>
                    {{ buy.product_name }}
                  </v-col>
                  <v-col cols=5 sm=4 v-if="buy.trade_status === 1">
                    支払い待ち
                  </v-col>
                  <v-col cols=5 sm=4 v-if="buy.trade_status === 2">
                    発送待ち
                  </v-col>
                  <v-col cols=5 sm=4 v-if="buy.trade_status === 3">
                    受け取り評価待ち
                  </v-col>
                  <v-col cols=5 sm=4 v-if="buy.trade_status === 4">
                    販売者評価待ち
                  </v-col>
                  <v-col cols=5 sm=4 v-if="buy.trade_status === 6">
                    取引終了済み
                  </v-col>
                </v-row>
              </router-link>
            </div>
          </v-tab-item>
          <v-tab-item>
            <v-row v-if="sell.length">
              <v-col cols=3 sm=4>
                <v-spacer>
                </v-spacer>
              </v-col>
              <v-col cols=4 sm=4>
                商品名
              </v-col>
              <v-col cols=5 sm=4>
                取引状況
              </v-col>
            </v-row>
            <div
              v-for="(sell, item) in sell"
              :key="item">
              <router-link :to=" `/order/` + sell.id ">
              <v-row>
                <v-col cols=3 sm=4>
                <v-img
                  height="50px"
                  width="50px"
                  :src="db + `/` + sell.product.product_file"
                ></v-img>
              </v-col>
                <v-col cols=4 sm=4>
                  {{ sell.product_name }}
                </v-col>
              <v-col cols=5 sm=4 v-if="sell.trade_status === 1">
                支払い待ち
              </v-col>
              <v-col cols=5 sm=4 v-if="sell.trade_status === 2">
                発送待ち
              </v-col>
              <v-col cols=5 sm=4 v-if="sell.trade_status === 3">
                受け取り評価待ち
              </v-col>
              <v-col cols=5 sm=4 v-if="sell.trade_status === 4">
                販売者評価待ち
              </v-col>
              <v-col cols=5 sm=4 v-if="sell.trade_status === 6">
                取引終了済み
              </v-col>
              </v-row>
              </router-link>
            </div>
          </v-tab-item>
        </v-tabs-items>
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
  name: 'OrderList',
  data() {
    return{
      loading: true,
      tabs: null,
      buy: [],
      sell: []
    }
  },
  components: {
    Header,
    Footer,
    Loading
  },
  async created() {
    const JWT = 'Bearer '+localStorage.getItem('token')
    this.axios.get(this.db + '/api/orderbuy', {
      headers: {
        'Authorization': JWT 
      }
    }).then(resbuy => { this.buy = resbuy.data })
    await this.axios.get(this.db + '/api/ordersell', {
      headers: {
        'Authorization': JWT 
      }
    }).then(ressell => { this.sell = ressell.data })
    this.loading = false
  }
}
</script>