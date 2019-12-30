<template>
    <div class="form-group">
        <label
                v-bind:class="labelClass"
                v-bind:for="labelFor">
            {{ title }}
        </label>
        <textarea rows="1"
                  v-bind:class="inputClass"
                  v-bind:type="type"
                  v-bind:id="labelFor"
                  v-bind:placeholder="placeholder"
                  v-bind:max="max"
                  v-bind:min="min"
                  v-bind:required="required"
                  v-on:keyup="validate"
                  v-bind:value="value"
                  v-bind:disabled="disabled"
                  v-on:input="$emit('inputData', $event.target.value)"
                  style=" border: 1px solid #9EC7E4!important;
                        border-radius:5px!important;
                        ">
        </textarea>
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
            'labelClass',
            'inputClass',
            'value',
            'title',
            'type',
            'labelFor',
            'placeholder',
            'max',
            'min',
            'required',
            'disabled'
        ],
        methods:{
            validate(){

            }
        },
        created(){
            // console.log("Form TextArea Props: ", this.$props);
        }
    }
</script>
