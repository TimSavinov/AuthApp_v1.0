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
                <v-form>
                  <v-text-field
                  v-model="user.name"
                    label="Name"
                    name="name"
                    prepend-icon="account_box"
                    type="text"
                  />

                  <v-text-field
                  v-model="user.surname"
                  label="Surname"
                    id="surname"                    
                    name="surname"
                    prepend-icon="account_box"
                    type="text"
                  />
                  <v-text-field
                  v-model="user.email"
                  label="Email"
                    id="email"                    
                    name="email"
                    prepend-icon="email"
                    type="email"
                           />
                
                 <v-text-field
                 v-model="user.phone"
                    label="Phone"
                    name="phone"
                    prepend-icon="call"
                    type="phone"
                  />

                  <v-text-field
                  v-model="user.password"
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="assignment"
                    type="password"
                  />

                  <v-text-field
                  v-model="user.password_confirmation"
                    id="password-confirmation"
                    label="Password confirmation"
                    name="password-confirmation"
                    prepend-icon="assignment"
                    type="password"
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
                <v-spacer />
                <v-btn color="primary" @click="register">Register</v-btn>
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
        user: {}
    }),

methods: {
   back() {
       this.$router.push('/');
   },

   register(){
       console.log(this.user);
        this.$auth.register({
          data: this.user,
          success: function (res) {
            console.log(res);
          },
          error: function (res) {
            console.log(res.response.data.errors);
          }
    
   });
}
}

}
</script>

<style scoped>
.v-toolbar__title {

    width: 100%;
    text-align: center;
}
</style>