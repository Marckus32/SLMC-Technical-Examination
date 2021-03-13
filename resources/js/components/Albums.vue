<template>
    <div style="margin:50px;">
        <h1 class="text-center">Albums Page</h1>
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" v-model="search" placeholder="Search" @input="getResults()"><br>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <tr v-for="row in results" :key="row.id">
                        <td>{{ row.user.name}}</td>
                        <td>{{ row.title}}</td>
                        <td>
                            <button class="btn btn-info btn-sm" type="button" style="margin-left: 0px;margin-right: 5px;">Photos</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="pagination">
            <button class="btn btn-primary" v-on:click="fetchPaginateUsers(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">Previous</button>
            <button class="btn btn-default">Page {{pagination.current_page}} of {{pagination.last_page}}</button>
            <button class="btn btn-primary" v-on:click="fetchPaginateUsers(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next</button>
        </div>
    </div>
</template>


<script>
export default {
    name: "Albums",
    created(){
        this.getResults();
    },
    data() {
        return {
            results : [],
            search: '',
            pagination: [],
            url: '/albums/results'
        }
    },
    methods : {
        getResults(){
            let $this = this;
            axios.get(this.url,{
                params:{
                    searchValue: this.search 
                }
            })
                .then(response => {
                    console.log(response.data)
                    this.results = response.data.data
                    this.pagination= response.data;
                });
        },
        makePagination(data){
            let pagination = {
                current_page : data.current_page,
                last_page : data.last_page,
                next_page_url : data.next_page_url,
                prev_page_url : data.prev_page_url,
            };
            this.pagination = pagination
        },
        fetchPaginateUsers(url){
            this.url = url;
            this.getResults();
        }

    }
}
</script>
