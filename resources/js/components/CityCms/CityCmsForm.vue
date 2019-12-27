<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.name"
            :title="'City Name'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter city name'"
            :required="'required'"
            v-on:inputData="updateName"
        ></form-input>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.slug"
            :title="'Slug'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter Slug'"
            v-on:inputData="updateSlug"
        ></form-input>
        <label for="category-select">Country</label>
        <v-select id="category-select" label="name" v-model="form.selectedCountry"
                  :options="country" v-on:inputData="updateCountry"
                  v-on:search="searchCountry">
        </v-select>
        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.zip_code"
            :title="'Zip Code'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter zip code'"
            :required="'required'"
            v-on:inputData="updateZipCode"
        ></form-input>

        <button type="submit" class="btn btn-sm btn-success float-right mt-4">Save</button>
    </form>
</template>
<script>
    import FormInput from '../Form/FormInput.vue';
    import axios from 'axios';
    import FormSelect from '../Form/FormSelect';

    export default {
        props:[
            'city',
            'existingCountry',
            'create'
        ],
        components:{
            FormInput,
            FormSelect,
        },
        data(){
            return{
                edit:false,
                country:[],
                form:{
                    name:'',
                    slug:'',
                    zip_code:'',
                    selectedCountry:''
                }
            }
        },
        methods:{
            updateName(event){
                this.form.name = event;
            },
            updateCountry(event){
                this.form.country = event;
            },
            updateSlug(event){
                this.form.slug = event;
            },
            updateZipCode(event){
                this.form.zip_code = event;
            },
            searchCountry(event){
                if (event.length >= 3) {
                    console.log("Search country");
                    axios.get('/countriesCms/search', {
                        params: {
                            search: event
                        },
                        mode: 'no-cors',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    })
                        .then(response => {
                            console.log(response);
                            this.country = response.data.data;
                        }).catch(error => {
                        console.log(error)
                    });
                }
            },
            submitForm(){
                let newCountry;
                for (let i = 0; i < this.country.length; i++) {
                    if (this.form.selectedCountry.name === this.country[i].name){
                        console.log('usao', newCountry);
                        newCountry = this.form.selectedCountry.id;
                        console.log(newCountry, 'poslije')
                    }
                }
                let formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('zip_code', this.form.zip_code);
                formData.append('slug', this.form.slug);
                if(this.create){
                    formData.append('country_id', newCountry);
                }else {
                    let countryEdit = this.form.selectedCountry.id;
                    formData.append('country_id', countryEdit);
                }


                !this.create ? formData.append('_method' , 'PUT') : '';

                let url = window.location.protocol + '//' + window.location.host + (this.create ? '/citiesCms' : '/citiesCms/'+this.city.id);
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
                            title: 'City successfully edited'
                        });
                        console.log(response);
                        if(this.create){
                            Toast.fire({
                                type: 'success',
                                title: 'City successfully created'
                            });
                            console.log(response.data.data.id);
                            setTimeout(()=>{
                                let url = window.location.protocol + '//' + window.location.host;
                                window.location = url + '/citiesCms/' + response.data.data.id + '/edit';
                            },1000)
                        }
                    });
            }
        },
        created(){
            console.log(this.$props);
            if(!this.create){
                this.form.name = this.city.name;
                this.form.zip_code = this.city.zip_code;
                this.form.selectedCountry = this.existingCountry;
                this.form.slug = this.city.slug;
            }
        }

    }
</script>
