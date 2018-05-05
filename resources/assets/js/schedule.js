if (document.getElementById("schedule")) {

    // Vue.component('roster', require('./components/franchise/roster.vue'));

    new Vue({
        el: '#schedule',

        data() {
            return {
                league_bye: {
                    month: 'Aug',
                    day: '13'
                },
                dates: [],
                games: [],
                byes: []
            }
        },

        methods: {

            franchiseIcon(franchise) {
                return '#' + franchise;
            },

            franchiseClass(franchise) {
                return 'franchise-' + franchise;
            },

            getData() {
                axios.get('/data/schedule')
                    .then(response => [
                        this.dates = response.data.data.dates,
                        this.games = response.data.data.games,
                        this.byes = response.data.data.byes
                        
                    ]);
            }
        },

        mounted() {
            this.getData()
        }
    });
}
