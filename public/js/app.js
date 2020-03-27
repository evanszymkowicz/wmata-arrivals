var app = new Vue({
	el: '#app',
	data() {
		return {
			lines: {
				'Red': 'RD',
				'Green': 'GR',
				'Orange': 'OR',
				'Blue': 'BL',
				'Yellow': 'YL',
				'Silver': 'SV'
			},
			line: null,
			stations: [],
			station: null,
			trains: [],
			showModal: false,
			error: null
		}
	},
	watch: {
		line() {
			let route = "api/lines/" + this.line;
			axios.get(route).then(response => {
				if (response.data.error) {
					this.error = response.data.error;
				} else {
					this.stations = response.data;
				}
			});
		},
		station() {
			let route = "api/stations/" + this.station;
			axios.get(route).then(response => {
				if (response.data.error) {
					this.error = response.data.error;
				} else if (!response.data.length) {
					this.error = 'Sorry, no train data avalible.';
				} else {
					this.trains = response.data;
				}
			});
		}
	},
	methods: {
		showStation(station) {
			this.station = station;
		}
	}
});
