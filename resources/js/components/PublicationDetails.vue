<template>
    <div v-if="Object.keys(info).length">
        <h2>{{ info.people[0].last_name }} ({{ info.publication_year }})</h2>
        <p>{{info.publication_long_title}}</p>
    </div>
</template>

<script>

export default {
    props: {
        info: Object
    }
}
</script>

<style>

</style>
