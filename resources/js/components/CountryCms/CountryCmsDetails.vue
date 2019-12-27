<template>
    <form>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.name"
            :title="'Name'"
            :type="'text'"
            :labelFor="'name'"
            disabled="disabled"
        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.calling_code"
            :title="'Calling code'"
            :type="'text'"
            :labelFor="'callingcode'"
            disabled="disabled"
        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.capital"
            :title="'Capital'"
            :type="'text'"
            :labelFor="'capital'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.code_alpha3"
            :title="'Code Alha3'"
            :type="'text'"
            :labelFor="'code_alpha3'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.code"
            :title="'Code'"
            :type="'text'"
            :labelFor="'code'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.currency_name"
            :title="'Currency Name'"
            :type="'text'"
            :labelFor="'currency_name'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.currency_code"
            :title="'Currency Code'"
            :type="'text'"
            :labelFor="'currency_code'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.full_name"
            :title="'Full Name'"
            :type="'text'"
            :labelFor="'full_name'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.emoji"
            :title="'Emoji'"
            :type="'text'"
            :labelFor="'emoji'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.top_level_domain"
            :title="'Top Level Domain'"
            :type="'text'"
            :labelFor="'top level domain'"
            disabled="disabled"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="country.created_at"
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
            'country',
        ],
        components:{
            FormInput,
        },
        data() {
            return{
            }
        },

        created(){
            console.log('response', this.$props);
        }
    }
</script>
