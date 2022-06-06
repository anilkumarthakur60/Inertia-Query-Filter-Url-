<template>
  <div class="mb-3">
    <label for="" class="form-label"></label>
    <select class="form-control" v-model="form.name" name="" id="">
      <option
        v-for="(category, index) in categories"
        :key="index"
        :value="category.id"
        :selected="key == 0"
      >
        {{ category.name }}
      </option>
    </select>
  </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  name: "CategoryIndex",
  props: {
    categories: Array,
  },
  data() {
    return {
      subCategories: [],
    };
  },
  setup() {
    const form = useForm({
      name: null,
    });

    return { form };
  },
};
</script>