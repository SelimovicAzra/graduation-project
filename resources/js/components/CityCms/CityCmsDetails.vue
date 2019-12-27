<template>
    <form>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="city.name"
            :title="'Name'"
            :type="'text'"
            :labelFor="'name'"
            disabled="disabled"
        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="city.zip_code"
            :title="'Zip code'"
            :type="'text'"
            :labelFor="'zip_code'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="city.country_id"
            :title="'CountryCms'"
            :type="'text'"
            :labelFor="'country'"
            disabled="disabled"
        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="city.created_at"
            :title="'Created_at'"
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
            'city',
        ],
        components:{
            FormInput,
        },
        data() {
            return{
            }
        },

    }
</script>
