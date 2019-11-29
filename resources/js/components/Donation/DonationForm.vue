<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form-image :imageUrl="form.image"

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
                    <label for="Des">Description</label>
                    <form-text-area :id="'Des'"
                                    :inputClass="'form-control'"
                                    v-model="form.description"
                                    :max = 100
                                    :min = 2
                                    :required="'required'"
                                    :placeholder = "'Enter short description'"
                                    v-on:inputData="updateTimelineDesc"
                    ></form-text-area>
                    <label for="category">Category</label>
                    <v-select id="category" label="name" v-model="form.selectedCategory"
                              :options="category" v-on:inputData="updateCategory"
                              v-on:search="searchCategory">
                    </v-select>
                    <label for="category-select-city">City</label>
                    <v-select id="category-select-city" label="name" v-model="form.selectedCity"
                              :options="city" v-on:inputData="updateCity"
                              v-on:search="searchCity">
                    </v-select>
                    <label for="category-select-country">Country</label>
                    <v-select id="category-select-country" label="name" v-model="form.selectedCountry"
                              :options="country" v-on:inputData="updateCountry"
                              v-on:search="searchCountry">
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
            '',
            'image',
            'create'
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
                form: {
                    first_name: '',
                    last_name:'',
                    email:'',
                    password:'',
                    repeat_password:'',
                    phone_number:'',
                    birth_date:'',
                    selectedCity:'',
                    selectedCountry:'',
                    selectedGender:'',
                    image: '',

                }
            }
        },
        methods: {
            updateName(event) {
                this.form.name = event;
            },
        },
        created() {
            this.form.first_name = this.user.first_name;
            this.form.last_name = this.user.last_name;
            this.form.email = this.user.email;
            this.form.password = this.user.password;
        }
    }

</script>
<style>
    #category-select-city, #category-select-country, #category, #Des {
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
