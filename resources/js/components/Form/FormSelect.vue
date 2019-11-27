<template>

    <div class="form-group">
        <label v-if="title" v-bind:for="labelFor" class="form-label">{{ title }}</label>
        <div>
            <select v-bind:value="value"
                    v-on:change="$emit('inputData', $event.target.value)"
                    v-bind:id="labelFor"
                    class="custom-select">
                <option disabled value="">{{ placeholder }}</option>
                <option
                        v-bind:value="option.name"
                        v-for="(option, index) in options"
                        v-bind:key="index"
                >{{ option.name }}</option>
                <option v-if="remove" value="remove">
                    {{ removeTitle }}
                </option>
            </select>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                data: ''
            }
        },
        props: [
            'value',
            'title',
            'labelFor',
            'placeholder',
            'max',
            'min',
            'required',
            'options',
            'remove',
            'removeTitle'
        ],
        methods:{
            validate(){

            }
        },
        created(){
            // console.log("Form Select Props: ", this.$props);
        }
    }
</script>
