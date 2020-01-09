<template>
    <form v-on:submit.prevent="submitForm" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <form-image :imageUrl="form.image"
                                v-on:imageUpload="updateImage"
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
                        v-model="form.name"
                        :title="'Name'"
                        :type="'text'"
                        :labelFor="'Name'"
                        :placeholder="'Enter Name'"

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
                        v-on:inputData="updateEmail"
                    ></form-input>
<!--                    <button class="btn-success" v-on:click="show = true">Change Password</button>-->
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.password"
                        :title="'Password'"
                        :type="'text'"
                        :labelFor="'Password'"
                        :placeholder="'Enter Password'"

                        v-on:inputData="updatePassword"

                    ></form-input>
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.repeat_password"
                        :title="'Repeat Password'"
                        :type="'text'"
                        :labelFor="'Repeat Password'"
                        :placeholder="'Enter Repeat Password'"

                        v-on:inputData="updateRepeatPassword"

                    ></form-input>



                </div>
                <!--<div class="col-md-1 vl"></div>-->
                <div class="col-md-4">
                    <form-input
                        :labelClass="'form-label'"
                        :inputClass="'form-control'"
                        v-model="form.phone_number"
                        :title="'Phone Number'"
                        :type="'text'"
                        :labelFor="'Phone Number'"
                        :placeholder="'Enter Phone Number'"
                        v-on:inputData="updatePhoneNumber"
                    ></form-input>
                    <label for="date-selection">Birth Date</label>
                    <datetime id="date-selection" v-model="form.birth_date" v-on:inputData="updateBirthDate" :labelClass="'form-label'"
                              :inputClass="'form-control'"
                              :placeholder="'Choose birth date'"style=" border: 1px solid #9EC7E4 !important;
                                border-radius: 5px!important">

                    </datetime>
                    <div class="cityGender">
                    <label for="category-select-city">City</label>
                    <v-select id="category-select-city" label="name" v-model="form.selectedCity"
                              :options="city" v-on:inputData="updateCity"
                              v-on:search="searchCity"><span slot="no-options">Search for city...</span>
                    </v-select>
                    </div>
                    <div class="cityGender">
                    <label for="gender-selection">Gender</label>
                    <v-select id="gender-selection" label="name" v-model="form.selectedGender" v-on:inputData="updateGender"
                              :options="['Male', 'Female']" >
                    </v-select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="link-style btn btn-sm mt-3 float-right btn-save">Save</button>
                </div>
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
                show:false,
                edit: false,
                changedImage: false,
                city:[],
                form: {
                    name: '',
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
            updatePassword(event) {
                this.form.password = event;
            },
            updateRepeatPassword(event) {
                this.form.repeat_password = event;
            },
            updateEmail(event) {
                this.form.email = event;
            },
            updatePhoneNumber(event) {
                this.form.phone_number = event;
            },
            updateGender(event) {
                this.form.gender = event;
            },
            updateBirthDate(event) {
                this.form.birth_date = event;
            },
            updateCity(event) {
                this.form.city = event;
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
                let formData = new FormData();
                this.changedImage? formData.append('image' , this.form.image) :'';
                formData.append('name', this.form.name);
                formData.append('gender', this.form.selectedGender);
                formData.append('password', this.form.password);
                formData.append('password_confirmation', this.form.repeat_password);
                formData.append('email', this.form.email);
                formData.append('phone_number', this.form.phone_number);
                formData.append('birth_date', moment(this.form.birth_date).format('Y-M-D H:mm:ss'));
                // if (this.create) {
                //     formData.append('city_id', newCity);
                // } else {
                    console.log(this.form.selectedCity.id, 'ovo');
                    if(this.form.selectedCity.id===undefined){
                        formData.append('city_id', this.user.city_id);
                    }else{
                    let cityEdit = this.form.selectedCity.id;
                    formData.append('city_id', cityEdit);
                }

                !this.create ? formData.append('_method', 'PUT') : '';

                let url = window.location.protocol + '//' + window.location.host + (this.create ? '/users' : '/users/' + this.user.id);
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
                            title: 'User successfully edited'
                        });
                        console.log(response);
                        if (this.create) {
                            Toast.fire({
                                type: 'success',
                                title: 'User successfully created'
                            });
                            console.log(response.data.data.id);
                            setTimeout(() => {
                                let url = window.location.protocol + '//' + window.location.host;
                                window.location = url + '/users/' + response.data.data.id + '/edit';
                            }, 1000)
                        }
                    });
            }
        },
        created() {
            console.log(this.$props);
            this.form.name = this.user.name;
            // this.form.password = this.user.password;
            this.form.email = this.user.email;
            this.form.selectedGender = this.user.gender;
            let birth_date = new Date(this.user.birth_date);
            this.form.birth_date = birth_date.toISOString();
            this.form.phone_number = this.user.phone_number;
            this.form.selectedCity = this.user.city.name;
            this.form.image = this.image;
        }
    }

    </script>
<style>
    #category-select-city, #gender-selection{
        border: 1px solid #9EC7E4 !important;
        border-radius: 5px !important;
        /*width: 400px;*/
    }
    .btn-save{
        background-color: #AC2020;
        color: white;
        width:20%;
    }
    .cityGender{
        margin-top:6%;
    }
    /*.crta{*/
        /*border-right: 4px solid #AC2020;*/
        /*max-height: 300px;*/
    /*}*/

</style>
