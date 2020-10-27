<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <template v-else>
      <v-container style="width: 90%">
        <v-row class="grey lighten-2">
          <v-col>
            アカウント操作一覧
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
              登録情報
            </v-tab>
            <v-tab>
              出品商品
            </v-tab>
          </v-tabs>
        </v-row>
        <v-tabs-items v-model="tabs">
          <!-- 登録情報 -->
          <v-tab-item>
            <v-row>
              <v-col>
                ニックネーム：{{ user.data.name }}
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                本名：{{ user.data.real_name }}
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                郵便番号：{{ user.data.postal_code }}
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                住所：{{ user.data.address }}
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                電話番号：{{ user.data.phone_number }}
              </v-col>
            </v-row>
            <v-row>
              <v-col>
                <v-btn to="/account/infochange">
                  登録住所を変更する
                </v-btn>
              </v-col>
            </v-row>
          </v-tab-item>
          <!-- 出品商品 -->
          <v-tab-item>
            <div
              v-for="(product, item) in product"
              :key="item">
            <router-link :to=" `/product/` + product.id ">
            <v-row>
              <v-col>
                <v-img
                  height="50px"
                  width="50px"
                  :src="db + `/` + product.product_file"
                ></v-img>
              </v-col>
              <v-col>
                商品名：{{ product.product_name }}
              </v-col>
              <v-col>
                値段：{{ product.product_price}}円
              </v-col>
              <v-col v-if="product.sales_status === 0">
                販売状況：販売中
              </v-col>
              <v-col v-if="product.sales_status === 1">
                販売状況：売り切れ
              </v-col>
              <v-col v-if="product.sales_status === 2">
                販売状況：販売停止中
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
  name: 'Account',
  data() {
    return{
      loading: true,
      tabs: null,
      user: [],
      product: [],
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
    await this.axios.get(this.db + '/api/me', {
      headers: {
        'Authorization': JWT 
      }
    }).then(resuser => { this.user = resuser.data })
    .catch(() => {
      localStorage.removeItem('token')
      this.$router.push('/error')
    })
    await this.axios.get(this.db + '/api/putonproduct', {
      headers: {
        'Authorization': JWT 
      }
    }).then(respro => { this.product = respro.data })
    this.loading = false
  }
}
</script>