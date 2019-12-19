<template>
    <form>


    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 card">
            <h5>Donation's Information</h5>
            <form-image
                :labelClass="'form-label'"
                :inputClass="'form-control'"
                :imageUrl="image"
                :title="''"
                :type="'image'"
                :labelFor="'name'"
                disabled="disabled"
                style="max-width:500px!important;max-height:300px!important;margin:0 auto;"
            ></form-image>
            <form-input
                :labelClass="'form-label'"
                :inputClass="'form-control'"
                v-model="item.name"
                :title="'Name'"
                :type="'text'"
                :labelFor="'name'"
                disabled="disabled"
            ></form-input>

            <form-text-area :labelClass="'form-label'"
                            :inputClass="'form-control'"
                            :title="'Item Description'"
                            :type="'text'"
                            :labelFor="'itemDesc'"
                            v-model="item.description"
                            :required="'required'"
                            disabled="disabled"
            ></form-text-area>
            <form-input
                :labelClass="'form-label'"
                :inputClass="'form-control'"
                v-model="city.name"
                :title="'City'"
                :type="'text'"
                :labelFor="'nameCity'"
                disabled="disabled"
            ></form-input>

            <form-input
                :labelClass="'form-label'"
                :inputClass="'form-control'"
                v-model="category.name"
                :title="'Category'"
                :type="'text'"
                :labelFor="'des'"
                disabled="disabled"
            ></form-input>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card"><h5>Author's Information</h5>
                <form-image
                    :labelClass="'form-label'"
                    :inputClass="'form-control'"
                    :imageUrl="userImage"
                    style="width:auto!important;margin:0 auto; max-height:300px!important;"
                    :placeholder="'https://www.gravatar.com/avatar/default?s=200&r=pg&d=mm'"
                    :rounded="true"
                    :title="''"
                    :type="'image'"
                    :labelFor="'name'"
                    disabled="disabled"
                ></form-image>
                <form-input
                    :labelClass="'form-label'"
                    :inputClass="'form-control'"
                    v-model="user.name"
                    :title="'Name'"
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
                    :labelFor="'name'"
                    disabled="disabled"
                ></form-input>
                <form-input
                    :labelClass="'form-label'"
                    :inputClass="'form-control'"
                    v-model="user.phone_number"
                    :title="'Phone Number'"
                    :type="'text'"
                    :labelFor="'name'"
                    disabled="disabled"
                ></form-input>
        </div>
            <div class="card">
            <form-input
                :labelClass="'form-label'"
                :inputClass="'form-control'"
                v-model="item.created_at"
                :title="'Created At'"
                :type="'text'"
                :labelFor="'name'"
                disabled="disabled"
            ></form-input>
        </div>

    </div>



        </div>

    </form>
</template>

<script>
    import FormInput from '../Form/FormInput.vue';
    import FormImage from '../Form/FormImage.vue';
    import FormTextArea from '../Form/FormTextArea.vue';

    export default {
        props: [
            'item',
            'image',
            'city',
            'category',
            'user',
            'userImage',
        ],
        components: {
            FormInput,
            FormImage,
            FormTextArea,

        },
        data() {
            return {}
        },
        created() {
            console.log(this.$props);
        }

    }
</script>
<style>
    .card h5{
        text-align:center;
    }
    .card{
        border: 1px solid #9EC7E4!important;
        border-radius: 1rem!important;
        padding:10px;
        margin-top:10px;
    }
    img{
        max-width:100%!important;max-height:300px!important;margin:0 auto;
        padding:10px;
    }
</style>
