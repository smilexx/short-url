<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">You short urls</div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Url</th>
                                <th>Short</th>
                                <th>Count redirects</th>
                                <th>Created</th>
                                <th>Last redirect</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr v-for="item of shortUrls">
                                    <td><a v-bind:href="item.url" target="_blank">{{ item.url }}</a></td>
                                    <td><a v-bind:href="item.short_url" target="_blank">{{ item.short_url }}</a></td>
                                    <td>{{ item.views }}</td>
                                    <td>{{ item.created_at }}</td>
                                    <td>{{ item.updated_at }}</td>
                                    <th><button class="btn btn-danger" v-on:click="deleteUrl(item)">Delete</button></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.loadUrls();
        },
        data() {
            return {
                message: 'hello',
                shortUrls: []
            }
        },
        methods: {
            loadUrls: function () {
                var self = this;
                window.axios.get('/api/short-url')
                    .then(function(result){
                        self.shortUrls = result.data.data;
                    });
            },
            deleteUrl: function (item) {
                var self = this;
                window.axios.delete('/api/short-url/'+item.id)
                .then(function (result) {
                    if (result.data.status){
                        self.loadUrls();
                    }
                })
            }
        }
    }
</script>
