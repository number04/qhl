<template>
	<section>
		<div class="tabs">
			<ul>
				<li
					:class="{ 'is-active': tab.isActive }"
					v-for="tab in tabs" :key="tab.id">

					<a :link="tab.href"	@click="selectTab(tab)">
						<span>{{ tab.name }}</span>
					</a>
				</li>
			</ul>
	    </div>

		<slot></slot>
	</section>
</template>

<script>
export default {
	data() {
		return {
			tabs: []
		}
	},

	created() {
        this.tabs = this.$children;
    },

	methods: {
		selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.href == selectedTab.href);
            });
        }
	}
}
</script>
