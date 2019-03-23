require('./bootstrap');
window.Vue = require('vue');
import _ from 'lodash'

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
			axios.post('/validate-zipcode', {
				zipcode: this.zipcode
			}).then(function(response) {
				outerThis.error = '';
				$("#surveyModal").modal('show');
			}).catch(function(error) {
				if (error.response.status == 422){
					outerThis.error = "Invalid Response";
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
		}
	},
});