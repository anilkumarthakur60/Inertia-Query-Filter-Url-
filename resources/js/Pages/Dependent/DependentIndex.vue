<template>
  <div class="row">
    <div class="col-sm-3">
      <div class="mb-3">
        <label for="" class="form-label">First</label>
        <select
          class="form-select"
          v-model="form.first_id"
          @change="getFirstSelectData()"
        >
          <option
            v-for="(first, index) in firsts"
            :key="index"
            :value="first.id"
            :selected="check(index)"
          >
            {{ first.name }}
          </option>
        </select>
      </div>
    </div>
    <div class="col-sm-3" v-if="second">
      <div class="mb-3">
        <label for="" class="form-label">Second</label>
        <select
          class="form-select"
          v-model="form.second_id"
          @change="getSecondSelectData()"
        >
          <option
            v-for="(first, index) in secondArray"
            :key="index"
            :value="first.id"
            :selected="check(index)"
          >
            {{ first.name }}
          </option>
        </select>
      </div>
    </div>
    <div class="col-sm-3" v-if="third">
      <div class="mb-3">
        <label for="" class="form-label">Third</label>
        <select
          class="form-select"
          v-model="form.third_id"
          @change="getThirdSelectData()"
        >
          <option
            v-for="(first, index) in thirdArray"
            :key="index"
            :value="first.id"
          >
            {{ first.name }}
          </option>
        </select>
      </div>
    </div>
    <div class="col-sm-3" v-if="fourth">
      <div class="mb-3">
        <label for="" class="form-label">Fourth</label>
        <select class="form-select" v-model="form.fourth_id">
          <option
            v-for="(first, index) in fourthArray"
            :key="index"
            :value="first.id"
          >
            {{ first.name }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
export default {
  name: "DependentIndex",
  props: {
    firsts: Array,
  },
  data() {
    return {
      second: false,
      third: false,
      fourth: false,

      secondArray: [],
      thirdArray: [],
      fourthArray: [],
    };
  },
  setup() {
    const form = useForm({
      first_id: null,
      second_id: null,
      third_id: null,
      fourth_id: null,
    });

    return { form };
  },
  methods: {
    check(key) {
      if (key == 0) {
        return true;
      } else {
        return false;
      }
    },
    getFirstSelectData() {
      this.second = true;
      axios
        .get(route("getSecondFromFirst", this.form.first_id))
        .then((response) => {
          this.secondArray = response.data.data;
          console.log(response.data.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    getSecondSelectData() {
      this.third = true;
      axios
        .get(route("getThirdFromSecond", this.form.second_id))
        .then((response) => {
          this.thirdArray = response.data.data;
          console.log(response.data.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    getThirdSelectData() {
      this.fourth = true;
      axios
        .get(route("getFourthFromThird", this.form.third_id))
        .then((response) => {
          this.fourthArray = response.data.data;
          console.log(response.data.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>