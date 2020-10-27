<template>
  <div>
    <Header/>
    <v-container style="width: 90%">

      <v-row class="grey lighten-2">
        <v-col>
          新規出品
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
            type="number"
            label="価格"
            max="999999"
            min="300"
          >
          </v-text-field>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          商品説明
        </v-col>
        <v-col>
          <v-textarea
            v-model="product_explanation"
            label="商品説明">
          </v-textarea>
        </v-col>
      </v-row>

      <v-row class="border-grey">
        <v-col>
          入力した商品説明のイメージ
        </v-col>
        <v-col class="text">
          {{ product_explanation }}
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

      <v-row class="border-grey">
        <v-col>
          商品画像
        </v-col>
        <v-col>
          <label>File
            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
          </label>
        </v-col>
      </v-row>

      <v-row>
        <v-col>
          <v-btn 
          dark
          color="red"
          @click.stop="dialog = true">登録</v-btn>
        </v-col>
      </v-row>

      <!-- ダイアログ-->
      <v-row justify="center">
        <v-dialog
          v-model="dialog"
          max-width="290"
        >
          <v-card>
            <v-card-title class="headline">商品の出品を確定しますか？</v-card-title>

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
                @click="productregi"
              >
                出品を確定
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-row>
    </v-container>
    <Footer/>
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'

export default {
  name: 'ProductRegistra',
  data() {
    return{
      dialog: false,
      product_name: '',
      product_price: '',
      product_explanation: '',
      category: '',
      region_shipping: '',
      send_times: ['1〜2日以内','3〜5日以内','6〜7日以内'],
      send_time: '',
      product_file: ''
    }
  },
  components: {
    Header,
    Footer
  },
  methods:{
    handleFileUpload() {
      this.product_file = this.$refs.file.files[0]
    },
    productregi() {
      let formData = new FormData()
      formData.append('product_name', this.product_name)
      formData.append('product_price', this.product_price)
      formData.append('product_explanation', this.product_explanation)
      formData.append('category', this.category)
      formData.append('region_shipping', this.region_shipping)
      formData.append('send_time', this.send_time)
      formData.append('product_file', this.product_file)
      const JWT = 'Bearer '+localStorage.getItem('token')
      this.axios.post(this.db + '/api/product',
      formData,
      {headers: {
        'Authorization': JWT }
      }).then(() => {
      alert('登録成功')
      this.$router.push('/')
      })
    }
  }
}
</script>

<style scoped>
.border-grey {
  border-bottom: solid 1px #E0E0E0;
  border-right: solid 1px #E0E0E0;
  border-left: solid 1px #E0E0E0;
}
.text {
  white-space:pre-line; word-wrap: break-word;
}
</style>
