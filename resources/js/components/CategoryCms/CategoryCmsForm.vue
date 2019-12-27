<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">

        <form-input
            :labelClass="'form-label'"
            :inputClass="'form-control'"
            v-model="form.name"
            :title="'Category Name'"
            :type="'text'"
            :labelFor="'name'"
            :placeholder="'Enter Category'"
            :required="'required'"
            v-on:inputData="updateName"
        ></form-input>


        <button type="submit" class="btn btn-sm btn-success float-right mt-4">Save</button>
    </form>
</template>

<script>
    import FormInput from '../Form/FormInput.vue';
    import axios from 'axios';

    export default {
        props:[
            'category',
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
                }
            }
        },
        methods:{
            updateName(event){
                this.form.name = event;
            },
            updateSlug(event){
                this.form.slug = event;
            },
            submitForm(){
                let formData = new FormData();
                formData.append('name' , this.form.name);
                !this.create ? formData.append('_method' , 'PUT') : '';

                let url = window.location.protocol + '//' + window.location.host +(this.create ? '/categoriesCms' : '/categoriesCms/' + this.category.id);
                console.log("URL",url);

                axios.post(url, formData,{
                    headers:{
                        'Content-Type':'application/x-www-form-urlencoded'
                    }
                })
                    .then((response)=>{
                        Toast.fire({
                            type: 'success',
                            title: 'Category successfully edited'
                        });
                        console.log(response);
                        if(this.create){
                            Toast.fire({
                                type: 'success',
                                title: 'Category successfully created'
                            });
                            setTimeout(()=>{
                                let url = window.location.protocol + '//' + window.location.host;
                                window.location = url + '/categoriesCms/' + response.data.data.id + '/edit';
                            }, 1000)
                        }
                    });
            }
        },
        created(){
            console.log(this.$props);
            if(!this.create){
                this.form.name = this.category.name;

            }
        }
    }
</script>
