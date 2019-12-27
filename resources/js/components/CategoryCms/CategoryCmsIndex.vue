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
                    <th @click="sortBy('created_at')">Created at<span class="sort"><i class="fas fa-sort-up"></i><i
                        class="fas fa-sort-down"></i></span></th>
                    <th>Actions<span class="sort"><i class="fas fa-sort-up"></i><i
                        class="fas fa-sort-down"></i></span></th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="categories" v-for="category in categories.data">
                    <th>{{category.name}}</th>
                    <th>{{getTimestamp(category.created_at)}}</th>
                    <th>
                        <div class="btn-group" role="group" aria-label="Author Action Buttons">
                            <button v-on:click="showCategory(category.id)"
                                    class="btn btn-sm btn-dark mr-1">
                                <i class="fas fa-search"></i>
                                Show
                            </button>
                            <button v-on:click="editCategory(category.id)"
                                    class="btn btn-sm btn-primary mr-1">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </button>
                            <button v-on:click="deleteCategory(category.id)" class="btn btn-sm btn-danger">
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
            <pagination :data="categories" @pagination-change-page="getResults" :limit=3 align='center'>
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
            </pagination>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                categories: {},
                search: '',
                sort: 'created_at',
                dir: ''
            }
        },
        methods: {
            getTimestamp(date) {
                return moment(date).format('YYYY-MM-DD');
            },
            // getCategorys(){
            //     axios.get('categories/raw')
            //         .then(response=> {
            //             this.categories = response.data.data;
            //         }).catch(error=>{
            //             console.log(error);
            //     });
            // },
            getResults(page) {
                if (typeof page == 'undefined') {
                    page = 1;
                }
                axios.get('categoriesCms/raw/?page=' + page + '&sort=' + this.dir + this.sort + '&filter[term]=' + this.search)
                    .then(response => {
                        this.categories = response.data;
                        console.log(response);
                    }).catch(error => {
                    console.log("Error", error)
                });
            },

            deleteCategory(id) {
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
                        axios.delete('categoriesCms/' + id)
                            .then((response) => {
                                console.log(response);
                                let index = this.categories.data.map(categories => {
                                    return categories.id;
                                }).indexOf(id);
                                this.categories.data.splice(index, 1)
                            }).catch((err) => {
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
            editCategory(id) {
                let url = window.location.protocol + '//' + window.location.host;
                window.location = url + '/categoriesCms/' + id + '/edit'
            },
            showCategory(id) {
                let url = window.location.protocol + '//' + window.location.host;
                window.location = url + '/categoriesCms/' + id;
            },
            sortBy(prop) {
                if (this.sort === prop) {
                    this.dir = this.dir === '' ? '-' : ''
                }
                this.sort = prop;
                this.getResults();
            }
        },

        mounted() {
            //this.getCategorys();
            this.getResults();
        }
    }

</script>
