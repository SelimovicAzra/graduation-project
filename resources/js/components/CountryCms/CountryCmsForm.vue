<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.name"
            :title="'Country Name'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter Country'"
            :required="'required'"
            v-on:inputData="updateName"

        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.calling_code"
            :title="'Calling code'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter calling code'"
            :required="'required'"
            v-on:inputData="updateCallingCode"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.capital"
            :title="'Capital'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter capital'"
            :required="'required'"
            v-on:inputData="updateCapital"
        ></form-input>

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.code"
            :title="'Code'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter code'"
            :required="'required'"
            v-on:inputData="updateCode"

        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.code_alpha3"
            :title="'Code Alpha3'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter code alpha3'"
            :required="'required'"
            v-on:inputData="updateCodeAlpha3"

        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.currency_code"
            :title="'Currency Code'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter currency code'"
            :required="'required'"
            v-on:inputData="updateCurrencyCode"

        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.currency_name"
            :title="'Currency Name'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter currency name'"
            :required="'required'"
            v-on:inputData="updateCurrencyName"

        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.emoji"
            :title="'Emoji'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter emoji'"
            :required="'required'"
            v-on:inputData="updateEmoji"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.full_name"
            :title="'Full Name'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter full name'"
            :required="'required'"
            v-on:inputData="updateFullName"

        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.top_level_domain"
            :title="'Top Level Domain'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter top level domain'"
            :required="'required'"
            v-on:inputData="updateTLD"

        ></form-input>

        <button type="submit" class="btn btn-sm btn-success float-right mt-4">Save</button>
    </form>
</template>
<script>
    import FormInput from '../Form/FormInput.vue';
    import axios from 'axios';

    export default {
        props:[
            'country',
            'create'
        ],
        components:{
            FormInput,
        },
        data(){
            return{
                edit:false,
                form:{
                    name:'',
                    calling_code:'',
                    capital:'',
                    code:'',
                    code_alpha3:'',
                    currency_code:'',
                    currency_name:'',
                    emoji:'',
                    full_name:'',
                    top_level_domain:'',
                }
            }
        },
        methods:{
            updateName(event){
                this.form.name = event;
            },
            updateCallingCode(event){
                this.form.calling_code = event;
            },
            updateCapital(event){
                this.form.capital = event;
            },
            updateCode(event){
                this.form.code = event;
            },
            updateCodeAlpha3(event){
                this.form.code_alpha3= event;
            },
            updateCurrencyCode(event){
                this.form.currency_code = event;
            },
            updateCurrencyName(event){
                this.form.currency_name = event;
            },
            updateEmoji(event){
                this.form.emoji = event;
            },
            updateFullName(event){
                this.form.full_name = event;
            },
            updateTLD(event){
                this.form.top_level_domain = event;
            },
            submitForm(){
                let formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('calling_code', this.form.calling_code);
                formData.append('capital', this.form.capital);
                formData.append('code_alpha3', this.form.code_alpha3);
                formData.append('code', this.form.code);
                formData.append('currency_code', this.form.currency_code);
                formData.append('currency_name', this.form.currency_name);
                formData.append('emoji', this.form.emoji);
                formData.append('full_name', this.form.full_name);
                formData.append('top_level_domain', this.form.top_level_domain);

                !this.create ? formData.append('_method' , 'PUT') : '';
                // console.log('id', this.country.id, 'forma', this.form);
                let url = window.location.protocol + '//' + window.location.host + (this.create ? '/countriesCms' : '/countriesCms/'+ this.country.id);
                console.log("URL",url);

                axios.post(url,formData,{
                    headers:{
                        'Content-Type':'application/x-www-form-urlencoded'
                    }
                })
                    .then(response=>{
                        //alert('Success');
                        Toast.fire({
                            type: 'success',
                            title: 'Country successfully edited'
                        });
                        console.log(response);
                        if(this.create){
                            Toast.fire({
                                type: 'success',
                                title: 'Country successfully created'
                            });
                            console.log(response.data.data.id);
                            setTimeout(()=>{
                                let url = window.location.protocol + '//' + window.location.host;
                                window.location = url + '/countriesCms/' + response.data.data.id + '/edit';
                            },1000)
                        }
                    });
            }
        },
        created(){
            console.log(this.$props);
            if(!this.create){
                this.form.name = this.country.name;
                this.form.calling_code = this.country.calling_code;
                this.form.capital = this.country.capital;
                this.form.code = this.country.code;
                this.form.code_alpha3 = this.country.code_alpha3;
                this.form.currency_code = this.country.currency_code;
                this.form.currency_name = this.country.currency_name;
                this.form.emoji = this.country.emoji;
                this.form.full_name = this.country.full_name;
                this.form.top_level_domain = this.country.top_level_domain;

            }
        }

    }
</script>
