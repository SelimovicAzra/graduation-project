<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form-image :imageUrl="form.image"

                                :placeholder="'https://www.gravatar.com/avatar/default?s=200&r=pg&d=mm'"
                                :rounded="true"
                                refName="image"
                                refUpload="image-upload"
                                refId="imageID"
                    ></form-image>
                </div>
                <div class="col-md-4">
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.first_name"
                        :title="'Name'"
                        :type="'text'"
                        :labelFor="'Name'"
                        :placeholder="'Enter Name'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.last_name"
                        :title="'Surname'"
                        :type="'text'"
                        :labelFor="'Name'"
                        :placeholder="'Enter Last Name'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.email"
                        :title="'Email'"
                        :type="'text'"
                        :labelFor="'Email'"
                        :placeholder="'Enter email'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.password"
                        :title="'Password'"
                        :type="'text'"
                        :labelFor="'Password'"
                        :placeholder="'Enter Password'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.repeat_password"
                        :title="'Repeat Password'"
                        :type="'text'"
                        :labelFor="'Repeat Password'"
                        :placeholder="'Enter Repeat Password'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>



                </div>
                <div class="col-md-4">
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.phone_number"
                        :title="'Phone Number'"
                        :type="'text'"
                        :labelFor="'Phone Number'"
                        :placeholder="'Enter Phone Number'"
                        :required="'required'"
                        v-on:inputData="updateName"
                    ></form-input>
                    <label for="date-selection">Birth Date</label>
                    <datetime id="date-selection" v-model="form.birth_date" :labelClass="'form-label'"
                              :inputClass="'form-control'"
                              :placeholder="'Choose birth date'"style=" border: 1px solid #9EC7E4 !important;
                                border-radius: 5px !important;
                                 width: 400px;">

                    </datetime>
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
                    <label for="gender-selection">Gender</label>
                    <v-select id="gender-selection" label="name" v-model="form.selectedGender"
                              :options="gender" >
                    </v-select>
                </div>
                <button type="submit" class="btn btn-sm btn-success float-right mt-4">Save</button>
            </div>
        </div>


    </form>

</template>

<script>
    import FormInput from '../Form/FormInput.vue';
    import FormImage from '../Form/FormImage.vue';
    import axios from 'axios';

    export default {
        props: [
            'user',
            'image',
            'create'
        ],
        components: {
            FormInput,
            FormImage,
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
    #category-select-city, #category-select-country, #gender-selection{
        border: 1px solid #9EC7E4 !important;
        border-radius: 5px !important;
        width: 400px;

    }
</style>
