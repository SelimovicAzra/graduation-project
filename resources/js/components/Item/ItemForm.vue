<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form-image :imageUrl="form.image"
                                v-on:imageUpload="updateImage"
                                :placeholder="'https://cdn0.iconfinder.com/data/icons/basic-outline/64/icon-basic-set_12-camera-512.png'"
                                :rounded="true"
                                refName="image"
                                refUpload="image-upload"
                                refId="imageID"
                    ></form-image>
                </div>
                <div class="col-md-2 vl"></div>
                <div class="col-md-5">
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.name"
                        :title="'Name'"
                        :type="'text'"
                        :labelFor="'Name'"
                        :placeholder="'Enter Name'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>
                    <label for="des">Description</label>
                    <form-text-area :id="'des'"
                                    :inputClass="'form-control'"
                                    v-model="form.description"
                                    :max = 100
                                    :min = 2
                                    :required="'required'"
                                    :placeholder = "'Enter short description'"
                                    v-on:inputData="updateDescription"
                    ></form-text-area>
                    <label for="category">Category</label>
                    <v-select id="category" label="name" v-model="form.selectedCategory"
                              :options="category" v-on:inputData="updateCategory">
                    </v-select>
                    <label for="category-select-city">City</label>
                    <v-select id="category-select-city" label="name" v-model="form.selectedCity"
                              :options="city" v-on:inputData="updateCity"
                              v-on:search="searchCity">
                    </v-select>



                </div>


                <button type="submit" class="btn btn-block mt-5 btn-save">Save</button>

            </div>
        </div>


    </form>

</template>

<script>
    import FormInput from '../Form/FormInput.vue';
    import FormImage from '../Form/FormImage.vue';
    import FormTextArea from '../Form/FormTextArea';
    import axios from 'axios';

    export default {
        props: [
            'item',
            'category',
            'image',
            'create',
            'existing-city'
        ],
        components: {
            FormInput,
            FormImage,
            FormTextArea,
        },
        data() {
            return {
                edit: false,
                changedImage: false,
                city:[],
                form: {
                    name: '',
                    description:'',
                    selectedCategory:'',
                    selectedCity:'',
                    image: '',

                }
            }
        },
        methods: {
            updateName(event) {
                this.form.name = event;
            },
            updateDescription(event){
                this.form.description = event;
            },
            updateCity(event){
                this.form.selectedCity = event;
            },
            updateCategory(event){
                this.form.selectedCategory = event;
            },
            updateImage(event){
                this.form.image = event;
                this.changedImage = true;
            },
            searchCity(event) {
                if (event.length >= 3) {
                    axios.get('/cities/search', {
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
                            console.log("response",response);
                            this.city = response.data.data;
                        }).catch(error => {
                        console.log(error)
                    });
                }
            },
            submitForm() {
                let newCity;
                for (let i = 0; i < this.city.length; i++) {
                    if (this.form.selectedCity.name === this.city[i].name) {
                        newCity = this.form.selectedCity.id;
                    }
                }
                let newCategory;
                for (let i = 0; i < this.category.length; i++) {
                    if (this.form.selectedCategory.name === this.category[i].name) {
                        newCategory= this.form.selectedCategory.id;
                        // console.log(newCategory, 'category_id');
                    }
                }
                let formData = new FormData();
                this.changedImage? formData.append('image' , this.form.image) :'';
                formData.append('name', this.form.name);
                formData.append('category_id', this.form.selectedCategory);
                formData.append('description', this.form.description);
                // formData.append('user_id', this.user.id);


                if (this.create) {
                    formData.append('city_id', newCity);
                } else {
                    console.log(this.form.selectedCity.id, 'ovo');
                    let cityEdit = this.form.selectedCity.id;
                    formData.append('city_id', cityEdit);
                }
                if (this.create) {
                    formData.append('category_id', newCategory);
                } else {
                    console.log(this.form.selectedCategory.id, 'ovo');
                    let categoryEdit = this.form.selectedCategory.id;
                    formData.append('category_id', categoryEdit);
                }

                !this.create ? formData.append('_method', 'PUT') : '';

                let url = window.location.protocol + '//' + window.location.host + (this.create ? '/items' : '/items/' + this.item.id);
                console.log("URL", url);

                axios.post(url, formData, {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                    .then(response => {
                        //alert('Success');
                        Toast.fire({
                            type: 'success',
                            title: 'Item successfully edited'
                        });
                        console.log(response);
                        if (this.create) {
                            Toast.fire({
                                type: 'success',
                                title: 'Item successfully created'
                            });
                            setTimeout(() => {
                                let url = window.location.protocol + '//' + window.location.host;
                                window.location = url + '/donations';
                            }, 1000)
                        }
                    });
            },


        },
        created() {
            console.log('PROPS',this.$props);
            // this.form.name = this.item.name;
            // this.form.description = this.item.description;
            // this.form.selectedCity = this.city.name;
            // for(let i = 0; i < this.category.length; i++) {
            //     this.form.selectedCategory = this.category[i].name;
            // }


        }
    }

</script>
<style>
    #category-select-city, #category, #des {
        border: 1px solid #9EC7E4 !important;
        border-radius: 5px !important;
        width: 400px;
    }

    .btn-save{
        background-color: #AC2020;
        color: white;
        width: 30%;
        margin: 10% auto 0 70%;
    }

</style>
