<template>
  <div class="home">
    <Header/>
    <Loading v-if="loading"></Loading>
      <template v-else>
        <v-container style="width: 90%">
          お知らせ
        </v-container>
        <v-container style="width: 90%">
          <v-row>
            おすすめアイテム(ランダムに１２件表示しています)
          </v-row>
          <Card
            :data="products">
          </Card>
        </v-container>
      </template>
    <Footer/>
  </div>
</template>

<script>
// @ is an alias to /src
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Card from '@/components/Card.vue'
import Loading from '@/components/Loading.vue'


export default {
  name: 'Home',
  data() {
    return{
      products: [],
      loading: true
    }
  },
  components: {
    Header,
    Footer,
    Card,
    Loading
  },
  async created() {
    await this.axios
    .get(this.db + '/api/product/random')
    .then(response => (this.products = response.data))
    this.loading = false
  }
}
</script>
