<template>
  <v-container>
    <v-card elevation="3" class="pa-6">
      <v-card-title class="text-h4 mb-6">Student Admission</v-card-title>

      <v-form ref="formRef" v-model="isValid" @submit.prevent="submitForm">
        
        <!-- Personal Info -->
        <section class="mb-8">
          <h3 class="text-h6 mb-3">Personal Info</h3>
          <v-row dense>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.fname" label="First Name" :rules="[rules.required]" />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.lname" label="Last Name" :rules="[rules.required]" />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.username" label="Username" :rules="[rules.required]" />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.email" label="Email" type="email" :rules="[rules.email]" />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.mobile_no" label="Mobile No." />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.dob" label="Date of Birth (BS)" placeholder="2080-01-15" />
            </v-col>
          </v-row>
        </section>

        <!-- Academic Info -->
        <section class="mb-8">
          <h3 class="text-h6 mb-3">Academic Info</h3>
          <v-row dense>
            <v-col cols="12" md="4">
              <v-select
                v-model="form.class_id"
                :items="classes"
                item-title="name"
                item-value="id"
                label="Class"
                :rules="[rules.required]"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-select
                v-model="form.section_id"
                :items="sections"
                item-title="name"
                item-value="id"
                label="Section"
              />
            </v-col>
            <v-col cols="12" md="4">
              <v-text-field v-model="form.roll_no" label="Roll Number" />
            </v-col>
          </v-row>
        </section>

        <!-- Guardian Info -->
        <section class="mb-8">
          <h3 class="text-h6 mb-3">Guardian Info</h3>
          <v-row dense>
            <v-col cols="12" md="6">
              <v-text-field v-model="form.guardian_name" label="Guardian Name" />
            </v-col>
            <v-col cols="12" md="6">
              <v-text-field v-model="form.guardian_mobile" label="Guardian Contact" />
            </v-col>
          </v-row>
        </section>

        <!-- Credentials -->
        <section class="mb-8">
          <h3 class="text-h6 mb-3">Credentials</h3>
          <v-row dense align="center">
            <v-col cols="12" md="6">
              <v-text-field v-model="form.password" label="Password" type="password" />
            </v-col>
            <v-col cols="12" md="6">
              <v-switch v-model="form.is_active" label="Is Active?" />
            </v-col>
          </v-row>
        </section>

        <!-- Actions -->
        <v-row justify="end" class="mt-4">
          <v-btn :disabled="!isValid" color="primary" type="submit">Submit</v-btn>
          <v-btn class="ml-3" color="secondary" @click="resetForm">Reset</v-btn>
        </v-row>
      </v-form>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      isValid: false,
      form: {
        fname: '',
        lname: '',
        username: '',
        email: '',
        mobile_no: '',
        dob: '',
        class_id: null,
        section_id: null,
        roll_no: '',
        guardian_name: '',
        guardian_mobile: '',
        password: '',
        is_active: true,
      },
      classes: [
        { id: 1, name: 'Grade 1' },
        { id: 2, name: 'Grade 2' },
        { id: 3, name: 'Grade 3' },
      ],
      sections: [
        { id: 1, name: 'A' },
        { id: 2, name: 'B' },
      ],
      rules: {
        required: (v) => !!v || 'This field is required',
        email: (v) => !v || /^\S+@\S+\.\S+$/.test(v) || 'Email must be valid',
      },
    }
  },
  methods: {
    submitForm() {
      if (this.$refs.formRef.validate()) {
        alert('Form submitted! See console for data.')
        console.log('Submitted:', this.form)
      }
    },
    resetForm() {
      this.$refs.formRef.reset()
    },
  },
}
</script>
