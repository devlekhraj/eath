import '@mdi/font/css/materialdesignicons.css';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import { VDateInput } from 'vuetify/labs/VDateInput';
import 'vuetify/styles';
import { aliases, mdi } from 'vuetify/iconsets/mdi';

export default createVuetify({
  components: {
    ...components,
    VDateInput,
  },
  directives,
  defaults: {
    global: {
      style: {
        fontFamily: 'Poppins, sans-serif',
      },
    },
    VCard: {
      flat: true,
      elevation: 0,
      border: 0,
      rounded: true,
    },
    VNavigationDrawer: {
      elevation: 0,
    },
    VTextField: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VSelect: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VAutocomplete: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VCombobox: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VTextarea: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VFileInput: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VDateInput: {
      density: 'comfortable',
      variant: 'outlined',
      color: 'primary',
      hideDetails: 'auto',
    },
    VCheckbox: {
      density: 'comfortable',
      color: 'primary',
      hideDetails: 'auto',
    },
    VRadio: {
      density: 'comfortable',
      color: 'primary',
      hideDetails: 'auto',
    },
    VSwitch: {
      density: 'comfortable',
      color: 'primary',
      inset: true,
      hideDetails: 'auto',
    },
    VTable: {
      density: 'comfortable',
      hover: true,
    },
    VDataTable: {
      density: 'comfortable',
      hover: true,
    },
    VDataTableServer: {
      density: 'comfortable',
      hover: true,
    },
    VBtn: {
      elevation: 0,
    },
    VAvatar: {
      rounded: true,
      variant: 'tonal',
    },
    VChip: {
      size: 'small',
      variant: 'tonal',
      label: true,
      class: 'text-capitalize',
    },
    VProgressLinear: {
      height: 6,
      rounded: true,
    },
    VAlert: {
      density: 'comfortable',
      variant: 'tonal',
    },
    VTooltip: {
      location: 'top',
    },
    VListItem: {
      style: {
        paddingInline: '12px',
      },
    },
  },
  icons: {
    defaultSet: 'mdi',
    aliases,
    sets: { mdi },
  },
  theme: {
    defaultTheme: 'light',
    themes: {
      light: {
        colors: {
          background: '#f5f6f8',
          primary: (typeof localStorage !== 'undefined' && localStorage.getItem('admin_theme_primary')) || '#1976D2',
        },
      },
    },
  },
});
