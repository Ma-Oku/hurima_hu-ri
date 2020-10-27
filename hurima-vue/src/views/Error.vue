<template>
  <div>
    <Header/>
      不正な操作です。ホームに戻ってやり直してください。
      何度もこの画面が表示される場合は問合せお願いします。
    <Footer/>
  </div>
</template>

<script>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'

export default {
  data() {
    return{

    }
  },
  components: {
  Header,
  Footer
  }
}
</script>