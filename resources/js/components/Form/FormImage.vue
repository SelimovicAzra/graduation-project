<template>
    <div class="example-image">
        <label for="" v-if="title">{{ title }}</label>
        <!--<div v-show="$refs.upload && $refs.upload.dropActive" class="drop-active">-->
        <div v-show="$refs[refUpload] && $refs[refUpload].dropActive" class="drop-active">
            <h3>Drop files to upload</h3>
        </div>
        <div class="image-upload"  v-show="!edit">
            <div class="text-center p-2">
                <label for="avatar">
                    <!--<img :src="files.length ? files[0].url : 'https://www.gravatar.com/avatar/default?s=200&r=pg&d=mm'"  class="rounded-circle" />-->
                    <!--<img :src="files[0].url !== '' ? files[0].url : 'https://www.gravatar.com/avatar/default?s=200&r=pg&d=mm'"  class="rounded-circle" />-->
                    <img
                            :src="files[0].url !== '' ? files[0].url : placeholder"
                            :class="[rounded ? 'rounded-circle' : 'rectangle']"
                    />
                </label>
            </div>
            <div v-if="!disabled && uploadImage" class="text-center p-2">
                <file-upload
                        :input-id="refId"
                        extensions="gif,jpg,jpeg,png,webp"
                        accept="image/png,image/gif,image/jpeg,image/webp"
                        name="avatar"
                        class="btn"
                        :drop="!edit"
                        v-model="files"
                        @input-filter="inputFilter"
                        @input-file="inputFile"
                        :ref="refUpload"
                        style=" background-color: rgb(158,	199,	228);
                                color:black;
                                font-weight:bold;">
                    Upload image
                </file-upload>
            </div>
        </div>

        <div class="avatar-edit" v-show="files.length && edit">
            <div class="avatar-edit-image" v-if="files.length">
                <!--<img ref="editImage" :src="files[0].url" />-->
                <img :ref="refName" :src="files[0].url" />
            </div>
            <div class="text-center p-4">
                <!--<button type="button" class="btn btn-secondary" @click.prevent="$refs.upload.clear">Cancel</button>-->
                <button type="button" class="btn btn-secondary" @click.prevent="clearUpload">Cancel</button>
                <button type="submit" class="btn btn-primary" @click.prevent="editSave">Save</button>
            </div>
        </div>
    </div>
</template>
<script>
    import Cropper from 'cropperjs'
    import FileUpload from 'vue-upload-component'
    export default {
        props: [
            'imageUrl',
            'placeholder',
            'rounded',
            'title',
            'disabled',
            'refName',
            'refUpload',
            'refId',
            'upload'
        ],
        components: {
            FileUpload,
        },
        data() {
            return {
                files: [],
                edit: false,
                cropper: false,
                starting: [],
                uploadImage: true
            }
        },
        watch: {
            edit(value) {
                if (value) {
                    let name = this.refName;
                    this.$nextTick(function () {
                        if (!this.$refs[name]) {
                            return
                        }
                        let cropper = new Cropper(this.$refs[name], {
                            // aspectRatio: 1 / 1,
                            viewMode: 1,
                        });
                        this.cropper = cropper;
                    })
                } else {
                    if (this.cropper) {
                        this.cropper.destroy();
                        this.cropper = false
                    }
                }
            }
        },
        methods: {
            getClass(){
                return
            },
            clearUpload(){
                this.edit = false;
                this.files[0] = this.starting[0];
                console.log("Files Clear: ", this.files);
            },
            getRoundCroppedCanvas(sourceCanvas){
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');
                var width = sourceCanvas.width;
                var height = sourceCanvas.height;
                canvas.width = width;
                canvas.height = height;
                context.imageSmoothingEnabled = true;
                context.drawImage(sourceCanvas, 0, 0, width, height);
                context.globalCompositeOperation = 'destination-in';
                context.beginPath();
                context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
                context.closePath();
                context.fill();
                console.log("Canvas: ", canvas);
                console.log("Context: ", context);
                return canvas;
            },
            editSave() {
                this.edit = false;
                let oldFile = this.files[0];
                let binStr = atob(this.cropper.getCroppedCanvas().toDataURL(oldFile.type).split(',')[1]);
                // let test = this.getRoundCroppedCanvas(this.cropper.getCroppedCanvas());
                // let test2 = atob(test.toDataURL(oldFile.type).split(',')[1]);
                let arr = new Uint8Array(binStr.length);
                // let arr = new Uint8Array(test2.length);
                for (let i = 0; i < binStr.length; i++) {
                    arr[i] = binStr.charCodeAt(i)
                }
                // for (let i = 0; i < test2.length; i++) {
                //     arr[i] = test2.charCodeAt(i)
                // }
                let file = new File([arr], oldFile.name, { type: oldFile.type });
                // this.$refs.upload.update(oldFile.id, {
                //     file,
                //     type: file.type,
                //     size: file.size,
                //     active: true,
                // });
                console.log("Files Upload: ", this.files);
                console.log("File Upload: ", file);

                let url = '';
                let URL = window.URL || window.webkitURL;
                if (URL && URL.createObjectURL) {
                    url = URL.createObjectURL(file)
                }

                this.starting[0].url = url;
                this.files[0].url = url;
                this.$emit('imageUpload', file);
            },
            alert(message) {
                alert(message)
            },
            inputFile(newFile, oldFile, prevent) {
                if (newFile && !oldFile) {
                    this.$nextTick(function () {
                        this.edit = true
                    })
                }
                if (!newFile && oldFile) {
                    this.edit = false
                }
            },
            inputFilter(newFile, oldFile, prevent) {
                if (newFile && !oldFile) {
                    if (!/\.(gif|jpg|jpeg|png|webp)$/i.test(newFile.name)) {
                        this.alert('Your choice is not a picture');
                        return prevent();
                    }
                }
                if (newFile && (!oldFile || newFile.file !== oldFile.file)) {
                    newFile.url = '';
                    let URL = window.URL || window.webkitURL;
                    if (URL && URL.createObjectURL) {
                        newFile.url = URL.createObjectURL(newFile.file)
                    }
                }
            }
        },
        created() {
            // console.log("Image prop: ", this.$props);
            this.files[0] = { url: this.imageUrl };
            this.starting[0] = { url: this.imageUrl };
            this.uploadImage = this.upload !== false;
        }
    }
</script>
<style>
    .example-image .image-upload .rounded-circle {
        width: 200px;
        height: 200px;
    }
    .example-image .image-upload .rectangle {
        max-width: 600px;
        width: 100%;
        height: auto;
    }
    .example-image .text-center .btn {
        margin: 0 .5rem
    }
    .example-image .avatar-edit-image {
        max-width: 100%
    }
    .example-image .drop-active {
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        position: fixed;
        z-index: 9999;
        opacity: .6;
        text-align: center;
        background: #000;
    }
    .example-image .drop-active h3 {
        margin: -.5em 0 0;
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        font-size: 40px;
        color: #fff;
        padding: 0;
    }
</style>
