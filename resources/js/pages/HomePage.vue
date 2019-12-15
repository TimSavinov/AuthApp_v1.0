<template>
<div>
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
            <v-card class="elevation-12" border-color="primary">
            
              <v-card-text>
                It's just a Registration component, so you won't have much options here. Enjoy your choice:)
              </v-card-text>
              <v-card-actions>
                <v-tooltip top>
                   <template v-slot:activator="{ on }">
                <v-btn color="primary" @click="login()" v-on="on"> Login </v-btn>
                   </template>
                <span>Click to log in</span>
                </v-tooltip>
                <v-tooltip bottom>
                  <template v-slot:activator="{ on }">
                <v-btn color="primary" @click="register()" v-on="on"> Register</v-btn>
                  </template>
                  <span>Click to register a new account</span>
                </v-tooltip>
              </v-card-actions>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</div>
</template>

<script>

export default{

     props: {   
      source: String,
    },

    data(){
        return {
      }
    },
    methods:{
        login(){
            this.$router.push('login');
        },
        register(){
            this.$router.push('register');
        }
    }

}

</script>

<style scoped>
.v-card__text {
    text-align: center;
    color: hsla(0,0%,100%,.7);
    font-size: 22px;
}

.v-card__actions {
    align-items: center;
    display: grid;
    padding: 8px;
    width: 100%;
}

.v-btn {
        margin-top: 5%;
    height: 36px;
    min-width: 64px;
    margin: 11px 10px; 
}

</style>