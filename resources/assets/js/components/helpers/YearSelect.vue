<template>
  <div :class="{ 'input': true, 'focused': focused }">
    <label for="year" class="sr-only">Any de naixement</label>
    <select
      id="year"
      @change="$emit('change', $event.target.value)"
      class="form-control">
      <option value="" :selected="!value" disabled>Any de naixement</option>
      <option v-for="year in years" :value="year" :key="year" :selected="value == year">{{ year }}</option>
    </select>
  </div>
</template>

<script>
  export default {
    name: 'year-select',

    props: {
      value: String
    },

    computed: {
      years () {
        const date = new Date();
        const topYear = date.getFullYear() - 16;
        const years = []

        for (let i = topYear; i > 1900; i--) {
          years.push(i)
        }

        return years
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/_variables';

  .input {
    position: relative;
    height: 4.4375rem;


    select {
      height: 4.4375rem;
      z-index: 1;
      position: absolute;
      padding-top: 1.8rem;
      padding-left: 1rem;
      padding-bottom: 0.4rem;
      border-width: 0.2rem;

      &:focus {
        border-color: $brand-primary !important;
      }
    }
  }
</style>