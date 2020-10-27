<template>
  <div class="productlist">
    <Header/>
    <Loading v-if="loading"></Loading>
      <template v-else>
        <v-container style="width: 90%">
          <v-row>
            <v-col cols=4>
              <v-select
                :items="searchcategorys"
                label="カテゴリー"
                outlined
                v-model="category"
                @input="category_search"
              >
              </v-select>
            </v-col>
            <v-col cols=4>
              <v-select
                  :items="quantitys"
                  label="表示する個数"
                  outlined
                  v-model="quantity"
                  @input="quantity_search"
              >
              </v-select>
            </v-col>
          </v-row>
          <v-row>
            検索したアイテム
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
                    :length=products.last_page
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
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
import Card from '@/components/Card.vue'
import Loading from '@/components/Loading.vue'

export default {
  name: 'ProductList',
  data() {
    return{
      products: [],
      loading: true,
      page: '',
      category: '',
      quantity: ''
    }
  },
  components: {
    Header,
    Footer,
    Card,
    Loading
  },
  async created() {
    this.category = this.$route.query.category
    this.quantity = this.$route.query.quantity
    if (this.$route.query.search) {
    await this.axios.get(this.db + '/api/productlist?page=' + this.$route.query.page +
        '&search=' + this.$route.query.search + '&category=' + this.$route.query.category +
    '&quantity=' + this.$route.query.quantity)
    .then(response => {
      this.products = response.data
      this.page = response.data.current_page
    })
    } else {
    await this.axios
    .get(this.db + '/api/product')
    .then(response => (this.products = response.data))
    }
    this.loading = false
  },
  methods: {
    pagenation() {
      this.$router.push('/product/list?search=' + this.$route.query.search + '&category=' + this.category + '&page=' + this.page)
    },
    category_search() {
      this.$router.push('/product/list?search=' + this.$route.query.search + '&category=' + this.category + '&page=1' +
          '&quantity=' + this.quantity)
    },
    quantity_search() {
      this.$router.push('/product/list?search=' + this.$route.query.search + '&category=' + this.category + '&page=1' +
          '&quantity=' + this.quantity)
    }
  },
  watch: {
    '$route': async function() {
      this.category = this.$route.query.category
      this.quantity = this.$route.query.quantity
      this.loading = true
      if (this.$route.query.search) {
        await this.axios.get(this.db + '/api/productlist?page=' + this.$route.query.page +
            '&search=' + this.$route.query.search + '&category=' + this.$route.query.category +
            '&quantity=' +this.$route.query.quantity)
            .then(response => {
              this.products = response.data
              this.page = response.data.current_page
            })
      } else {
        await this.axios
            .get(this.db + '/api/product')
            .then(response => (this.products = response.data))
      }
      this.loading = false
    }
  }
}
</script>