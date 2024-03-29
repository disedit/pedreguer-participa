<template>
  <div class="ballot-identification ballot-box">
    <h3><i class="fa fa-user" aria-hidden="true"></i> {{ $t('booth_identification.heading') }}</h3>
    <p class="subheading" v-html="$t('booth_identification.subheading', { min_age, municipality })"></p>
    <div class="row">
      <div class="col-lg-8 mb-2 mb-lg-0">
        <text-input
          name="identification"
          ref="identificationInput"
          :label="$t('booth_identification.label')"
          :tooltip="$t('booth_identification.tooltip')"
          :required="true"
          :value="identifier"
          :autofocus="autofocus"
          @update="updateID"
          @focus="autofocus = true"
          @blur="autofocus = false"
          aria-describedby="id_tooltip" />
          <div class="text-muted" id="id_tooltip">{{ $t('booth_identification.id_tooltip') }}</div>
      </div>
      <div class="col-lg-4">
        <year-select
          :value="year"
          @change="updateYear" />
      </div>
    </div>

    <hr aria-hidden="true" />

    <button :class="'btn btn-vote btn-primary btn-lg btn-block' + disabled" type="submit">
      <i v-if="disabled" class="fa fa-spinner-third fa-spin" aria-hidden="true"></i>
      <i v-else class="fa fa-bullhorn" aria-hidden="true"></i>
      {{ $t('booth_identification.button') }}
    </button>

    <p v-if="anonymous_voting" class="anonymous">
      <i class="far fa-lock" aria-hidden="true"></i>
      {{ $t('booth_identification.anonymous_voting') }}
    </p>
  </div>
</template>

<script>
  import TextInput from '../helpers/TextInput';
  import YearSelect from '../helpers/YearSelect'

  export default {
    name: 'ballot-identification',

    components: {
      TextInput,
      YearSelect
    },

    props: {
      loading: Boolean,
      identifier: String,
      year: String
    },

    data () {
      return {
        municipality: '',
        min_age: '16',
        anonymous_voting: false,
        autofocus: false,
        fourDigits: ''
      }
    },

    created () {
      this.anonymous_voting = window.BoothConfig.anonymous_voting;
      this.municipality = window.BoothConfig.name;
      this.min_age = window.BoothConfig.min_age;
    },

    mounted () {
      Bus.$on('doneSelecting', this.focusID);
      Bus.$on('focusMainButton', this.focusID);
    },

    computed: {
      disabled: function () {
        return this.loading ? ' disabled' : ''
      }
    },

    methods: {
      updateID (value) {
        Bus.$emit('fieldUpdated', 'ID', value);

        // Reset phone, country code and SMS request
        // in case user came from a previous step
        // and has changed their ID for whetever reason
        Bus.$emit('fieldUpdated', 'phone', '');
        Bus.$emit('fieldUpdated', 'countryCode', 34);
        Bus.$emit('fieldUpdated', 'smsRequested', false);
        Bus.$emit('fieldUpdated', 'smsCode', '');
      },

      updateYear (value) {
        Bus.$emit('fieldUpdated', 'year', value);

        // see updateID
        Bus.$emit('fieldUpdated', 'phone', '');
        Bus.$emit('fieldUpdated', 'countryCode', 34);
        Bus.$emit('fieldUpdated', 'smsRequested', false);
        Bus.$emit('fieldUpdated', 'smsCode', '');
      },

      focusID () {
        this.autofocus = true;
      }
    }

  }
</script>

<style scoped lang="scss">
  @import '../../../sass/_variables';

  .anonymous {
    text-align: center;
    color: $gray-light;
    font-size: 1rem;
    margin-bottom: 0;
    margin-top: 1rem;
  }

  #id_tooltip {
    line-height: 1;
    margin: .75rem 0 .75rem;
    font-size: .85rem;
  }

</style>
