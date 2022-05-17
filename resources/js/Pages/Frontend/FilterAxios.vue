<template>
  <div class="container" :class="{ loading: loading }">
    <div class="row">
      <div class="col-lg-3 col-sm-3 mb-4 overflow-y-scroll vh-100">
        <h1 class="mt-4">Filters(Total:{{ blogs.length }})</h1>

        <h3 class="mt-2">Subcategories</h3>
        <div
          class="form-check"
          v-for="subcategory in subcategories"
          :key="subcategory.slug"
        >
          <input
            class="form-check-input"
            type="checkbox"
            :value="subcategory.slug"
            :id="'subcats' + subcategory.id"
            v-model="selected.subcategories"
          />
          <label class="form-check-label" :for="'subcats' + subcategory.id">
            {{ subcategory.name }}({{ subcategory.blogs_count }})
          </label>
        </div>

        <h3 class="mt-2">Tags</h3>
        <div class="form-check" v-for="tag in tags" :key="tag.slug">
          <input
            class="form-check-input"
            type="checkbox"
            :value="tag.slug"
            :id="'tag' + tag.slug"
            v-model="selected.tags"
          />
          <label class="form-check-label" :for="'tag' + tag.slug">
            {{ tag.name }}({{ tag.blogs_count }})
          </label>
        </div>

        <h3 class="mt-2">Users</h3>
        <div class="form-check" v-for="user in users" :key="user.id">
          <input
            class="form-check-input"
            type="checkbox"
            :value="user.email"
            :id="'user' + user.id"
            v-model="selected.users"
          />
          <label class="form-check-label" :for="'user' + user.id">
            {{ user.name }}({{ user.blogs_count }})
          </label>
        </div>
      </div>
      <div class="col-lg-9 cols-m-9 vh-100 overflow-scroll">
        <div class="row mt-4">
          <div
            class="col-lg-4 col-md-6 mb-4"
            v-for="post in blogs"
            :key="post.id"
          >
            <div class="card h-100">
              <a href="#">
                <img
                  class="card-img-top"
                  src="https://via.placeholder.com/150"
                  alt=""
                />
              </a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{ post.name }}</a>
                </h4>
                <h5>$ {{ post.slug }}</h5>
                <p class="card-text">{{ post.content }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 fs-5">Total Blog{{ blogs.length }}</div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      subcategories: [],
      tags: [],
      users: [],
      blogs: [],
      loading: true,
      selected: {
        subcategories: [],
        tags: [],
        users: [],
      },
    };
  },

  mounted() {
    this.loadSubcategories();
    this.loadUsers();
    this.loadPosts();
    this.loadTags();
  },

  watch: {
    selected: {
      handler: function () {
        this.loadSubcategories();
        this.loadUsers();
        this.loadPosts();
        this.loadTags();
      },
      deep: true,
    },
  },

  methods: {
    loadSubcategories: function () {
      axios
        .get("/api/subcategories", {
          params: _.omit(this.selected, "subcategories"),
        })
        .then((response) => {
          this.subcategories = response.data.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    loadTags: function () {
      axios
        .get("/api/tags", {
          params: _.omit(this.selected, "tags"),
        })
        .then((response) => {
          this.tags = response.data.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    loadPosts: function () {
      axios
        .get("/api/blogs", {
          params: this.selected,
        })
        .then((response) => {
          this.blogs = response.data.data;
          this.loading = false;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    loadUsers: function () {
      axios
        .get("/api/users", {
          params: _.omit(this.selected, "users"),
        })
        .then((response) => {
          this.users = response.data.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>


