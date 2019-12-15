<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="4"
          >
            <v-card class="elevation-12">
              <v-toolbar
                color="primary"
                dark
                flat
              >
                <v-toolbar-title>Log in</v-toolbar-title>           
            
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                  v-model="user.email"
                    label="Login"
                    name="login"
                    prepend-icon="person"
                    type="text"
                  />

                  <v-text-field
                  v-model="user.password"
                    id="password"
                    label="Password"
                    name="password"
                    prepend-icon="lock"
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
                <v-btn color="primary" @click="login">Login</v-btn>
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
      user: {},
      has_error: false
    }),

    methods:{
      back(){
        this.$router.push('/');
      },

      login(){ 
        this.$auth.login({
          params: this.user,
          success: function(res) {
             console.log(res);
          },
          error: function(err) {
             console.log(err);
          },
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