<template>
  <div class="container-fluid">
    <div class="row flex-row">
      <Link :href="route('welcome')">Welcome</Link>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="row">
          <div class="col-12 my-3 overflow-y-scroll" style="max-height: 25vh">
            <div class="card shadow-lg">
              <div class="card-header">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                    v-model="checkAllCategories"
                    @change="filterResult"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    Select All Categoris
                  </label>
                </div>
              </div>

              <div class="card-body">
                <div
                  class="form-check"
                  v-for="(category, index) in categories"
                  :key="category.id"
                >
                  <input
                    class="form-check-input"
                    type="checkbox"
                    :value="category.id"
                    :id="'category' + index"
                    v-model="form.categoryChecked"
                    @change="filterResult"
                  />
                  <label class="form-check-label" :for="'category' + index">
                    {{ category.name }} ({{ category.posts_count }})
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 my-3 overflow-y-scroll" style="max-height: 25vh">
            <div class="card shadow-lg">
              <div class="card-header">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault1"
                    v-model="checkAllTags"
                    @change="filterResult"
                  />
                  <label class="form-check-label" for="flexCheckDefault1">
                    Select All Tags
                  </label>
                </div>
              </div>
              <div class="card-body">
                <div
                  class="form-check"
                  v-for="(tag, index) in tags"
                  :key="tag.id"
                >
                  <input
                    class="form-check-input"
                    type="checkbox"
                    :value="tag.id"
                    :id="'tag' + index"
                    v-model="form.tagChecked"
                    @change="filterResult"
                  />
                  <label class="form-check-label" :for="'tag' + index">
                    {{ tag.name }} ({{ tag.posts_count }})
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 my-3 overflow-y-scroll" style="max-height: 25vh">
            <div class="card shadow-lg">
              <div class="card-header">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefaultsas"
                    v-model="checkAllUsers"
                    @change="filterResult"
                  />
                  <label class="form-check-label" for="flexCheckDefaultsas">
                    Select All Users
                  </label>
                </div>
              </div>
              <div class="card-body">
                <div
                  class="form-check"
                  v-for="(user, index) in users"
                  :key="user.id"
                >
                  <input
                    class="form-check-input"
                    type="checkbox"
                    :value="user.id"
                    :id="'user' + index"
                    v-model="form.userChecked"
                    @change="filterResult"
                  />
                  <label class="form-check-label" :for="'user' + index">
                    {{ user.name }} ({{ user.posts_count }})
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <button @click="selectAll()" class="btn btn-sm btn-success">
              Select All
            </button>
            <button @click="filterResult()" class="btn btn-sm btn-danger">
              Filter
            </button>
          </div>
        </div>
      </div>
      <div class="col-sm-9 bg-danger">
        <div class="row">
          <h6>Total:{{ posts.length }}</h6>
        </div>
        <div class="row d-flex flex-wrap">
          <div
            class="col-sm-3 my-3 px-3"
            v-for="(post, index) in posts"
            :key="index"
          >
            <div class="card h-100 shadow-lg" style="border-radius: 1rem">
              <div class="card-body">
                <h6>{{ post.name }}</h6>
                <p>{{ post.desc }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  props: {
    posts: Object,
    categories: Array,
    tags: Array,
    users: Array,
  },

  data() {
    return {
      categoryChecked: [],
      tagChecked: [],
      userChecked: [],
    };
  },

  setup() {
    const form = useForm({
      categoryChecked: [],
      tagChecked: [],
      userChecked: [],
    });

    return { form };
  },
  remember: "form",

  methods: {
    selectAll() {
      this.checkAllCategories = !this.checkAllCategories;
      this.checkAllUsers = !this.checkAllUsers;
      this.checkAllTags = !this.checkAllTags;
    },

    filterResult() {
      this.form.get(route("filter"), {
        preserveScroll: true,
        preserveState: true,
      });
    },
  },
  computed: {
    checkAllCategories: {
      get: function () {
        return this.categories
          ? this.form.categoryChecked.length == this.categories.length
          : false;
      },
      set: function (value) {
        var categoryChecked = [];
        if (value) {
          this.categories.forEach(function (category) {
            categoryChecked.push(category.id);
          });
        }
        this.form.categoryChecked = categoryChecked;

        console.log(categoryChecked.join(", "));
      },
    },

    checkAllTags: {
      get: function () {
        return this.tags
          ? this.form.tagChecked.length == this.tags.length
          : false;
      },
      set: function (value) {
        var tagChecked = [];
        if (value) {
          this.tags.forEach(function (tag) {
            tagChecked.push(tag.id);
          });
        }
        this.form.tagChecked = tagChecked;

        console.log(tagChecked.join(", "));
      },
    },
    checkAllUsers: {
      get: function () {
        return this.users
          ? this.form.userChecked.length == this.users.length
          : false;
      },
      set: function (value) {
        var userChecked = [];
        if (value) {
          this.users.forEach(function (user) {
            userChecked.push(user.id);
          });
        }
        this.form.userChecked = userChecked;

        console.log(userChecked.join(", "));
      },
    },
  },
};
</script>



