<template>
  <div>
    <Header/>
    <Loading v-if="loading"></Loading>
    <template v-else>
      <v-container>
        <v-row align="center">
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
                    商品名
                  </v-col>
                  <v-col>
                    {{ order.product_name }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    価格
                  </v-col>
                  <v-col>
                    {{ order.product_price }}円
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    購入者の本名
                  </v-col>
                  <v-col>
                    {{ order.buyer_name }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    購入者の住所
                  </v-col>
                  <v-col>
                    〒{{ order.buyer_postal_code }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    <v-spacer></v-spacer>
                  </v-col>
                  <v-col>
                    {{ order.buyer_address }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    電話番号
                  </v-col>
                  <v-col>
                    {{ order.buyer_phone_number }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    販売者の本名
                  </v-col>
                  <v-col>
                    {{ order.seller_name }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    販売者の住所
                  </v-col>
                  <v-col>
                    〒{{ order.seller_postal_code }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    <v-spacer></v-spacer>
                  </v-col>
                  <v-col>
                    {{ order.seller_address }}
                  </v-col>
                </v-row>
                <v-row justify="center" class="title">
                  <v-col>
                    電話番号
                  </v-col>
                  <v-col>
                    {{ order.seller_phone_number }}
                  </v-col>
                </v-row>
              </v-container>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>

      <v-container>
        <v-stepper
          v-model="order.trade_status"
          vertical
        >
          <v-stepper-step
            :complete="order.trade_status > 1"
            step="1"
          >
            支払い待ち
          </v-stepper-step>

          <v-stepper-content step="1" v-if="order.buyer_id === user_id">
            <v-container v-if="order.pay_status === 0">
              <v-row>
                <v-col>
                  <v-btn @click="paypay">
                    paypayで支払う
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>

            <v-container v-if="order.pay_status === 0.1">
              <v-row>
                <v-col>
                  <v-btn @click="trade_status_change(2)">
                    支払い完了を通知する
                  </v-btn>
                </v-col>
                <v-col>
                  <v-btn @click="trade_status_change(7)">
                    支払い無視で進める
                  </v-btn>
                </v-col>
                <v-col>
                  <v-btn @click="recreate">
                    paypayの支払いページへ
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-stepper-content>

          <v-stepper-step
            :complete="order.trade_status > 2"
            step="2"
          >
            発送待ち
          </v-stepper-step>

          <v-stepper-content step="2" v-if="order.seller_id === user_id">
            <v-container>
              <v-row>
                <v-col>
                  <v-btn @click="trade_status_change(3)">
                    発送完了
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-stepper-content>


          <v-stepper-step
            :complete="order.trade_status > 3"
            step="3"
          >
            受け取り評価待ち
          </v-stepper-step>

          <v-stepper-content step="3" v-if="order.buyer_id === user_id">
            <v-container>
              <v-row>
                <v-col>
                  コメント
                </v-col>
                <v-col>
                  <v-text-field
                      v-model="comment"
                      label="コメント">
                  </v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  評価
                </v-col>
                <v-col>
                  <v-select
                      v-model="evaluate"
                      :items='this.evaluates'
                      label="評価">
                  </v-select>
                </v-col>
              </v-row>

              <v-row>
                <v-col>
                  <v-btn @click="trade_status_change(4)">
                    受け取り完了
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>

          </v-stepper-content>

          <v-stepper-step
            :complete="order.trade_status > 4"
            step="4"
          >
            販売者評価待ち
          </v-stepper-step>

          <v-stepper-content step="4" v-if="order.seller_id === user_id">
            <v-container>
              <v-row>
                <v-col>
                  コメント
                </v-col>
                <v-col>
                  <v-text-field
                      v-model="comment"
                      label="コメント">
                  </v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  評価
                </v-col>
                <v-col>
                  <v-select
                      v-model="evaluate"
                      :items='this.evaluates'
                      label="評価">
                  </v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col>
                  <v-btn @click="trade_status_change(5)">
                    評価完了
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-stepper-content>

          <v-stepper-step
            :complete="order.trade_status > 5"
            step="5"
          >
            取引終了
          </v-stepper-step>

          <v-stepper-content step="5">
          </v-stepper-content>

        </v-stepper>
      </v-container>

      <v-container style="width: 90%">
        <v-row justify="center" class="title">
          取引へのコメント
        </v-row>
        <v-sheet
            v-if="order.order_comments.length"
            color="grey lighten-1"
            class="rounded-xl"
            elevation="1"
            max-height="auto"
            max-width="auto"
        >
          <v-container style="width: 95%">
            <v-row
                v-for="(orders, item) in order.order_comments "
                :key="item">
              <v-col cols=2 sm=5 v-if="orders.user_id === user_id">
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
                    <v-row>
                      <v-col>
                        {{ orders.user.name }}さん
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        {{ orders.order_comment }}
                      </v-col>
                    </v-row>
                    <v-row>
                      <v-col>
                        {{ orders.created_at | moment }}
                      </v-col>
                    </v-row>
                  </v-container>
                </v-sheet>
              </v-col>
              <v-col cols=2 sm=5 v-if="orders.user_id !== user_id">
                <v-spacer></v-spacer>
              </v-col>
            </v-row>
          </v-container>
        </v-sheet>

        <v-row v-if="order.trade_status !== 6">
          <v-col>
            <v-text-field
                v-model="message"
                label="取引メッセージ">
              取引メッセージ
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
  name: 'Order',
  data() {
    return{
      loading: true,
      user_id: '',
      dbfile: '',
      order: [],
      comment: '',
      evaluate: '良い',
      evaluates: ['良い','普通','悪い'],
      message: '',
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
      this.$router.push('/error')
    })
    await this.axios.get(this.db + '/api/order/' + this.$route.params.id, {
      headers: {
        'Authorization': JWT 
      }
    })
    .then(res => {
      this.order = res.data
      if (this.order.buyer_id === this.user_id || this.order.seller_id === this.user_id) {
      this.dbfile = this.db + '/' + this.order.product.product_file
      this.loading=false
      } else {
        this.$router.push('/error')
      }
    })
    .catch(() =>{
      this.$router.push('/error')
    })
  },
  methods: {
    async savemessage() {
      const JWT = 'Bearer '+localStorage.getItem('token')
      await this.axios.post(this.db + '/api/order/comment', {
        order_id: this.$route.params.id,
        order_comment: this.message
      },
      {
        headers: {
          'Authorization': JWT 
        }
      })
      alert('送信完了')
      window.location.reload()
    },
    async paypay(){
      const JWT = 'Bearer '+localStorage.getItem('token')
      await this.axios.get(this.db + '/api/order/pay/' + this.$route.params.id,
  {
          headers: {
            'Authorization': JWT
          }
        })
      .then(res =>{
        window.open(res.data.qr_url, '_blank')
      })
    },
    async recreate(){
      await this.axios.get(this.db + '/api/paypayrecreate/' + this.$route.params.id)
      .then(res =>{
        if(res.data.status === 'COMPLETED') {
          alert('支払い済みです。')
        } else {
          window.open(res.data.qr_url, '_blank')
        }
      })
    },
    async trade_status_change(status) {
      const JWT = 'Bearer '+localStorage.getItem('token')
      if (status === 2) {
        await this.axios.patch(this.db + '/api/order/' + this.$route.params.id, {
            trade_status: status
          },
          {
            headers: {
              'Authorization': JWT
            }
          })
          .then(res => {
            if(res.data.status === 'CREATED') {
              alert('支払いが確認できません')
              window.location.reload()
            }
            if(res.data.status === 'COMPLETED') {
              alert('成功')
              window.location.reload()
            }
          })
      }
      if (status === 3) {
        await this.axios.patch(this.db + '/api/order/' + this.$route.params.id, {
          trade_status: status
        }, 
        {
          headers: {
            'Authorization': JWT 
          }
        })
        alert('成功')
        window.location.reload()
      }
      if (status === 4) {
        await this.axios.patch(this.db + '/api/order/' + this.$route.params.id, {
          trade_status: status,
          buyer_comment: this.comment,
          buyer_evaluate: this.evaluate
        }, 
        {
          headers: {
            'Authorization': JWT 
          }
        })
        alert('成功')
        window.location.reload()
      }
      if (status === 5) {
        await this.axios.patch(this.db + '/api/order/' + this.$route.params.id, {
          trade_status: status,
          seller_comment: this.comment,
          seller_evaluate: this.evaluate
        }, 
        {
          headers: {
            'Authorization': JWT 
          }
        })
        alert('成功')
        window.location.reload()
      }
      if (status === 7) {
        await this.axios.patch(this.db + '/api/order/' + this.$route.params.id, {
            trade_status: status
          },
          {
            headers: {
              'Authorization': JWT
            }
          })
        alert('成功')
        window.location.reload()
      }
    }
  }
}
</script>