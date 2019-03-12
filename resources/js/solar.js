require('./bootstrap');
window.Vue = require('vue');
window.solar = new Vue();
import _ from 'lodash'

const app = new Vue({
    el: '#app',
	  data:{
          validate:false,
          error:'',
          zipcode:'',
          text:[],
          option:[],
          isActive:false,
      },
	  computed: {
		  zipvalid(){
			  if(this.zipcode != '' && this.zipcode.length == 5 ){
                   this.error = "Please enter valid zip code";
                   return this.error;
              }
          },
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
       
        optionValid(id,optionId){
            
        if(this.option!=''){
          
            for(var opt in this.option){
                if(opt==id){
                    this.isActive = true;
                } 
            }
        }
        if(this.text!=''){ 
            for(var txt in this.text){
                if(txt == optionId ){
                    this.isActive = true;
                   }
             } 
        }    
      },
      flaseIsActive(){
        this.isActive = false; 
      },
      trueIsActive(){
        this.isActive = true;  
      }
       
        
        
      },
    
    
     
    

});