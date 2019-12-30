<template>

        <div class="card-body">
            <div class="container">
                <div class="row">
                        <div class="col-6">
                                <form-image
                                    v-if="image"
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    :imageUrl="image"
                                    :type="'image'"
                                    :labelFor="'image'"
                                    :rounded="true"
                                    disabled="disabled"
                                    style="position:center"
                                ></form-image>
                        </div>
                        <div class="col-6">
                                <form-input
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    v-model="user.name"
                                    :title="'First Name'"
                                    :type="'text'"
                                    :labelFor="'name'"
                                    disabled="disabled"
                                ></form-input>
                                <form-input
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    v-model="user.email"
                                    :title="'Email'"
                                    :type="'text'"
                                    :labelFor="'email'"
                                    disabled="disabled"
                                ></form-input>

                                <form-input
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    v-model="user.phone_number"
                                    :title="'Phone number'"
                                    :type="'text'"
                                    :labelFor="'phone_number'"
                                    disabled="disabled"
                                ></form-input>

                                <form-input
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    :value="city.name"
                                    :title="'City'"
                                    :type="'text'"
                                    :labelFor="'city'"
                                    disabled="disabled"
                                ></form-input>

                                <form-input
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    v-model="user.birth_date"
                                    :title="'Birth Date'"
                                    :type="'text'"
                                    :labelFor="'birth_date'"
                                    disabled="disabled"
                                ></form-input>
                            <form-input
                                :labelClass="'form-label'"
                                :inputClass="'form-control'"
                                v-model="user.gender"
                                :title="'Gender'"
                                :type="'text'"
                                :labelFor="'gender'"
                                disabled="disabled"
                            ></form-input>
                                <form-input
                                    :labelClass="'form-label'"
                                    :inputClass="'form-control'"
                                    v-model="user.created_at"
                                    :title="'Created_at'"
                                    :type="'text'"
                                    :labelFor="'created_at'"
                                    disabled="disabled"
                                ></form-input>
                        </div>
                </div>
            </div>
        </div>
</template>

<script>
    import FormInput from '../Form/FormInput.vue';
    import FormImage from '../Form/FormImage.vue';

    export default {
        props: [
            'user',
            'city',
            'image',

        ],
        components: {
            FormInput,
            FormImage
        },
        data() {
            return {}
        },
        methods: {
            toUpperCase(event){
                return event.charAt(0).toUpperCase() + event.slice(1)
            },
        },
        created() {
            console.log(this.$props);
        }

    }
</script>
