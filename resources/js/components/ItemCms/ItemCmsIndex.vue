<template>
    <div class="card">
        <div class="card-body">
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form control" type="search" v-model="search" v-on:keyup="getResults"
                           placeholder="Search..."
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <table class="table table-hover mt-4">
                <thead>
                <tr>
                    <th @click="sortBy('name')">Name<span class="sort"><i class="fas fa-sort-up"></i><i
                        class="fas fa-sort-down"></i></span></th>
                    <th @click="sortBy('description')">Email<span class="sort"><i class="fas fa-sort-up"></i><i
                        class="fas fa-sort-down"></i></span></th>
                    <th @click="sortBy('created_at')">Created At<span class="sort"><i class="fas fa-sort-up"></i><i
                        class="fas fa-sort-down"></i></span></th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="items" v-for="item in items.data" >
                    <th>{{item.name}}</th>
                    <th>{{item.description}}</th>

                    <th>{{getTimestamp(item.created_at)}}</th>
                    <th>
                        <div class="btn-group" role="group" aria-label="User Action Buttons">
                            <button v-on:click="showUser(item.id)" class="btn btn-sm btn-dark mr-1">
                                <i class="fas fa-search"></i>
                                Show
                            </button>
                            <button v-on:click="deleteItem(item.id)" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                        </div>
                    </th>
                </tr>
                </tbody>
            </table>

        </div>

        <div class="card-footer">
            <pagination :data="items" @pagination-change-page="getResults" :limit=3 align='center'>
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
            </pagination>
        </div>

    </div>

</template>

<script>
    import axios from 'axios'

    export default {
        props:[
          'city',
        ],
        data(){
            return{
                items:{},
                search:'',
                sort: 'created_at',
                dir: '',
            }
        },
        methods: {

            getResults(page){
                if(typeof page == 'undefined'){
                    page = 1;
                }
                axios.get('itemsCms/raw/?page=' + page + '&sort=' + this.dir + this.sort + '&filter[term]=' + this.search)
                    .then(response =>{
                        this.items = response.data;
                        console.log(response, "response");
                    }).catch(error => {
                    console.log("Error", error)
                });
            },
            showUser(id){
                let url = window.location.protocol + '//' + window.location.host;
                window.location = url + '/itemsCms/' + id;
            },
            deleteItem(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('itemsCms/' + id)
                            .then(response => {
                                console.log(response);
                                let index = this.items.data.map(items => {
                                    return items.id;
                                }).indexOf(id);
                                this.items.data.splice(index, 1)
                            }).catch(error => {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        });
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });
            },
            sortBy(prop) {
                if (this.sort === prop) {
                    this.dir = this.dir === '' ? '-' : ''
                }
                this.sort = prop;
                this.getResults();
            },
            getTimestamp(date) {
                return moment(date).format('YYYY-MM-DD');
            },
        },
        mounted() {
            console.log(this.items, 'items');
            this.getResults();
        }
    }
</script>
<style>

</style>
