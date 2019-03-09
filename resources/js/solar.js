
require('./bootstrap');
window.Vue = require('vue');

const phoneRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,7}$/gm;

const app = new Vue({
    el: '#app',
	  data:{
          validate:false,
          optionerror:false,
          error:'',
          zipcode:'',
          txt:[],
          opt:{},   
      },
	  computed: {
		  zipvalid(){
			  if(this.zipcode != '' && this.zipcode.length == 5 ){
                   this.error = "Please enter valid zip code";
                   return this.error;
              }
          }
         
	  },
      methods:{
        surVey(){
            
                axios.post('/validate-zipcode',{zipcode:this.zipcode})
                .then(res=>{
                    this.error = '';
                    this.validate = true;
                })
                .catch(error=>{
                    this.validate = false;
                    if (error.response.status == 422){
                        this.error = error.response.data.errors;
                    }
                })
           
        },
       
        nextSurvey(){
            axios.post('/validate-answer',{text:this.txt,option:this.opt})
            .then(res=>{
                this.optionerror = true,
                console.log(res.data)
            })
            .catch(err=>{
              
                if (error.response.status == 422){
                    this.error = error.response.data.errors;
                    console.log(this.error)
                }
            })
        }
       
      },
      watch:{
          valid(){
              this.validate
          }
      }
     
     
    

});
