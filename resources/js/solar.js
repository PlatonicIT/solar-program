
require('./bootstrap');
window.Vue = require('vue');


const app = new Vue({
    el: '#app',
	  data:{
          validate:true,
          error:'',
          zipcode:'',
      },
      methods:{
        surVey(){
            axios.post('validate-survey',{zipcode:this.zipcode})
                .then(res=>{
                  this.validate = false;
                  this.error = '';
                })
                .catch(error=>{
                    if (error.response.status == 422){
                        this.validate = true;
                        this.error = error.response.data.errors;
                    }else{
                        this.validate = false;
                    }
                })
        },
        testSurvey(){
            if(this.validate==false){
                this.surVey();   
            } 
        }
      },
      created(){
            this.testSurvey();
      }
     
    

});
