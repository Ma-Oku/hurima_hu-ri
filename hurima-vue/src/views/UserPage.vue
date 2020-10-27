<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <div v-else>
      <v-container style="width: 90%">
        <v-row class="grey lighten-2">
          <v-col>
            {{ user.name }}のユーザーページ
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
              出品商品
            </v-tab>
            <v-tab>
              評価一覧
            </v-tab>
          </v-tabs>
        </v-row>
        <v-tabs-items v-model="tabs">
          <!-- 出品商品 -->
          <v-tab-item>
            <v-row>
              <v-col></v-col>
            </v-row>
            <div
                v-for="(product, item) in user.products"
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
          <!-- 評価一覧 -->
          <v-tab-item>
            <v-row>
              <v-col>
                評価者
              </v-col>
              <v-col>
                コメント
              </v-col>
              <v-col>
                時間
              </v-col>
            </v-row>
            <div
              v-for="(valuers, item) in user.user_valuers"
              :key="item"
            >
              <v-row>
                <v-col>
                  {{ valuers.user.name }}さん
                </v-col>
                <v-col>
                  {{ valuers.comment}}
                </v-col>
                <v-col>
                  {{ valuers.created_at | moment }}
                </v-col>
              </v-row>
            </div>
          </v-tab-item>
        </v-tabs-items>
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
  name: "UserPage",
  data() {
    return{
      tabs: null,
      loading: true,
      user: []
    }
  },
  components: {
    Header,
    Footer,
    Loading
  },
  async created() {
    await this.axios.get(this.db + '/api/user/info/' + this.$route.params.id)
    .then(res => {
      this.user = res.data
    })
    this.loading = false
  }
}
</script>

<style scoped>

</style>