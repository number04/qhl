if (document.getElementById("franchise")) {

    // Vue.component('roster', require('./components/franchise/roster.vue'));

    new Vue({
        el: '#franchise',

        data() {
            return {
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
                        this.franchises = response.data.data.franchises,
                        this.statistics = response.data.data.statistics,
                    ]);
            }
        },

        computed: {
            orderedPoints() {
                return _.orderBy(this.statistics, 'points', 'desc')
            },
        },

        created() {

        },

        mounted() {
            this.getData()
        }
    });
}
