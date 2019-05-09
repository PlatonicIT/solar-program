require('./bootstrap');
window.Vue = require('vue');
import _ from 'lodash'
//window.axios.defaults.baseURL = process.env.NODE_ENV == 'production' ? process.env.MIX_BASE_URL : 'http://127.0.0.1:8000';


const app = new Vue({
	el: '#app',
	data:{
		error:'',
		zipcode:'',
		text:[],
		option:[],
		isActive:false,
	},
	methods: {
		surVey() {
			let outerThis = this;
			 let data = JSON.stringify({
				zipcode: this.zipcode,
			})
			  axios.post('/validate-zipcode', data, {
				headers: {
					'Content-Type': 'application/json',
					 "Access-Control-Allow-Origin": "*",
				}
			})
			.then(function(response) {
				outerThis.error = '';
				$("#surveyModal").modal('show');
			}).catch(function(error) {
				if (error.response.status == 422){
					outerThis.error = "Respuesta inválida";
				}

			})
		},
		optionValid(id,optionId) {
			if (this.option != '') {
				for (var opt in this.option) {
					if (opt == id) {
						this.isActive = true;
					}
				}
			}
			if (this.text != '') {
				for (var txt in this.text) {
					if (txt == optionId ) {
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
		},
		finishSurvey(){
			// $("#surveyModal").modal('hide');
			// $("#surveyModalFinish").modal('show');
		}
		
	},
});