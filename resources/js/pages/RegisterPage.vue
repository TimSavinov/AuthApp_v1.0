<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid >
        <v-row
          align="center"
          justify="center"   >
          <v-col
            cols="12"
            sm="8"
            md="4"   >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat        >
                <v-toolbar-title>Register</v-toolbar-title>           
            
              </v-toolbar>
              <v-card-text>
                <v-form ref="form">
                  <v-text-field
                    v-model="user.name"
                    label="Name"
                    prepend-icon="account_box"
                    :rules="generalRules"
                  />

                  <v-text-field
                  v-model="user.surname"
                  label="Surname"
                    id="surname"                    
                    name="surname"
                    prepend-icon="account_box"
                    type="text"
                    :rules="generalRules"
                  />
                  <v-text-field
                  v-model="user.email"
                  label="Email"
                    id="email"                    
                    name="email"
                    prepend-icon="email"
                    type="email"
                    :rules="generalRules"
                           />
                
                 <v-text-field
                 v-model="user.phone"
                    label="Phone"
                    name="phone"
                    prepend-icon="call"
                    type="phone"
                    :rules="numericRules"
                  />

                  <v-text-field
                  v-model="user.password"
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="assignment"
                    type="password"
                    :rules="generalRules"
                  />

                  <v-text-field
                  v-model="user.password_confirmation"
                    id="password-confirmation"
                    label="Password confirmation"
                    name="password-confirmation"
                    prepend-icon="assignment"
                    type="password"
                    :rules="generalRules"
                  />

                </v-form>
              </v-card-text>
              <v-card-actions class="mx-6">
                 <v-tooltip top>
                  <template v-slot:activator="{ on }">
                <v-btn color="primary" @click="back" v-on="on"><v-icon>arrow_back</v-icon>Back</v-btn>
                  </template>
                   <span>Click to get back</span>
                </v-tooltip>
                <div class="errors-raw">
                <div class="back-errors" v-for="error in backEndError" :key="error.length">{{ error[0] }} </div>
                </div>
                <v-spacer />
                <v-dialog max-width="27%">
                   <template v-slot:activator="{ on }">
                     <v-btn color="primary" @click="attempt" v-on="on">Register</v-btn>
                   </template>
                   <v-card class="info"  v-if="isValid">
                     <v-card-text>
                       You have successfully created an account!
                        Please check your inbox and follow the confirmation email
                     </v-card-text>
                   </v-card>
                </v-dialog>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>
<script>

export default{
props: {
      source: String,
    },

    data: () => ({
        user: {
          name: '',
          surname: '',
          phone: '',
          email: '',
          password: '',
          password_confirmation: ''
        },
        isValid: false,
        backEndError: '',
        generalRules: [
          v => v.length > 0 || 'the field is required'
        ],
        numericRules: [
          v => !isNaN(v) || 'the phone should be a number',
          v => v.length > 0 || 'the field is required'
        ]
    }),

methods: {
   back() {
       this.$router.push('/');
   },

   attempt(){
   if(this.$refs.form.validate()){
       this.register();
        this.isValid = true;
   }
   },

   register(){
       console.log(this.user);
       setTimeout(() => {this.$auth.register({
          data: this.user,
          success: function (res) {

            console.log(res);
          },
          error: function (res) {
            this.backEndError = res.response.data.errors;
            console.log(this.backEndError);
          }
    
   }), 3000 });
}
}

}
</script>

<style scoped>
.v-toolbar__title {

    width: 100%;
    text-align: center;
}

.back-errors{
    text-align: center;
    color: #d6e131;
    display: table;
    font-size: 12px;
}
</style>