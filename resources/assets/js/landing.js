if (document.getElementById("landing")) {

    // Vue.component('roster', require('./components/franchise/roster.vue'));

    new Vue({
        el: '#landing',

        props: [
            'performance'
        ],

        data() {
            return {
                dates: [],
                byes: [],
                games: [],
                franchises: [],    
                statistics: []
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
                axios.get('/data/main')
                    .then(response => [
                        this.performance = response.data.data.performance,
                        this.dates = response.data.data.dates,
                        this.byes = response.data.data.byes,
                        this.games = response.data.data.games,
                        this.franchises = response.data.data.franchises,
                        this.statistics = response.data.data.statistics,
                    ]);
            }
        },

        computed: {
            orderedStanding() {
                return _.orderBy(this.franchises, 'standing.points', 'desc')
            },

            orderedPoints() {
                return _.orderBy(this.statistics, 'points', 'desc')
            },

            orderedGoals() {
                return _.orderBy(this.statistics, 'goals', 'desc')
            },

            orderedAssists() {
                return _.orderBy(this.statistics, 'assists', 'desc')
            },
        },

        created() {

        },

        mounted() {
            this.getData()
        }
    });
}
