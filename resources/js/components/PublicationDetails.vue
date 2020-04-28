<template>
    <div v-if="Object.keys(info).length">
        <h2>{{ title }}</h2>
        <p>Author{{ authors.suffix }}: {{ authors.text }}</p>
        <h2>{{ info.people[0].last_name }} ({{ info.publication_year }})</h2>
        <p>{{ info.publication_long_title }}</p>
    </div>
</template>

<script>

export default {
    props: {
        info: Object
    },
    computed: {
        title: function () {
            if (this.info.publication_type.type == "Thesis / Dissertation") {
                return this.info.thesis_type.type
            } else {
                return this.info.publication_type.type
            }
        },
        authors: function(){
            if(this.info.authors.length == 0){
                return {
                    suffix: 's',
                    text: 'There are no authors associated with this publication'
                }
            } else if (this.info.authors.length == 1) {
                return {
                    suffix: '',
                    text: this.info.authors[0].last_name + ', ' + this.info.authors[0].first_name
                }
            } else {
                var auth = this.info.authors.map(x => last_name + ', ' + first_name);
                return {
                    suffix: 's',
                    text: auth
                }
            }
        },
        supervisors: function(){
            if(this.info.supervisors.length == 0){
                return {
                    suffix: 's',
                    text: 'There are no supervisors associated with this publication'
                }
            } else if (this.info.supervisors.length == 1) {
                return {
                    suffix: '',
                    text: this.info.supervisors[0].last_name + ', ' + this.info.supervisors[0].first_name
                }
            } else {
                var auth = this.info.supervisors.map(x => x.last_name + ', ' + x.first_name)
                // .join('; ');
                return {
                    suffix: 's',
                    text: auth
                }
            }
        },
    }
}
</script>

<style>

</style>
