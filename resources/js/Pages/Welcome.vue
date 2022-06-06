

<template>
  <Head title="Welcome" />

  <div
    class="
      relative
      items-top
      justify-center
      min-h-screen
      bg-gray-100
      dark:bg-gray-900
      sm:items-center sm:pt-0
    "
  >
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <Link
        v-if="$page.props.user"
        :href="route('dashboard')"
        class="text-sm text-gray-700 underline"
      >
        Dashboard
      </Link>

      <template v-else>
        <Link :href="route('login')" class="text-sm text-gray-700 underline">
          Log in
        </Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-sm text-gray-700 underline"
        >
          Register
        </Link>
      </template>
    </div>
    <Link :href="route('filter')" class="text-sm text-gray-700 underline">
      filter
    </Link>
    <br />

    <br />
    <Link :href="route('newfilter')" class="text-sm text-gray-700 underline">
      New Filter with no url changes
    </Link>
    <br />
    <Link :href="route('category')" class="text-sm text-gray-700 underline">
      Category
    </Link>
    <br />
    <Link
      :href="route('dependentFirst')"
      class="text-sm text-gray-700 underline"
    >
      Dependent dropdown
    </Link>
  </div>
</template>

<script >
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
};
</script>

