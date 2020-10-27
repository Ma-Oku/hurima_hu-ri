<template>
  <div>
    <v-row>
    <v-col cols=6 sm=4 md=3
      v-for="(product, item) in data"
      :key="item"
    >
      <v-card
        class="mx-auto"
        width="200"
        height="300"
        :to="`/product/` + product.id"
      >
        <v-img
          height="200px"
          width="200px"
          class="black--text align-end"
          :src="db + `/` + product.product_file"
        >
        <v-card-title class=red v-if="product.sales_status === 1">売り切れ</v-card-title>
        <v-card-title>{{ product.product_price }}円</v-card-title>
        </v-img>
        <v-card-title>{{ product.product_name }}</v-card-title>
      </v-card>
    </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  props: {
    data: Array,
  }
}
</script>