<template>
  <VPhoneInput
    :model-value="modelValue"
    :country-icon-mode="CountryIcon"
    :enable-searching-country="true"
    :guess-country="guessCountry"
    :country-guesser="countryGuesser"
    :default-country="defaultCountry"
    :prefer-countries="preferCountries"
    :density="density"
    :variant="variant"
    :color="color"
    v-bind="$attrs"
    @update:model-value="onUpdateModelValue"
    @update:country="onUpdateCountry"
  />
</template>

<script setup>
import { defineComponent, h } from 'vue'
import { VPhoneInput, StorageMemoIp2cCountryGuesser } from 'v-phone-input'
import 'flag-icons/css/flag-icons.min.css'
import 'v-phone-input/dist/v-phone-input.css'

const countryGuesser = typeof window !== 'undefined' ? new StorageMemoIp2cCountryGuesser() : undefined

defineProps({
  modelValue: {
    type: [String, Number],
    default: '',
  },
  guessCountry: {
    type: Boolean,
    default: true,
  },
  defaultCountry: {
    type: String,
    default: 'NP',
  },
  preferCountries: {
    type: Array,
    default: () => ['NP', 'IN', 'US', 'GB', 'AU', 'CN'],
  },
  density: {
    type: String,
    default: 'comfortable',
  },
  variant: {
    type: String,
    default: 'outlined',
  },
  color: {
    type: String,
    default: 'primary',
  },
})

const emit = defineEmits(['update:modelValue', 'update:country'])

function onUpdateModelValue(val) {
  emit('update:modelValue', val)
}

function onUpdateCountry(val) {
  emit('update:country', val)
}

// Custom CountryIcon component:
// In selection (decorative: false) -> Flag + Dial Code (e.g. 🇳🇵 +977)
// In dropdown list (decorative: true) -> Flag only (title and append handle name & code)
const CountryIcon = defineComponent({
  name: 'CountryIcon',
  props: {
    country: {
      type: Object,
      required: true,
    },
    decorative: {
      type: Boolean,
      default: false,
    },
  },
  setup(props) {
    return () => {
      const iso = props.country?.iso2 ? String(props.country.iso2).toLowerCase() : ''
      const flag = h('span', {
        class: ['v-phone-input__country__icon', 'fi', `fi-${iso}`],
      })

      if (props.decorative) {
        return flag
      }

      return h('span', { class: 'd-inline-flex align-center ga-1 text-slate-800' }, [
        flag,
        h('span', { class: 'text-caption font-weight-medium' }, `+${props.country?.dialCode || ''}`),
      ])
    }
  },
})
</script>
