function validateURL(textval) {
    var urlregex = /^(https?|ftp):\/\/([a-zA-Z0-9.-]+(:[a-zA-Z0-9.&%$-]+)*@)*((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|([a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(:[0-9]+)*(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
    return urlregex.test(textval);
}
var app = new Vue({
  el: '#app',
  data: {
    message: '',
    url: '',
    invalid: false,
    status: 0,
    encoded_url: ''
  },
  methods: {
  	onSubmit: function() {
  		if(validateURL(this.url)) {
  			console.log("Passed!");
  			this.invalid = false;
  			axios.post('/url', {
			    url: this.url
			  })
  			.then(response => {
  				this.status = response.data.status;
  				this.encoded_url = response.data.encoded_url;
  			})

		}
  		else {
  			this.message = "Invalid URL";
  			this.invalid = true;
  			this.status = 0;
  		}
  	}
  }
})