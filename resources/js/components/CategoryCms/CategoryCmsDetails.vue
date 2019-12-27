<template>
    <form>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="category.name"
            :title="'Name'"
            :type="'text'"
            :labelFor="'name'"
            disabled="disabled"
        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="category.created_at"
            :title="'Created at'"
            :type="'text'"
            :labelFor="'created_at'"
            disabled="disabled"
        ></form-input>
    </form>
</template>

<script>
    import FormInput from '../Form/FormInput.vue';

    export default {
        props: [
            'category',
        ],
        components:{
            FormInput,
        },
        data() {
            return{
            }
        },

        created() {
            console.log(this.$props);
        }
    }
</script>
