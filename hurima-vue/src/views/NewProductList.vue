<template>
  <div class="newproductlist">
    <Header/>
    <Loading v-if="loading"></Loading>
      <template v-else>
        <v-container style="width: 90%">
          <v-row>
            新着アイテム
          </v-row>
            <Card
            :data="products.data">
            </Card>
        </v-container>
        <v-container>
          <v-row justify="center">
            <v-col cols="8">
              <v-container class="max-width">
                <v-pagination
                    v-model="page"
                    class="my-4"
                    :length="products.last_page"
                    @input="pagenation"
                ></v-pagination>
              </v-container>
            </v-col>
          </v-row>
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
  name: 'NewProductList',
  data() {
    return{
      products: [],
      loading: true,
      page: '',
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
    .get(this.db + '/api/newproduct?page=' + this.$route.query.page)
    .then(response => {
      this.products = response.data
      this.page = response.data.current_page
    })
    this.loading = false
  },
  methods: {
    pagenation() {
      this.$router.push('/newproduct?page=' + this.page)
    }
  },
  watch: {
    '$route': async function() {
      this.loading = true
      await this.axios
          .get(this.db + '/api/newproduct?page=' + this.$route.query.page)
          .then(response => {
            this.products = response.data
            this.page = response.data.current_page
          })
      this.loading = false

    }
  }
}
</script>
